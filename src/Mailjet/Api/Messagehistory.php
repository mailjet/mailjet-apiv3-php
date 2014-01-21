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
use Mailjet\Hydrator\Strategy\TMessageEventTypeStrategy;
use Zend\Json\Json;
use Zend\InputFilter;

/**
 * Messagehistory Api
 *
 * Event history of a message
 *
 * @see http://mjdemo.poxx.net/~shubham/messagehistory.html
 */
class Messagehistory extends AbstractApi
{

    /**
     * Api name
     */
    protected $name = 'messagehistory';

    /**
     * Supported Filters
     */
    protected $filters = array('Message' => array(
            'name' => 'Message',
            'required' => false
            ));

    /**
     * Supported properties
     */
    protected $properties = array(
        'EventAt' => array(
            'name' => 'EventAt',
            'dataType' => 'int',
            'required' => false
            ),
        'EventType' => array(
            'name' => 'EventType',
            'dataType' => 'TMessageEventType',
            'required' => false
            ),
        'Useragent' => array(
            'name' => 'Useragent',
            'dataType' => 'string',
            'required' => false
            )
        );

    /**
     * Post __construct initializations
     */
    public function init()
    {
        $this->getResultSetPrototype()->setObjectPrototype(new Mailjet\Model\Messagehistory);
        $this->setUrl('http://api.mailjet.com/v3/REST/messagehistory/');
        $hydrator = $this->getResultSetPrototype()->getHydrator();
        $hydrator->addStrategy('EventType', new TMessageEventTypeStrategy());
    }

    /**
     * Return list of Mailjet\Model\Messagehistory
     *
     * Return list of Mailjet\Model\Messagehistory filtered by $filters if provided
     *
     *
     * @param array key/val filters
     * @return ResultSet\ResultSet List of Mailjet\Model\Messagehistory
     */
    public function getList(array $filters = array())
    {
        return parent::_list($filters);
    }

    /**
     * Return list of Mailjet\Model\Messagehistory with Message = $Message
     *
     * @param int
     * @return ResultSet\ResultSet
     */
    public function getByMessage($Message)
    {
        $result = $this->getList(array('Message' => $Message));
        return $result;
    }

    /**
     * Return Mailjet\Model\Messagehistory with id = $id
     *
     * @param int Id of resource to get
     * @return Mailjet\Model\Messagehistory
     */
    public function get($id)
    {
        if (empty($id)) {
            throw new Exception\InvalidArgumentException("You must specify the ID");
        }

        return parent::_get($id);
    }


}

