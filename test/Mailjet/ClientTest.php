<?php

declare(strict_types=1);

/*
 * Copyright (C) 2013 Mailgun
 *
 * This software may be modified and distributed under the terms
 * of the MIT license. See the LICENSE file for details.
 */

namespace Mailjet;

use Mockery;
use PHPUnit\Framework\TestCase;
use Psr\Http\Client\ClientInterface;
use Psr\Http\Message\RequestFactoryInterface;
use PHPUnit\Framework\Attributes\RunTestsInSeparateProcesses;
use Psr\Http\Message\StreamFactoryInterface;

#[RunTestsInSeparateProcesses]
final class ClientTest extends TestCase
{
    /**
     * @var Client
     */
    private $client;

    /**
     * @var Request
     */
    private $requestMock;

    public function setUp(): void
    {
        $this->requestMock = Mockery::mock('overload:' . Request::class);

        $responseMock = Mockery::mock(Response::class);
        $responseMock->shouldReceive('getData')
            ->andReturn(
                [
                'status' => 'test',
                ]
            );

        $this->requestMock->shouldReceive('call')
            ->andReturn($responseMock);

        $this->client = new Client('testkey', 'testsecret', false);
    }

    public function testPost()
    {
        $this->requestMock->shouldReceive('__construct')
            ->once()
            ->withArgs(function ($auth, $method, $url, $filters, $body, $contentType, $httpClient, $requestFactory, $streamFactory) {
                return $auth === ['testkey', 'testsecret']
                    && $method === 'POST'
                    && $url === 'https://api.mailjet.com/v3/REST/testresource'
                    && $filters === ['fkey' => 'fvalue']
                    && $body === ['bkey' => 'bvalue']
                    && $contentType === 'application/json'
                    && $httpClient instanceof ClientInterface
                    && $requestFactory instanceof RequestFactoryInterface
                    && $streamFactory instanceof StreamFactoryInterface;
            });

        $response = $this->client->post(
            ['testresource', ''],
            [
                'filters' => ['fkey' => 'fvalue'],
                'body' => ['bkey' => 'bvalue'],
            ]
        );

        $this->assertEquals(['status' => 'test',], $response->getData());
    }

    public function testGet()
    {
        $this->requestMock->shouldReceive('__construct')
            ->once()
            ->withArgs(function ($auth, $method, $url, $filters, $body, $contentType, $httpClient, $requestFactory, $streamFactory) {
                return $auth === ['testkey', 'testsecret']
                    && $method === 'GET'
                    && $url === 'https://api.mailjet.com/v3/REST/testresource2'
                    && $filters === ['fkey2' => 'fvalue2']
                    && $body === ['bkey2' => 'bvalue2']
                    && $contentType === 'application/json'
                    && $httpClient instanceof ClientInterface
                    && $requestFactory instanceof RequestFactoryInterface
                    && $streamFactory instanceof StreamFactoryInterface;
            });

        $response = $this->client->get(
            ['testresource2', ''],
            [
                'filters' => ['fkey2' => 'fvalue2'],
                'body' => ['bkey2' => 'bvalue2'],
            ]
        );

        $this->assertEquals(['status' => 'test',], $response->getData());
    }

    public function testPut()
    {
        $this->requestMock->shouldReceive('__construct')
            ->once()
            ->withArgs(function ($auth, $method, $url, $filters, $body, $contentType, $httpClient, $requestFactory, $streamFactory) {
                return $auth === ['testkey', 'testsecret']
                    && $method === 'PUT'
                    && $url === 'https://api.mailjet.com/v3/REST/testresource3'
                    && $filters === ['fkey3' => 'fvalue3']
                    && $body === ['bkey3' => 'bvalue3']
                    && $contentType === 'application/json'
                    && $httpClient instanceof ClientInterface
                    && $requestFactory instanceof RequestFactoryInterface
                    && $streamFactory instanceof StreamFactoryInterface;
            });

        $response = $this->client->put(
            ['testresource3', ''],
            [
                'filters' => ['fkey3' => 'fvalue3'],
                'body' => ['bkey3' => 'bvalue3'],
            ]
        );

        $this->assertEquals(['status' => 'test',], $response->getData());
    }

    public function testDelete()
    {
        $this->requestMock->shouldReceive('__construct')
            ->once()
            ->withArgs(function ($auth, $method, $url, $filters, $body, $contentType, $httpClient, $requestFactory, $streamFactory) {
                return $auth === ['testkey', 'testsecret']
                    && $method === 'DELETE'
                    && $url === 'http://api.mailjet.com/v3/REST/testresource4'
                    && $filters === ['fkey4' => 'fvalue4']
                    && $body === ['bkey4' => 'bvalue4']
                    && $contentType === 'application/json'
                    && $httpClient instanceof ClientInterface
                    && $requestFactory instanceof RequestFactoryInterface
                    && $streamFactory instanceof StreamFactoryInterface;
            });

        $this->client->setSecureProtocol(false);

        $response = $this->client->delete(
            ['testresource4', ''],
            [
                'filters' => ['fkey4' => 'fvalue4'],
                'body' => ['bkey4' => 'bvalue4'],
            ]
        );

        $this->assertEquals(['status' => 'test',], $response->getData());
    }

    public function testSetSecureProtocol()
    {
        $result = $this->client->setSecureProtocol(true);
        $this->assertTrue($result);

        $result = $this->client->setSecureProtocol(false);
        $this->assertTrue($result);

        $result = $this->client->setSecureProtocol(null);
        $this->assertFalse($result);
    }
}
