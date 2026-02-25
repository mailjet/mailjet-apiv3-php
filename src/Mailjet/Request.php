<?php

declare(strict_types=1);

/*
 * Copyright (C) 2013 Mailgun
 *
 * This software may be modified and distributed under the terms
 * of the MIT license. See the LICENSE file for details.
 */

namespace Mailjet;

use Psr\Http\Client\ClientInterface;
use Psr\Http\Message\RequestFactoryInterface;
use Psr\Http\Message\StreamFactoryInterface;

class Request
{
    /**
     * @var string
     */
    private string $method;

    /**
     * @var string
     */
    private string $url;

    /**
     * @var array
     */
    private array $filters;

    /**
     * @var array|string|null
     */
    private array|string|null $body;

    /**
     * @var array
     */
    private array $auth;

    /**
     * @var string
     */
    private string $type;

    /**
     * @var ClientInterface
     */
    private ClientInterface $httpClient;

    /**
     * @var RequestFactoryInterface
     */
    private RequestFactoryInterface $requestFactory;

    /**
     * @var StreamFactoryInterface
     */
    private StreamFactoryInterface $streamFactory;

    /**
     * Build a new Http request.
     *
     * @param array                   $auth           [apikey, apisecret] or [apitoken]
     * @param string                  $method         http method
     * @param string                  $url            call url
     * @param array                   $filters        Mailjet resource filters
     * @param array|string|null       $body           Mailjet resource body
     * @param string                  $type           Request Content-type
     * @param ClientInterface         $httpClient     PSR-18 HTTP client
     * @param RequestFactoryInterface $requestFactory PSR-17 request factory
     * @param StreamFactoryInterface  $streamFactory  PSR-17 stream factory
     */
    public function __construct(
        array $auth,
        string $method,
        string $url,
        array $filters,
        array|string|null $body,
        string $type,
        ClientInterface $httpClient,
        RequestFactoryInterface $requestFactory,
        StreamFactoryInterface $streamFactory
    ) {
        $this->type = $type;
        $this->auth = $auth;
        $this->method = $method;
        $this->url = $url;
        $this->filters = $filters;
        $this->body = $body;
        $this->httpClient = $httpClient;
        $this->requestFactory = $requestFactory;
        $this->streamFactory = $streamFactory;
    }

    /**
     * Trigger the actual call.
     *
     * @param  bool $call whether to actually perform the HTTP call
     * @return Response the call response
     * @throws \Psr\Http\Client\ClientExceptionInterface on network-level errors (timeout, DNS failure, etc.)
     * @throws \JsonException if array body cannot be JSON-encoded
     */
    public function call(bool $call): Response
    {
        if (!$call) {
            return new Response($this, null);
        }

        $uri = $this->url;
        if (!empty($this->filters)) {
            $separator = str_contains($uri, '?') ? '&' : '?';
            $uri .= $separator . http_build_query($this->filters);
        }

        $request = $this->requestFactory->createRequest($this->method, $uri);

        $request = $request
            ->withHeader('content-type', $this->type)
            ->withHeader('user-agent', Config::USER_AGENT . PHP_VERSION . '/' . Client::WRAPPER_VERSION);

        if (\count($this->auth) > 1) {
            $credentials = base64_encode($this->auth[0] . ':' . $this->auth[1]);
            $request = $request->withHeader('Authorization', 'Basic ' . $credentials);
        } else {
            $request = $request->withHeader('Authorization', 'Bearer ' . $this->auth[0]);
        }

        if ($this->body !== null) {
            $bodyContent = is_array($this->body) ? json_encode($this->body, JSON_THROW_ON_ERROR) : $this->body;
            $stream = $this->streamFactory->createStream($bodyContent);
            $request = $request->withBody($stream);
        }

        $response = $this->httpClient->sendRequest($request);

        return new Response($this, $response);
    }

    /**
     * Filters getter.
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
     * @return array|string|null request body
     */
    public function getBody(): array|string|null
    {
        return $this->body;
    }

    /**
     * Auth getter.
     *
     * @return array Request auth
     */
    public function getAuth(): array
    {
        return $this->auth;
    }
}
