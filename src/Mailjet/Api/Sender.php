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
use Mailjet\Hydrator\Strategy\TSenderStatusStrategy;
use Zend\Json\Json;
use Zend\InputFilter;

/**
 * Sender Api
 *
 * API Key sender email address
 *
 * @see http://mjdemo.poxx.net/~shubham/sender.html
 */
class Sender extends AbstractApi
{

    /**
     * Api name
     */
    protected $name = 'sender';

    /**
     * Supported Filters
     */
    protected $filters = array(
        'Domain' => array(
            'name' => 'Domain',
            'required' => false
            ),
        'Email' => array(
            'name' => 'Email',
            'required' => false
            ),
        'LocalPart' => array(
            'name' => 'LocalPart',
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
        'ConfirmKey' => array(
            'name' => 'ConfirmKey',
            'dataType' => 'string',
            'required' => false
            ),
        'CreatedAt' => array(
            'name' => 'CreatedAt',
            'dataType' => '\Datetime',
            'required' => false
            ),
        'DNSID' => array(
            'name' => 'DNSID',
            'dataType' => 'int',
            'required' => false
            ),
        'Email' => array(
            'name' => 'Email',
            'dataType' => 'string',
            'required' => true
            ),
        'EmailType' => array(
            'name' => 'EmailType',
            'dataType' => 'int',
            'required' => false
            ),
        'Filename' => array(
            'name' => 'Filename',
            'dataType' => 'string',
            'required' => false
            ),
        'ID' => array(
            'name' => 'ID',
            'dataType' => 'int',
            'required' => false
            ),
        'IsDefaultSender' => array(
            'name' => 'IsDefaultSender',
            'dataType' => 'bool',
            'required' => false
            ),
        'Name' => array(
            'name' => 'Name',
            'dataType' => 'string',
            'required' => false
            ),
        'Status' => array(
            'name' => 'Status',
            'dataType' => 'TSenderStatus',
            'required' => false
            ),
        'UMPCheckedAt' => array(
            'name' => 'UMPCheckedAt',
            'dataType' => '\Datetime',
            'required' => false
            )
        );

    /**
     * Post __construct initializations
     */
    public function init()
    {
        $this->getResultSetPrototype()->setObjectPrototype(new Mailjet\Model\Sender);
        $this->setUrl('http://api.mailjet.com/v3/REST/sender/');
        $hydrator = $this->getResultSetPrototype()->getHydrator();
        $hydrator->addStrategy('CreatedAt', new TRFC3339DateTimeStrategy());
        $hydrator->addStrategy('Status', new TSenderStatusStrategy());
        $hydrator->addStrategy('UMPCheckedAt', new TRFC3339DateTimeStrategy());
    }

    /**
     * Return list of Mailjet\Model\Sender
     *
     * Return list of Mailjet\Model\Sender filtered by $filters if provided
     *
     *
     * @param array key/val filters
     * @return ResultSet\ResultSet List of Mailjet\Model\Sender
     */
    public function getList(array $filters = array())
    {
        return parent::_list($filters);
    }

    /**
     * Return list of Mailjet\Model\Sender with Domain = $Domain
     *
     * @param string
     * @return ResultSet\ResultSet
     */
    public function getByDomain($Domain)
    {
        $result = $this->getList(array('Domain' => $Domain));
        return $result;
    }

    /**
     * Return Mailjet\Model\Sender
     *
     * @param string
     * @return Mailjet\Model\Sender
     */
    public function getByEmail($Email)
    {
        return $this->_get($Email);
    }

    /**
     * Return list of Mailjet\Model\Sender with LocalPart = $LocalPart
     *
     * @param string
     * @return ResultSet\ResultSet
     */
    public function getByLocalPart($LocalPart)
    {
        $result = $this->getList(array('LocalPart' => $LocalPart));
        return $result;
    }

    /**
     * Return list of Mailjet\Model\Sender with Status = $Status
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
     * Return Mailjet\Model\Sender with id = $id
     *
     * @param int Id of resource to get
     * @return Mailjet\Model\Sender
     */
    public function get($id)
    {
        if (empty($id)) {
            throw new Exception\InvalidArgumentException("You must specify the ID");
        }

        return parent::_get($id);
    }

    /**
     * Update existing Sender
     *
     * @param Mailjet\Model\Sender
     * @return Mailjet\Model\Sender|false Object created or false
     */
    public function update(Mailjet\Model\Sender &$Sender)
    {
        return parent::_update($Sender);
    }

    /**
     * Create a new Sender
     *
     * @param Mailjet\Model\Sender
     * @return Mailjet\Model\Sender|false Object created or false
     */
    public function create(Mailjet\Model\Sender &$Sender)
    {
        return parent::_create($Sender);
    }


}

