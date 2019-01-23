<?php
/**
 * Created by PhpStorm.
 * User: aydin
 * Date: 22.01.2019
 * Time: 22:01
 */

namespace App\Utils\HttpClient;


/**
 * Interface HttpClientInterface
 * @package App\Utils\HttpClient
 */
interface HttpClientInterface
{
    /**
     * @param string $url
     * @return mixed
     */
    public function request(string $url);

    /**
     * @return mixed
     */
    public function getUrl();

    /**
     * @param string $url
     * @return mixed
     */
    public function setUrl(string $url);

    /**
     * @param string $method
     * @return mixed
     */
    public function setMethod(string $method);

    /**
     * @param string $baseUrl
     * @return mixed
     */
    public function setBaseUrl(string $baseUrl);

    /**
     * @param array $parameters
     * @return mixed
     */
    public function setBody(array $body);

    /**
     * @param array $headers
     * @return mixed
     */
    public function setHeaders(array $headers);

    /**
     * @return mixed
     */
    public function getResponse();

}