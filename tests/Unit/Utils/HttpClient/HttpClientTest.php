<?php

namespace Tests\Unit\Utils\HttpClient;

use App\Utils\HttpClient\GuzzleAdapter;
use App\Utils\HttpClient\HttpClientInterface;
use Tests\TestCase;

class HttpClientTest extends TestCase
{
    private $client;

    public function setUp()
    {
        $this->client = new GuzzleAdapter();
        parent::setUp();
    }

    /**
     * A basic test example.
     *
     * @return void
     */
    public function testExample()
    {
        $this->assertTrue(true);
    }

    public function testInstance()
    {
        $this->assertInstanceOf(HttpClientInterface::class, $this->client);
    }

    public function testUrl()
    {
        $this->client->setBaseUrl('http://example.com');
        $this->client->setUrl('example');

        $this->assertEquals('http://example.com/example', $this->client->getUrl());
    }
}
