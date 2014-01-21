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
 * User Api
 *
 * Mailjet User account definition
 *
 * @see http://mjdemo.poxx.net/~shubham/user.html
 */
class User extends AbstractApi
{

    /**
     * Api name
     */
    protected $name = 'user';

    /**
     * Supported Filters
     */
    protected $filters = array(
        'IsActivated' => array(
            'name' => 'IsActivated',
            'required' => false
            ),
        'NewEmail' => array(
            'name' => 'NewEmail',
            'required' => false
            ),
        'UserName' => array(
            'name' => 'UserName',
            'required' => false
            )
        );

    /**
     * Supported properties
     */
    protected $properties = array(
        'AccountManagerAdminId' => array(
            'name' => 'AccountManagerAdminId',
            'dataType' => 'int',
            'required' => false
            ),
        'CreatedAt' => array(
            'name' => 'CreatedAt',
            'dataType' => '\Datetime',
            'required' => false
            ),
        'Email' => array(
            'name' => 'Email',
            'dataType' => 'string',
            'required' => false
            ),
        'ID' => array(
            'name' => 'ID',
            'dataType' => 'int',
            'required' => false
            ),
        'IsActivated' => array(
            'name' => 'IsActivated',
            'dataType' => 'bool',
            'required' => false
            ),
        'IsBanned' => array(
            'name' => 'IsBanned',
            'dataType' => 'bool',
            'required' => false
            ),
        'IsBeta' => array(
            'name' => 'IsBeta',
            'dataType' => 'bool',
            'required' => false
            ),
        'IsCashAllowed' => array(
            'name' => 'IsCashAllowed',
            'dataType' => 'bool',
            'required' => false
            ),
        'IsCompleted' => array(
            'name' => 'IsCompleted',
            'dataType' => 'bool',
            'required' => false
            ),
        'IsProfileCompleted' => array(
            'name' => 'IsProfileCompleted',
            'dataType' => 'bool',
            'required' => false
            ),
        'IsRulesAccepted' => array(
            'name' => 'IsRulesAccepted',
            'dataType' => 'bool',
            'required' => false
            ),
        'IsTemporaryBlocked' => array(
            'name' => 'IsTemporaryBlocked',
            'dataType' => 'bool',
            'required' => false
            ),
        'LastLoginAt' => array(
            'name' => 'LastLoginAt',
            'dataType' => '\Datetime',
            'required' => false
            ),
        'Locale' => array(
            'name' => 'Locale',
            'dataType' => 'string',
            'required' => false
            ),
        'MaxAllowedAPIKeys' => array(
            'name' => 'MaxAllowedAPIKeys',
            'dataType' => 'int',
            'required' => false
            ),
        'ModifiedAt' => array(
            'name' => 'ModifiedAt',
            'dataType' => '\Datetime',
            'required' => false
            ),
        'NewEmail' => array(
            'name' => 'NewEmail',
            'dataType' => 'string',
            'required' => false
            ),
        'NewPasswordRequestedAt' => array(
            'name' => 'NewPasswordRequestedAt',
            'dataType' => '\Datetime',
            'required' => false
            ),
        'Timezone' => array(
            'name' => 'Timezone',
            'dataType' => 'string',
            'required' => false
            ),
        'UMPScoreLast' => array(
            'name' => 'UMPScoreLast',
            'dataType' => 'string',
            'required' => false
            ),
        'UMPScoreOrig' => array(
            'name' => 'UMPScoreOrig',
            'dataType' => 'string',
            'required' => false
            ),
        'Username' => array(
            'name' => 'Username',
            'dataType' => 'string',
            'required' => true
            ),
        'WarnedRatelimitAt' => array(
            'name' => 'WarnedRatelimitAt',
            'dataType' => '\Datetime',
            'required' => false
            )
        );

    /**
     * Post __construct initializations
     */
    public function init()
    {
        $this->getResultSetPrototype()->setObjectPrototype(new Mailjet\Model\User);
        $this->setUrl('http://api.mailjet.com/v3/REST/user/');
        $hydrator = $this->getResultSetPrototype()->getHydrator();
        $hydrator->addStrategy('CreatedAt', new TRFC3339DateTimeStrategy());
        $hydrator->addStrategy('LastLoginAt', new TRFC3339DateTimeStrategy());
        $hydrator->addStrategy('ModifiedAt', new TRFC3339DateTimeStrategy());
        $hydrator->addStrategy('NewPasswordRequestedAt', new TRFC3339DateTimeStrategy());
        $hydrator->addStrategy('WarnedRatelimitAt', new TRFC3339DateTimeStrategy());
    }

    /**
     * Return list of Mailjet\Model\User
     *
     * Return list of Mailjet\Model\User filtered by $filters if provided
     *
     *
     * @param array key/val filters
     * @return ResultSet\ResultSet List of Mailjet\Model\User
     */
    public function getList(array $filters = array())
    {
        return parent::_list($filters);
    }

    /**
     * Return list of Mailjet\Model\User with IsActivated = $IsActivated
     *
     * @param bool
     * @return ResultSet\ResultSet
     */
    public function getByIsActivated($IsActivated)
    {
        $result = $this->getList(array('IsActivated' => $IsActivated));
        return $result;
    }

    /**
     * Return list of Mailjet\Model\User with NewEmail = $NewEmail
     *
     * @param string
     * @return ResultSet\ResultSet
     */
    public function getByNewEmail($NewEmail)
    {
        $result = $this->getList(array('NewEmail' => $NewEmail));
        return $result;
    }

    /**
     * Return list of Mailjet\Model\User with UserName = $UserName
     *
     * @param string
     * @return ResultSet\ResultSet
     */
    public function getByUserName($UserName)
    {
        $result = $this->getList(array('UserName' => $UserName));
        return $result;
    }

    /**
     * Return Mailjet\Model\User with id = $id
     *
     * @param int Id of resource to get
     * @return Mailjet\Model\User
     */
    public function get($id)
    {
        if (empty($id)) {
            throw new Exception\InvalidArgumentException("You must specify the ID");
        }

        return parent::_get($id);
    }

    /**
     * Update existing User
     *
     * @param Mailjet\Model\User
     * @return Mailjet\Model\User|false Object created or false
     */
    public function update(Mailjet\Model\User &$User)
    {
        return parent::_update($User);
    }


}

