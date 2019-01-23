<?php

namespace Tests\Unit\Utils\Adapters;

use App\Facades\HttpRequester;
use App\Adapters\SecondAdapter;
use App\Utils\HttpClient\GuzzleAdapter;
use Tests\TestCase;

class SecondAdapterTest extends TestCase
{
    private $adapter;

    protected function setUp()
    {
        parent::setUp();

        $requester = new HttpRequester(new GuzzleAdapter());
        $this->adapter = new SecondAdapter($requester);
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


    public function testProps()
    {
        $this->assertEquals(config('exchange_rate.providers.second_provider.key'), $this->adapter->getSource());
        $this->assertNotEmpty($this->adapter->getUsdTry());
        $this->assertNotEmpty($this->adapter->getEurTry());
        $this->assertNotEmpty($this->adapter->getGbpTry());
    }

}
