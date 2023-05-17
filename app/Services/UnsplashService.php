<?php

namespace App\Services;

use Unsplash\Photo;
use Unsplash\HttpClient;
use Unsplash\Search;

class UnsplashService
{
    protected $client;

    public function __construct()
    {
        $accessKey = env('UNSPLASH_ACCESS_KEY');
        $this->client = new HttpClient($accessKey);
    }

    public function getRandomPhoto()
    {
        $photo = Photo::random($this->client);

        return $photo['urls']['regular'];
    }

    public function searchPhotos($query)
    {
        $results = Search::photos($query, null, 10, 1, $this->client);

        return $results['results'];
    }
}
