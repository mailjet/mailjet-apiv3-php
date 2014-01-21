<?php
/**
 * MailJet Api
 *
 * Copyright (c) 2013, Mailjet.
 * All rights reserved.
 *
 * Redistribution and use in source and binary forms, with or without modification,
 * are permitted provided that the following conditions are met:
 *
 *     * Redistributions of source code must retain the above copyright notice,
 *       this list of conditions and the following disclaimer.
 *
 *     * Redistributions in binary form must reproduce the above copyright notice,
 *       this list of conditions and the following disclaimer in the documentation
 *       and/or other materials provided with the distribution.
 *
 *     * Neither the name of Zend Technologies USA, Inc. nor the names of its
 *       contributors may be used to endorse or promote products derived from this
 *       software without specific prior written permission.
 *
 * THIS SOFTWARE IS PROVIDED BY THE COPYRIGHT HOLDERS AND CONTRIBUTORS "AS IS" AND
 * ANY EXPRESS OR IMPLIED WARRANTIES, INCLUDING, BUT NOT LIMITED TO, THE IMPLIED
 * WARRANTIES OF MERCHANTABILITY AND FITNESS FOR A PARTICULAR PURPOSE ARE
 * DISCLAIMED. IN NO EVENT SHALL THE COPYRIGHT OWNER OR CONTRIBUTORS BE LIABLE FOR
 * ANY DIRECT, INDIRECT, INCIDENTAL, SPECIAL, EXEMPLARY, OR CONSEQUENTIAL DAMAGES
 * (INCLUDING, BUT NOT LIMITED TO, PROCUREMENT OF SUBSTITUTE GOODS OR SERVICES;
 * LOSS OF USE, DATA, OR PROFITS; OR BUSINESS INTERRUPTION) HOWEVER CAUSED AND ON
 * ANY THEORY OF LIABILITY, WHETHER IN CONTRACT, STRICT LIABILITY, OR TORT
 * (INCLUDING NEGLIGENCE OR OTHERWISE) ARISING IN ANY WAY OUT OF THE USE OF THIS
 * SOFTWARE, EVEN IF ADVISED OF THE POSSIBILITY OF SUCH DAMAGE.
 */
namespace Mailjet\Api;

use ZendService\Api\Api as ZendServiceApi;
use Zend\Http\Client as HttpClient;
use ArrayObject;
use Zend\Stdlib\Hydrator\ClassMethods;
use Zend\Json\Json;
use Mailjet\Api\ResultSet\ResultSetInterface;
use Mailjet\Api\ResultSet\ResultSet;
use Zend\InputFilter\InputFilter;
use Zend\InputFilter\Factory;
use Zend\InputFilter\InputFilterAwareInterface;
use Zend\InputFilter\InputFilterInterface;
use Zend\Stdlib\Hydrator\HydratorInterface;
use Mailjet\Model\ModelInterface;
use Mailjet\Model\Apikey;

/**
 * Mailjet Abstract Api
 *
 * @link http://mailjet.com/
 * @copyright Copyright (c) 2013 Mailjet.
 * @license http://framework.zend.com/license/new-bsd New BSD License
 */
abstract class AbstractApi implements InputFilterAwareInterface
{

    /**
     * Base URI for all API calls
     */
    const API_BASE_URI = 'http://api.mailjet.com/v3/REST';

    /**
     * Mailjet Secret Key
     *
     * @var string
     */
    protected $secretKey;

    /**
     * Mailjet Access Key
     *
     * @var string
     */
    protected $accessKey;

    /**
     * Api Key ID
     *
     * @var int
     */
    // protected $akid = 9248; //16 FIXME

    /**
     *
     * @var HttpClient
     */
    protected $httpClient;

    /**
     * Api
     *
     * @var ZendServiceApi
     */
    protected $api;

    /**
     * Error Msg
     *
     * @var string
     */
    protected $errorMsg;

    /**
     * HTTP error code
     *
     * @var string
     */
    protected $errorCode;

    /**
     * Registry of apis
     *
     * @var array
     */
    protected $apis = array();

    /**
     *
     * @var ResultSetInterface
     */
    protected $resultSetPrototype = null;

    /**
     *
     * @var array
     */
    protected $properties = array();

    /**
     * InputFilter attached to properties
     *
     * @var InputFilterInterface
     */
    protected $inputFilter = null;

    /**
     *
     * @var array
     */
    protected $filters = array();

    /**
     * InputFilter attached to filters
     *
     * @var InputFilterInterface
     */
    protected $filtersInputFilter = null;

    /**
     * Api name
     *
     * @var string
     */
    protected $name; // protected $name = 'apikey';

    /**
     * Constructor
     *
     * @param null|string $accessKey
     *            Access Key
     * @param null|string $secretKey
     *            Secret Key
     * @param null|HttpClient $httpClient
     */
    public function __construct($accessKey = null, $secretKey = null, ZendServiceApi $api = null, HttpClient $httpClient = null)
    {
        $this->setKeys($accessKey, $secretKey);

        if (null === $httpClient) {
            $httpClient = new HttpClient();
            $adapter = new HttpClient\Adapter\Curl();
            $adapter->setCurlOption(CURLOPT_USERPWD, $accessKey . ':' . $secretKey);
            $httpClient->setAdapter($adapter);
        }

        if (null === $api) {
            $api = new ZendServiceApi($httpClient);
        }

        if (! $this->resultSetPrototype instanceof ResultSetInterface) {
            $this->resultSetPrototype = new ResultSet(new ClassMethods(false), new ArrayObject());
        }

        $defaultApiQueryParams = array(
            'format' => 'json',
        );

        $api->setQueryParams($defaultApiQueryParams);

        $this->api = $api;
        $this->setUrl( static::API_BASE_URI );
        /*$this->setUrl(static::API_BASE_URI . '/' . $this->name);

        if ('apikey' !== $this->name ) {
            $this->api->setQueryParams(array_merge(
                $defaultApiQueryParams,
                array(
                    'akid' => $this->getAkid() //TODO TO REMOVE AFTER TEST
                )
            ));
        }*/


        $this->init();
    }

    /**
     * Post __construct initialisation
     */
    public function init()
    {
    }

    /**
     * Get AKID
     * @todo request
     * @return int
     */
    protected function getAkid()
    {
        if (! $apikey = $this->api('apikey')->getByApiKey($this->accessKey)) {
            throw new Exception\RuntimeException(
                'Authentication failed, please check the username and the API\'s key provided'
            );
        }

        return 16; //$apikey->getId(); FIXME
    }
    /**
     * Set the keys to use when accessing SQS.
     *
     * @param string|null $accessKey
     *            Set the current Access Key
     * @param string|null $secretKey
     *            Set the current Secret Key
     * @return self
     */
    public function setKeys($accessKey, $secretKey)
    {
        $this->accessKey = $accessKey;
        $this->secretKey = $secretKey;

        return $this;
    }

    /**
     * Get the API adapter
     *
     * @return ZendServiceApi
     */
    public function getApiAdapter()
    {
        return $this->api;
    }

    /**
     * Set the API adapter
     *
     * @param  ZendServiceApi $api
     * @return self
     */
    public function setApiAdapter(ZendServiceApi $api)
    {
        $this->api = $api;

        return $this;
    }

    /**
     * Get the error msg of the last HTTP call
     *
     * @return string
     */
    public function getErrorMsg()
    {

        if ($invalidInput = $this->getInputFilter()->getInvalidInput()) {
            return json_encode($this->getInputFilter()->getMessages());
        }
        if ($invalidInput = $this->getFiltersInputFilter()->getInvalidInput()) {
            return json_encode($this->getFiltersInputFilter()->getMessages());
        }
        $response = $this->getHttpClient()->getResponse();
        $reasonPhrase = $response->getReasonPhrase();

        try {
            $error = Json::decode($response->getBody());
            if (isset($error->ErrorInfo)) {
                $reasonPhrase .= ' : ' .  $error->ErrorInfo;
            }
        } catch (\Exception $e) {

        }

        if ($reasonPhrase) {
            return $reasonPhrase;
        }

        if (!$this->api->isSuccess()) {
            return $this->api->getErrorMsg();
        }

        return $this->api->getErrorMsg();
    }

    /**
     * Get the error code of the last HTTP call
     *
     * @return string
     */
    public function getErrorCode()
    {
        return $this->api->getStatusCode();
    }

    /**
     * Return true is the last call was successful
     *
     * @return bool
     */
    public function isSuccess()
    {
        if ($this->getInputFilter()->getInvalidInput()) {
            return false;
        }
        if ($this->getFiltersInputFilter()->getInvalidInput()) {
            return false;
        }

        return $this->api->isSuccess();
    }

    /**
     * Get the HTTP client
     *
     * @return HttpClient
     */
    public function getHttpClient()
    {
        return $this->api->getHttpClient();
    }

    /**
     * Set the HTTP client
     *
     * @param  HttpClient $http
     * @return self
     */
    public function setHttpClient(HttpClient $http)
    {
        $this->api->setHttpClient($http);

        return $this;
    }

    /**
     * Set the API URL
     *
     * @param  string $url
     * @return self
     */
    public function setUrl($url)
    {
        $this->api->setUrl($url);

        return $this;
    }

    /**
     * Get the API URL
     *
     * @return string
     */
    public function getUrl()
    {
        return $this->api->getUrl();
    }

    /**
     * Get named Api
     *
     * @param  string $name
     * @param  array  $params
     * @return self
     */
    public function api($name)
    {
        $name = strtolower($name);

        if (! array_key_exists($name, $this->apis)) {
            $className = sprintf('Mailjet\Api\%s', ucfirst($name));
            $this->apis[$name] = new $className($this->accessKey, $this->secretKey, $this->getApiAdapter(), $this->getHttpClient());
        }

        return $this->apis[$name];
    }

    /**
     * Closure use to lazy loading of Campaign
     *
     * @return ModelInterface
     */
    public function lazyLoadModelClosure($apiName, $id)
    {
        $dataMapper = $this;

        return function () use ($id, $dataMapper, $apiName) {
            $api = $dataMapper->api($apiName);
            $model = $api->get($id);

            return $model;
        };
    }

    /**
     * Closure use to lazy loading of Campaign
     *
     * @return ModelInterface
     */
    public function lazyLoadModelCollectionClosure($apiName, $id)
    {
        $dataMapper = $this;

        return function () use ($id, $dataMapper, $apiName) {
            $api = $dataMapper->api($apiName);
            $resultSet = $api->getList(array('ID' => $id));

            return $resultSet;
        };
    }

    /**
     * Retrieve input filter applied to $filters
     *
     * @return InputFilterInterface
     */
    public function getFiltersInputFilter()
    {
        if (! $this->filtersInputFilter) {
            $inputFilter = new InputFilter();
            $factory = new Factory();
            foreach ($this->filters as $filter) {
                $inputFilter->add($factory->createInput($filter));
            }
            $this->filtersInputFilter = $inputFilter;
        }

        return $this->filtersInputFilter;
    }

    /**
     * Set input filter applied to $properties
     *
     * @param  InputFilterInterface $inputFilter
     * @return self
     */
    public function setInputFilter(InputFilterInterface $inputFilter)
    {
        $this->inputFilter = $inputFilter;

        return $this;
    }

    /**
     * Retrieve input filter applied to $properties
     *
     * @return InputFilterInterface
     */
    public function getInputFilter()
    {
        if (! $this->inputFilter instanceof InputFilterInterface) {
            $inputFilter = new InputFilter();
            $factory = new Factory();
            foreach ($this->properties as $properties) {
                $inputFilter->add($factory->createInput($properties));
            }
            $this->inputFilter = $inputFilter;
        }

        return $this->inputFilter;
    }

    /**
     * Get select result prototype
     *
     * @return ResultSet\ResultSetInterface
     */
    public function getResultSetPrototype()
    {
        return $this->resultSetPrototype;
    }

    /**
     * Get the hydrator to use for each row object
     *
     * @return HydratorInterface
     */
    public function getHydrator()
    {
        return $this->getResultSetPrototype()->getHydrator();
    }

    /**
     * Return list of ModelInterface
     *
     * Return list of ModelInterface filtered by $filters if provided
     *
     * @param array $filters
     *            key/val filters
     * @return ResultSet\ResultSet false of ModelInterface
     */
    protected function _list(array $filters = array())
    {
        $inputFilter = $this->getFiltersInputFilter();
        $inputFilter->setData($filters);

        if (! $inputFilter->isValid()) {
            return false;
        }

        $api = $this;

        $this->api->setApi('getList', function ($params) use($api) {
            return array(
                'url' => $api->getUrl() .'/?' . http_build_query($params[0]),
                'header' => array(
                    'Content-Type' => 'application/json'
                ),
                'method' => 'GET',
                'response' => array(
                    'format' => 'json',
                    'valid_codes' => array(
                        200,
                        203
                    )
                )
            );
        });

        if ($result = $this->api->getList($filters)) {
            $resultSet = clone $this->getResultSetPrototype();
            $resultSet->initialize($result['Data']);

            return $resultSet;
        }

        return $result;
    }

    /**
     * Return ModelInterface
     *
     * @param
     *            int|null Id of resource to get
     * @return ModelInterface
     */
    protected function _get($id = null)
    {

        $api = $this;

        $this->api->setApi('get', function ($params) use ($api) {
            $url = $api->getUrl();

            if (isset($params[0])) {
                $url .= '/' . $params[0];
            }

            return array(
                'url' => $url,
                'header' => array(
                    'Content-Type' => 'application/json'
                ),
                'method' => 'GET',
                'response' => array(
                    'format' => 'json',
                    'valid_codes' => array(
                        200,
                        203
                    )
                )
            );
        });

        if ($result = $this->api->get($id)) {
            $resultSet = clone $this->getResultSetPrototype();
            $resultSet->initialize($result['Data']);
            return $resultSet->current();
        }
        return $result;
    }

    /**
     * Common update/create process
     *
     * @param  ModelInterface $model
     * @return ModelInterface or false
     */
    protected function _createOrUpdateProcess(ModelInterface &$model)
    {

        $data = $this->getHydrator()->extract($model);

        $inputFilter = $this->getInputFilter();
        $inputFilter->setData($data);

        if (! $inputFilter->isValid()) {
            return false;
        }

        $url = $this->getUrl();

        if ($id = $model->getId()) {
            $apiMethod = 'update';
            $verb = 'PUT';
            $url .= '/' . $id;

        } else {
            $apiMethod = 'create';
            $verb = 'POST';
        }
        // unset properties where setting not allowed (auto generated)
        unset($data['CreatedAt'], $data['ID']);

        while (list($key, $value) = each($data)) {
            if (null === $value) { //TODO May be unset unique key if is PUT ???
                unset($data[$key]);
                continue;
            }
            if (is_array($value) && isset($value['ID'])) {
                $data[$key . 'ID'] = $value['ID'];
                unset($data[$key]);
            }
        }

        $this->api->setApi($apiMethod, function ($params) use ($url, $verb) {
            $id = $params[0];
            $data = $params[1];

            $result = array(
                'url' => $url,
                'header' => array(
                    'Content-Type' => 'application/json'
                ),
                'method' => $verb,
                'body' => json_encode($data),
                'response' => array(
                    'format' => 'json',
                    'valid_codes' => array(
                        200,
                        204,
                        204,
                        201,
                        202
                    )
                )
            );

            return $result;
        });

        if ($result = $this->api->$apiMethod($id, $data)) {
            $data = $result['Data'];
            if (!empty($data)) {
                return $this->getHydrator()->hydrate($data[0], $model);
            }
        }

        return false;
    }

    /**
     * Update a existing model item
     *
     * @param  ModelInterface $model
     * @return ModelInterface false
     */
    protected function _update(ModelInterface &$model)
    {
        if (! ($id = $model->getId())) {
            throw new Exception\InvalidArgumentException("You must specify the ID");
        }

        return $this->_createOrUpdateProcess($model);
    }

    /**
     * Create a new model item
     *
     * @param  ModelInterface $model
     * @return ModelInterface false created or false
     */
    protected function _create(ModelInterface &$model)
    {
        return $this->_createOrUpdateProcess($model);
    }

    /**
     * Delete the $id entry
     *
     * @param int $id
     *            Id to delete
     * @return bool True on success
     */
    protected function _delete($id)
    {
        if (empty($id)) {
            throw new Exception\InvalidArgumentException("You must specify the ID");
        }

        $api = $this;

        $this->api->setApi('delete', function ($params) use ($api) {
            $id = $params[0];

            return array(
                'url' => $api->getUrl() .'/' . $id,
                'header' => array(
                    'Content-Type' => 'application/json'
                ),
                'method' => 'DELETE',
                'response' => array(
                    'format' => 'json',
                    'valid_codes' => array(
                        200,
                        204
                    )
                )
            );
        });
        $this->api->delete($id);

        return $this->api->isSuccess();
    }
}
