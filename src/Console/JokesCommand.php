<?php

namespace MoaAlaa\SayAJoke\Console;

use Illuminate\Console\Command;
use MoaAlaa\SayAJoke\Facades\JokesFacade;

class JokesCommand extends Command
{
    protected $signature = 'say-a-joke';

    protected $description = 'Say a random funny joke';

    public function handle()
    {
        $this->info(JokesFacade::getRandomJoke());
    }
}