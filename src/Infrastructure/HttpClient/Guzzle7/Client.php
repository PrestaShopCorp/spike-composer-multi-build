<?php

namespace Sbidault\ComposerMultiBuild\Infrastructure\HttpClient\Guzzle7;

use GuzzleHttp\Client as GuzzleClient;
use GuzzleHttp\ClientInterface;
use GuzzleHttp\HandlerStack;
use GuzzleHttp\Middleware;
use GuzzleHttp\Utils;
use Sbidault\ComposerMultiBuild\Infrastructure\HttpClient\HttpClientInterface;
use Psr\Http\Message\RequestInterface;
use Psr\Http\Message\ResponseInterface;

/**
 * HTTP Adapter for Guzzle 7.
 *
 * @author Tobias Nyholm <tobias.nyholm@gmail.com>
 *
 * @see https://github.com/php-http/guzzle7-adapter/blob/master/src/Client.php
 */
class Client implements HttpClientInterface
{
    /**
     * @var \GuzzleHttp\ClientInterface
     */
    private $client;

    public function __construct(ClientInterface $client = null)
    {
        if (!$client) {
            $client = self::buildClient();
        }

        $this->client = $client;
    }

    /**
     * Factory method to create the Guzzle 7 adapter with custom Guzzle configuration.
     *
     * @param array<string, mixed> $config
     *
     * @return self
     */
    public static function createWithConfig(array $config): self
    {
        return new self(self::buildClient($config));
    }

    /**
     * {@inheritdoc}
     */
    public function sendRequest(RequestInterface $request): ResponseInterface
    {
        return $this->sendAsyncRequest($request)->wait();
    }

    /**
     * {@inheritdoc}
     */
    public function sendAsyncRequest(RequestInterface $request): Promise
    {
        $promise = $this->client->sendAsync($request);

        return new Promise($promise, $request);
    }

    /**
     * {@inheritdoc}
     */
    public function send(RequestInterface $request, array $options = []): ResponseInterface
    {
        return $this->client->send($request, $options);
    }

    /**
     * Build the Guzzle client instance.
     *
     * @param array<string, mixed> $config
     *
     * @return \GuzzleHttp\Client
     */
    private static function buildClient(array $config = [])
    {
        $handlerStack = new HandlerStack(Utils::chooseHandler());
        $handlerStack->push(Middleware::prepareBody(), 'prepare_body');
        $config = array_merge(['handler' => $handlerStack], $config);

        return new GuzzleClient($config);
    }
}
