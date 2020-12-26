<?php

namespace MoaAlaa\SayAJoke;

class JokeFactory
{
    protected $jokes = [
        'Predefined funny jokes',
        'Another funny Joke',
        'Last funny joke'
    ];

    public function __construct(array $jokes = null) 
    {
        if ($jokes) {
            $this->jokes = $jokes;
        }
    }

    public function getRandomJoke()
    {
        return $this->jokes[array_rand($this->jokes)];
    }
}