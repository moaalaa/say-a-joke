<?php

namespace MoaAlaa\SayAJoke\Facades;

use Illuminate\Support\Facades\Facade;

class JokesFacade extends Facade
{
    protected static function getFacadeAccessor()
    {
        return 'jokes';
    }
}