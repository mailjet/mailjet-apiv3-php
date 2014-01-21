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
 * Contactslist Api
 *
 * API key contact lists
 *
 * @see http://mjdemo.poxx.net/~shubham/contactslist.html
 */
class Contactslist extends AbstractApi
{

    /**
     * Api name
     */
    protected $name = 'contactslist';

    /**
     * Supported Filters
     */
    protected $filters = array(
        'Address' => array(
            'name' => 'Address',
            'required' => false
            ),
        'ExcludeID' => array(
            'name' => 'ExcludeID',
            'required' => false
            ),
        'IsDeleted' => array(
            'name' => 'IsDeleted',
            'required' => false
            ),
        'Name' => array(
            'name' => 'Name',
            'required' => false
            )
        );

    /**
     * Supported properties
     */
    protected $properties = array(
        'Address' => array(
            'name' => 'Address',
            'dataType' => 'string',
            'required' => false
            ),
        'CreatedAt' => array(
            'name' => 'CreatedAt',
            'dataType' => '\Datetime',
            'required' => false
            ),
        'ID' => array(
            'name' => 'ID',
            'dataType' => 'int',
            'required' => false
            ),
        'IsDeleted' => array(
            'name' => 'IsDeleted',
            'dataType' => 'bool',
            'required' => false
            ),
        'Name' => array(
            'name' => 'Name',
            'dataType' => 'string',
            'required' => false
            ),
        'SubscriberCount' => array(
            'name' => 'SubscriberCount',
            'dataType' => 'int',
            'required' => false
            ),
        'UMPStatus' => array(
            'name' => 'UMPStatus',
            'dataType' => 'int',
            'required' => false
            )
        );

    /**
     * Post __construct initializations
     */
    public function init()
    {
        $this->getResultSetPrototype()->setObjectPrototype(new Mailjet\Model\Contactslist);
        $this->setUrl('http://api.mailjet.com/v3/REST/contactslist/');
        $hydrator = $this->getResultSetPrototype()->getHydrator();
        $hydrator->addStrategy('CreatedAt', new TRFC3339DateTimeStrategy());
    }

    /**
     * Return list of Mailjet\Model\Contactslist
     *
     * Return list of Mailjet\Model\Contactslist filtered by $filters if provided
     *
     *
     * @param array key/val filters
     * @return ResultSet\ResultSet List of Mailjet\Model\Contactslist
     */
    public function getList(array $filters = array())
    {
        return parent::_list($filters);
    }

    /**
     * Return Mailjet\Model\Contactslist
     *
     * @param string
     * @return Mailjet\Model\Contactslist
     */
    public function getByAddress($Address)
    {
        return $this->_get($Address);
    }

    /**
     * Return list of Mailjet\Model\Contactslist with ExcludeID = $ExcludeID
     *
     * @param int
     * @return ResultSet\ResultSet
     */
    public function getByExcludeID($ExcludeID)
    {
        $result = $this->getList(array('ExcludeID' => $ExcludeID));
        return $result;
    }

    /**
     * Return list of Mailjet\Model\Contactslist with IsDeleted = $IsDeleted
     *
     * @param bool
     * @return ResultSet\ResultSet
     */
    public function getByIsDeleted($IsDeleted)
    {
        $result = $this->getList(array('IsDeleted' => $IsDeleted));
        return $result;
    }

    /**
     * Return list of Mailjet\Model\Contactslist with Name = $Name
     *
     * @param string
     * @return ResultSet\ResultSet
     */
    public function getByName($Name)
    {
        $result = $this->getList(array('Name' => $Name));
        return $result;
    }

    /**
     * Return Mailjet\Model\Contactslist with id = $id
     *
     * @param int Id of resource to get
     * @return Mailjet\Model\Contactslist
     */
    public function get($id)
    {
        if (empty($id)) {
            throw new Exception\InvalidArgumentException("You must specify the ID");
        }

        return parent::_get($id);
    }

    /**
     * Update existing Contactslist
     *
     * @param Mailjet\Model\Contactslist
     * @return Mailjet\Model\Contactslist|false Object created or false
     */
    public function update(Mailjet\Model\Contactslist &$Contactslist)
    {
        return parent::_update($Contactslist);
    }

    /**
     * Create a new Contactslist
     *
     * @param Mailjet\Model\Contactslist
     * @return Mailjet\Model\Contactslist|false Object created or false
     */
    public function create(Mailjet\Model\Contactslist &$Contactslist)
    {
        return parent::_create($Contactslist);
    }

    /**
     * Delete the Contactslist with id = $id
     *
     * @param integer Id to delete
     * @return bool True on success
     */
    public function delete($id)
    {
        return parent::_delete($id);
    }


}

