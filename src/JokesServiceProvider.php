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
        ], 'say-a-joke-views');
        
        $this->publishes([
            __DIR__ . '/../config/say-a-joke.php' => config_path('/say-a-joke.php'),
        ], 'say-a-joke-config');
        
        Route::get(config('say-a-joke.view_url'), SayAJokeController::class);
    }

    public function register()
    {
        // Register Facade
        $this->app->bind('jokes', function () {
            return new JokeFactory();
        });

        $this->mergeConfigFrom(__DIR__ . '/../config/say-a-joke.php', 'say-a-joke');
    }
}