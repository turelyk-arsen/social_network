<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Message;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ChatController extends Controller
{
    public function index($userId)
    {
        $from_user_id = auth()->user();
        $to_user_id = User::findOrFail($userId);
        $users = User::where('id', '!=', $from_user_id->id)->get();

        $messages = Message::where(function ($query) use ($from_user_id, $to_user_id) {
            $query->where('from_user_id', $from_user_id->id)->where('to_user_id', $to_user_id->id);
        })->orWhere(function ($query) use ($from_user_id, $to_user_id) {
            $query->where('from_user_id', $to_user_id->id)->where('to_user_id', $from_user_id->id);
        })->orderBy('created_at', 'asc')->get();

        // $unreadCount = Message::where('from_user_id', $to_user_id->id)
        // ->where('to_user_id', $from_user_id->id)
        // ->where('is_read', false)
        // ->count();

        $unreadCount = [];
        foreach ($users as $user) {
            $count = Message::where('from_user_id', $user->id)
                        ->where('to_user_id', $from_user_id->id)
                        ->where('is_read', false)
                        ->count();
            $unreadCount[$user->id] = $count;
        }

        foreach ($messages as $message) {
            if ($message->to_user_id == $from_user_id->id && !$message->is_read) {
                $message->is_read = true;
                $message->save();
            }
        }

        return view('chat', compact('users', 'from_user_id', 'to_user_id', 'messages', 'unreadCount'));
    }

    public function store(Request $request)
    {
        // Validate the request data
        $validatedData = $request->validate([
            'from_user_id' => 'required',
            'to_user_id' => 'required',
            'content' => 'required',
        ]);
        // Create a new message
        // $message = new Message();
        // $message->from_user_id = auth()->user()->id;
        // $message->to_user_id = $request->to_user_id;
        // $message->content = $request->content;
        // $message->save();
        Message::create($validatedData);
        return back()->with('success', 'Message sent successfully.');
    }

    public function getMessages(Request $request)
    {
        // Validate the request data
        $request->validate([
            'with_user_id' => 'required|exists:users,id',
        ]);

        // Retrieve the authenticated user
        $user = auth()->user();

        // Retrieve the messages between the authenticated user and the specified user
        $messages = Message::where(function ($query) use ($user, $request) {
            $query->where('from_user_id', $user->id)
                ->where('to_user_id', $request->with_user_id);
        })->orWhere(function ($query) use ($user, $request) {
            $query->where('from_user_id', $request->with_user_id)
                ->where('to_user_id', $user->id);
        })->orderBy('created_at', 'asc')->get();

        return response()->json($messages);
    }
}
