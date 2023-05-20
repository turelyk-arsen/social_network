<?php

namespace App\Http\Controllers;

use App\Models\Post;
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

        // return view('chuck-norris-joke', ['joke' => $joke['value']]);
        // return $joke['value'];
        return view('dashboard', ['joke' => $joke['value'], 'posts' => $posts]);

    }
}