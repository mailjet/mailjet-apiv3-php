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
final class MailjetApiv3Test extends TestCase
{
    const API_BASE_URL = 'https://api.mailjet.com/';
    const VERSION = 'v3';
    private $publicKey = 'apikey';
    private $secretKey = 'secretkey';

    public function testGet()
    {
        $client = new Client($this->publicKey, $this->secretKey, true);

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

        $this->assertGetAuth($response);

        $this->assertGetStatus(401, $response);

        $this->assertGetBody(null, '', $response);

        $this->assertGetData(null, '', $response);

        $this->assertGetCount(null, $response);

        $this->assertGetReasonPhrase('Unauthorized', $response);

        $this->assertGetTotal(null, $response);

        $this->assertSuccess(false, $response);

        $this->assertSetSecureProtocol($client);
    }

    public function testPost()
    {
        $client = new Client($this->publicKey, $this->secretKey, true);

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
        $this->assertGetAuth($ret);
        $this->assertGetStatus(401, $ret);
        $this->assertGetBody(null, 'StatusCode', $ret);
        $this->assertGetData(null, 'StatusCode', $ret);
        $this->assertGetCount(null, $ret);
        $this->assertGetReasonPhrase('Unauthorized', $ret);
        $this->assertGetTotal(null, $ret);
        $this->assertSuccess(false, $ret);
    }

    public function testPostV31()
    {
        $client = new Client($this->publicKey, $this->secretKey, false, ['version' => 'v3.1']);

        $email = [
            'Messages' => [[
                'From' => ['Email' => 'test@mailjet.com', 'Name' => 'Mailjet PHP test'],
                'TextPart' => 'Simple Email test',
                'To' => [['Email' => 'test@mailjet.com', 'Name' => 'Test']],
            ]],
        ];

        $ret = $client->post(Resources::$Email, ['body' => $email], ['timeout' => 1]);
        $this->assertUrl('/send', $ret, 'v3.1');
        $this->assertPayload($email, $ret);
        $this->assertHttpMethod('POST', $ret);
        $this->assertGetAuth($ret);
        $this->assertGetStatus(401, $ret);
        $this->assertGetBody(401, 'StatusCode', $ret);
        $this->assertGetData(401, 'StatusCode', $ret);
        $this->assertGetCount(null, $ret);
        $this->assertGetReasonPhrase('Unauthorized', $ret);
        $this->assertGetTotal(null, $ret);
        $this->assertSuccess(false, $ret);
    }

    public function testClientHasOptions()
    {
        $client = new Client($this->publicKey, $this->secretKey, false);
        $client->setTimeout(3);
        $client->setConnectionTimeout(5);
        $client->addRequestOption('delay', 23);
        static::assertSame(3, $client->getTimeout());
        static::assertSame(5, $client->getConnectionTimeout());
        static::assertSame(23, $client->getRequestOptions()['delay']);
    }

    private function assertUrl($url, $response, $version = self::VERSION)
    {
        static::assertSame(self::API_BASE_URL.$version.$url, $response->getRequest()->getUrl());
    }

    private function assertPayload($payload, $response)
    {
        static::assertSame($payload, $response->getRequest()->getBody());
    }

    private function assertFilters($shouldBe, $response)
    {
        static::assertSame($shouldBe, $response->getRequest()->getFilters());
    }

    private function assertHttpMethod($payload, $response)
    {
        static::assertSame($payload, $response->getRequest()->getMethod());
    }

    private function assertGetAuth($response)
    {
        static::assertSame($this->publicKey, $response->getRequest()->getAuth()[0]);
        static::assertSame($this->secretKey, $response->getRequest()->getAuth()[1]);
    }

    private function assertGetStatus($payload, $response)
    {
        static::assertSame($payload, $response->getStatus());
    }

    private function assertGetBody($payload, $keyName, $response)
    {
        $result = null;

        if (false === empty($response->getBody()[$keyName])) {
            $result = $response->getBody()[$keyName];
        }

        static::assertSame($payload, $result);
    }

    private function assertGetData($payload, $keyName, $response)
    {
        $result = null;

        if (false === empty($response->getData()[$keyName])) {
            $result = $response->getData()[$keyName];
        }

        static::assertSame($payload, $result);
    }

    private function assertGetCount($payload, $response)
    {
        static::assertSame($payload, $response->getCount());
    }

    private function assertGetReasonPhrase($payload, $response)
    {
        static::assertSame($payload, $response->getReasonPhrase());
    }

    private function assertGetTotal($payload, $response)
    {
        static::assertSame($payload, $response->getTotal());
    }

    private function assertSuccess($payload, $response)
    {
        static::assertSame($payload, $response->success());
    }

    private function assertSetSecureProtocol($client)
    {
        static::assertTrue($client->setSecureProtocol(true));
        static::assertFalse($client->setSecureProtocol('not boolean type'));
    }
}
