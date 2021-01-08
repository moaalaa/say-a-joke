<?php

namespace MoaAlaa\SayAJoke;

use GuzzleHttp\Client;

class JokeFactory
{
    CONST API_ENDPOINT = 'http://api.icndb.com/jokes/random';

    protected $client;

    public function __construct(Client $client = null) 
    {
        $this->client = $client ?? new Client();
    }

    public function getRandomJoke()
    {
        $response = $this->client->get(static::API_ENDPOINT);

        $jokeResponse = json_decode($response->getBody()->getContents(), true);

        return $jokeResponse['value']['joke'];
    }
}