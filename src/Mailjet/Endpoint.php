<?php
/**
 * PHP version 5
 *
 * This is the Mailjet PHP API wrapper
 *
 * @category Mailjet_API
 * @package  Mailjet-apiv3
 * @author   Guillaume Badi <gbadi@mailjet.com>
 * @license  MIT https://licencepath.com
 * @link     http://link.com
 */

namespace Mailjet;

/**
 * This is the Resource class
 * @category Mailjet_API
 * @package  Mailjet-apiv3
 * @author Guillaume Badi <gbadi@mailjet.com>
 * @license MIT https://licencepath.com
 * @link http://link.com
 */
class Endpoint
{
    public function __construct($resource, $action = '')
    {
        $this->resource = $resource;
        $this->action = $action;
    }

    public function get($args = [])
    {
        return $this->_call('GET', $args);
    }

    public function post($args = [])
    {
        return $this->_call('POST', $args);
    }

    public function put($args = [])
    {
        return $this->_call('PUT', $args);
    }

    public function delete($args = [])
    {
        return $this->_call('DELETE', $args);
    }

    private function _call($method, $args)
    {
        $args = (sizeof($args) > 0) ? array_change_key_case($args[0]) : array();

        $args = array_merge(
            array(
            'id' => '',
            'actionid' => '',
            'filters' => [],
            'body' => []
            ), $args
        );

        return \Mailjet\Client::call($method, $this->resource, $this->action, $args);
    }
}
