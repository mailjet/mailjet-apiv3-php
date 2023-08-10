<?php

declare(strict_types=1);

/*
 * Copyright (C) 2013 Mailgun
 *
 * This software may be modified and distributed under the terms
 * of the MIT license. See the LICENSE file for details.
 */

namespace Mailjet;

use GuzzleHttp\Client as GuzzleClient;
use GuzzleHttp\ClientTrait as GuzzleClientTrait;
use GuzzleHttp\Exception\ClientException;
use GuzzleHttp\Exception\ServerException;
use GuzzleHttp\Exception\GuzzleException;
use GuzzleHttp\Promise\PromiseInterface;
use Psr\Http\Client\ClientExceptionInterface;
use Psr\Http\Message\RequestInterface;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\UriInterface;

class Request
{
    use GuzzleClientTrait;

    /**
     * @var string
     */
    private $method;

    /**
     * @var string
     */
    private $url;

    /**
     * @var array
     */
    private $filters;

    /**
     * @var array
     */
    private $body;

    /**
     * @var array
     */
    private $auth;

    /**
     * @var string
     */
    private $type;

    /**
     * @var array
     */
    private $requestOptions = [];

    /**
     * @var GuzzleClient
     */
    private $guzzleClient;

    /**
     * Build a new Http request.
     *
     * @param array  $auth           [apikey, apisecret]
     * @param string $method         http method
     * @param string $url            call url
     * @param array  $filters        Mailjet resource filters
     * @param mixed  $body           Mailjet resource body
     * @param string $type           Request Content-type
     * @param array  $requestOptions
     */
    public function __construct(
        array $auth,
        string $method,
        string $url,
        array $filters,
        $body,
        string $type,
        array $requestOptions = []
    ) {
        $this->type = $type;
        $this->auth = $auth;
        $this->method = $method;
        $this->url = $url;
        $this->filters = $filters;
        $this->body = $body;
        $this->requestOptions = $requestOptions;
        $this->guzzleClient = new GuzzleClient(
            ['defaults' => [
                'headers' => [
                    'user-agent' => Config::USER_AGENT . PHP_VERSION . '/' . Client::WRAPPER_VERSION,
                ],
            ],
            ]
        );
    }

    /**
     * Trigger the actual call
     *
     * @param  $call
     * @return Response the call response
     */
    public function call($call): Response
    {
        $payload = [
            'query' => $this->filters,
            ('application/json' === $this->type ? 'json' : 'body') => $this->body,
        ];

        $authArgsCount = \count($this->auth);
        $headers = [
            'content-type' => $this->type,
        ];

        if ($authArgsCount > 1) {
            $payload['auth'] = $this->auth;
        } else {
            $headers['Authorization'] = 'Bearer ' . $this->auth[0];
        }

        $payload['headers'] = $headers;

        if ((!empty($this->requestOptions)) && (\is_array($this->requestOptions))) {
            $payload = array_merge_recursive($payload, $this->requestOptions);
        }

        $response = null;

        if ($call) {
            try {
                $response = call_user_func([$this, strtolower($this->method)], $this->url, $payload);
            } catch (ClientException|ServerException $e) {
                $response = $e->getResponse();
            }
        }

        return new Response($this, $response);
    }

    /**
     * Filters getters.
     *
     * @return array Request filters
     */
    public function getFilters(): array
    {
        return $this->filters;
    }

    /**
     * Http method getter.
     *
     * @return string Request method
     */
    public function getMethod(): string
    {
        return $this->method;
    }

    /**
     * Call Url getter.
     *
     * @return string Request Url
     */
    public function getUrl(): string
    {
        return $this->url;
    }

    /**
     * Request body getter.
     *
     * @return array request body
     */
    public function getBody(): array
    {
        return $this->body;
    }

    /**
     * Auth getter. to discuss.
     *
     * @return array Request auth
     */
    public function getAuth(): array
    {
        return $this->auth;
    }

    /**
     * @param  RequestInterface $request Request to send
     * @param  array            $options Request options to apply to the given
     *                                   request and to the transfer.
     * @throws GuzzleException
     */
    public function send(RequestInterface $request, array $options = []): ResponseInterface
    {
        return $this->guzzleClient->send($request, $options);
    }

    /**
     * @param  RequestInterface $request
     * @return ResponseInterface
     * @throws ClientExceptionInterface
     */
    public function sendRequest(RequestInterface $request): ResponseInterface
    {
        return $this->guzzleClient->sendRequest($request);
    }

    /**
     * @param RequestInterface $request Request to send
     * @param array            $options Request options to apply to the given
     *                                  request and to the transfer.
     */
    public function sendAsync(RequestInterface $request, array $options = []): PromiseInterface
    {
        return $this->guzzleClient->sendAsync($request, $options);
    }

    /**
     * @param  string              $method  HTTP method.
     * @param  string|UriInterface $uri     URI object or string.
     * @param  array               $options Request options to apply.
     * @throws GuzzleException
     */
    public function request(string $method, $uri, array $options = []): ResponseInterface
    {
        return $this->guzzleClient->request($method, $uri, $options);
    }

    /**
     * @param string              $method  HTTP method
     * @param string|UriInterface $uri     URI object or string.
     * @param array               $options Request options to apply.
     */
    public function requestAsync(string $method, $uri, array $options = []): PromiseInterface
    {
        return $this->guzzleClient->requestAsync($method, $uri, $options);
    }
}
