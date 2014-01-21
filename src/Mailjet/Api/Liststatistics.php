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
 * Liststatistics Api
 *
 * API Key campaign/message/click statistics grouped by contacts list.
 *
 * @see http://mjdemo.poxx.net/~shubham/liststatistics.html
 */
class Liststatistics extends AbstractApi
{

    /**
     * Api name
     */
    protected $name = 'liststatistics';

    /**
     * Supported Filters
     */
    protected $filters = array(
        'Address' => array(
            'name' => 'Address',
            'required' => false
            ),
        'CalcActiveUnsub' => array(
            'name' => 'CalcActiveUnsub',
            'required' => false
            ),
        'ExcludeID' => array(
            'name' => 'ExcludeID',
            'required' => false
            ),
        'IsDeleted' => array(
            'name' => 'IsDeleted',
            'required' => false
            ),
        'Name' => array(
            'name' => 'Name',
            'required' => false
            )
        );

    /**
     * Supported properties
     */
    protected $properties = array(
        'ActiveCount' => array(
            'name' => 'ActiveCount',
            'dataType' => 'int',
            'required' => false
            ),
        'ActiveUnsubscribedCount' => array(
            'name' => 'ActiveUnsubscribedCount',
            'dataType' => 'int',
            'required' => false
            ),
        'Address' => array(
            'name' => 'Address',
            'dataType' => 'string',
            'required' => false
            ),
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
        'LastActivityAt' => array(
            'name' => 'LastActivityAt',
            'dataType' => '\Datetime',
            'required' => false
            ),
        'Name' => array(
            'name' => 'Name',
            'dataType' => 'string',
            'required' => false
            ),
        'OpenedCount' => array(
            'name' => 'OpenedCount',
            'dataType' => 'int',
            'required' => false
            ),
        'SpamComplaintCount' => array(
            'name' => 'SpamComplaintCount',
            'dataType' => 'int',
            'required' => false
            ),
        'SubscriberCount' => array(
            'name' => 'SubscriberCount',
            'dataType' => 'int',
            'required' => false
            ),
        'UnsubscribedCount' => array(
            'name' => 'UnsubscribedCount',
            'dataType' => 'int',
            'required' => false
            )
        );

    /**
     * Post __construct initializations
     */
    public function init()
    {
        $this->getResultSetPrototype()->setObjectPrototype(new Mailjet\Model\Liststatistics);
        $this->setUrl('http://api.mailjet.com/v3/REST/liststatistics/');
        $hydrator = $this->getResultSetPrototype()->getHydrator();
        $hydrator->addStrategy('CreatedAt', new TRFC3339DateTimeStrategy());
        $hydrator->addStrategy('LastActivityAt', new TRFC3339DateTimeStrategy());
    }

    /**
     * Return list of Mailjet\Model\Liststatistics
     *
     * Return list of Mailjet\Model\Liststatistics filtered by $filters if provided
     *
     *
     * @param array key/val filters
     * @return ResultSet\ResultSet List of Mailjet\Model\Liststatistics
     */
    public function getList(array $filters = array())
    {
        return parent::_list($filters);
    }

    /**
     * Return list of Mailjet\Model\Liststatistics with Address = $Address
     *
     * @param string
     * @return ResultSet\ResultSet
     */
    public function getByAddress($Address)
    {
        $result = $this->getList(array('Address' => $Address));
        return $result;
    }

    /**
     * Return list of Mailjet\Model\Liststatistics with CalcActiveUnsub =
     * $CalcActiveUnsub
     *
     * @param bool
     * @return ResultSet\ResultSet
     */
    public function getByCalcActiveUnsub($CalcActiveUnsub)
    {
        $result = $this->getList(array('CalcActiveUnsub' => $CalcActiveUnsub));
        return $result;
    }

    /**
     * Return list of Mailjet\Model\Liststatistics with ExcludeID = $ExcludeID
     *
     * @param int
     * @return ResultSet\ResultSet
     */
    public function getByExcludeID($ExcludeID)
    {
        $result = $this->getList(array('ExcludeID' => $ExcludeID));
        return $result;
    }

    /**
     * Return list of Mailjet\Model\Liststatistics with IsDeleted = $IsDeleted
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
     * Return list of Mailjet\Model\Liststatistics with Name = $Name
     *
     * @param string
     * @return ResultSet\ResultSet
     */
    public function getByName($Name)
    {
        $result = $this->getList(array('Name' => $Name));
        return $result;
    }

    /**
     * Return Mailjet\Model\Liststatistics with id = $id
     *
     * @param int Id of resource to get
     * @return Mailjet\Model\Liststatistics
     */
    public function get($id)
    {
        if (empty($id)) {
            throw new Exception\InvalidArgumentException("You must specify the ID");
        }

        return parent::_get($id);
    }


}

