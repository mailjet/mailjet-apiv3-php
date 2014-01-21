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
 * Metasender Api
 *
 * Definition of send domains authorized to send mails for an API Key
 *
 * @see http://mjdemo.poxx.net/~shubham/metasender.html
 */
class Metasender extends AbstractApi
{

    /**
     * Api name
     */
    protected $name = 'metasender';

    /**
     * Supported Filters
     */
    protected $filters = array(
        'DNS' => array(
            'name' => 'DNS',
            'required' => false
            ),
        'User' => array(
            'name' => 'User',
            'required' => false
            )
        );

    /**
     * Supported properties
     */
    protected $properties = array(
        'CreatedAt' => array(
            'name' => 'CreatedAt',
            'dataType' => '\Datetime',
            'required' => false
            ),
        'Description' => array(
            'name' => 'Description',
            'dataType' => 'string',
            'required' => false
            ),
        'Email' => array(
            'name' => 'Email',
            'dataType' => 'string',
            'required' => true
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
        'IsEnabled' => array(
            'name' => 'IsEnabled',
            'dataType' => 'bool',
            'required' => false
            )
        );

    /**
     * Post __construct initializations
     */
    public function init()
    {
        $this->getResultSetPrototype()->setObjectPrototype(new Mailjet\Model\Metasender);
        $this->setUrl('http://api.mailjet.com/v3/REST/metasender/');
        $hydrator = $this->getResultSetPrototype()->getHydrator();
        $hydrator->addStrategy('CreatedAt', new TRFC3339DateTimeStrategy());
    }

    /**
     * Return list of Mailjet\Model\Metasender
     *
     * Return list of Mailjet\Model\Metasender filtered by $filters if provided
     *
     *
     * @param array key/val filters
     * @return ResultSet\ResultSet List of Mailjet\Model\Metasender
     */
    public function getList(array $filters = array())
    {
        return parent::_list($filters);
    }

    /**
     * Return list of Mailjet\Model\Metasender with DNS = $DNS
     *
     * @param int
     * @return ResultSet\ResultSet
     */
    public function getByDNS($DNS)
    {
        $result = $this->getList(array('DNS' => $DNS));
        return $result;
    }

    /**
     * Return list of Mailjet\Model\Metasender with User = $User
     *
     * @param int
     * @return ResultSet\ResultSet
     */
    public function getByUser($User)
    {
        $result = $this->getList(array('User' => $User));
        return $result;
    }

    /**
     * Return Mailjet\Model\Metasender with id = $id
     *
     * @param int Id of resource to get
     * @return Mailjet\Model\Metasender
     */
    public function get($id)
    {
        if (empty($id)) {
            throw new Exception\InvalidArgumentException("You must specify the ID");
        }

        return parent::_get($id);
    }

    /**
     * Update existing Metasender
     *
     * @param Mailjet\Model\Metasender
     * @return Mailjet\Model\Metasender|false Object created or false
     */
    public function update(Mailjet\Model\Metasender &$Metasender)
    {
        return parent::_update($Metasender);
    }

    /**
     * Create a new Metasender
     *
     * @param Mailjet\Model\Metasender
     * @return Mailjet\Model\Metasender|false Object created or false
     */
    public function create(Mailjet\Model\Metasender &$Metasender)
    {
        return parent::_create($Metasender);
    }


}

