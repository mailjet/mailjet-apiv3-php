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
 * Listrecipientstatistics Api
 *
 * Message/Click Statistics for a list recipient
 *
 * @see http://mjdemo.poxx.net/~shubham/listrecipientstatistics.html
 */
class Listrecipientstatistics extends AbstractApi
{

    /**
     * Api name
     */
    protected $name = 'listrecipientstatistics';

    /**
     * Supported Filters
     */
    protected $filters = array(
        'Blocked' => array(
            'name' => 'Blocked',
            'required' => false
            ),
        'Bounced' => array(
            'name' => 'Bounced',
            'required' => false
            ),
        'Click' => array(
            'name' => 'Click',
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
        'IsActive' => array(
            'name' => 'IsActive',
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
        'MaxLastActivityAt' => array(
            'name' => 'MaxLastActivityAt',
            'required' => false
            ),
        'MaxUnsubscribedAt' => array(
            'name' => 'MaxUnsubscribedAt',
            'required' => false
            ),
        'MinLastActivityAt' => array(
            'name' => 'MinLastActivityAt',
            'required' => false
            ),
        'MinUnsubscribedAt' => array(
            'name' => 'MinUnsubscribedAt',
            'required' => false
            ),
        'Open' => array(
            'name' => 'Open',
            'required' => false
            ),
        'Queued' => array(
            'name' => 'Queued',
            'required' => false
            ),
        'Sent' => array(
            'name' => 'Sent',
            'required' => false
            ),
        'Spam' => array(
            'name' => 'Spam',
            'required' => false
            ),
        'Unsubscribed' => array(
            'name' => 'Unsubscribed',
            'required' => false
            )
        );

    /**
     * Supported properties
     */
    protected $properties = array(
        'BlockedCount' => array(
            'name' => 'BlockedCount',
            'dataType' => 'int',
            'required' => false
            ),
        'BouncedCount' => array(
            'name' => 'BouncedCount',
            'dataType' => 'int',
            'required' => false
            ),
        'ClickedCount' => array(
            'name' => 'ClickedCount',
            'dataType' => 'int',
            'required' => false
            ),
        'DeliveredCount' => array(
            'name' => 'DeliveredCount',
            'dataType' => 'int',
            'required' => false
            ),
        'LastActivityAt' => array(
            'name' => 'LastActivityAt',
            'dataType' => '\Datetime',
            'required' => false
            ),
        'ListRecipient' => array(
            'name' => 'ListRecipient',
            'dataType' => 'int',
            'required' => false
            ),
        'OpenedCount' => array(
            'name' => 'OpenedCount',
            'dataType' => 'int',
            'required' => false
            ),
        'ProcessedCount' => array(
            'name' => 'ProcessedCount',
            'dataType' => 'int',
            'required' => false
            ),
        'QueuedCount' => array(
            'name' => 'QueuedCount',
            'dataType' => 'int',
            'required' => false
            ),
        'SpamComplaintCount' => array(
            'name' => 'SpamComplaintCount',
            'dataType' => 'int',
            'required' => false
            )
        );

    /**
     * Post __construct initializations
     */
    public function init()
    {
        $this->getResultSetPrototype()->setObjectPrototype(new Mailjet\Model\Listrecipientstatistics);
        $this->setUrl('http://api.mailjet.com/v3/REST/listrecipientstatistics/');
        $hydrator = $this->getResultSetPrototype()->getHydrator();
        $hydrator->addStrategy('LastActivityAt', new TRFC3339DateTimeStrategy());
    }

    /**
     * Return list of Mailjet\Model\Listrecipientstatistics
     *
     * Return list of Mailjet\Model\Listrecipientstatistics filtered by $filters if
     * provided
     *
     *
     * @param array key/val filters
     * @return ResultSet\ResultSet List of Mailjet\Model\Listrecipientstatistics
     */
    public function getList(array $filters = array())
    {
        return parent::_list($filters);
    }

    /**
     * Return list of Mailjet\Model\Listrecipientstatistics with Blocked = $Blocked
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
     * Return list of Mailjet\Model\Listrecipientstatistics with Bounced = $Bounced
     *
     * @param bool
     * @return ResultSet\ResultSet
     */
    public function getByBounced($Bounced)
    {
        $result = $this->getList(array('Bounced' => $Bounced));
        return $result;
    }

    /**
     * Return list of Mailjet\Model\Listrecipientstatistics with Click = $Click
     *
     * @param bool
     * @return ResultSet\ResultSet
     */
    public function getByClick($Click)
    {
        $result = $this->getList(array('Click' => $Click));
        return $result;
    }

    /**
     * Return list of Mailjet\Model\Listrecipientstatistics with Contact = $Contact
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
     * Return list of Mailjet\Model\Listrecipientstatistics with ContactsList =
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
     * Return list of Mailjet\Model\Listrecipientstatistics with IsActive = $IsActive
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
     * Return list of Mailjet\Model\Listrecipientstatistics with IsUnsubscribed =
     * $IsUnsubscribed
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
     * Return list of Mailjet\Model\Listrecipientstatistics with LastActivityAt =
     * $LastActivityAt
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
     * Return list of Mailjet\Model\Listrecipientstatistics with MaxLastActivityAt =
     * $MaxLastActivityAt
     *
     * @param \Datetime
     * @return ResultSet\ResultSet
     */
    public function getByMaxLastActivityAt(\Datetime $MaxLastActivityAt)
    {
        $result = $this->getList(array('MaxLastActivityAt' => $MaxLastActivityAt));
        return $result;
    }

    /**
     * Return list of Mailjet\Model\Listrecipientstatistics with MaxUnsubscribedAt =
     * $MaxUnsubscribedAt
     *
     * @param \Datetime
     * @return ResultSet\ResultSet
     */
    public function getByMaxUnsubscribedAt(\Datetime $MaxUnsubscribedAt)
    {
        $result = $this->getList(array('MaxUnsubscribedAt' => $MaxUnsubscribedAt));
        return $result;
    }

    /**
     * Return list of Mailjet\Model\Listrecipientstatistics with MinLastActivityAt =
     * $MinLastActivityAt
     *
     * @param \Datetime
     * @return ResultSet\ResultSet
     */
    public function getByMinLastActivityAt(\Datetime $MinLastActivityAt)
    {
        $result = $this->getList(array('MinLastActivityAt' => $MinLastActivityAt));
        return $result;
    }

    /**
     * Return list of Mailjet\Model\Listrecipientstatistics with MinUnsubscribedAt =
     * $MinUnsubscribedAt
     *
     * @param \Datetime
     * @return ResultSet\ResultSet
     */
    public function getByMinUnsubscribedAt(\Datetime $MinUnsubscribedAt)
    {
        $result = $this->getList(array('MinUnsubscribedAt' => $MinUnsubscribedAt));
        return $result;
    }

    /**
     * Return list of Mailjet\Model\Listrecipientstatistics with Open = $Open
     *
     * @param bool
     * @return ResultSet\ResultSet
     */
    public function getByOpen($Open)
    {
        $result = $this->getList(array('Open' => $Open));
        return $result;
    }

    /**
     * Return list of Mailjet\Model\Listrecipientstatistics with Queued = $Queued
     *
     * @param bool
     * @return ResultSet\ResultSet
     */
    public function getByQueued($Queued)
    {
        $result = $this->getList(array('Queued' => $Queued));
        return $result;
    }

    /**
     * Return list of Mailjet\Model\Listrecipientstatistics with Sent = $Sent
     *
     * @param bool
     * @return ResultSet\ResultSet
     */
    public function getBySent($Sent)
    {
        $result = $this->getList(array('Sent' => $Sent));
        return $result;
    }

    /**
     * Return list of Mailjet\Model\Listrecipientstatistics with Spam = $Spam
     *
     * @param bool
     * @return ResultSet\ResultSet
     */
    public function getBySpam($Spam)
    {
        $result = $this->getList(array('Spam' => $Spam));
        return $result;
    }

    /**
     * Return list of Mailjet\Model\Listrecipientstatistics with Unsubscribed =
     * $Unsubscribed
     *
     * @param bool
     * @return ResultSet\ResultSet
     */
    public function getByUnsubscribed($Unsubscribed)
    {
        $result = $this->getList(array('Unsubscribed' => $Unsubscribed));
        return $result;
    }

    /**
     * Return Mailjet\Model\Listrecipientstatistics with id = $id
     *
     * @param int Id of resource to get
     * @return Mailjet\Model\Listrecipientstatistics
     */
    public function get($id)
    {
        if (empty($id)) {
            throw new Exception\InvalidArgumentException("You must specify the ID");
        }

        return parent::_get($id);
    }


}

