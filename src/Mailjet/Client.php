<?php
/**
 * PHP version 5
 *
 * This is the Mailjet PHP API wrapper
 *
 * @category Mailjet_API
 * @package  Mailjet-apiv3
 * @author   Guillaume Badi <gbadi@mailjet.com>
 * @license  MIT https://opensource.org/licenses/MIT
 * @link     dev.mailjet.com
 */

namespace Mailjet;

/**
 * This is the Client class
 * @category Mailjet_API
 * @package  Mailjet-apiv3
 * @author Guillaume Badi <gbadi@mailjet.com>
 * @license MIT https://licencepath.com
 * @link http://link.com
 */
class Client
{
    const WRAPPER_VERSION = \Mailjet\Config::WRAPPER_VERSION;

    private $apikey;
    private $apisecret;

    private $version = 'v3/';
    private $secure = true;
    private $call = true;

    /**
     * Client constructor requires:
     * @param string  $key    Mailjet API Key
     * @param string  $secret Mailjet API Secret
     * @param boolean $call   performs the call or not
     */
    public function __construct($key, $secret, $call = true)
    {
        $this->call = $call;
        $this->apikey = $key;
        $this->apisecret = $secret;
    }

    /**
     * Magic method to call a mailjet resource
     * @param string $method   Http method
     * @param string $resource mailjet resource
     * @param string $action   mailjet resource action
     * @param array  $args     Request arguments
     * @return Mailjet\Response server response
     */
    private function _call($method, $resource, $action, $args)
    {
        $args = array_merge(
            [
            'id' => '',
            'actionid' => '',
            'filters' => [],
            'body' => '{}'
            ],
            array_change_key_case($args)
        );

        $url = $this->buildURL($resource, $action, $args['id'], $args['actionid']);

        $contentType = ($action == 'csvdata/text:plain' || $action == 'csverror/text:csv') ?
                'text/plain' : 'application/json';

        return (new \Mailjet\Request(
            [$this->apikey, $this->apisecret],
            $method,
            $url,
            $args['filters'],
            $args['body'],
            $contentType
        ))->call($this->call);
    }

    /**
     * Build the base API url depending on wether user need a secure connection
     * or not
     * @return the API url;
     */
    private function getApiUrl()
    {
        $h = $this->secure ? 'https' : 'http';
        return $h . '://api.mailjet.com/' . $this->version;
    }

    /**
     * Trigger a POST request
     * @param ResourceArray $resource Mailjet Resource/Action pair
     * @param array         $args     Request arguments
     * @return Mailjet\Response
     */
    public function post($resource, $args = [])
    {
        return $this->_call('POST', $resource[0], $resource[1], $args);
    }

    /**
     * Trigger a GET request
     * @param ResourceArray $resource Mailjet Resource/Action pair
     * @param array         $args     Request arguments
     * @return Mailjet\Response
     */
    public function get($resource, $args = [])
    {
        return $this->_call('GET', $resource[0], $resource[1], $args);
    }

    /**
     * Trigger a POST request
     * @param ResourceArray $resource Mailjet Resource/Action pair
     * @param array         $args     Request arguments
     * @return Mailjet\Response
     */
    public function put($resource, $args = [])
    {
        return $this->_call('PUT', $resource[0], $resource[1], $args);
    }

    /**
     * Trigger a GET request
     * @param ResourceArray $resource Mailjet Resource/Action pair
     * @param array         $args     Request arguments
     * @return Mailjet\Response
     */
    public function delete($resource, $args = [])
    {
        return $this->_call('DELETE', $resource[0], $resource[1], $args);
    }

    /**
     * Build the final call url without query strings
     * @param string $resource Mailjet resource
     * @param string $action   Mailjet resource action
     * @param string $id       mailjet resource id
     * @param string $actionid mailjet resource actionid
     * @return string final call url
     */
    private function buildURL($resource, $action, $id, $actionid)
    {
        $path = null;
        if ($resource == 'send') {
            $path = '';
        } elseif ($action == 'csverror/text:csv'
            || $action == 'csvdata/text:plain'
        ) {
            $path = 'DATA';
        } else {
            $path = 'REST';
        }

        return $this->getApiUrl() . join(
            '/',
            array_filter(
                array(
                    $path, $resource,
                    $id, $action, $actionid
                )
            )
        );
    }

    /**
     * Sets if we need to use https or http protocol while using API Url
     * @param bool $bIsSecured True use https / false use http
     * @return bool true if we set value false otherwise
     */
    public function setSecureProtocol( $bIsSecured ) {

        if (is_bool($bIsSecured)) {

            $this->secure = $bIsSecured;
            return true;
        }
        return false;
    } 
}
