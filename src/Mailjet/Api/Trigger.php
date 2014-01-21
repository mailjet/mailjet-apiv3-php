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
 * Trigger Api
 *
 * Triggers for outgoing events
 *
 * @see http://mjdemo.poxx.net/~shubham/trigger.html
 */
class Trigger extends AbstractApi
{

    /**
     * Api name
     */
    protected $name = 'trigger';

    /**
     * Supported Filters
     */
    protected $filters = array(
        'Event' => array(
            'name' => 'Event',
            'required' => false
            ),
        'MinAddedTS' => array(
            'name' => 'MinAddedTS',
            'required' => false
            )
        );

    /**
     * Supported properties
     */
    protected $properties = array(
        'AddedTs' => array(
            'name' => 'AddedTs',
            'dataType' => 'int',
            'required' => false
            ),
        'APIKey' => array(
            'name' => 'APIKey',
            'dataType' => 'int',
            'required' => false
            ),
        'Details' => array(
            'name' => 'Details',
            'dataType' => 'string',
            'required' => false
            ),
        'Event' => array(
            'name' => 'Event',
            'dataType' => 'int',
            'required' => false
            ),
        'ID' => array(
            'name' => 'ID',
            'dataType' => 'int',
            'required' => false
            ),
        'User' => array(
            'name' => 'User',
            'dataType' => 'int',
            'required' => false
            )
        );

    /**
     * Post __construct initializations
     */
    public function init()
    {
        $this->getResultSetPrototype()->setObjectPrototype(new Mailjet\Model\Trigger);
        $this->setUrl('http://api.mailjet.com/v3/REST/trigger/');
    }

    /**
     * Return list of Mailjet\Model\Trigger
     *
     * Return list of Mailjet\Model\Trigger filtered by $filters if provided
     *
     *
     * @param array key/val filters
     * @return ResultSet\ResultSet List of Mailjet\Model\Trigger
     */
    public function getList(array $filters = array())
    {
        return parent::_list($filters);
    }

    /**
     * Return list of Mailjet\Model\Trigger with Event = $Event
     *
     * @param int
     * @return ResultSet\ResultSet
     */
    public function getByEvent($Event)
    {
        $result = $this->getList(array('Event' => $Event));
        return $result;
    }

    /**
     * Return list of Mailjet\Model\Trigger with MinAddedTS = $MinAddedTS
     *
     * @param int
     * @return ResultSet\ResultSet
     */
    public function getByMinAddedTS($MinAddedTS)
    {
        $result = $this->getList(array('MinAddedTS' => $MinAddedTS));
        return $result;
    }

    /**
     * Return Mailjet\Model\Trigger with id = $id
     *
     * @param int Id of resource to get
     * @return Mailjet\Model\Trigger
     */
    public function get($id)
    {
        if (empty($id)) {
            throw new Exception\InvalidArgumentException("You must specify the ID");
        }

        return parent::_get($id);
    }

    /**
     * Update existing Trigger
     *
     * @param Mailjet\Model\Trigger
     * @return Mailjet\Model\Trigger|false Object created or false
     */
    public function update(Mailjet\Model\Trigger &$Trigger)
    {
        return parent::_update($Trigger);
    }

    /**
     * Create a new Trigger
     *
     * @param Mailjet\Model\Trigger
     * @return Mailjet\Model\Trigger|false Object created or false
     */
    public function create(Mailjet\Model\Trigger &$Trigger)
    {
        return parent::_create($Trigger);
    }

    /**
     * Delete the Trigger with id = $id
     *
     * @param integer Id to delete
     * @return bool True on success
     */
    public function delete($id)
    {
        return parent::_delete($id);
    }


}

