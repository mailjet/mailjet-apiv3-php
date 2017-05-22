<?php
/**
 * PHP version 5
 *
 * This is the Mailjet Request
 *
 * @category Mailjet_API
 * @package  Mailjet-apiv3
 * @author   Guillaume Badi <gbadi@mailjet.com>
 * @license  MIT https://opensource.org/licenses/MIT
 * @link     dev.mailjet.com
 */

namespace Mailjet;

use GuzzleHttp\Client as GuzzleClient;
use GuzzleHttp\Exception\ClientException;
use GuzzleHttp\Exception\ServerException;

class Request extends GuzzleClient
{
    private $method;
    private $url;
    private $filters;
    private $body;
    private $auth;
    private $type;

    /**
     * Build a new Http request
     * @param array  $auth    [apikey, apisecret]
     * @param string $method  http method
     * @param string $url     call url
     * @param array  $filters Mailjet resource filters
     * @param array  $body    Mailjet resource body
     * @param string $type    Request Content-type
     */
    public function __construct($auth, $method, $url, $filters, $body, $type)
    {
        parent::__construct(['defaults' => [
            'headers' => [
                'user-agent' => Config::USER_AGENT . phpversion() . '/' . Client::WRAPPER_VERSION
            ]
        ]]);
        $this->type = $type;
        $this->auth = $auth;
        $this->method = $method;
        $this->url = $url;
        $this->filters = $filters;
        $this->body = $body;
    }

    /**
     * Trigger the actual call
     * TODO: DATA API
     * @param $call
     * @return Response the call response
     */
    public function call($call)
    {
        $payload = [
            'headers'  => ['content-type' => $this->type],
            'query' => $this->filters,
            'auth' => $this->auth,
            ($this->type === 'application/json' ? 'json' : 'body') => $this->body,
        ];
        $response = null;
        if ($call) {
            try {
                $response = call_user_func_array(
                    [$this, strtolower($this->method)],
                    [$this->url, $payload]
                );
            }
            catch (ClientException $e) {
                $response = $e->getResponse();
            }
            catch (ServerException $e) {
                $response = $e->getResponse();
            }
        }
        return new Response($this, $response);
    }

    /**
     * Filters getters
     * @return array Request filters
     */
    public function getFilters()
    {
        return $this->filters;
    }

    /**
     * Http method getter
     * @return string Request method
     */
    public function getMethod()
    {
        return $this->method;
    }

    /**
     * Call Url getter
     * @return string Request Url
     */
    public function getUrl()
    {
        return $this->url;
    }

    /**
     * Request body getter
     * @return array request body
     */
    public function getBody()
    {
        return $this->body;
    }

    /**
     * Auth getter. to discuss
     * @return string Request auth
     */
    public function getAuth()
    {
        return $this->auth;
    }
}
