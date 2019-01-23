<?php
/**
 * Created by PhpStorm.
 * User: aydin
 * Date: 22.01.2019
 * Time: 22:05
 */

namespace App\Utils\HttpClient;


use GuzzleHttp\Client;

/**
 * Class GuzzleAdapter
 * @package App\Utils\HttpClient
 */
class GuzzleAdapter implements HttpClientInterface
{

    /**
     * İstemci nesnemiz
     * @var Client
     */
    private $client;

    /**
     * Url
     * @var
     */
    private $url;

    /**
     * Url sabit kısmı
     * @var
     */
    private $baseUrl;

    /**
     * İstek metodu
     * @var string
     */
    private $method = 'GET';

    /**
     * İstek için header tanımları
     * @var array
     */
    private $headers = [];

    /**
     * İstek için body tanımları
     * @var array
     */
    private $body = [];

    /**
     * Dönen cevap
     * @var
     */
    private $response;

    /**
     * GuzzleAdapter constructor.
     */
    public function __construct()
    {
        $this->client = new Client();
    }


    /**
     * @param string $url
     * @return mixed|\Psr\Http\Message\StreamInterface
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function request(string $url)
    {
        $this->setUrl($url);

        $response = $this->client->request($this->method, $this->getUrl(), ['headers' => $this->headers, 'form_params' => $this->body]);
        if ($response->getStatusCode() == 200) {
            $this->response = $response->getBody();
        }

        return $this->response;
    }

    /**
     * @param string $url
     * @return mixed
     */
    public function setUrl(string $url)
    {
        $this->url = $url;

        return $this;
    }

    /**
     * @param string $method
     * @return mixed
     */
    public function setMethod(string $method)
    {
        $this->method = $method;

        return $this;
    }

    /**
     * @param string $baseUrl
     * @return mixed
     */
    public function setBaseUrl(string $baseUrl)
    {
        $this->baseUrl = $baseUrl;

        return $this;
    }

    /**
     * @param array $body
     * @return mixed
     */
    public function setBody(array $body)
    {
        $this->body = $body;

        return $this;
    }

    /**
     * @param array $headers
     * @return mixed
     */
    public function setHeaders(array $headers)
    {
        $this->headers = $headers;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getResponse()
    {
        $this->response->getBody();
    }

    /**
     * @return mixed
     */
    public function getUrl()
    {
        return $this->baseUrl ? $this->baseUrl . '/' . $this->url : $this->url;
    }
}