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

    /**
     * connect_timeout: (float, default=2) Float describing the number of
     * seconds to wait while trying to connect to a server. Use 0 to wait
     * indefinitely (the default behavior).
     */
    const CONNECT_TIMEOUT = 'connect_timeout';

    /**
     * timeout: (float, default=15) Float describing the timeout of the
     * request in seconds. Use 0 to wait indefinitely (the default behavior).
     */
    const TIMEOUT = 'timeout';

    private $apikey;
    private $apisecret;
    private $apitoken;
    private $version        = Config::MAIN_VERSION;
    private $url            = Config::MAIN_URL;
    private $secure         = Config::SECURED;
    private $call           = true;
    private $settings       = [];
    private $changed        = false;
    private $requestOptions = [
        self::TIMEOUT => 15,
        self::CONNECT_TIMEOUT => 2,
    ];

    /**
     * Client constructor requires:
     * @param string  $key    Mailjet API Key
     * @param string  $secret Mailjet API Secret
     * @param boolean $call   performs the call or not
     */
    public function __construct($key, $secret, $call = true,
                                array $settings = [])
    {
        $isBasicAuthentication = $this->_isBasicAuthenticationRequired($key, $secret);
        
        if ($isBasicAuthentication) {
            $this->_setBasicAuthentication($key, $secret, $call, $settings);
        } else {
            $this->_setTokenAuthetication($key, $secret, $call);
        }        
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
            ], array_change_key_case($args)
        );

        $url = $this->buildURL($resource, $action, $args['id'],
            $args['actionid']);

        $contentType = ($action == 'csvdata/text:plain' || $action == 'csverror/text:csv')
                ?
            'text/plain' : 'application/json';
        
        $auth = (isset($this->apisecret) && is_string($this->apisecret) !== '') ? [
            $this->apikey,
            $this->apisecret
        ] : [
            $this->apitoken
        ];
        
        $request     = new Request(
            $auth, $method, $url, $args['filters'],
            $args['body'], $contentType, $this->requestOptions
        );
        return $request->call($this->call);
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
     * 
     * @param string $key
     * @param string $secret
     * @param boolean $call
     * @param array $settings
     */
    private function _setBasicAuthentication($key, $secret, $call, $settings)
    {
        $this->apikey    = $key;
        $this->apisecret = $secret;
        $this->initSettings($call, $settings);
        $this->setSettings();
    }

    /**
     * 
     * @param string $token
     * @param boolean $call
     * @param array $settings
     */
    private function _setTokenAuthetication($token, $call, $settings)
    {
        $this->apitoken = $token;
        $this->initSettings($call, $settings);
        $this->setSettings();
    }

    /**
     * Checks that both parameters are strings, which means
     * that basic authentication will be required
     *
     * @param string $key
     * @param string $secret
     *
     * @return boolean flag
     */
    private function _isBasicAuthenticationRequired($key, $secret)
    {        
        return is_string($key) && is_string($secret) && !empty($secret);
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
        if ($resource == 'send' || $resource == 'sms' || $resource == 'sms-send') {
            $path = '';
        } elseif ($action == 'csverror/text:csv' || $action == 'csvdata/text:plain'
            || $action == 'JSONError/application:json/LAST'
        ) {
            $path = 'DATA';
        } else {
            $path = 'REST';
        }

        return $this->getApiUrl().join(
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

    /**
     * Set HTTP request Timeout
     * @param   $timeout
     */
    public function setTimeout($timeout)
    {
        $this->requestOptions[self::TIMEOUT] = $timeout;
    }

    /**
     * Set HTTP connection Timeout
     * @param   $timeout
     */
    public function setConnectionTimeout($timeout)
    {
        $this->requestOptions[self::CONNECT_TIMEOUT] = $timeout;
    }

    /**
     * Get HTTP request Timeout
     * $return   $timeout
     */
    public function getTimeout()
    {
        return $this->requestOptions[self::TIMEOUT];
    }

    /**
     * Get HTTP connection Timeout
     * $return   $timeout
     */
    public function getConnectionTimeout()
    {
        return $this->requestOptions[self::CONNECT_TIMEOUT];
    }

    /**
     * Add a HTTP request option
     * @param array $key
     * @param array $value
     * [IMPORTANT]Default options will be overwritten
     * if such option is provided
     * @see \GuzzleHttp\RequestOptions for a list of available request options.
     */
    public function addRequestOption($key, $value)
    {
        if ((!is_null($key)) && (!is_null($value))) {
            $this->requestOptions[$key] = $value;
        }
    }

    /**
     * Get HTTP connection options
     * $return   array requestOptions
     */
    public function getRequestOptions()
    {
        return $this->requestOptions;
    }
}
