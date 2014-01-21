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
 * Campaignstatistics Api
 *
 * Message statistics grouped by campaign
 *
 * @see http://mjdemo.poxx.net/~shubham/campaignstatistics.html
 */
class Campaignstatistics extends AbstractApi
{

    /**
     * Api name
     */
    protected $name = 'campaignstatistics';

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
        'FromType' => array(
            'name' => 'FromType',
            'required' => false
            ),
        'IsDeleted' => array(
            'name' => 'IsDeleted',
            'required' => false
            ),
        'IsStarred' => array(
            'name' => 'IsStarred',
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
        'Subject' => array(
            'name' => 'Subject',
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
        'CampaignID' => array(
            'name' => 'CampaignID',
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
        'NewsLetterID' => array(
            'name' => 'NewsLetterID',
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
        $this->getResultSetPrototype()->setObjectPrototype(new Mailjet\Model\Campaignstatistics);
        $this->setUrl('http://api.mailjet.com/v3/REST/campaignstatistics/');
        $hydrator = $this->getResultSetPrototype()->getHydrator();
        $hydrator->addStrategy('LastActivityAt', new TRFC3339DateTimeStrategy());
    }

    /**
     * Return list of Mailjet\Model\Campaignstatistics
     *
     * Return list of Mailjet\Model\Campaignstatistics filtered by $filters if provided
     *
     *
     * @param array key/val filters
     * @return ResultSet\ResultSet List of Mailjet\Model\Campaignstatistics
     */
    public function getList(array $filters = array())
    {
        return parent::_list($filters);
    }

    /**
     * Return list of Mailjet\Model\Campaignstatistics with Blocked = $Blocked
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
     * Return list of Mailjet\Model\Campaignstatistics with Bounced = $Bounced
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
     * Return list of Mailjet\Model\Campaignstatistics with Click = $Click
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
     * Return list of Mailjet\Model\Campaignstatistics with FromType = $FromType
     *
     * @param int
     * @return ResultSet\ResultSet
     */
    public function getByFromType($FromType)
    {
        $result = $this->getList(array('FromType' => $FromType));
        return $result;
    }

    /**
     * Return list of Mailjet\Model\Campaignstatistics with IsDeleted = $IsDeleted
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
     * Return list of Mailjet\Model\Campaignstatistics with IsStarred = $IsStarred
     *
     * @param bool
     * @return ResultSet\ResultSet
     */
    public function getByIsStarred($IsStarred)
    {
        $result = $this->getList(array('IsStarred' => $IsStarred));
        return $result;
    }

    /**
     * Return list of Mailjet\Model\Campaignstatistics with LastActivityAt =
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
     * Return list of Mailjet\Model\Campaignstatistics with MaxLastActivityAt =
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
     * Return list of Mailjet\Model\Campaignstatistics with MinLastActivityAt =
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
     * Return list of Mailjet\Model\Campaignstatistics with Open = $Open
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
     * Return list of Mailjet\Model\Campaignstatistics with Queued = $Queued
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
     * Return list of Mailjet\Model\Campaignstatistics with Sent = $Sent
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
     * Return list of Mailjet\Model\Campaignstatistics with Spam = $Spam
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
     * Return list of Mailjet\Model\Campaignstatistics with Subject = $Subject
     *
     * @param string
     * @return ResultSet\ResultSet
     */
    public function getBySubject($Subject)
    {
        $result = $this->getList(array('Subject' => $Subject));
        return $result;
    }

    /**
     * Return list of Mailjet\Model\Campaignstatistics with Unsubscribed =
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
     * Return Mailjet\Model\Campaignstatistics with id = $id
     *
     * @param int Id of resource to get
     * @return Mailjet\Model\Campaignstatistics
     */
    public function get($id)
    {
        if (empty($id)) {
            throw new Exception\InvalidArgumentException("You must specify the ID");
        }

        return parent::_get($id);
    }


}

