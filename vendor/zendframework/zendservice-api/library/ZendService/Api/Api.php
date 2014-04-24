<?php
/**
 * Zend Framework (http://framework.zend.com/)
 *
 * @link      http://github.com/zendframework/zf2 for the canonical source repository
 * @copyright Copyright (c) 2005-2014 Zend Technologies USA Inc. (http://www.zend.com)
 * @license   http://framework.zend.com/license/new-bsd New BSD License
 */
namespace ZendService\Api;

use Zend\Http\Client as HttpClient;
use ZendXml\Security as XmlSecurity;

/**
 * Class to consume generic API calls using HTTP
 *
 * The specification of the API calls are managed by configuration files
 * using PHP associative array
 */
class Api
{
    /**
     * Folder path of the API calls
     *
     * @var string
     */
    protected $apiPath;

    /**
     * Error message of the last HTTP call
     *
     * @var string
     */
    protected $errorMsg;

    /**
     * Status code of the last HTTP call
     *
     * @var integer
     */
    protected $statusCode;

    /**
     * Success of the last HTTP call
     *
     * @var bool
     */
    protected $success = false;

    /**
     * Basepoint URL
     *
     * @var string
     */
    protected $url = null;

    /**
     * Query parameters of the HTTP call
     *
     * @var array
     */
    protected $queryParams = array();

    /**
     * Default headers to be used during the HTTP call
     *
     * @var array
     */
    protected $headers = array();

    /**
     * HTTP request specification for an API call
     *
     * @var array
     */
    protected $api = array();

    /**
     * Constructor
     *
     * @param  HttpClient $httpClient
     * @throws Exception\InvalidArgumentException
     */
    public function __construct(HttpClient $httpClient = null)
    {
        $this->setHttpClient($httpClient ?: new HttpClient);
    }

    /**
     * Call a webservice
     *
     * @param  string $name
     * @param  mixed $params
     * @throws Exception\InvalidArgumentException
     * @return array|string|bool
     */
    public function __call($name, $params)
    {
        // API specifications
        if (!empty($this->api[$name])) {
            $api = $this->api[$name]($params);
        } else {
            if (!empty($this->apiPath)) {
                $fileName = $this->apiPath . '/' . $name . '.php';
                if (file_exists($fileName)) {
                    $apiFunc = function ($params) use ($fileName) {
                        return include $fileName;
                    };
                    $api = $apiFunc($params);
                }
            }
        }
        if (empty($api)) {
            throw new Exception\RuntimeException(
                "The HTTP request specification for the API $name is empty. I cannot proceed without it."
            );
        }

        // Build HTTP request
        $client = $this->getHttpClient();
        $client->resetParameters();
        $this->errorMsg = null;
        $this->errorCode = null;
        if (isset($api['method'])) {
            $client->setMethod($api['method']);
        } else {
            $client->setMethod('GET');
        }
        if (!empty($this->queryParams)) {
            $client->setParameterGet($this->queryParams);
        }
        if (isset($api['body'])) {
            $client->setRawBody($api['body']);
        }
        $headers = array();
        if (!empty($this->headers)) {
            $headers = $this->getHeaders();
        }
        if (isset($api['header'])) {
            $headers = array_merge($headers, $api['header']);
        }
        $client->setHeaders($headers);
        $url = $this->getUrl();
        if (isset($api['url'])) {
            if (substr($api['url'], 0, 4) === 'http') {
                $url = $api['url'];
            } else {
                $url .= $api['url'];
            }
        }
        $client->setUri($url);
        if (isset($api['response']['format'])) {
            $formatOutput = strtolower($api['response']['format']);
        }
        $validCodes = array(200);
        if (isset($api['response']['valid_codes'])) {
            $validCodes = $api['response']['valid_codes'];
        }

        // Send HTTP request
        $response         = $client->send();
        $this->statusCode = $response->getStatusCode();
        if (in_array($this->statusCode, $validCodes)) {
            $this->success = true;
            if (isset($formatOutput)) {
                if ($formatOutput === 'json') {
                    return json_decode($response->getBody(),true);
                } elseif ($formatOutput === 'xml') {
                	$xml = XmlSecurity::scan($response->getBody());
                    return json_decode(json_encode((array) $xml), 1);
                }
            }
            return $response->getBody();
        }
        $this->errorMsg = $response->getBody();
        $this->success  = false;
        return false;
    }

    /**
     * Set the API path
     *
     * @param  string $apiPath
     * @throws Exception\InvalidArgumentException
     */
    public function setApiPath($apiPath)
    {
        if (!is_dir($apiPath)) {
            throw new Exception\InvalidArgumentException("Tha path $apiPath specified is not valid");
        }
        $this->apiPath = $apiPath;
        return $this;
    }

    /**
     * Get the API path
     *
     * @return string
     */
    public function getApiPath()
    {
        return $this->apiPath;
    }

    /**
     * Set the basepoint URL
     *
     * @param  string $url
     * @return self
     */
    public function setUrl($url = null)
    {
        $this->url = $url;
        return $this;
    }

    /**
     * Get the basepoint URL
     *
     * @return string
     */
    public function getUrl()
    {
        return $this->url;
    }

    /**
     * Set the HTTP query params
     *
     * @param  array $query
     * @return self
     */
    public function setQueryParams(array $query = null)
    {
        $this->queryParams = $query;
        return $this;
    }

    /**
     * Get the HTTP query params
     *
     * @return array
     */
    public function getQueryParams()
    {
        return $this->queryParams;
    }

    /**
     * Set the HTTP headers
     *
     * @param  array $headers
     * @return self
     */
    public function setHeaders(array $headers = null)
    {
        $this->headers = $headers;
        return $this;
    }

    /**
     * Get the HTTP headers
     *
     * @return array
     */
    public function getHeaders()
    {
        return $this->headers;
    }

    /**
     * @param  HttpClient $httpClient
     * @return self
     */
    public function setHttpClient(HttpClient $httpClient)
    {
        $this->httpClient = $httpClient;
        return $this;
    }

    /**
     * get the HttpClient instance
     *
     * @return HttpClient
     */
    public function getHttpClient()
    {
        return $this->httpClient;
    }

    /**
     * Get the error msg of the last HTTP call
     *
     * @return string
     */
    public function getErrorMsg()
    {
        return $this->errorMsg;
    }

    /**
     * Get the status code of the last HTTP call
     *
     * @return string
     */
    public function getStatusCode()
    {
        return $this->statusCode;
    }

    /**
     * Success of the last HTTP call
     *
     * @return bool
     */
    public function isSuccess()
    {
        return $this->success;
    }

    /**
     * Set the HTTP request specficiation for the API $name
     *
     * @param  string $name
     * @param  callable $api
     * @return self
     */
    public function setApi($name, $api)
    {
        if (!is_string($name)) {
            throw new Exception\InvalidArgumentException("The name of the API must be a string");
        }
        if (!is_callable($api)) {
            throw new Exception\InvalidArgumentException("The value of the API must be a callable");
        }
        $this->api[$name] = $api;
        return $this;
    }

    /**
     * Get the HTTP request specification of the API $name
     *
     * @param  string $name
     * @return array
     */
    public function getApi($name)
    {
        return $this->api[$name];
    }

    /**
     * Reset the result of the last response
     *
     * @return self
     */
    public function resetLastResponse()
    {
        $this->success    = false;
        $this->errorMsg   = null;
        $this->statusCode = null;
        return $this;
    }

    /**
     * Get the response headers of the last HTTP call
     *
     * @return array
     */
    public function getResponseHeaders()
    {
        $response = $this->httpClient->getResponse();
        if (empty($response)) {
            return array();
        }

        return $response->getHeaders()->toArray();
    }
}
