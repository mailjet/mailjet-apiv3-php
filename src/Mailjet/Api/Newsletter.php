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
 * Newsletter Api
 *
 * Newsletter data
 *
 * @see http://mjdemo.poxx.net/~shubham/newsletter.html
 */
class Newsletter extends AbstractApi
{

    /**
     * Api name
     */
    protected $name = 'newsletter';

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
        'DeliveredAt' => array(
            'name' => 'DeliveredAt',
            'required' => false
            ),
        'EditMode' => array(
            'name' => 'EditMode',
            'required' => false
            ),
        'IsArchived' => array(
            'name' => 'IsArchived',
            'required' => false
            ),
        'IsDeleted' => array(
            'name' => 'IsDeleted',
            'required' => false
            ),
        'IsHandled' => array(
            'name' => 'IsHandled',
            'required' => false
            ),
        'IsStarred' => array(
            'name' => 'IsStarred',
            'required' => false
            ),
        'Modified' => array(
            'name' => 'Modified',
            'required' => false
            ),
        'NewsLetterTemplate' => array(
            'name' => 'NewsLetterTemplate',
            'required' => false
            ),
        'Status' => array(
            'name' => 'Status',
            'required' => false
            ),
        'Subject' => array(
            'name' => 'Subject',
            'required' => false
            )
        );

    /**
     * Supported properties
     */
    protected $properties = array(
        'Callback' => array(
            'name' => 'Callback',
            'dataType' => 'string',
            'required' => false
            ),
        'CampaignID' => array(
            'name' => 'CampaignID',
            'dataType' => 'int',
            'required' => false
            ),
        'ContactsListID' => array(
            'name' => 'ContactsListID',
            'dataType' => 'int',
            'required' => false
            ),
        'CreatedAt' => array(
            'name' => 'CreatedAt',
            'dataType' => '\Datetime',
            'required' => false
            ),
        'DeliveredAt' => array(
            'name' => 'DeliveredAt',
            'dataType' => '\Datetime',
            'required' => false
            ),
        'EditMode' => array(
            'name' => 'EditMode',
            'dataType' => 'string',
            'required' => false
            ),
        'EditType' => array(
            'name' => 'EditType',
            'dataType' => 'string',
            'required' => false
            ),
        'EmailSMTPMsg' => array(
            'name' => 'EmailSMTPMsg',
            'dataType' => 'string',
            'required' => false
            ),
        'Footer' => array(
            'name' => 'Footer',
            'dataType' => 'string',
            'required' => false
            ),
        'FooterAddress' => array(
            'name' => 'FooterAddress',
            'dataType' => 'string',
            'required' => false
            ),
        'FooterWYSIWYGType' => array(
            'name' => 'FooterWYSIWYGType',
            'dataType' => 'int',
            'required' => false
            ),
        'HeaderFilename' => array(
            'name' => 'HeaderFilename',
            'dataType' => 'string',
            'required' => false
            ),
        'HeaderLink' => array(
            'name' => 'HeaderLink',
            'dataType' => 'string',
            'required' => false
            ),
        'HeaderText' => array(
            'name' => 'HeaderText',
            'dataType' => 'string',
            'required' => false
            ),
        'HeaderUrl' => array(
            'name' => 'HeaderUrl',
            'dataType' => 'string',
            'required' => false
            ),
        'ID' => array(
            'name' => 'ID',
            'dataType' => 'int',
            'required' => false
            ),
        'Ip' => array(
            'name' => 'Ip',
            'dataType' => 'string',
            'required' => false
            ),
        'IsHandled' => array(
            'name' => 'IsHandled',
            'dataType' => 'bool',
            'required' => false
            ),
        'IsStarred' => array(
            'name' => 'IsStarred',
            'dataType' => 'bool',
            'required' => false
            ),
        'IsTextPartIncluded' => array(
            'name' => 'IsTextPartIncluded',
            'dataType' => 'bool',
            'required' => false
            ),
        'Locale' => array(
            'name' => 'Locale',
            'dataType' => 'string',
            'required' => true
            ),
        'ModifiedAt' => array(
            'name' => 'ModifiedAt',
            'dataType' => '\Datetime',
            'required' => false
            ),
        'ModStatus' => array(
            'name' => 'ModStatus',
            'dataType' => 'int',
            'required' => false
            ),
        'Permalink' => array(
            'name' => 'Permalink',
            'dataType' => 'string',
            'required' => false
            ),
        'PermalinkHost' => array(
            'name' => 'PermalinkHost',
            'dataType' => 'string',
            'required' => false
            ),
        'PermalinkWYSIWYGType' => array(
            'name' => 'PermalinkWYSIWYGType',
            'dataType' => 'int',
            'required' => false
            ),
        'PolitenessMode' => array(
            'name' => 'PolitenessMode',
            'dataType' => 'int',
            'required' => false
            ),
        'ReplyEmail' => array(
            'name' => 'ReplyEmail',
            'dataType' => 'string',
            'required' => false
            ),
        'Sender' => array(
            'name' => 'Sender',
            'dataType' => 'string',
            'required' => true
            ),
        'SenderEmail' => array(
            'name' => 'SenderEmail',
            'dataType' => 'string',
            'required' => true
            ),
        'SenderName' => array(
            'name' => 'SenderName',
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
            'required' => true
            ),
        'TemplateID' => array(
            'name' => 'TemplateID',
            'dataType' => 'int',
            'required' => false
            ),
        'TestAddress' => array(
            'name' => 'TestAddress',
            'dataType' => 'string',
            'required' => false
            ),
        'Title' => array(
            'name' => 'Title',
            'dataType' => 'string',
            'required' => false
            ),
        'UpdatedAt' => array(
            'name' => 'UpdatedAt',
            'dataType' => '\Datetime',
            'required' => false
            ),
        'Url' => array(
            'name' => 'Url',
            'dataType' => 'string',
            'required' => false
            )
        );

    /**
     * Post __construct initializations
     */
    public function init()
    {
        $this->getResultSetPrototype()->setObjectPrototype(new Mailjet\Model\Newsletter);
        $this->setUrl('http://api.mailjet.com/v3/REST/newsletter/');
        $hydrator = $this->getResultSetPrototype()->getHydrator();
        $hydrator->addStrategy('CreatedAt', new TRFC3339DateTimeStrategy());
        $hydrator->addStrategy('DeliveredAt', new TRFC3339DateTimeStrategy());
        $hydrator->addStrategy('ModifiedAt', new TRFC3339DateTimeStrategy());
        $hydrator->addStrategy('UpdatedAt', new TRFC3339DateTimeStrategy());
    }

    /**
     * Return list of Mailjet\Model\Newsletter
     *
     * Return list of Mailjet\Model\Newsletter filtered by $filters if provided
     *
     *
     * @param array key/val filters
     * @return ResultSet\ResultSet List of Mailjet\Model\Newsletter
     */
    public function getList(array $filters = array())
    {
        return parent::_list($filters);
    }

    /**
     * Return list of Mailjet\Model\Newsletter with Campaign = $Campaign
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
     * Return list of Mailjet\Model\Newsletter with ContactsList = $ContactsList
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
     * Return list of Mailjet\Model\Newsletter with DeliveredAt = $DeliveredAt
     *
     * @param \Datetime
     * @return ResultSet\ResultSet
     */
    public function getByDeliveredAt(\Datetime $DeliveredAt)
    {
        $result = $this->getList(array('DeliveredAt' => $DeliveredAt));
        return $result;
    }

    /**
     * Return list of Mailjet\Model\Newsletter with EditMode = $EditMode
     *
     * @param string
     * @return ResultSet\ResultSet
     */
    public function getByEditMode($EditMode)
    {
        $result = $this->getList(array('EditMode' => $EditMode));
        return $result;
    }

    /**
     * Return list of Mailjet\Model\Newsletter with IsArchived = $IsArchived
     *
     * @param bool
     * @return ResultSet\ResultSet
     */
    public function getByIsArchived($IsArchived)
    {
        $result = $this->getList(array('IsArchived' => $IsArchived));
        return $result;
    }

    /**
     * Return list of Mailjet\Model\Newsletter with IsDeleted = $IsDeleted
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
     * Return list of Mailjet\Model\Newsletter with IsHandled = $IsHandled
     *
     * @param bool
     * @return ResultSet\ResultSet
     */
    public function getByIsHandled($IsHandled)
    {
        $result = $this->getList(array('IsHandled' => $IsHandled));
        return $result;
    }

    /**
     * Return list of Mailjet\Model\Newsletter with IsStarred = $IsStarred
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
     * Return list of Mailjet\Model\Newsletter with Modified = $Modified
     *
     * @param bool
     * @return ResultSet\ResultSet
     */
    public function getByModified($Modified)
    {
        $result = $this->getList(array('Modified' => $Modified));
        return $result;
    }

    /**
     * Return list of Mailjet\Model\Newsletter with NewsLetterTemplate =
     * $NewsLetterTemplate
     *
     * @param int
     * @return ResultSet\ResultSet
     */
    public function getByNewsLetterTemplate($NewsLetterTemplate)
    {
        $result = $this->getList(array('NewsLetterTemplate' => $NewsLetterTemplate));
        return $result;
    }

    /**
     * Return list of Mailjet\Model\Newsletter with Status = $Status
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
     * Return list of Mailjet\Model\Newsletter with Subject = $Subject
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
     * Return Mailjet\Model\Newsletter with id = $id
     *
     * @param int Id of resource to get
     * @return Mailjet\Model\Newsletter
     */
    public function get($id)
    {
        if (empty($id)) {
            throw new Exception\InvalidArgumentException("You must specify the ID");
        }

        return parent::_get($id);
    }

    /**
     * Update existing Newsletter
     *
     * @param Mailjet\Model\Newsletter
     * @return Mailjet\Model\Newsletter|false Object created or false
     */
    public function update(Mailjet\Model\Newsletter &$Newsletter)
    {
        return parent::_update($Newsletter);
    }

    /**
     * Create a new Newsletter
     *
     * @param Mailjet\Model\Newsletter
     * @return Mailjet\Model\Newsletter|false Object created or false
     */
    public function create(Mailjet\Model\Newsletter &$Newsletter)
    {
        return parent::_create($Newsletter);
    }


}

