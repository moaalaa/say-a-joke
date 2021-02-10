<?php

namespace MoaAlaa\SayAJoke\Http\Controllers;

use MoaAlaa\SayAJoke\Facades\JokesFacade;

class SayAJokeController
{
    public function __invoke()
    {
        return view('say-a-joke::preview', ['joke' => JokesFacade::getRandomJoke()]);
    }
}