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
use Zend\Json\Json;
use Zend\InputFilter;

/**
 * Contactslistsignup Api
 *
 * Contacts list signup request
 *
 * @see http://mjdemo.poxx.net/~shubham/contactslistsignup.html
 */
class Contactslistsignup extends AbstractApi
{

    /**
     * Api name
     */
    protected $name = 'contactslistsignup';

    /**
     * Supported Filters
     */
    protected $filters = array(
        'APIKey' => array(
            'name' => 'APIKey',
            'required' => false
            ),
        'Contact' => array(
            'name' => 'Contact',
            'required' => false
            ),
        'ContactsList' => array(
            'name' => 'ContactsList',
            'required' => false
            ),
        'Domain' => array(
            'name' => 'Domain',
            'required' => false
            ),
        'Email' => array(
            'name' => 'Email',
            'required' => false
            ),
        'LocalPart' => array(
            'name' => 'LocalPart',
            'required' => false
            ),
        'MaxConfirmAt' => array(
            'name' => 'MaxConfirmAt',
            'required' => false
            ),
        'MaxSignupAt' => array(
            'name' => 'MaxSignupAt',
            'required' => false
            ),
        'MinConfirmAt' => array(
            'name' => 'MinConfirmAt',
            'required' => false
            ),
        'MinSignupAt' => array(
            'name' => 'MinSignupAt',
            'required' => false
            ),
        'Source' => array(
            'name' => 'Source',
            'required' => false
            ),
        'SourceID' => array(
            'name' => 'SourceID',
            'required' => false
            )
        );

    /**
     * Supported properties
     */
    protected $properties = array(
        'ConfirmAt' => array(
            'name' => 'ConfirmAt',
            'dataType' => 'int',
            'required' => false
            ),
        'ConfirmIp' => array(
            'name' => 'ConfirmIp',
            'dataType' => 'string',
            'required' => false
            ),
        'ContactID' => array(
            'name' => 'ContactID',
            'dataType' => 'int',
            'required' => false
            ),
        'Email' => array(
            'name' => 'Email',
            'dataType' => 'string',
            'required' => true
            ),
        'ID' => array(
            'name' => 'ID',
            'dataType' => 'int',
            'required' => false
            ),
        'ListID' => array(
            'name' => 'ListID',
            'dataType' => 'int',
            'required' => true
            ),
        'RecipientID' => array(
            'name' => 'RecipientID',
            'dataType' => 'int',
            'required' => false
            ),
        'SignupAt' => array(
            'name' => 'SignupAt',
            'dataType' => 'int',
            'required' => false
            ),
        'SignupIp' => array(
            'name' => 'SignupIp',
            'dataType' => 'string',
            'required' => false
            ),
        'SignupKey' => array(
            'name' => 'SignupKey',
            'dataType' => 'string',
            'required' => false
            ),
        'Source' => array(
            'name' => 'Source',
            'dataType' => 'string',
            'required' => true
            ),
        'SourceId' => array(
            'name' => 'SourceId',
            'dataType' => 'int',
            'required' => false
            )
        );

    /**
     * Post __construct initializations
     */
    public function init()
    {
        $this->getResultSetPrototype()->setObjectPrototype(new Mailjet\Model\Contactslistsignup);
        $this->setUrl('http://api.mailjet.com/v3/REST/contactslistsignup/');
    }

    /**
     * Return list of Mailjet\Model\Contactslistsignup
     *
     * Return list of Mailjet\Model\Contactslistsignup filtered by $filters if provided
     *
     *
     * @param array key/val filters
     * @return ResultSet\ResultSet List of Mailjet\Model\Contactslistsignup
     */
    public function getList(array $filters = array())
    {
        return parent::_list($filters);
    }

    /**
     * Return list of Mailjet\Model\Contactslistsignup with APIKey = $APIKey
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
     * Return list of Mailjet\Model\Contactslistsignup with Contact = $Contact
     *
     * @param int
     * @return ResultSet\ResultSet
     */
    public function getByContact($Contact)
    {
        $result = $this->getList(array('Contact' => $Contact));
        return $result;
    }

    /**
     * Return list of Mailjet\Model\Contactslistsignup with ContactsList =
     * $ContactsList
     *
     * @param int
     * @return ResultSet\ResultSet
     */
    public function getByContactsList($ContactsList)
    {
        $result = $this->getList(array('ContactsList' => $ContactsList));
        return $result;
    }

    /**
     * Return list of Mailjet\Model\Contactslistsignup with Domain = $Domain
     *
     * @param string
     * @return ResultSet\ResultSet
     */
    public function getByDomain($Domain)
    {
        $result = $this->getList(array('Domain' => $Domain));
        return $result;
    }

    /**
     * Return list of Mailjet\Model\Contactslistsignup with Email = $Email
     *
     * @param string
     * @return ResultSet\ResultSet
     */
    public function getByEmail($Email)
    {
        $result = $this->getList(array('Email' => $Email));
        return $result;
    }

    /**
     * Return list of Mailjet\Model\Contactslistsignup with LocalPart = $LocalPart
     *
     * @param string
     * @return ResultSet\ResultSet
     */
    public function getByLocalPart($LocalPart)
    {
        $result = $this->getList(array('LocalPart' => $LocalPart));
        return $result;
    }

    /**
     * Return list of Mailjet\Model\Contactslistsignup with MaxConfirmAt =
     * $MaxConfirmAt
     *
     * @param int
     * @return ResultSet\ResultSet
     */
    public function getByMaxConfirmAt($MaxConfirmAt)
    {
        $result = $this->getList(array('MaxConfirmAt' => $MaxConfirmAt));
        return $result;
    }

    /**
     * Return list of Mailjet\Model\Contactslistsignup with MaxSignupAt = $MaxSignupAt
     *
     * @param int
     * @return ResultSet\ResultSet
     */
    public function getByMaxSignupAt($MaxSignupAt)
    {
        $result = $this->getList(array('MaxSignupAt' => $MaxSignupAt));
        return $result;
    }

    /**
     * Return list of Mailjet\Model\Contactslistsignup with MinConfirmAt =
     * $MinConfirmAt
     *
     * @param int
     * @return ResultSet\ResultSet
     */
    public function getByMinConfirmAt($MinConfirmAt)
    {
        $result = $this->getList(array('MinConfirmAt' => $MinConfirmAt));
        return $result;
    }

    /**
     * Return list of Mailjet\Model\Contactslistsignup with MinSignupAt = $MinSignupAt
     *
     * @param int
     * @return ResultSet\ResultSet
     */
    public function getByMinSignupAt($MinSignupAt)
    {
        $result = $this->getList(array('MinSignupAt' => $MinSignupAt));
        return $result;
    }

    /**
     * Return list of Mailjet\Model\Contactslistsignup with Source = $Source
     *
     * @param string
     * @return ResultSet\ResultSet
     */
    public function getBySource($Source)
    {
        $result = $this->getList(array('Source' => $Source));
        return $result;
    }

    /**
     * Return list of Mailjet\Model\Contactslistsignup with SourceID = $SourceID
     *
     * @param int
     * @return ResultSet\ResultSet
     */
    public function getBySourceID($SourceID)
    {
        $result = $this->getList(array('SourceID' => $SourceID));
        return $result;
    }

    /**
     * Return Mailjet\Model\Contactslistsignup with id = $id
     *
     * @param int Id of resource to get
     * @return Mailjet\Model\Contactslistsignup
     */
    public function get($id)
    {
        if (empty($id)) {
            throw new Exception\InvalidArgumentException("You must specify the ID");
        }

        return parent::_get($id);
    }


}

