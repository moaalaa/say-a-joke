<?php

namespace MoaAlaa\SayAJoke\Tests;

use Illuminate\Support\Facades\Artisan;
use MoaAlaa\SayAJoke\Facades\JokesFacade;
use Jokes;
use MoaAlaa\SayAJoke\JokesServiceProvider;
use Orchestra\Testbench\TestCase;

class PackageTest extends TestCase
{
    protected function getPackageProviders($app)
    {
        return [JokesServiceProvider::class];
    }

    protected function getPackageAliases($app)
    {
        return ['Jokes' => JokesFacade::class];
    }

    /** @test */
    public function it_return_a_joke_from_console()
    {
        // Stop mocking console output to get the artisan command result
        $this->withoutMockingConsoleOutput();

        // Mocking our facade to return what data we want
        JokesFacade::shouldReceive('getRandomJoke')
            ->once()
            ->andReturn('test joke');

        // Run jokes command
        $this->artisan('say-a-joke');

        // Get jokes command output it will be empty if we don't stop mocking output like first method used        
        $this->assertSame('test joke', trim(Artisan::output()));
    }

    /** @test */
    public function it_make_a_route_to_see_a_joke()
    {
        // Mocking our facade to return what data we want and not call the api
        JokesFacade::shouldReceive('getRandomJoke')
            ->once()
            ->andReturn('test joke');

        $this->get('/say-a-joke')
            ->assertViewIs('say-a-joke::preview')
            ->assertViewHas('joke', 'test joke')
            ->assertOk();
    }
}
