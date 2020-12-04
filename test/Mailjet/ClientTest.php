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

/**
 * @runTestsInSeparateProcesses
 * @preserveGlobalState disabled
 */
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
            ->andReturn([
                'status' => 'test',
            ]);

        $this->requestMock->shouldReceive('call')
            ->andReturn($responseMock);

        $this->client = new Client('testkey', 'testsecret', false);
    }

    public function testPost()
    {
        $expectedArguments = [
            [
                'testkey', 'testsecret'
            ],
            'POST',
            'https://api.mailjet.com/v3/REST/testresource',
            [
                'fkey' => 'fvalue',
            ],
            [
                'bkey' => 'bvalue',
            ],
            'application/json',
            [
                'timeout' => 15,
                'connect_timeout' => 2,
            ],
        ];

        $this->requestMock->shouldReceive('__construct')
            ->once()
            ->withArgs($expectedArguments);

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
        $expectedArguments = [
            [
                'testkey', 'testsecret'
            ],
            'GET',
            'https://api.mailjet.com/v3/REST/testresource2',
            [
                'fkey2' => 'fvalue2',
            ],
            [
                'bkey2' => 'bvalue2',
            ],
            'application/json',
            [
                'timeout' => 10,
                'connect_timeout' => 20,
            ],
        ];

        $this->requestMock->shouldReceive('__construct')
            ->once()
            ->withArgs($expectedArguments);

        $this->client->setTimeout(10);
        $this->client->setConnectionTimeout(20);

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
        $expectedArguments = [
            [
                'testkey', 'testsecret'
            ],
            'PUT',
            'https://api.mailjet.com/v3/REST/testresource3',
            [
                'fkey3' => 'fvalue3',
            ],
            [
                'bkey3' => 'bvalue3',
            ],
            'application/json',
            [
                'timeout' => 15,
                'connect_timeout' => 2,
            ],
        ];

        $this->requestMock->shouldReceive('__construct')
            ->once()
            ->withArgs($expectedArguments);

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
        $expectedArguments = [
            [
                'testkey', 'testsecret'
            ],
            'DELETE',
            'http://api.mailjet.com/v3/REST/testresource4',
            [
                'fkey4' => 'fvalue4',
            ],
            [
                'bkey4' => 'bvalue4',
            ],
            'application/json',
            [
                'timeout' => 15,
                'connect_timeout' => 2,
            ],
        ];

        $this->requestMock->shouldReceive('__construct')
            ->once()
            ->withArgs($expectedArguments);

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

    public function testSetTimeout()
    {
        $this->client->setTimeout(100);
        $this->assertEquals(100, $this->client->getRequestOptions()['timeout']);
        $this->assertEquals(100, $this->client->getTimeout());
    }

    public function testSetHttpProxy()
    {
        $this->client->setHttpProxy(['test']);
        $this->assertEquals(['test'], $this->client->getRequestOptions()['proxy']);
    }

    public function testSetConnectionTimeout()
    {
        $this->client->setConnectionTimeout(50);
        $this->assertEquals(50, $this->client->getRequestOptions()['connect_timeout']);
        $this->assertEquals(50, $this->client->getConnectionTimeout());
    }

    public function testAddRequestOption()
    {
        $this->client->addRequestOption('test', 'value');
        $this->assertEquals('value', $this->client->getRequestOptions()['test']);
    }
}
