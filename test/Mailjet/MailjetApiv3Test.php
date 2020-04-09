<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace Mailjet;

use PHPUnit\Framework\TestCase;

class MailjetApiv3Test extends TestCase
{

    private $publicKey = 'apikey';
    private $secretKey = 'secretkey';

    const API_BASE_URL = 'https://api.mailjet.com/';
    const VERSION = 'v3';

    private function assertUrl($url, $response, $version = self::VERSION)
    {
        $this->assertEquals(self::API_BASE_URL . $version . $url, $response->request->getUrl());
    }

    private function assertPayload($payload, $response)
    {
        $this->assertEquals($payload, $response->request->getBody());
    }

    private function assertFilters($shouldBe, $response)
    {
        $this->assertEquals($shouldBe, $response->request->getFilters());
    }

    private function assertHttpMethod($payload, $response)
    {
        $this->assertEquals($payload, $response->request->getMethod());
    }

    private function assertGetAuth($response)
    {
        $this->assertEquals($this->publicKey, $response->request->getAuth()[0]);
        $this->assertEquals($this->secretKey, $response->request->getAuth()[1]);
    }

    private function assertGetStatus($payload, $response)
    {
        $this->assertEquals($payload, $response->getStatus());
    }

    private function assertGetBody($payload, $keyName, $response)
    {
        $result = null;
        if (empty($response->getBody()[$keyName]) === false) {
            $result = $response->getBody()[$keyName];
        }

        $this->assertEquals($payload, $result);
    }

    private function assertGetData($payload, $keyName, $response)
    {
        $result = null;
        if (empty($response->getData()[$keyName]) === false) {
            $result = $response->getData()[$keyName];
        }

        $this->assertEquals($payload, $result);
    }

    private function assertGetCount($payload, $response)
    {
        $this->assertEquals($payload, $response->getCount());
    }

    private function assertGetReasonPhrase($payload, $response)
    {
        $this->assertEquals($payload, $response->getReasonPhrase());
    }

    private function assertGetTotal($payload, $response)
    {
        $this->assertEquals($payload, $response->getTotal());
    }

    private function assertSuccess($payload, $response)
    {
        $this->assertEquals($payload, $response->success());
    }

    private function assertSetSecureProtocol($client)
    {
        $this->assertTrue($client->setSecureProtocol(true));
        $this->assertFalse($client->setSecureProtocol('not boolean type'));
    }

    public function testGet()
    {
        $client = new Client($this->publicKey, $this->secretKey, true);

        $this->assertUrl('/REST/contact', $client->get(Resources::$Contact));

        $this->assertFilters(['id' => 2], $client->get(Resources::$Contact, [
                    'filters' => ['id' => 2]
                        ], ['version' => 'v3.1']));

        $response = $client->get(Resources::$ContactGetcontactslists, ['id' => 2]);
        $this->assertUrl('/REST/contact/2/getcontactslists', $response);

        // error on sort !
        $response = $client->get(Resources::$Contact, [
            'filters' => ['sort' => 'email+DESC']
        ]);

        $this->assertUrl('/REST/contact', $response);

        $this->assertUrl('/REST/contact/2', $client->get(Resources::$Contact, ['id' => 2]));

        $this->assertUrl(
                '/REST/contact/test@mailjet.com', $client->get(Resources::$Contact, ['id' => 'test@mailjet.com'])
        );

        $this->assertHttpMethod('GET', $response);

        $this->assertGetAuth($response);

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
        $this->assertGetBody('', 'StatusCode', $ret);
        $this->assertGetData('', 'StatusCode', $ret);
        $this->assertGetCount('', $ret);
        $this->assertGetReasonPhrase('Unauthorized', $ret);
        $this->assertGetTotal('', $ret);
        $this->assertSuccess('', $ret);
    }

    public function testPostV3_1()
    {
        $client = new Client($this->publicKey, $this->secretKey, ['call' => false]);

        $email = [
            'Messages' => [[
            'From' => ['Email' => "test@mailjet.com", 'Name' => "Mailjet PHP test"],
            'TextPart' => "Simple Email test",
            'To' => [['Email' => "test@mailjet.com", 'Name' => 'Test']]
                ]]
        ];

        $ret = $client->post(Resources::$Email, ['body' => $email], ['version' => 'v3.1']);
        $this->assertUrl('/send', $ret, 'v3.1');
        $this->assertPayload($email, $ret);
        $this->assertHttpMethod('POST', $ret);
        $this->assertGetAuth($ret);
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
        $client = new Client($this->publicKey, $this->secretKey, ['call' => false]);
        $client->setTimeout(3);
        $client->setConnectionTimeout(5);
        $client->addRequestOption('delay', 23);
        $this->assertEquals(3, $client->getTimeout());
        $this->assertEquals(5, $client->getConnectionTimeout());
        $this->assertEquals(23, $client->getRequestOptions()['delay']);
    }

}
