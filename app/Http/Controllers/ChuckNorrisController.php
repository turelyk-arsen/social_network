<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

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

        return view('chuck-norris-joke', ['joke' => $joke['value']]);
    }
}
