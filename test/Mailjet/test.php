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
 * @internal
 * @coversNothing
 */
final class test extends TestCase
{
    public function assertPayload($payload, $response)
    {
        static::assertSame($payload, $response->request->getBody());
    }

    public function assertFilters($shouldBe, $response)
    {
        static::assertSame($shouldBe, $response->request->getFilters());
    }

    public function assertHttpMethod($payload, $response)
    {
        static::assertSame($payload, $response->request->getMethod());
    }

    public function assertGetAuth($payload, $response)
    {
        static::assertSame($payload, $response->request->getAuth()[0]);
        static::assertSame($payload, $response->request->getAuth()[1]);
    }

    public function assertGetStatus($payload, $response)
    {
        static::assertSame($payload, $response->getStatus());
    }

    public function assertGetBody($payload, $keyName, $response)
    {
        static::assertSame($payload, $response->getBody()[$keyName]);
    }

    public function assertGetData($payload, $keyName, $response)
    {
        static::assertSame($payload, $response->getData()[$keyName]);
    }

    public function assertGetCount($payload, $response)
    {
        static::assertSame($payload, $response->getCount());
    }

    public function assertGetReasonPhrase($payload, $response)
    {
        static::assertSame($payload, $response->getReasonPhrase());
    }

    public function assertGetTotal($payload, $response)
    {
        static::assertSame($payload, $response->getTotal());
    }

    public function assertSuccess($payload, $response)
    {
        static::assertSame($payload, $response->success());
    }

    public function assertSetSecureProtocol($client)
    {
        static::assertTrue($client->setSecureProtocol(true));
        static::assertFalse($client->setSecureProtocol('not boolean type'));
    }

    public function testGet()
    {
        $client = new Client('', '', false);

        $this->assertUrl('/REST/contact', $client->get(Resources::$Contact));

        $this->assertFilters(['id' => 2], $client->get(Resources::$Contact, [
            'filters' => ['id' => 2],
        ], ['version' => 'v3.1']));

        $response = $client->get(Resources::$ContactGetcontactslists, ['id' => 2]);
        $this->assertUrl('/REST/contact/2/getcontactslists', $response);

        // error on sort !
        $response = $client->get(Resources::$Contact, [
            'filters' => ['sort' => 'email+DESC'],
        ]);
        $this->assertUrl('/REST/contact', $response);

        $this->assertUrl('/REST/contact/2', $client->get(Resources::$Contact, ['id' => 2]));

        $this->assertUrl(
            '/REST/contact/test@mailjet.com',
            $client->get(Resources::$Contact, ['id' => 'test@mailjet.com'])
        );

        $this->assertHttpMethod('GET', $response);

        $this->assertGetAuth('', $response);

        $this->assertGetStatus(401, $response);

        $this->assertGetBody('', '', $response);

        $this->assertGetData('', '', $response);

        $this->assertGetCount('', $response);

        $this->assertGetReasonPhrase('Unauthorized', $response);

        $this->assertGetTotal('', $response);

        $this->assertSuccess('', $response);

        $this->assertSetSecureProtocol($client);
    }

    public function testPost()
    {
        $client = new Client('', '', false);

        $email = [
            'FromName' => 'Mailjet PHP test',
            'FromEmail' => 'gbadi@student.42.fr',
            'Text-Part' => 'Simple Email test',
            'Subject' => 'PHPunit',
            'Html-Part' => '<h3>Simple Email Test</h3>',
            'Recipients' => [['Email' => 'test@mailjet.com']],
            'MJ-custom-ID' => 'Hello ID',
        ];

        $ret = $client->post(Resources::$Email, ['body' => $email]);
        $this->assertUrl('/send', $ret);
        $this->assertPayload($email, $ret);
        $this->assertHttpMethod('POST', $ret);
        $this->assertGetAuth('', $ret);
        $this->assertGetStatus(401, $ret);
        $this->assertGetBody('', 'StatusCode', $ret);
        $this->assertGetData('', 'StatusCode', $ret);
        $this->assertGetCount('', $ret);
        $this->assertGetReasonPhrase('Unauthorized', $ret);
        $this->assertGetTotal('', $ret);
        $this->assertSuccess('', $ret);
    }

    public function testPostV31()
    {
        $client = new Client('', '', false);

        $email = [
            'Messages' => [[
                'From' => ['Email' => 'test@mailjet.com', 'Name' => 'Mailjet PHP test'],
                'TextPart' => 'Simple Email test',
                'To' => [['Email' => 'test@mailjet.com', 'Name' => 'Test']],
            ]],
        ];

        $ret = $client->post(Resources::$Email, ['body' => $email], ['version' => 'v3.1']);
        $this->assertUrl('/send', $ret, 'v3.1');
        $this->assertPayload($email, $ret);
        $this->assertHttpMethod('POST', $ret);
        $this->assertGetAuth('', $ret);
        $this->assertGetStatus(401, $ret);
        $this->assertGetBody(401, 'StatusCode', $ret);
        $this->assertGetData(401, 'StatusCode', $ret);
        $this->assertGetCount('', $ret);
        $this->assertGetReasonPhrase('Unauthorized', $ret);
        $this->assertGetTotal('', $ret);
        $this->assertSuccess('', $ret);
    }

    public function testClientHasOptions()
    {
        $client = new Client('', '', false);
        $client->setTimeout(3);
        $client->setConnectionTimeout(5);
        $client->addRequestOption('delay', 23);
        static::assertSame(3, $client->getTimeout());
        static::assertSame(5, $client->getConnectionTimeout());
        static::assertSame(23, $client->getRequestOptions()['delay']);
    }

    private function assertUrl($url, $response, $version = 'v3')
    {
        static::assertSame('https://api.mailjet.com/'.$version.$url, $response->request->getUrl());
    }
}
