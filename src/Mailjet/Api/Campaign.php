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
 * Campaign Api
 *
 * Campaigns (or transactional messages) sent by an API key.
 *
 * @see http://mjdemo.poxx.net/~shubham/campaign.html
 */
class Campaign extends AbstractApi
{

    /**
     * Api name
     */
    protected $name = 'campaign';

    /**
     * Supported Filters
     */
    protected $filters = array(
        'CampaignID' => array(
            'name' => 'CampaignID',
            'required' => false
            ),
        'CampaignStatus' => array(
            'name' => 'CampaignStatus',
            'required' => false
            ),
        'ContactsList' => array(
            'name' => 'ContactsList',
            'required' => false
            ),
        'CustomCampaign' => array(
            'name' => 'CustomCampaign',
            'required' => false
            ),
        'From' => array(
            'name' => 'From',
            'required' => false
            ),
        'FromDomain' => array(
            'name' => 'FromDomain',
            'required' => false
            ),
        'FromID' => array(
            'name' => 'FromID',
            'required' => false
            ),
        'FromTS' => array(
            'name' => 'FromTS',
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
        'IsNewsletterTool' => array(
            'name' => 'IsNewsletterTool',
            'required' => false
            ),
        'IsStarred' => array(
            'name' => 'IsStarred',
            'required' => false
            ),
        'Period' => array(
            'name' => 'Period',
            'required' => false
            ),
        'ToTS' => array(
            'name' => 'ToTS',
            'required' => false
            )
        );

    /**
     * Supported properties
     */
    protected $properties = array(
        'CampaignType' => array(
            'name' => 'CampaignType',
            'dataType' => 'int',
            'required' => false
            ),
        'ClickTracked' => array(
            'name' => 'ClickTracked',
            'dataType' => 'int',
            'required' => false
            ),
        'CreatedAt' => array(
            'name' => 'CreatedAt',
            'dataType' => '\Datetime',
            'required' => false
            ),
        'CustomValue' => array(
            'name' => 'CustomValue',
            'dataType' => 'string',
            'required' => false
            ),
        'FirstMessageID' => array(
            'name' => 'FirstMessageID',
            'dataType' => 'int',
            'required' => false
            ),
        'FromID' => array(
            'name' => 'FromID',
            'dataType' => 'int',
            'required' => false
            ),
        'FromEmail' => array(
            'name' => 'FromEmail',
            'dataType' => 'string',
            'required' => true
            ),
        'FromName' => array(
            'name' => 'FromName',
            'dataType' => 'string',
            'required' => false
            ),
        'HasHtmlCount' => array(
            'name' => 'HasHtmlCount',
            'dataType' => 'int',
            'required' => false
            ),
        'HashValue' => array(
            'name' => 'HashValue',
            'dataType' => 'string',
            'required' => false
            ),
        'HasTxtCount' => array(
            'name' => 'HasTxtCount',
            'dataType' => 'int',
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
        'IsStarred' => array(
            'name' => 'IsStarred',
            'dataType' => 'bool',
            'required' => false
            ),
        'ListID' => array(
            'name' => 'ListID',
            'dataType' => 'int',
            'required' => false
            ),
        'NewsLetterID' => array(
            'name' => 'NewsLetterID',
            'dataType' => 'int',
            'required' => false
            ),
        'OpenTracked' => array(
            'name' => 'OpenTracked',
            'dataType' => 'int',
            'required' => false
            ),
        'SendEndAt' => array(
            'name' => 'SendEndAt',
            'dataType' => '\Datetime',
            'required' => false
            ),
        'SendStartAt' => array(
            'name' => 'SendStartAt',
            'dataType' => '\Datetime',
            'required' => false
            ),
        'SpamassScore' => array(
            'name' => 'SpamassScore',
            'dataType' => 'string',
            'required' => false
            ),
        'Status' => array(
            'name' => 'Status',
            'dataType' => 'int',
            'required' => false
            ),
        'Subject' => array(
            'name' => 'Subject',
            'dataType' => 'string',
            'required' => false
            ),
        'UnsubscribeTrackedCount' => array(
            'name' => 'UnsubscribeTrackedCount',
            'dataType' => 'int',
            'required' => false
            )
        );

    /**
     * Post __construct initializations
     */
    public function init()
    {
        $this->getResultSetPrototype()->setObjectPrototype(new Mailjet\Model\Campaign);
        $this->setUrl('http://api.mailjet.com/v3/REST/campaign/');
        $hydrator = $this->getResultSetPrototype()->getHydrator();
        $hydrator->addStrategy('CreatedAt', new TRFC3339DateTimeStrategy());
        $hydrator->addStrategy('SendEndAt', new TRFC3339DateTimeStrategy());
        $hydrator->addStrategy('SendStartAt', new TRFC3339DateTimeStrategy());
    }

    /**
     * Return list of Mailjet\Model\Campaign
     *
     * Return list of Mailjet\Model\Campaign filtered by $filters if provided
     *
     *
     * @param array key/val filters
     * @return ResultSet\ResultSet List of Mailjet\Model\Campaign
     */
    public function getList(array $filters = array())
    {
        return parent::_list($filters);
    }

    /**
     * Return list of Mailjet\Model\Campaign with CampaignID = $CampaignID
     *
     * @param int
     * @return ResultSet\ResultSet
     */
    public function getByCampaignID($CampaignID)
    {
        $result = $this->getList(array('CampaignID' => $CampaignID));
        return $result;
    }

    /**
     * Return list of Mailjet\Model\Campaign with CampaignStatus = $CampaignStatus
     *
     * @param int
     * @return ResultSet\ResultSet
     */
    public function getByCampaignStatus($CampaignStatus)
    {
        $result = $this->getList(array('CampaignStatus' => $CampaignStatus));
        return $result;
    }

    /**
     * Return list of Mailjet\Model\Campaign with ContactsList = $ContactsList
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
     * Return list of Mailjet\Model\Campaign with CustomCampaign = $CustomCampaign
     *
     * @param string
     * @return ResultSet\ResultSet
     */
    public function getByCustomCampaign($CustomCampaign)
    {
        $result = $this->getList(array('CustomCampaign' => $CustomCampaign));
        return $result;
    }

    /**
     * Return list of Mailjet\Model\Campaign with From = $From
     *
     * @param string
     * @return ResultSet\ResultSet
     */
    public function getByFrom($From)
    {
        $result = $this->getList(array('From' => $From));
        return $result;
    }

    /**
     * Return list of Mailjet\Model\Campaign with FromDomain = $FromDomain
     *
     * @param string
     * @return ResultSet\ResultSet
     */
    public function getByFromDomain($FromDomain)
    {
        $result = $this->getList(array('FromDomain' => $FromDomain));
        return $result;
    }

    /**
     * Return list of Mailjet\Model\Campaign with FromID = $FromID
     *
     * @param int
     * @return ResultSet\ResultSet
     */
    public function getByFromID($FromID)
    {
        $result = $this->getList(array('FromID' => $FromID));
        return $result;
    }

    /**
     * Return list of Mailjet\Model\Campaign with FromTS = $FromTS
     *
     * @param \Datetime
     * @return ResultSet\ResultSet
     */
    public function getByFromTS(\Datetime $FromTS)
    {
        $result = $this->getList(array('FromTS' => $FromTS));
        return $result;
    }

    /**
     * Return list of Mailjet\Model\Campaign with FromType = $FromType
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
     * Return list of Mailjet\Model\Campaign with IsDeleted = $IsDeleted
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
     * Return list of Mailjet\Model\Campaign with IsNewsletterTool = $IsNewsletterTool
     *
     * @param bool
     * @return ResultSet\ResultSet
     */
    public function getByIsNewsletterTool($IsNewsletterTool)
    {
        $result = $this->getList(array('IsNewsletterTool' => $IsNewsletterTool));
        return $result;
    }

    /**
     * Return list of Mailjet\Model\Campaign with IsStarred = $IsStarred
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
     * Return list of Mailjet\Model\Campaign with Period = $Period
     *
     * @param string
     * @return ResultSet\ResultSet
     */
    public function getByPeriod($Period)
    {
        $result = $this->getList(array('Period' => $Period));
        return $result;
    }

    /**
     * Return list of Mailjet\Model\Campaign with ToTS = $ToTS
     *
     * @param \Datetime
     * @return ResultSet\ResultSet
     */
    public function getByToTS(\Datetime $ToTS)
    {
        $result = $this->getList(array('ToTS' => $ToTS));
        return $result;
    }

    /**
     * Return Mailjet\Model\Campaign with id = $id
     *
     * @param int Id of resource to get
     * @return Mailjet\Model\Campaign
     */
    public function get($id)
    {
        if (empty($id)) {
            throw new Exception\InvalidArgumentException("You must specify the ID");
        }

        return parent::_get($id);
    }


}

