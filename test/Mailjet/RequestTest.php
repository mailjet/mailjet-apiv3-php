<?php

declare(strict_types=1);

/*
 * Copyright (C) 2013 Mailgun
 *
 * This software may be modified and distributed under the terms
 * of the MIT license. See the LICENSE file for details.
 */

namespace Mailjet;

use PHPUnit\Framework\Attributes\RunTestsInSeparateProcesses;
use PHPUnit\Framework\MockObject\MockObject;
use PHPUnit\Framework\TestCase;
use Psr\Http\Client\ClientInterface;
use Psr\Http\Message\RequestFactoryInterface;
use Psr\Http\Message\RequestInterface;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\StreamFactoryInterface;
use Psr\Http\Message\StreamInterface;

#[RunTestsInSeparateProcesses]
final class RequestTest extends TestCase
{
    private ClientInterface&MockObject $httpClient;
    private RequestFactoryInterface&MockObject $requestFactory;
    private StreamFactoryInterface&MockObject $streamFactory;
    private RequestInterface&MockObject $psrRequest;
    private ResponseInterface&MockObject $psrResponse;

    /** @var array<string, string> */
    private array $capturedHeaders = [];
    private bool $withBodyCalled = false;

    protected function setUp(): void
    {
        $this->httpClient = $this->createMock(ClientInterface::class);
        $this->requestFactory = $this->createMock(RequestFactoryInterface::class);
        $this->streamFactory = $this->createMock(StreamFactoryInterface::class);
        $this->psrRequest = $this->createMock(RequestInterface::class);
        $this->psrResponse = $this->createMock(ResponseInterface::class);

        $this->capturedHeaders = [];
        $this->withBodyCalled = false;

        $this->psrRequest->method('withHeader')
            ->willReturnCallback(function (string $name, $value): RequestInterface {
                $this->capturedHeaders[$name] = $value;
                return $this->psrRequest;
            });

        $this->psrRequest->method('withBody')
            ->willReturnCallback(function () {
                $this->withBodyCalled = true;
                return $this->psrRequest;
            });

        $this->requestFactory->method('createRequest')
            ->willReturn($this->psrRequest);

        $this->httpClient->method('sendRequest')
            ->willReturn($this->psrResponse);
    }

    private function buildRequest(
        array $auth,
        string $method,
        string $url,
        array $filters,
        array|string|null $body,
        string $type
    ): Request {
        return new Request(
            $auth, $method, $url, $filters, $body, $type,
            $this->httpClient, $this->requestFactory, $this->streamFactory
        );
    }

    // --- Getter tests ---

    public function testJsonRequest(): void
    {
        $request = $this->buildRequest(['test', 'test2'], 'GET', 'test.com', ['fkey' => 'fvalue'], ['bkey' => 'bvalue'], 'test');

        $this->assertEquals(['fkey' => 'fvalue'], $request->getFilters());
        $this->assertEquals('GET', $request->getMethod());
        $this->assertEquals('test.com', $request->getUrl());
        $this->assertEquals(['bkey' => 'bvalue'], $request->getBody());
        $this->assertEquals(['test', 'test2'], $request->getAuth());
    }

    public function testStringRequest(): void
    {
        $request = $this->buildRequest(['test', 'test2'], 'GET', 'test.com', ['fkey' => 'fvalue'], json_encode(['bkey' => '✉️'], JSON_UNESCAPED_UNICODE), 'test');

        $this->assertEquals('{"bkey":"✉️"}', $request->getBody());
    }

    public function testNullBody(): void
    {
        $request = $this->buildRequest(['test', 'test2'], 'GET', 'test.com', ['fkey' => 'fvalue'], null, 'test');

        $this->assertNull($request->getBody());
    }

    // --- call() tests ---

    public function testCallWithBasicAuth(): void
    {
        $request = $this->buildRequest(['mykey', 'mysecret'], 'GET', 'https://api.test.com', [], null, 'application/json');

        $request->call(true);

        $expected = 'Basic ' . base64_encode('mykey:mysecret');
        $this->assertSame($expected, $this->capturedHeaders['Authorization']);
    }

    public function testCallWithBearerAuth(): void
    {
        $request = $this->buildRequest(['my-token'], 'GET', 'https://api.test.com', [], null, 'application/json');

        $request->call(true);

        $this->assertSame('Bearer my-token', $this->capturedHeaders['Authorization']);
    }

    public function testCallAddsQueryParameters(): void
    {
        $this->requestFactory->expects($this->once())
            ->method('createRequest')
            ->with('GET', 'https://api.test.com?Limit=10&Offset=0')
            ->willReturn($this->psrRequest);

        $request = $this->buildRequest(['key', 'secret'], 'GET', 'https://api.test.com', ['Limit' => 10, 'Offset' => 0], null, 'application/json');

        $request->call(true);
    }

    public function testCallWithArrayBodyEncodesJson(): void
    {
        $body = ['key' => 'value', 'nested' => ['a' => 1]];

        $this->streamFactory->expects($this->once())
            ->method('createStream')
            ->with(json_encode($body))
            ->willReturn($this->createMock(StreamInterface::class));

        $request = $this->buildRequest(['key', 'secret'], 'POST', 'https://api.test.com', [], $body, 'application/json');

        $request->call(true);

        $this->assertTrue($this->withBodyCalled);
    }

    public function testCallWithStringBodyPassedAsIs(): void
    {
        $csvData = "email,name\ntest@test.com,John";

        $this->streamFactory->expects($this->once())
            ->method('createStream')
            ->with($csvData)
            ->willReturn($this->createMock(StreamInterface::class));

        $request = $this->buildRequest(['key', 'secret'], 'POST', 'https://api.test.com', [], $csvData, 'text/csv');

        $request->call(true);

        $this->assertTrue($this->withBodyCalled);
    }

    public function testCallWithNullBodyDoesNotSetBody(): void
    {
        $this->streamFactory->expects($this->never())
            ->method('createStream');

        $request = $this->buildRequest(['key', 'secret'], 'GET', 'https://api.test.com', [], null, 'application/json');

        $request->call(true);

        $this->assertFalse($this->withBodyCalled);
    }

    public function testCallFalseReturnsNullResponse(): void
    {
        $this->httpClient->expects($this->never())
            ->method('sendRequest');

        $request = $this->buildRequest(['key', 'secret'], 'GET', 'https://api.test.com', [], null, 'application/json');

        $response = $request->call(false);

        $this->assertNull($response->getStatus());
        $this->assertEquals([], $response->getData());
    }

    public function testCallSetsContentTypeAndUserAgentHeaders(): void
    {
        $request = $this->buildRequest(['key', 'secret'], 'GET', 'https://api.test.com', [], null, 'application/json');

        $request->call(true);

        $this->assertSame('application/json', $this->capturedHeaders['content-type']);
        $expectedUserAgent = Config::USER_AGENT . PHP_VERSION . '/' . Client::WRAPPER_VERSION;
        $this->assertSame($expectedUserAgent, $this->capturedHeaders['user-agent']);
    }
}
