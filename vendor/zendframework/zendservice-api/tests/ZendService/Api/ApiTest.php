<?php
/**
 * Zend Framework (http://framework.zend.com/)
 *
 * @link      http://github.com/zendframework/zf2 for the canonical source repository
 * @copyright Copyright (c) 2005-2014 Zend Technologies USA Inc. (http://www.zend.com)
 * @license   http://framework.zend.com/license/new-bsd New BSD License
 * @package   Zend_Service
 */

namespace ZendServiceTest\Api;

use ZendService\Api\Api;
use Zend\Http\Client\Adapter\Test as HttpTest;
use Zend\Http\Client as HttpClient;

/**
 * @category   Zend
 * @package    ZendService\Api
 */
class ApiTest extends \PHPUnit_Framework_TestCase
{
    public function setUp()
    {
        $httpAdapter = new HttpTest;
        $this->api   = new Api();
        $this->api->getHttpClient()->setAdapter($httpAdapter);
        $this->api->setApiPath(__DIR__ . '/_files');

        $fileResponse = __DIR__ . '/_files/'. $this->getName() . '.response';
        if (file_exists($fileResponse)) {
            $httpAdapter->setResponse(file_get_contents($fileResponse));
        }
    }

    public function testConstruct()
    {
        $api = new Api();
        $this->assertTrue($api->getHttpClient() instanceof HttpClient);
    }

    /**
     * @expectedException PHPUnit_Framework_Error
     */
    public function testFailConstruct()
    {
        $api = new Api('test');
    }

    /**
     * @expectedException RuntimeException
     */
    public function testWrongApi()
    {
        $result = $this->api->foo('bar');
    }

    public function testApiJson()
    {
        $result = $this->api->json();
        $this->assertTrue(is_array($result));
        $this->assertEquals('OK', $result['result']);
    }

    public function testApiXml()
    {
        $result = $this->api->xml();
        $this->assertTrue(is_array($result));
        $this->assertEquals('OK', $result['result']);
    }

    public function testSetPathApi()
    {
        $result = $this->api->setApiPath(__DIR__);
        $this->assertTrue($result instanceof Api);
        $this->assertEquals(__DIR__, $this->api->getApiPath());
    }

    public function testSetUrl()
    {
        $url = 'http://localhost';
        $result = $this->api->setUrl($url);
        $this->assertTrue($result instanceof Api);
        $this->assertEquals($url, $this->api->getUrl());
    }

    public function testSetEmptyUrl()
    {
        $url = 'http://localhost';
        $result = $this->api->setUrl($url);
        $this->assertEquals($url, $this->api->getUrl());
        $result = $this->api->setUrl();
        $this->assertEquals(null, $this->api->getUrl());
    }

    public function testSetQueryParams()
    {
        $queryParams = array('foo' => 'bar');
        $result = $this->api->setQueryParams($queryParams);
        $this->assertTrue($result instanceof Api);
        $this->assertEquals($queryParams, $this->api->getQueryParams());
    }

    public function testSetEmptyQueryParams()
    {
        $queryParams = array('foo' => 'bar');
        $result = $this->api->setQueryParams($queryParams);
        $this->assertEquals($queryParams, $this->api->getQueryParams());
        $result = $this->api->setQueryParams();
        $this->assertEquals(null, $this->api->getQueryParams());
    }

    public function testSetHeaders()
    {
        $headers = array('Content-Type' => 'application/json');
        $result = $this->api->setHeaders($headers);
        $this->assertTrue($result instanceof Api);
        $this->assertEquals($headers, $this->api->getHeaders());
    }

    public function testSetEmptyHeaders()
    {
        $headers = array('Content-Type' => 'application/json');
        $result = $this->api->setHeaders($headers);
        $this->assertEquals($headers, $this->api->getHeaders());
        $result = $this->api->setHeaders();
        $this->assertEquals(null, $this->api->getHeaders());
    }

    public function testSetHttpClient()
    {
        $httpClient = new HttpClient();
        $result = $this->api->setHttpClient($httpClient);
        $this->assertTrue($result instanceof Api);
        $this->assertEquals($httpClient, $this->api->getHttpClient());
    }

    public function testApi()
    {
        $result = $this->api->test('foo', 'bar');
        $this->assertTrue($this->api->isSuccess());
        $this->assertEquals('This is a test!', $result);
    }

    public function testResponseHeadersEmpty()
    {
        $headers = $this->api->getResponseHeaders();
        $this->assertTrue(is_array($headers));
        $this->assertEquals(array(), $headers);
    }

    public function testResponseHeaders()
    {
        $result = $this->api->test('foo','bar');
        $this->assertTrue(is_array($this->api->getResponseHeaders()));
    }

    public function testError()
    {
        $result = $this->api->test('foo', 'bar');
        $this->assertFalse($this->api->isSuccess());
        $this->assertEquals('Error', $this->api->getErrorMsg());
        $this->assertEquals(500, $this->api->getStatusCode());
        $this->assertTrue(empty($result));
    }

    public function testSetApi()
    {
        $this->api->setApi('test', function ($params) {
            return include __DIR__ . '/_files/test.php';
        });
        $this->api->getHttpClient()->getAdapter()->setResponse(file_get_contents(__DIR__ . '/_files/testApi.response'));
        $result = $this->api->test('foo', 'bar');
        $this->assertTrue($this->api->isSuccess());
        $this->assertEquals('This is a test!', $result);
        $this->assertTrue(is_callable($this->api->getApi('test')));
    }

    public function testResetLastResponse()
    {
        $this->api->setApi('test', function ($params) {
            return include __DIR__ . '/_files/test.php';
        });
        $this->api->getHttpClient()->getAdapter()->setResponse(file_get_contents(__DIR__ . '/_files/testApi.response'));
        $result = $this->api->test('foo', 'bar');
        $this->assertTrue($this->api->isSuccess());
        $this->api->resetLastResponse();
        $this->assertFalse($this->api->isSuccess());
        $this->assertEquals(null, $this->api->getErrorMsg());
        $this->assertEquals(null, $this->api->getStatusCode());
    }
}
