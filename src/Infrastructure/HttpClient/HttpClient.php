<?php

namespace Sbidault\ComposerMultiBuild\Infrastructure\HttpClient;

use GuzzleHttp\Psr7\Request;

class HttpClient
{
    /**
     * Default base URI
     * 
     * @var string
     */
    public const DEFAULT_BASE_URI = 'https://dummyjson.com/';

    /**
     * Default options
     * 
     * @var array
     */
    public const DEFAULT_OPTIONS = ['base_uri' => self::DEFAULT_BASE_URI];

    /**
     * Http client
     * 
     * @var \Sbidault\ComposerMultiBuild\Infrastructure\HttpClient\HttpClientInterface
     */
    public $client;

    /**
     * @param array $httpOptions
     */
    public function __construct(array $httpOptions = self::DEFAULT_OPTIONS)
    {
        $httpClientFactory = new ClientFactory();
        $this->client = $httpClientFactory->getClient($httpOptions);
    }

    /**
     * Send HTTP call
     * 
     * @see https://developer.mozilla.org/fr/docs/Web/HTTP/Methods
     * @param string $method HTTP method
     * @param string $url
     * @param array $options Optional
     * 
     * @return \Psr\Http\Message\StreamInterface
     */
    public function call($method, $url, array $options = [])
    {
        $request = new Request($method, $url);

        echo 'Test call HTTP ' . $method . ' ' . $url . ' : ' . PHP_EOL;

        return $this->client->send($request, $options)->getBody() . PHP_EOL . PHP_EOL;
    }
}
