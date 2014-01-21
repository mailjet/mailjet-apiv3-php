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

/**
 * Widget Api
 *
 * Mailjet widget definitions.
 *
 * @see http://mjdemo.poxx.net/~shubham/widget.html
 */
class Widget extends AbstractApi
{

    /**
     * Api name
     */
    protected $name = 'widget';

    /**
     * Supported Filters
     */
    protected $filters = array(
        'active' => array(
            'name' => 'active',
            'required' => false
            ),
        'APIKey' => array(
            'name' => 'APIKey',
            'required' => false
            ),
        'ContactsList' => array(
            'name' => 'ContactsList',
            'required' => false
            ),
        'Locale' => array(
            'name' => 'Locale',
            'required' => false
            ),
        'MessageTemplate' => array(
            'name' => 'MessageTemplate',
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
        'CreatedAt' => array(
            'name' => 'CreatedAt',
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
        'IsActive' => array(
            'name' => 'IsActive',
            'dataType' => 'bool',
            'required' => false
            ),
        'ListID' => array(
            'name' => 'ListID',
            'dataType' => 'int',
            'required' => true
            ),
        'Locale' => array(
            'name' => 'Locale',
            'dataType' => 'string',
            'required' => true
            ),
        'Name' => array(
            'name' => 'Name',
            'dataType' => 'string',
            'required' => false
            ),
        'Replyto' => array(
            'name' => 'Replyto',
            'dataType' => 'string',
            'required' => false
            ),
        'Sendername' => array(
            'name' => 'Sendername',
            'dataType' => 'string',
            'required' => false
            ),
        'Subject' => array(
            'name' => 'Subject',
            'dataType' => 'string',
            'required' => false
            ),
        'TemplateID' => array(
            'name' => 'TemplateID',
            'dataType' => 'int',
            'required' => false
            )
        );

    /**
     * Post __construct initializations
     */
    public function init()
    {
        $this->getResultSetPrototype()->setObjectPrototype(new Mailjet\Model\Widget);
        $this->setUrl('http://api.mailjet.com/v3/REST/widget/');
    }

    /**
     * Return list of Mailjet\Model\Widget
     *
     * Return list of Mailjet\Model\Widget filtered by $filters if provided
     *
     *
     * @param array key/val filters
     * @return ResultSet\ResultSet List of Mailjet\Model\Widget
     */
    public function getList(array $filters = array())
    {
        return parent::_list($filters);
    }

    /**
     * Return list of Mailjet\Model\Widget with active = $active
     *
     * @param bool
     * @return ResultSet\ResultSet
     */
    public function getByactive($active)
    {
        $result = $this->getList(array('active' => $active));
        return $result;
    }

    /**
     * Return list of Mailjet\Model\Widget with APIKey = $APIKey
     *
     * @param int
     * @return ResultSet\ResultSet
     */
    public function getByAPIKey($APIKey)
    {
        $result = $this->getList(array('APIKey' => $APIKey));
        return $result;
    }

    /**
     * Return list of Mailjet\Model\Widget with ContactsList = $ContactsList
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
     * Return list of Mailjet\Model\Widget with Locale = $Locale
     *
     * @param string
     * @return ResultSet\ResultSet
     */
    public function getByLocale($Locale)
    {
        $result = $this->getList(array('Locale' => $Locale));
        return $result;
    }

    /**
     * Return list of Mailjet\Model\Widget with MessageTemplate = $MessageTemplate
     *
     * @param int
     * @return ResultSet\ResultSet
     */
    public function getByMessageTemplate($MessageTemplate)
    {
        $result = $this->getList(array('MessageTemplate' => $MessageTemplate));
        return $result;
    }

    /**
     * Return list of Mailjet\Model\Widget with Sender = $Sender
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
     * Return Mailjet\Model\Widget with id = $id
     *
     * @param int Id of resource to get
     * @return Mailjet\Model\Widget
     */
    public function get($id)
    {
        if (empty($id)) {
            throw new Exception\InvalidArgumentException("You must specify the ID");
        }

        return parent::_get($id);
    }

    /**
     * Update existing Widget
     *
     * @param Mailjet\Model\Widget
     * @return Mailjet\Model\Widget|false Object created or false
     */
    public function update(Mailjet\Model\Widget &$Widget)
    {
        return parent::_update($Widget);
    }

    /**
     * Create a new Widget
     *
     * @param Mailjet\Model\Widget
     * @return Mailjet\Model\Widget|false Object created or false
     */
    public function create(Mailjet\Model\Widget &$Widget)
    {
        return parent::_create($Widget);
    }

    /**
     * Delete the Widget with id = $id
     *
     * @param integer Id to delete
     * @return bool True on success
     */
    public function delete($id)
    {
        return parent::_delete($id);
    }


}

