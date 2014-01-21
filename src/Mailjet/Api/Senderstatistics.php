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
 * Senderstatistics Api
 *
 * API Key sender email address message/open/click statistical information
 *
 * @see http://mjdemo.poxx.net/~shubham/senderstatistics.html
 */
class Senderstatistics extends AbstractApi
{

    /**
     * Api name
     */
    protected $name = 'senderstatistics';

    /**
     * Supported Filters
     */
    protected $filters = array(
        'domain' => array(
            'name' => 'domain',
            'required' => false
            ),
        'Email' => array(
            'name' => 'Email',
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
        'SenderID' => array(
            'name' => 'SenderID',
            'dataType' => 'int',
            'required' => true
            ),
        'SpamComplaintCount' => array(
            'name' => 'SpamComplaintCount',
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
        $this->getResultSetPrototype()->setObjectPrototype(new Mailjet\Model\Senderstatistics);
        $this->setUrl('http://api.mailjet.com/v3/REST/senderstatistics/');
        $hydrator = $this->getResultSetPrototype()->getHydrator();
        $hydrator->addStrategy('LastActivityAt', new TRFC3339DateTimeStrategy());
    }

    /**
     * Return list of Mailjet\Model\Senderstatistics
     *
     * Return list of Mailjet\Model\Senderstatistics filtered by $filters if provided
     *
     *
     * @param array key/val filters
     * @return ResultSet\ResultSet List of Mailjet\Model\Senderstatistics
     */
    public function getList(array $filters = array())
    {
        return parent::_list($filters);
    }

    /**
     * Return list of Mailjet\Model\Senderstatistics with domain = $domain
     *
     * @param string
     * @return ResultSet\ResultSet
     */
    public function getBydomain($domain)
    {
        $result = $this->getList(array('domain' => $domain));
        return $result;
    }

    /**
     * Return Mailjet\Model\Senderstatistics
     *
     * @param string
     * @return Mailjet\Model\Senderstatistics
     */
    public function getByEmail($Email)
    {
        return $this->_get($Email);
    }

    /**
     * Return list of Mailjet\Model\Senderstatistics with Sender = $Sender
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
     * Return Mailjet\Model\Senderstatistics with id = $id
     *
     * @param int Id of resource to get
     * @return Mailjet\Model\Senderstatistics
     */
    public function get($id)
    {
        if (empty($id)) {
            throw new Exception\InvalidArgumentException("You must specify the ID");
        }

        return parent::_get($id);
    }


}

