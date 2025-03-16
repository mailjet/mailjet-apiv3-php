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
 * @preserveGlobalState         disabled
 */
final class RequestTest extends TestCase
{
    public function testJsonRequest(): void
    {
        $request = new Request(['test', 'test2'], 'GET', 'test.com', ['fkey' => 'fvalue'], ['bkey' => 'bvalue'], 'test', ['rok' => 'rov']);

        $this->assertEquals(['fkey' => 'fvalue'], $request->getFilters());
        $this->assertEquals('GET', $request->getMethod());
        $this->assertEquals('test.com', $request->getUrl());
        $this->assertEquals(['bkey' => 'bvalue'], $request->getBody());
        $this->assertEquals(['test', 'test2'], $request->getAuth());
    }
    public function testStringRequest(): void
    {
        $request = new Request(['test', 'test2'], 'GET', 'test.com', ['fkey' => 'fvalue'], json_encode(['bkey' => '✉️'], JSON_UNESCAPED_UNICODE), 'test', ['rok' => 'rov']);

        $this->assertEquals(['fkey' => 'fvalue'], $request->getFilters());
        $this->assertEquals('GET', $request->getMethod());
        $this->assertEquals('test.com', $request->getUrl());
        $this->assertEquals('{"bkey":"✉️"}', $request->getBody());
        $this->assertEquals(['test', 'test2'], $request->getAuth());
    }
    public function testStringRequestEmptyBody(): void
    {
        $request = new Request(['test', 'test2'], 'GET', 'test.com', ['fkey' => 'fvalue'], null, 'test', ['rok' => 'rov']);

        $this->assertEquals(['fkey' => 'fvalue'], $request->getFilters());
        $this->assertEquals('GET', $request->getMethod());
        $this->assertEquals('test.com', $request->getUrl());
        $this->assertNotNull($request->getBody());
        $this->assertEquals(['test', 'test2'], $request->getAuth());
    }
}
