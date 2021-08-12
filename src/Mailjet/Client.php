<?php

declare(strict_types=1);

/*
 * Copyright (C) 2013 Mailgun
 *
 * This software may be modified and distributed under the terms
 * of the MIT license. See the LICENSE file for details.
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

    /**
     * proxy: (array, default=none) Array describing the proxy options used by guzzle client
     * See guzzle-http for specification.
     */
    const PROXY = 'proxy';

    private $apikey;
    private $apisecret;
    private $apitoken;
    private $version = Config::MAIN_VERSION;
    private $url = Config::MAIN_URL;
    private $secure = Config::SECURED;
    private $call = true;
    private $settings = [];
    private $changed = false;
    private $requestOptions = [
        self::TIMEOUT => 15,
        self::CONNECT_TIMEOUT => 2,
    ];
    private $smsResources = [
        'send',
        'sms',
        'sms-send',
    ];
    private $dataAction = [
        'csverror/text:csv',
        'csvdata/text:plain',
        'JSONError/application:json/LAST',
    ];

    /**
     * Client constructor requires:.
     *
     * @param string $key Mailjet API Key
     * @param string|null $secret Mailjet API Secret
     * @param bool $call performs the call or not
     * @param array $settings
     */
    public function __construct(string $key, string $secret = null, bool $call = true, array $settings = [])
    {
        $this->setAuthentication($key, $secret, $call, $settings);
    }

    /**
     * Trigger a POST request.
     *
     * @param array $resource Mailjet Resource/Action pair
     * @param array $args Request arguments
     * @param array $options
     * @return Response
     */
    public function post(array $resource, array $args = [], array $options = []): Response
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
     * Trigger a GET request.
     *
     * @param array $resource Mailjet Resource/Action pair
     * @param array $args Request arguments
     * @param array $options
     * @return Response
     */
    public function get(array $resource, array $args = [], array $options = []): Response
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
     * Trigger a POST request.
     *
     * @param array $resource Mailjet Resource/Action pair
     * @param array $args Request arguments
     * @param array $options
     * @return Response
     */
    public function put(array $resource, array $args = [], array $options = []): Response
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
     * Trigger a GET request.
     *
     * @param array $resource Mailjet Resource/Action pair
     * @param array $args Request arguments
     * @param array $options
     * @return Response
     */
    public function delete(array $resource, array $args = [], array $options = []): Response
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
     * Sets if we need to use https or http protocol while using API Url.
     *
     * @param bool|mixed $bIsSecured True use https / false use http
     *
     * @return bool true if we set value false otherwise
     */
    public function setSecureProtocol($bIsSecured = null): bool
    {
        if (\is_bool($bIsSecured)) {
            $this->secure = $bIsSecured;

            return true;
        }

        return false;
    }

    /**
     * Set HTTP request Timeout.
     * @param int $timeout
     */
    public function setTimeout(int $timeout): void
    {
        $this->requestOptions[self::TIMEOUT] = $timeout;
    }

    /**
     * Set HTTP proxy options
     * See: http://docs.guzzlephp.org/en/stable/request-options.html#proxy.
     * @param array $proxyArray
     */
    public function setHttpProxy(array $proxyArray): void
    {
        $this->requestOptions[self::PROXY] = $proxyArray;
    }

    /**
     * Set HTTP connection Timeout.
     * @param int $timeout
     */
    public function setConnectionTimeout(int $timeout): void
    {
        $this->requestOptions[self::CONNECT_TIMEOUT] = $timeout;
    }

    /**
     * Get HTTP request Timeout
     * $return int|null.
     */
    public function getTimeout(): ?int
    {
        return $this->requestOptions[self::TIMEOUT];
    }

    /**
     * Get HTTP connection Timeout
     * $return int|null.
     */
    public function getConnectionTimeout(): ?int
    {
        return $this->requestOptions[self::CONNECT_TIMEOUT];
    }

    /**
     * Add a HTTP request option.
     *
     * @param string $key
     * @param mixed $value
     *                     [IMPORTANT]Default options will be overwritten
     *                     if such option is provided
     *
     * @see \GuzzleHttp\RequestOptions for a list of available request options.
     */
    public function addRequestOption(string $key, $value): void
    {
        if ((null !== $key) && (null !== $value)) {
            $this->requestOptions[$key] = $value;
        }
    }

    /**
     * Get HTTP connection options
     * $return array.
     */
    public function getRequestOptions(): array
    {
        return $this->requestOptions;
    }

    /**
     * Set auth.
     *
     * @param string $key
     * @param string|null $secret
     * @param bool $call
     * @param array $settings
     */
    private function setAuthentication(string $key, ?string $secret, bool $call, array $settings = []): void
    {
        $isBasicAuth = $this->isBasicAuthentication($key, $secret);

        if ($isBasicAuth) {
            $this->apikey = $key;
            $this->apisecret = $secret;
        } else {
            $this->apitoken = $key;
            $this->version = Config::SMS_VERSION;
        }

        $this->initSettings($call, $settings);
        $this->setSettings();
    }

    /**
     * Magic method to call a mailjet resource.
     *
     * @param string $method Http method
     * @param string $resource mailjet resource
     * @param string $action mailjet resource action
     * @param array $args Request arguments
     *
     * @return Response server response
     */
    private function _call(string $method, string $resource, string $action, array $args): Response
    {
        $args = array_merge([
            'id' => '',
            'actionid' => '',
            'filters' => [],
            'body' => 'GET' === $method ? null : '{}',
        ], array_change_key_case($args));

        $url = $this->buildURL($resource, $action, (string) $args['id'], $args['actionid']);

        $contentType = ('csvdata/text:plain' === $action || 'csverror/text:csv' === $action) ? 'text/plain' : 'application/json';
        
        $isBasicAuth = $this->isBasicAuthentication($this->apikey, $this->apisecret);
        $auth = $isBasicAuth ? [$this->apikey, $this->apisecret] : [$this->apitoken];

        $request = new Request(
            $auth,
            $method,
            $url,
            $args['filters'],
            $args['body'],
            $contentType,
            $this->requestOptions
        );

        return $request->call($this->call);
    }

    /**
     * Build the base API url depending on wether user need a secure connection
     * or not.
     *
     * @return string the API url;
     */
    private function getApiUrl(): string
    {
        $h = true === $this->secure ? 'https' : 'http';

        return sprintf('%s://%s/%s/', $h, $this->url, $this->version);
    }

    /**
     * Checks that both parameters are strings, which means
     * that basic authentication will be required.
     *
     * @param mixed $key
     * @param mixed $secret
     * @return bool flag
     */
    private function isBasicAuthentication($key, $secret): bool
    {
        return !empty($key) && !empty($secret);
    }

    /**
     * Build the final call url without query strings.
     *
     * @param string $resource Mailjet resource
     * @param string $action Mailjet resource action
     * @param string $id mailjet resource id
     * @param string $actionid mailjet resource actionid
     *
     * @return string final call url
     */
    private function buildURL(string $resource, string $action, string $id, string $actionid): string
    {
        $path = 'REST';

        if (\in_array($resource, $this->smsResources, true)) {
            $path = '';
        } elseif (\in_array($action, $this->dataAction, true)) {
            $path = 'DATA';
        } elseif ('v4' === $this->version) {
            $path = '';
        }

        $arrayFilter = [$path, $resource, $id, $action, $actionid];

        return $this->getApiUrl().implode('/', array_filter($arrayFilter));
    }

    /**
     * Temporary set the variables generating the url.
     *
     * @param array $options contain temporary modifications for the client
     * @param array $resource may contain the version linked to the resource
     */
    private function setOptions(array $options, array $resource): void
    {
        $this->version = (string) ($options['version'] ?? $resource[2] ?? Config::MAIN_VERSION);
        $this->url = (string) ($options['url'] ?? Config::MAIN_URL);
        $this->secure = $options['secured'] ?? Config::SECURED;
        $this->call = $options['call'] ?? true;
        $this->changed = true;
    }

    /**
     * set back the variables generating the url.
     */
    private function setSettings(): void
    {
        if (!empty($this->settings['url']) && \is_string($this->settings['url'])) {
            $this->url = $this->settings['url'];
        }

        if (!empty($this->settings['version']) && \is_string($this->settings['version'])) {
            $this->version = $this->settings['version'];
        }

        if (isset($this->settings['call']) && \is_bool($this->settings['call'])) {
            $this->call = $this->settings['call'];
        }

        if (isset($this->settings['secured']) && \is_bool($this->settings['secured'])) {
            $this->secure = $this->settings['secured'];
        }

        $this->changed = false;
    }

    /**
     * Set a backup if the variables generating the url are change during a call.
     * @param bool $call
     * @param array $settings
     */
    private function initSettings(bool $call, array $settings = []): void
    {
        $this->settings['url'] = $settings['url'] ?? $this->url;
        $this->settings['version'] = $settings['version'] ?? $this->version;
        $this->settings['call'] = $call;
        $this->settings['secured'] = $settings['secured'] ?? $this->secure;

        $this->changed = false;
    }
}
