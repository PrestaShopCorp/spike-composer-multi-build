<?php

namespace Sbidault\ComposerMultiBuild\Infrastructure\HttpClient;

use Psr\Http\Message\RequestInterface;

/**
 * HTTP Client Interface
 *
 * @author Tobias Nyholm <tobias.nyholm@gmail.com>
 * @author Victor Bocharsky <victor@symfonycasts.com>
 *
 * @see https://github.com/php-fig/http-client/blob/master/src/ClientInterface.php
 */
interface HttpClientInterface
{
    /**
     * Sends a PSR-7 request and returns a PSR-7 response.
     *
     * @param \Psr\Http\Message\RequestInterface $request
     *
     * @return \Psr\Http\Message\ResponseInterface
     *
     * @throws \Psr\Http\Client\ClientExceptionInterface If an error happens while processing the request.
     */
    public function sendRequest(RequestInterface $request);

    /**
     * Send an HTTP request.
     *
     * @param \Psr\Http\Message\RequestInterface $request
     * @param array $options Request options to apply to the given
     *                       request and to the transfer. See \GuzzleHttp\RequestOptions.
     *
     * @return \Psr\Http\Message\ResponseInterface
     *
     * @throws GuzzleException
     */
    public function send(RequestInterface $request, array $options = []);

    // /**
    //  * Create and send an HTTP GET request.
    //  *
    //  * Use an absolute path to override the base path of the client, or a
    //  * relative path to append to the base path of the client. The URL can
    //  * contain the query string as well.
    //  *
    //  * @param string|UriInterface $uri     URI object or string.
    //  * @param array               $options Request options to apply.
    //  *
    //  * @throws GuzzleException
    //  */
    // public function get($uri, array $options = []): ResponseInterface;
}
