<?php
/**
 * Created by PhpStorm.
 * User: aydin
 * Date: 22.01.2019
 * Time: 22:19
 */

namespace App\Facades;


use App\Utils\HttpClient\HttpClientInterface;

/**
 * Class HttpRequester
 * @package App\Utils\Facades
 */
class HttpRequester
{
    /**
     * @var HttpClientInterface
     */
    private $client;

    /**
     * HttpRequester constructor.
     * @param HttpClientInterface $client
     */
    public function __construct(HttpClientInterface $client)
    {
        $this->client = $client;
    }

    /**
     * servisten kur bilgisini alma
     * @param $url
     * @return mixed
     */
    public function load($url)
    {
        $response = $this->client->request($url);
        return json_decode($response);
    }
}