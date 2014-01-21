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
 * Message Api
 *
 * API Key messages processed by Mailjet. One record per processed email.
 *
 * @see http://mjdemo.poxx.net/~shubham/message.html
 */
class Message extends AbstractApi
{

    /**
     * Api name
     */
    protected $name = 'message';

    /**
     * Supported Filters
     */
    protected $filters = array(
        'Campaign' => array(
            'name' => 'Campaign',
            'required' => false
            ),
        'Contact' => array(
            'name' => 'Contact',
            'required' => false
            ),
        'Destination' => array(
            'name' => 'Destination',
            'required' => false
            ),
        'MessageState' => array(
            'name' => 'MessageState',
            'required' => false
            ),
        'PlanSubscription' => array(
            'name' => 'PlanSubscription',
            'required' => false
            ),
        'Sender' => array(
            'name' => 'Sender',
            'required' => false
            )
        );

    /**
     * Supported properties
     */
    protected $properties = array(
        'ArrivedAt' => array(
            'name' => 'ArrivedAt',
            'dataType' => '\Datetime',
            'required' => false
            ),
        'AttachmentCount' => array(
            'name' => 'AttachmentCount',
            'dataType' => 'int',
            'required' => false
            ),
        'AttemptCount' => array(
            'name' => 'AttemptCount',
            'dataType' => 'int',
            'required' => false
            ),
        'CampaignID' => array(
            'name' => 'CampaignID',
            'dataType' => 'int',
            'required' => true
            ),
        'CheckString' => array(
            'name' => 'CheckString',
            'dataType' => 'string',
            'required' => false
            ),
        'ContactID' => array(
            'name' => 'ContactID',
            'dataType' => 'int',
            'required' => true
            ),
        'Delay' => array(
            'name' => 'Delay',
            'dataType' => 'string',
            'required' => false
            ),
        'DestinationID' => array(
            'name' => 'DestinationID',
            'dataType' => 'int',
            'required' => true
            ),
        'Dsn' => array(
            'name' => 'Dsn',
            'dataType' => 'string',
            'required' => false
            ),
        'FilterTime' => array(
            'name' => 'FilterTime',
            'dataType' => 'int',
            'required' => false
            ),
        'FromID' => array(
            'name' => 'FromID',
            'dataType' => 'int',
            'required' => true
            ),
        'ID' => array(
            'name' => 'ID',
            'dataType' => 'int',
            'required' => false
            ),
        'IsClickTracked' => array(
            'name' => 'IsClickTracked',
            'dataType' => 'bool',
            'required' => false
            ),
        'IsHTMLPartIncluded' => array(
            'name' => 'IsHTMLPartIncluded',
            'dataType' => 'bool',
            'required' => false
            ),
        'IsOpenTracked' => array(
            'name' => 'IsOpenTracked',
            'dataType' => 'bool',
            'required' => false
            ),
        'IsTextPartIncluded' => array(
            'name' => 'IsTextPartIncluded',
            'dataType' => 'bool',
            'required' => false
            ),
        'IsUnsubTracked' => array(
            'name' => 'IsUnsubTracked',
            'dataType' => 'bool',
            'required' => false
            ),
        'MessageSize' => array(
            'name' => 'MessageSize',
            'dataType' => 'int',
            'required' => false
            ),
        'PlanSubscriptionID' => array(
            'name' => 'PlanSubscriptionID',
            'dataType' => 'int',
            'required' => true
            ),
        'PoolIPId' => array(
            'name' => 'PoolIPId',
            'dataType' => 'int',
            'required' => false
            ),
        'PostfixQid' => array(
            'name' => 'PostfixQid',
            'dataType' => 'string',
            'required' => false
            ),
        'SpamassassinScore' => array(
            'name' => 'SpamassassinScore',
            'dataType' => 'string',
            'required' => false
            ),
        'SpamassRules' => array(
            'name' => 'SpamassRules',
            'dataType' => 'string',
            'required' => false
            ),
        'StateID' => array(
            'name' => 'StateID',
            'dataType' => 'int',
            'required' => false
            ),
        'StatePermanent' => array(
            'name' => 'StatePermanent',
            'dataType' => 'bool',
            'required' => false
            ),
        'Status' => array(
            'name' => 'Status',
            'dataType' => 'int',
            'required' => false
            ),
        'UpdatedAt' => array(
            'name' => 'UpdatedAt',
            'dataType' => '\Datetime',
            'required' => false
            )
        );

    /**
     * Post __construct initializations
     */
    public function init()
    {
        $this->getResultSetPrototype()->setObjectPrototype(new Mailjet\Model\Message);
        $this->setUrl('http://api.mailjet.com/v3/REST/message/');
        $hydrator = $this->getResultSetPrototype()->getHydrator();
        $hydrator->addStrategy('ArrivedAt', new TRFC3339DateTimeStrategy());
        $hydrator->addStrategy('UpdatedAt', new TRFC3339DateTimeStrategy());
    }

    /**
     * Return list of Mailjet\Model\Message
     *
     * Return list of Mailjet\Model\Message filtered by $filters if provided
     *
     *
     * @param array key/val filters
     * @return ResultSet\ResultSet List of Mailjet\Model\Message
     */
    public function getList(array $filters = array())
    {
        return parent::_list($filters);
    }

    /**
     * Return list of Mailjet\Model\Message with Campaign = $Campaign
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
     * Return list of Mailjet\Model\Message with Contact = $Contact
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
     * Return list of Mailjet\Model\Message with Destination = $Destination
     *
     * @param int
     * @return ResultSet\ResultSet
     */
    public function getByDestination($Destination)
    {
        $result = $this->getList(array('Destination' => $Destination));
        return $result;
    }

    /**
     * Return list of Mailjet\Model\Message with MessageState = $MessageState
     *
     * @param int
     * @return ResultSet\ResultSet
     */
    public function getByMessageState($MessageState)
    {
        $result = $this->getList(array('MessageState' => $MessageState));
        return $result;
    }

    /**
     * Return list of Mailjet\Model\Message with PlanSubscription = $PlanSubscription
     *
     * @param int
     * @return ResultSet\ResultSet
     */
    public function getByPlanSubscription($PlanSubscription)
    {
        $result = $this->getList(array('PlanSubscription' => $PlanSubscription));
        return $result;
    }

    /**
     * Return list of Mailjet\Model\Message with Sender = $Sender
     *
     * @param int
     * @return ResultSet\ResultSet
     */
    public function getBySender($Sender)
    {
        $result = $this->getList(array('Sender' => $Sender));
        return $result;
    }

    /**
     * Return Mailjet\Model\Message with id = $id
     *
     * @param int Id of resource to get
     * @return Mailjet\Model\Message
     */
    public function get($id)
    {
        if (empty($id)) {
            throw new Exception\InvalidArgumentException("You must specify the ID");
        }

        return parent::_get($id);
    }


}

