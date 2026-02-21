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
use PHPUnit\Framework\TestCase;
use Psr\Http\Client\ClientInterface;
use Psr\Http\Message\RequestFactoryInterface;
use Psr\Http\Message\StreamFactoryInterface;

#[RunTestsInSeparateProcesses]
final class ResponseTest extends TestCase
{
    private function createMailjetRequest(): Request
    {
        return new Request(
            ['test', 'test2'],
            'GET',
            'test.com',
            [],
            [],
            'test',
            $this->createMock(ClientInterface::class),
            $this->createMock(RequestFactoryInterface::class),
            $this->createMock(StreamFactoryInterface::class)
        );
    }

    public function testResponse()
    {
        $request = $this->createMailjetRequest();

        $response = new Response(
            $request,
            new \GuzzleHttp\Psr7\Response(200, ['X-Foo' => 'Bar'], '{"Data": {"test": true}, "Count": 100, "Total": 200}')
        );

        $this->assertEquals(200, $response->getStatus());
        $this->assertEquals(['Data' => ['test' => true], 'Count' => 100, 'Total' => 200], $response->getBody());
        $this->assertEquals(['test' => true], $response->getData());
        $this->assertEquals('OK', $response->getReasonPhrase());
        $this->assertEquals(200, $response->getTotal());
    }

    public function testNullResponse()
    {
        $request = $this->createMailjetRequest();

        // Response without a response interface as second parameter
        $response = new Response($request, null);

        $this->assertNull($response->getStatus());
        $this->assertEquals([], $response->getBody());
        $this->assertEquals([], $response->getData());
        $this->assertNull($response->getReasonPhrase());
        $this->assertNull($response->getTotal());
    }
}
