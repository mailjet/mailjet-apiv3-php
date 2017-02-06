<?php

namespace Mailjet;

require __DIR__.'/../../vendor/autoload.php';

class MailjetTest extends \PHPUnit_Framework_TestCase
{
    private function assertUrl($url, $response, $version = 'v3')
    {
        $this->assertEquals('https://api.mailjet.com/'.$version.$url, $response->request->getUrl());
    }

    public function assertPayload($payload, $response)
    {
        $this->assertEquals($payload, $response->request->getBody());
    }

    public function assertFilters($shouldBe, $response)
    {
        $this->assertEquals($shouldBe, $response->request->getFilters());
    }


    public function testGet()
    {
        $client = new Client('', '', ['call' => false]);

        $this->assertUrl('/REST/contact', $client->get(Resources::$Contact));

        $this->assertFilters(['id' => 2], $client->get(Resources::$Contact, [
            'filters' => ['id' => 2]
        ]));

        $response = $client->get(Resources::$ContactGetcontactslists, ['id' => 2]);
        $this->assertUrl('/REST/contact/2/getcontactslists', $response);

        // error on sort !
        $response = $client->get(Resources::$Contact, [
            'filters' => ['sort' => 'email+DESC']
        ]);
        $this->assertUrl('/REST/contact', $response);

        $this->assertUrl('/REST/contact/2', $client->get(Resources::$Contact, ['id' => 2]));

        $this->assertUrl(
            '/REST/contact/test@mailjet.com',
            $client->get(Resources::$Contact, ['id' => 'test@mailjet.com'])
        );
    }

    public function testPost()
    {
        $client = new Client('', '', ['call' => false]);

        $email = [
          'FromName'     => 'Mailjet PHP test',
          'FromEmail'    => 'gbadi@student.42.fr',
          'Text-Part'    => 'Simple Email test',
          'Subject'      => 'PHPunit',
          'Html-Part'    => '<h3>Simple Email Test</h3>',
          'Recipients'   => [['Email' => 'test@mailjet.com']],
          'MJ-custom-ID' => 'Hello ID',
        ];

        $ret = $client->post(Resources::$Email, ['body' => $email]);
        $this->assertUrl('/send', $ret);
        $this->assertPayload($email, $ret);
    }

    public function testPostV3_1()
    {
        $client = new Client('', '', ['call' => false]);

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
    }
}
