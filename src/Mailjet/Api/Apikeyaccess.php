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

use Mailjet;
use Mailjet\Model;
use Mailjet\Api\ResultSet;
use Mailjet\Hydrator\Strategy\TRFC3339DateTimeStrategy;
use Zend\Json\Json;
use Zend\InputFilter;

/**
 * Apikeyaccess Api
 *
 * Access rights description on API keys for subaccounts/users
 *
 * @see http://mjdemo.poxx.net/~shubham/apikeyaccess.html
 */
class Apikeyaccess extends AbstractApi
{

    /**
     * Api name
     */
    protected $name = 'apikeyaccess';

    /**
     * Supported Filters
     */
    protected $filters = array(
        'APIKey' => array(
            'name' => 'APIKey',
            'required' => false
            ),
        'IsActive' => array(
            'name' => 'IsActive',
            'required' => false
            ),
        'RealUser' => array(
            'name' => 'RealUser',
            'required' => false
            ),
        'SubAccount' => array(
            'name' => 'SubAccount',
            'required' => false
            ),
        'Token' => array(
            'name' => 'Token',
            'required' => false
            ),
        'User' => array(
            'name' => 'User',
            'required' => false
            )
        );

    /**
     * Supported properties
     */
    protected $properties = array(
        'AllowedAccess' => array(
            'name' => 'AllowedAccess',
            'dataType' => 'string',
            'required' => false
            ),
        'APIKeyID' => array(
            'name' => 'APIKeyID',
            'dataType' => 'int',
            'required' => true
            ),
        'CreatedAt' => array(
            'name' => 'CreatedAt',
            'dataType' => '\Datetime',
            'required' => false
            ),
        'CustomName' => array(
            'name' => 'CustomName',
            'dataType' => 'string',
            'required' => false
            ),
        'ID' => array(
            'name' => 'ID',
            'dataType' => 'int',
            'required' => false
            ),
        'IsActive' => array(
            'name' => 'IsActive',
            'dataType' => 'bool',
            'required' => false
            ),
        'LastActivityAt' => array(
            'name' => 'LastActivityAt',
            'dataType' => '\Datetime',
            'required' => false
            ),
        'RealUserID' => array(
            'name' => 'RealUserID',
            'dataType' => 'int',
            'required' => false
            ),
        'SubaccountID' => array(
            'name' => 'SubaccountID',
            'dataType' => 'int',
            'required' => false
            ),
        'Token' => array(
            'name' => 'Token',
            'dataType' => 'string',
            'required' => false
            ),
        'UpdatedAt' => array(
            'name' => 'UpdatedAt',
            'dataType' => '\Datetime',
            'required' => false
            ),
        'UserID' => array(
            'name' => 'UserID',
            'dataType' => 'int',
            'required' => true
            )
        );

    /**
     * Post __construct initializations
     */
    public function init()
    {
        $this->getResultSetPrototype()->setObjectPrototype(new Mailjet\Model\Apikeyaccess);
        $this->setUrl('http://api.mailjet.com/v3/REST/apikeyaccess/');
        $hydrator = $this->getResultSetPrototype()->getHydrator();
        $hydrator->addStrategy('CreatedAt', new TRFC3339DateTimeStrategy());
        $hydrator->addStrategy('LastActivityAt', new TRFC3339DateTimeStrategy());
        $hydrator->addStrategy('UpdatedAt', new TRFC3339DateTimeStrategy());
    }

    /**
     * Return list of Mailjet\Model\Apikeyaccess
     *
     * Return list of Mailjet\Model\Apikeyaccess filtered by $filters if provided
     *
     *
     * @param array key/val filters
     * @return ResultSet\ResultSet List of Mailjet\Model\Apikeyaccess
     */
    public function getList(array $filters = array())
    {
        return parent::_list($filters);
    }

    /**
     * Return list of Mailjet\Model\Apikeyaccess with APIKey = $APIKey
     *
     * @param int
     * @return ResultSet\ResultSet
     */
    public function getByAPIKey($APIKey)
    {
        $result = $this->getList(array('APIKey' => $APIKey));
        return $result;
    }

    /**
     * Return list of Mailjet\Model\Apikeyaccess with IsActive = $IsActive
     *
     * @param bool
     * @return ResultSet\ResultSet
     */
    public function getByIsActive($IsActive)
    {
        $result = $this->getList(array('IsActive' => $IsActive));
        return $result;
    }

    /**
     * Return list of Mailjet\Model\Apikeyaccess with RealUser = $RealUser
     *
     * @param int
     * @return ResultSet\ResultSet
     */
    public function getByRealUser($RealUser)
    {
        $result = $this->getList(array('RealUser' => $RealUser));
        return $result;
    }

    /**
     * Return list of Mailjet\Model\Apikeyaccess with SubAccount = $SubAccount
     *
     * @param int
     * @return ResultSet\ResultSet
     */
    public function getBySubAccount($SubAccount)
    {
        $result = $this->getList(array('SubAccount' => $SubAccount));
        return $result;
    }

    /**
     * Return list of Mailjet\Model\Apikeyaccess with Token = $Token
     *
     * @param string
     * @return ResultSet\ResultSet
     */
    public function getByToken($Token)
    {
        $result = $this->getList(array('Token' => $Token));
        return $result;
    }

    /**
     * Return list of Mailjet\Model\Apikeyaccess with User = $User
     *
     * @param int
     * @return ResultSet\ResultSet
     */
    public function getByUser($User)
    {
        $result = $this->getList(array('User' => $User));
        return $result;
    }

    /**
     * Return Mailjet\Model\Apikeyaccess with id = $id
     *
     * @param int Id of resource to get
     * @return Mailjet\Model\Apikeyaccess
     */
    public function get($id)
    {
        if (empty($id)) {
            throw new Exception\InvalidArgumentException("You must specify the ID");
        }

        return parent::_get($id);
    }

    /**
     * Update existing Apikeyaccess
     *
     * @param Mailjet\Model\Apikeyaccess
     * @return Mailjet\Model\Apikeyaccess|false Object created or false
     */
    public function update(Mailjet\Model\Apikeyaccess &$Apikeyaccess)
    {
        return parent::_update($Apikeyaccess);
    }

    /**
     * Create a new Apikeyaccess
     *
     * @param Mailjet\Model\Apikeyaccess
     * @return Mailjet\Model\Apikeyaccess|false Object created or false
     */
    public function create(Mailjet\Model\Apikeyaccess &$Apikeyaccess)
    {
        return parent::_create($Apikeyaccess);
    }

    /**
     * Delete the Apikeyaccess with id = $id
     *
     * @param integer Id to delete
     * @return bool True on success
     */
    public function delete($id)
    {
        return parent::_delete($id);
    }


}

