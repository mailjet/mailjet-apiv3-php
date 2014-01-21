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
 * Contact Api
 *
 * API Key contacts (email addresses)
 *
 * @see http://mjdemo.poxx.net/~shubham/contact.html
 */
class Contact extends AbstractApi
{

    /**
     * Api name
     */
    protected $name = 'contact';

    /**
     * Supported Filters
     */
    protected $filters = array(
        'Campaign' => array(
            'name' => 'Campaign',
            'required' => false
            ),
        'ContactsList' => array(
            'name' => 'ContactsList',
            'required' => false
            ),
        'IsUnsubscribed' => array(
            'name' => 'IsUnsubscribed',
            'required' => false
            ),
        'LastActivityAt' => array(
            'name' => 'LastActivityAt',
            'required' => false
            ),
        'Recipient' => array(
            'name' => 'Recipient',
            'required' => false
            ),
        'Status' => array(
            'name' => 'Status',
            'required' => false
            )
        );

    /**
     * Supported properties
     */
    protected $properties = array(
        'CreatedAt' => array(
            'name' => 'CreatedAt',
            'dataType' => '\Datetime',
            'required' => false
            ),
        'DeliveredCount' => array(
            'name' => 'DeliveredCount',
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
        'IsOptInPending' => array(
            'name' => 'IsOptInPending',
            'dataType' => 'bool',
            'required' => false
            ),
        'IsSpamComplaining' => array(
            'name' => 'IsSpamComplaining',
            'dataType' => 'bool',
            'required' => false
            ),
        'LastActivityAt' => array(
            'name' => 'LastActivityAt',
            'dataType' => '\Datetime',
            'required' => false
            ),
        'LastUpdateAt' => array(
            'name' => 'LastUpdateAt',
            'dataType' => '\Datetime',
            'required' => false
            ),
        'Name' => array(
            'name' => 'Name',
            'dataType' => 'string',
            'required' => false
            ),
        'UnsubscribedAt' => array(
            'name' => 'UnsubscribedAt',
            'dataType' => '\Datetime',
            'required' => false
            ),
        'UnsubscribedBy' => array(
            'name' => 'UnsubscribedBy',
            'dataType' => 'string',
            'required' => false
            )
        );

    /**
     * Post __construct initializations
     */
    public function init()
    {
        $this->getResultSetPrototype()->setObjectPrototype(new Mailjet\Model\Contact);
        $this->setUrl('http://api.mailjet.com/v3/REST/contact/');
        $hydrator = $this->getResultSetPrototype()->getHydrator();
        $hydrator->addStrategy('CreatedAt', new TRFC3339DateTimeStrategy());
        $hydrator->addStrategy('LastActivityAt', new TRFC3339DateTimeStrategy());
        $hydrator->addStrategy('LastUpdateAt', new TRFC3339DateTimeStrategy());
        $hydrator->addStrategy('UnsubscribedAt', new TRFC3339DateTimeStrategy());
    }

    /**
     * Return list of Mailjet\Model\Contact
     *
     * Return list of Mailjet\Model\Contact filtered by $filters if provided
     *
     *
     * @param array key/val filters
     * @return ResultSet\ResultSet List of Mailjet\Model\Contact
     */
    public function getList(array $filters = array())
    {
        return parent::_list($filters);
    }

    /**
     * Return list of Mailjet\Model\Contact with Campaign = $Campaign
     *
     * @param int
     * @return ResultSet\ResultSet
     */
    public function getByCampaign($Campaign)
    {
        $result = $this->getList(array('Campaign' => $Campaign));
        return $result;
    }

    /**
     * Return list of Mailjet\Model\Contact with ContactsList = $ContactsList
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
     * Return list of Mailjet\Model\Contact with IsUnsubscribed = $IsUnsubscribed
     *
     * @param bool
     * @return ResultSet\ResultSet
     */
    public function getByIsUnsubscribed($IsUnsubscribed)
    {
        $result = $this->getList(array('IsUnsubscribed' => $IsUnsubscribed));
        return $result;
    }

    /**
     * Return list of Mailjet\Model\Contact with LastActivityAt = $LastActivityAt
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
     * Return list of Mailjet\Model\Contact with Recipient = $Recipient
     *
     * @param int
     * @return ResultSet\ResultSet
     */
    public function getByRecipient($Recipient)
    {
        $result = $this->getList(array('Recipient' => $Recipient));
        return $result;
    }

    /**
     * Return list of Mailjet\Model\Contact with Status = $Status
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
     * Return Mailjet\Model\Contact with id = $id
     *
     * @param int Id of resource to get
     * @return Mailjet\Model\Contact
     */
    public function get($id)
    {
        if (empty($id)) {
            throw new Exception\InvalidArgumentException("You must specify the ID");
        }

        return parent::_get($id);
    }

    /**
     * Update existing Contact
     *
     * @param Mailjet\Model\Contact
     * @return Mailjet\Model\Contact|false Object created or false
     */
    public function update(Mailjet\Model\Contact &$Contact)
    {
        return parent::_update($Contact);
    }

    /**
     * Create a new Contact
     *
     * @param Mailjet\Model\Contact
     * @return Mailjet\Model\Contact|false Object created or false
     */
    public function create(Mailjet\Model\Contact &$Contact)
    {
        return parent::_create($Contact);
    }


}

