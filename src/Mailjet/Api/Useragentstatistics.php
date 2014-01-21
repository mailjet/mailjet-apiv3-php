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
use \Datetime;

/**
 * Useragentstatistics Api
 *
 * API Key message Open/Click statistical data grouped per user agent (browser)
 *
 * @see http://mjdemo.poxx.net/~shubham/useragentstatistics.html
 */
class Useragentstatistics extends AbstractApi
{

    /**
     * Api name
     */
    protected $name = 'useragentstatistics';

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
        'ExcludePlatform' => array(
            'name' => 'ExcludePlatform',
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
        'Platform' => array(
            'name' => 'Platform',
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
        'Count' => array(
            'name' => 'Count',
            'dataType' => 'int',
            'required' => false
            ),
        'DistinctCount' => array(
            'name' => 'DistinctCount',
            'dataType' => 'int',
            'required' => false
            ),
        'Platform' => array(
            'name' => 'Platform',
            'dataType' => 'string',
            'required' => true
            ),
        'UserAgent' => array(
            'name' => 'UserAgent',
            'dataType' => 'string',
            'required' => true
            )
        );

    /**
     * Post __construct initializations
     */
    public function init()
    {
        $this->getResultSetPrototype()->setObjectPrototype(new Mailjet\Model\Useragentstatistics);
        $this->setUrl('http://api.mailjet.com/v3/REST/useragentstatistics/');
    }

    /**
     * Return list of Mailjet\Model\Useragentstatistics
     *
     * Return list of Mailjet\Model\Useragentstatistics filtered by $filters if
     * provided
     *
     *
     * @param array key/val filters
     * @return ResultSet\ResultSet List of Mailjet\Model\Useragentstatistics
     */
    public function getList(array $filters = array())
    {
        return parent::_list($filters);
    }

    /**
     * Return list of Mailjet\Model\Useragentstatistics with CampaignID = $CampaignID
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
     * Return list of Mailjet\Model\Useragentstatistics with CampaignStatus =
     * $CampaignStatus
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
     * Return list of Mailjet\Model\Useragentstatistics with ContactsList =
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
     * Return list of Mailjet\Model\Useragentstatistics with CustomCampaign =
     * $CustomCampaign
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
     * Return list of Mailjet\Model\Useragentstatistics with ExcludePlatform =
     * $ExcludePlatform
     *
     * @param string
     * @return ResultSet\ResultSet
     */
    public function getByExcludePlatform($ExcludePlatform)
    {
        $result = $this->getList(array('ExcludePlatform' => $ExcludePlatform));
        return $result;
    }

    /**
     * Return list of Mailjet\Model\Useragentstatistics with From = $From
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
     * Return list of Mailjet\Model\Useragentstatistics with FromDomain = $FromDomain
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
     * Return list of Mailjet\Model\Useragentstatistics with FromID = $FromID
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
     * Return list of Mailjet\Model\Useragentstatistics with FromTS = $FromTS
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
     * Return list of Mailjet\Model\Useragentstatistics with FromType = $FromType
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
     * Return list of Mailjet\Model\Useragentstatistics with IsDeleted = $IsDeleted
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
     * Return list of Mailjet\Model\Useragentstatistics with IsNewsletterTool =
     * $IsNewsletterTool
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
     * Return list of Mailjet\Model\Useragentstatistics with IsStarred = $IsStarred
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
     * Return list of Mailjet\Model\Useragentstatistics with Period = $Period
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
     * Return list of Mailjet\Model\Useragentstatistics with Platform = $Platform
     *
     * @param string
     * @return ResultSet\ResultSet
     */
    public function getByPlatform($Platform)
    {
        $result = $this->getList(array('Platform' => $Platform));
        return $result;
    }

    /**
     * Return list of Mailjet\Model\Useragentstatistics with ToTS = $ToTS
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
     * Return Mailjet\Model\Useragentstatistics with id = $id
     *
     * @param int Id of resource to get
     * @return Mailjet\Model\Useragentstatistics
     */
    public function get($id)
    {
        if (empty($id)) {
            throw new Exception\InvalidArgumentException("You must specify the ID");
        }

        return parent::_get($id);
    }


}

