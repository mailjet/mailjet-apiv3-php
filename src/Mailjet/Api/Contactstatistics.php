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
 * Contactstatistics Api
 *
 * Message/Click Statistics for a contact
 *
 * @see http://mjdemo.poxx.net/~shubham/contactstatistics.html
 */
class Contactstatistics extends AbstractApi
{

    /**
     * Api name
     */
    protected $name = 'contactstatistics';

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
        'LastActivityAt' => array(
            'name' => 'LastActivityAt',
            'required' => false
            ),
        'MaxLastActivityAt' => array(
            'name' => 'MaxLastActivityAt',
            'required' => false
            ),
        'MinLastActivityAt' => array(
            'name' => 'MinLastActivityAt',
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
        'ContactID' => array(
            'name' => 'ContactID',
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
        $this->getResultSetPrototype()->setObjectPrototype(new Mailjet\Model\Contactstatistics);
        $this->setUrl('http://api.mailjet.com/v3/REST/contactstatistics/');
        $hydrator = $this->getResultSetPrototype()->getHydrator();
        $hydrator->addStrategy('LastActivityAt', new TRFC3339DateTimeStrategy());
    }

    /**
     * Return list of Mailjet\Model\Contactstatistics
     *
     * Return list of Mailjet\Model\Contactstatistics filtered by $filters if provided
     *
     *
     * @param array key/val filters
     * @return ResultSet\ResultSet List of Mailjet\Model\Contactstatistics
     */
    public function getList(array $filters = array())
    {
        return parent::_list($filters);
    }

    /**
     * Return list of Mailjet\Model\Contactstatistics with Blocked = $Blocked
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
     * Return list of Mailjet\Model\Contactstatistics with Bounced = $Bounced
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
     * Return list of Mailjet\Model\Contactstatistics with Click = $Click
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
     * Return list of Mailjet\Model\Contactstatistics with LastActivityAt =
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
     * Return list of Mailjet\Model\Contactstatistics with MaxLastActivityAt =
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
     * Return list of Mailjet\Model\Contactstatistics with MinLastActivityAt =
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
     * Return list of Mailjet\Model\Contactstatistics with Open = $Open
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
     * Return list of Mailjet\Model\Contactstatistics with Queued = $Queued
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
     * Return list of Mailjet\Model\Contactstatistics with Sent = $Sent
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
     * Return list of Mailjet\Model\Contactstatistics with Spam = $Spam
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
     * Return list of Mailjet\Model\Contactstatistics with Unsubscribed = $Unsubscribed
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
     * Return Mailjet\Model\Contactstatistics with id = $id
     *
     * @param int Id of resource to get
     * @return Mailjet\Model\Contactstatistics
     */
    public function get($id)
    {
        if (empty($id)) {
            throw new Exception\InvalidArgumentException("You must specify the ID");
        }

        return parent::_get($id);
    }


}

