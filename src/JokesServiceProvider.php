<?php

namespace MoaAlaa\SayAJoke;

use Illuminate\Support\Facades\Route;
use Illuminate\Support\ServiceProvider;
use MoaAlaa\SayAJoke\Console\JokesCommand;
use MoaAlaa\SayAJoke\Http\Controllers\SayAJokeController;

class JokesServiceProvider extends ServiceProvider
{
    public function boot()
    {
        if($this->app->runningInConsole()) {
            $this->commands([JokesCommand::class]);
        }
        
        $this->loadViewsFrom(__DIR__ . '/../resources/views', 'say-a-joke');

        $this->publishes([
            __DIR__ . '/../resources/views' => resource_path('/views/vendor/say-a-joke'),
        ]);

        Route::get('say-a-joke', SayAJokeController::class);
    }

    public function register()
    {
        // Register Facade
        $this->app->bind('jokes', function () {
            return new JokeFactory();
        });
    }
}