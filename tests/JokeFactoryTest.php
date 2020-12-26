<?php

namespace MoaAlaa\SayAJoke\Tests;

use MoaAlaa\SayAJoke\JokeFactory;
use PHPUnit\Framework\TestCase;

class JokeFactoryTest extends TestCase
{
    /** @test */
    public function it_return_a_random_joke()
    {
        $jokes = new JokeFactory([
            'Some Funny Joke',
        ]);

        $joke = $jokes->getRandomJoke();

        $this->assertSame('Some Funny Joke', $joke);
    }
    
    /** @test */
    public function it_return_a_predefined_joke()
    {
        $predefinedJokes = [
            'Predefined funny jokes',
            'Another funny Joke',
            'Last funny joke'
        ];

        $jokes = new JokeFactory();

        $joke = $jokes->getRandomJoke();

        $this->assertContains($joke, $predefinedJokes);
    }
}