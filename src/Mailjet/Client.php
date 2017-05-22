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

class Client
{
    const WRAPPER_VERSION = Config::WRAPPER_VERSION;

    private $apikey;
    private $apisecret;

    private $version = Config::MAIN_VERSION;
    private $url = Config::MAIN_URL;
    private $secure = Config::SECURED;
    private $call = true;
    private $settings = [];
    private $changed = false;

    /**
     * Client constructor requires:
     * @param string  $key    Mailjet API Key
     * @param string  $secret Mailjet API Secret
     * @param boolean $call   performs the call or not
     */
    public function __construct($key, $secret, $call = true, array $settings = [])
    {           
        $this->apikey = $key;
        $this->apisecret = $secret;
        $this->initSettings($call, $settings);
        $this->setSettings();
    }

    /**
     * Magic method to call a mailjet resource
     * @param string $method   Http method
     * @param string $resource mailjet resource
     * @param string $action   mailjet resource action
     * @param array  $args     Request arguments
     * @return Response server response
     */
    private function _call($method, $resource, $action, $args)
    {
        $args = array_merge(
            [
                'id' => '',
                'actionid' => '',
                'filters' => [],
                'body' => $method == 'GET' ? null : '{}',
            ],
            array_change_key_case($args)
        );

        $url = $this->buildURL($resource, $action, $args['id'], $args['actionid']);

        $contentType = ($action == 'csvdata/text:plain' || $action == 'csverror/text:csv') ?
                'text/plain' : 'application/json';

        return (new Request(
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
     * @return string the API url;
     */
    private function getApiUrl()
    {
        $h = $this->secure === true ? 'https' : 'http';
        return $h."://".$this->url.'/'.$this->version.'/';
    }

    /**
     * Trigger a POST request
     * @param array $resource Mailjet Resource/Action pair
     * @param array $args     Request arguments
     * @return Response
     */
    public function post($resource, array $args = [], array $options = [])
    {
        if (!empty($options)) {
            $this->setOptions($options, $resource);
        }
        $result = $this->_call('POST', $resource[0], $resource[1], $args);
        if (!empty($this->changed)) {
            $this->setSettings();
        }
        
        return $result;
    }

    /**
     * Trigger a GET request
     * @param array $resource Mailjet Resource/Action pair
     * @param array $args     Request arguments
     * @return Response
     */
    public function get($resource, array $args = [], array $options = [])
    {
        if (!empty($options)) {
            $this->setOptions($options, $resource);
        }
        $result = $this->_call('GET', $resource[0], $resource[1], $args);
        if (!empty($this->changed)) {
            $this->setSettings();
        }
        return $result;
    }

    /**
     * Trigger a POST request
     * @param array $resource Mailjet Resource/Action pair
     * @param array $args     Request arguments
     * @return Response
     */
    public function put($resource, array $args = [], array $options = [])
    {
        if (!empty($options)) {
            $this->setOptions($options, $resource);
        }
        $result = $this->_call('PUT', $resource[0], $resource[1], $args);
        if (!empty($this->changed)) {
            $this->setSettings();
        }
        return $result;
    }

    /**
     * Trigger a GET request
     * @param array $resource Mailjet Resource/Action pair
     * @param array $args     Request arguments
     * @return Response
     */
    public function delete($resource, array $args = [], array $options = [])
    {
        if (!empty($options)) {
            $this->setOptions($options, $resource);
        }
        $result = $this->_call('DELETE', $resource[0], $resource[1], $args);
        if (!empty($this->changed)) {
            $this->setSettings();
        }
        return $result;
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
            || $action == 'JSONError/application:json/LAST'
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
    public function setSecureProtocol($bIsSecured)
    {
        if (is_bool($bIsSecured)) {
            $this->secure = $bIsSecured;

            return true;
        }

        return false;
    }
    
    // TODO : make the next code more readable
    
    /**
     * Temporary set the variables generating the url
     * @param array $options    contain temporary modifications for the client
     * @param array $resource   may contain the version linked to the ressource
     */
    private function setOptions($options, $resource)
    {
        if (!empty($options['version']) && is_string($options['version'])) {
            $this->version = $options['version'];
        } elseif (!empty($resource[2])) {
            $this->version = $resource[2];
        } if (!empty($options['url']) && is_string($options['url'])) {
            $this->url = $options['url'];
        } if (isset($options['secured']) && is_bool($options['secured'])) {
            $this->secure = $options['secured'];
        } if (isset($options['call']) && is_bool($options['call'])) {
            $this->call = $options['call'];
        }
        $this->changed = true;
    }
    
    /**
     * set back the variables generating the url
     */
    private function setSettings()
    {
        if (!empty($this->settings['url']) && is_string($this->settings['url'])) {
            $this->url = $this->settings['url']; 
        } if (!empty($this->settings['version']) && is_string($this->settings['version'])) {
            $this->version = $this->settings['version']; 
        } if (isset($this->settings['call']) && is_bool($this->settings['call'])) {
            $this->call = $this->settings['call']; 
        } if (isset($this->settings['secured']) && is_bool($this->settings['secured'])) {
            $this->secure = $this->settings['secured']; 
        }
        $this->changed = false;
    }
    
    /**
     * Set a backup if the variables generating the url are change during a call.
     */
    private function initSettings($call, $settings = [])
    {
        if (!empty($settings['url']) && is_string($settings['url'])) {
            $this->settings['url'] = $settings['url']; 
        } else {
            $this->settings['url'] = $this->url; 
        }
        
        if (!empty($settings['version']) && is_string($settings['version'])) {
            $this->settings['version'] = $settings['version']; 
        } else {
            $this->settings['version'] = $this->version; 
        }
        
        $settings['call'] = $call;
        if (isset($settings['call']) && is_bool($settings['call'])) {
            $this->settings['call'] = $settings['call']; 
        } else {
            $this->settings['call'] = $this->call; 
        }
        
        if (isset($settings['secured']) && is_bool($settings['secured'])) {
            $this->settings['secured'] = $settings['secured']; 
        } else {
            $this->settings['secured'] = $this->secure; 
        } 
        
        $this->changed = false;
    }
}
