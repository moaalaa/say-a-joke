<?php

namespace MoaAlaa\SayAJoke\Tests;

use GuzzleHttp\Client;
use GuzzleHttp\Handler\MockHandler;
use GuzzleHttp\HandlerStack;
use GuzzleHttp\Psr7\Response;
use MoaAlaa\SayAJoke\JokeFactory;
use PHPUnit\Framework\TestCase;

class JokeFactoryTest extends TestCase
{
    /** @test */
    public function it_return_a_random_joke()
    {
        $mock = new MockHandler([
            new Response(200, [], '{ "type": "success", "value": { "id": 503, "joke": "Chuck Norris protocol design method has no status, requests or responses, only commands.", "categories": ["nerdy"] } }'),
        ]);
    
        $handler = HandlerStack::create($mock);
        
        $client = new Client(['handler' => $handler]);

        $jokes = new JokeFactory($client);

        $joke = $jokes->getRandomJoke();

        $this->assertSame(
            'Chuck Norris protocol design method has no status, requests or responses, only commands.', 
            $joke
        );
    }
}