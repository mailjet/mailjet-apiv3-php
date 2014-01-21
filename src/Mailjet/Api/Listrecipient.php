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
use \Datetime;

/**
 * Listrecipient Api
 *
 * Member of a contacts list (link between contact and contactslist)
 *
 * @see http://mjdemo.poxx.net/~shubham/listrecipient.html
 */
class Listrecipient extends AbstractApi
{

    /**
     * Api name
     */
    protected $name = 'listrecipient';

    /**
     * Supported Filters
     */
    protected $filters = array(
        'Active' => array(
            'name' => 'Active',
            'required' => false
            ),
        'Blocked' => array(
            'name' => 'Blocked',
            'required' => false
            ),
        'Contact' => array(
            'name' => 'Contact',
            'required' => false
            ),
        'ContactEmail' => array(
            'name' => 'ContactEmail',
            'required' => false
            ),
        'ContactsList' => array(
            'name' => 'ContactsList',
            'required' => false
            ),
        'LastActivityAt' => array(
            'name' => 'LastActivityAt',
            'required' => false
            ),
        'ListName' => array(
            'name' => 'ListName',
            'required' => false
            ),
        'Opened' => array(
            'name' => 'Opened',
            'required' => false
            ),
        'Status' => array(
            'name' => 'Status',
            'required' => false
            ),
        'Unsub' => array(
            'name' => 'Unsub',
            'required' => false
            )
        );

    /**
     * Supported properties
     */
    protected $properties = array(
        'ContactID' => array(
            'name' => 'ContactID',
            'dataType' => 'int',
            'required' => true
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
        'IsUnsubscribed' => array(
            'name' => 'IsUnsubscribed',
            'dataType' => 'bool',
            'required' => false
            ),
        'ListID' => array(
            'name' => 'ListID',
            'dataType' => 'int',
            'required' => true
            ),
        'UnsubscribedAt' => array(
            'name' => 'UnsubscribedAt',
            'dataType' => '\Datetime',
            'required' => false
            )
        );

    /**
     * Post __construct initializations
     */
    public function init()
    {
        $this->getResultSetPrototype()->setObjectPrototype(new Mailjet\Model\Listrecipient);
        $this->setUrl('http://api.mailjet.com/v3/REST/listrecipient/');
        $hydrator = $this->getResultSetPrototype()->getHydrator();
        $hydrator->addStrategy('UnsubscribedAt', new TRFC3339DateTimeStrategy());
    }

    /**
     * Return list of Mailjet\Model\Listrecipient
     *
     * Return list of Mailjet\Model\Listrecipient filtered by $filters if provided
     *
     *
     * @param array key/val filters
     * @return ResultSet\ResultSet List of Mailjet\Model\Listrecipient
     */
    public function getList(array $filters = array())
    {
        return parent::_list($filters);
    }

    /**
     * Return list of Mailjet\Model\Listrecipient with Active = $Active
     *
     * @param bool
     * @return ResultSet\ResultSet
     */
    public function getByActive($Active)
    {
        $result = $this->getList(array('Active' => $Active));
        return $result;
    }

    /**
     * Return list of Mailjet\Model\Listrecipient with Blocked = $Blocked
     *
     * @param bool
     * @return ResultSet\ResultSet
     */
    public function getByBlocked($Blocked)
    {
        $result = $this->getList(array('Blocked' => $Blocked));
        return $result;
    }

    /**
     * Return list of Mailjet\Model\Listrecipient with Contact = $Contact
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
     * Return list of Mailjet\Model\Listrecipient with ContactEmail = $ContactEmail
     *
     * @param string
     * @return ResultSet\ResultSet
     */
    public function getByContactEmail($ContactEmail)
    {
        $result = $this->getList(array('ContactEmail' => $ContactEmail));
        return $result;
    }

    /**
     * Return list of Mailjet\Model\Listrecipient with ContactsList = $ContactsList
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
     * Return list of Mailjet\Model\Listrecipient with LastActivityAt = $LastActivityAt
     *
     * @param \Datetime
     * @return ResultSet\ResultSet
     */
    public function getByLastActivityAt(\Datetime $LastActivityAt)
    {
        $result = $this->getList(array('LastActivityAt' => $LastActivityAt));
        return $result;
    }

    /**
     * Return list of Mailjet\Model\Listrecipient with ListName = $ListName
     *
     * @param string
     * @return ResultSet\ResultSet
     */
    public function getByListName($ListName)
    {
        $result = $this->getList(array('ListName' => $ListName));
        return $result;
    }

    /**
     * Return list of Mailjet\Model\Listrecipient with Opened = $Opened
     *
     * @param bool
     * @return ResultSet\ResultSet
     */
    public function getByOpened($Opened)
    {
        $result = $this->getList(array('Opened' => $Opened));
        return $result;
    }

    /**
     * Return list of Mailjet\Model\Listrecipient with Status = $Status
     *
     * @param string
     * @return ResultSet\ResultSet
     */
    public function getByStatus($Status)
    {
        $result = $this->getList(array('Status' => $Status));
        return $result;
    }

    /**
     * Return list of Mailjet\Model\Listrecipient with Unsub = $Unsub
     *
     * @param bool
     * @return ResultSet\ResultSet
     */
    public function getByUnsub($Unsub)
    {
        $result = $this->getList(array('Unsub' => $Unsub));
        return $result;
    }

    /**
     * Return Mailjet\Model\Listrecipient with id = $id
     *
     * @param int Id of resource to get
     * @return Mailjet\Model\Listrecipient
     */
    public function get($id)
    {
        if (empty($id)) {
            throw new Exception\InvalidArgumentException("You must specify the ID");
        }

        return parent::_get($id);
    }

    /**
     * Update existing Listrecipient
     *
     * @param Mailjet\Model\Listrecipient
     * @return Mailjet\Model\Listrecipient|false Object created or false
     */
    public function update(Mailjet\Model\Listrecipient &$Listrecipient)
    {
        return parent::_update($Listrecipient);
    }

    /**
     * Create a new Listrecipient
     *
     * @param Mailjet\Model\Listrecipient
     * @return Mailjet\Model\Listrecipient|false Object created or false
     */
    public function create(Mailjet\Model\Listrecipient &$Listrecipient)
    {
        return parent::_create($Listrecipient);
    }

    /**
     * Delete the Listrecipient with id = $id
     *
     * @param integer Id to delete
     * @return bool True on success
     */
    public function delete($id)
    {
        return parent::_delete($id);
    }


}

