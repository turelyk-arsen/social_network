<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\User;
use App\Models\Message;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class ChuckNorrisController extends Controller
{
    protected $client;

    public function __construct(\GuzzleHttp\Client $client)
    {
        $this->client = $client;
    }

    public function getRandomJoke()
    {
        $response = $this->client->get('https://api.chucknorris.io/jokes/random');
        $joke = json_decode($response->getBody(), true);

        $user = Auth::user();
        $posts = Post::where('user_id', $user->id)->get();
        $users = User::all();

        // $from_user_id = auth()->user();
        // $to_user_id = User::findOrFail($user);
        // $to_user_id = Auth::user();

        // $lastMessages = Message::where(function ($query) use ($from_user_id, $to_user_id) {
        //     $query->where('from_user_id', $from_user_id->id)
        //         ->where('to_user_id', $to_user_id->id);
        // })->orWhere(function ($query) use ($from_user_id, $to_user_id) {
        //     $query->where('from_user_id', $to_user_id->id)
        //         ->where('to_user_id', $from_user_id->id);
        // })->latest('created_at')->first();

        // return view('chuck-norris-joke', ['joke' => $joke['value']]);
        // return $joke['value'];

        $messages = Message::where('to_user_id', $user->id)->get();
        $hasNewMessages = $messages->isNotEmpty();

        return view('dashboard', ['joke' => $joke['value'], 'posts' => $posts, 'users' => $users, 'hasNewMessages' => $hasNewMessages]);
    }
}