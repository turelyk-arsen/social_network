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

        return view('chat', compact('users', 'from_user_id', 'to_user_id'));
    }

    public function store(Request $request)
    {
        // Validate the request data
        $validatedData =$request->validate([
            'from_user_id' => 'required|exists:users,id',
            'to_user_id' => 'required|exists:users,id',
            'content' => 'required',
        ]);
        // Create a new message
        // $message = new Message();
        // $message->from_user_id = auth()->user()->id;
        // $message->to_user_id = $request->to_user_id;
        // $message->content = $request->content;
        // $message->save();
        Message::create($validatedData);
        return redirect()->route('chat')->with('success', 'Message sent successfully.');
    }
    // public function store(Request $request)
    // {       
    //     $validatedData = $request->validate([
    //         'content' => 'required|string|max:255',
    //         'user_id' => 'required|exists:users,id',
    //         'post_id' => 'required|exists:posts,id',
    //     ]);
    //     Comment::create($validatedData);
    //     return redirect()->route('show', ['post' => $validatedData['post_id']])->with('success', 'Comment created successfully.');
    // }

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