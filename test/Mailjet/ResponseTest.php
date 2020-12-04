<?php

declare(strict_types=1);

/*
 * Copyright (C) 2013 Mailgun
 *
 * This software may be modified and distributed under the terms
 * of the MIT license. See the LICENSE file for details.
 */

namespace Mailjet;

use PHPUnit\Framework\TestCase;

/**
 * @runTestsInSeparateProcesses
 * @preserveGlobalState disabled
 */
final class ResponseTest extends TestCase
{
    public function testResponse()
    {
        $request = new Request(['test', 'test2'], 'GET', 'test.com', [], [], 'test', []);

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
}
