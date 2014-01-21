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
use Mailjet\Hydrator\Strategy\TManyContactsActionStrategy;
use Mailjet\Hydrator\Strategy\ModelCollectionStrategy;
use Zend\Json\Json;
use Zend\InputFilter;

/**
 * Manycontacts Api
 *
 * Special resource to add more than 1 contact in 1 call
 *
 * @see http://mjdemo.poxx.net/~shubham/manycontacts.html
 */
class Manycontacts extends AbstractApi
{

    /**
     * Api name
     */
    protected $name = 'manycontacts';

    /**
     * Supported Filters
     */
    protected $filters = array();

    /**
     * Supported properties
     */
    protected $properties = array(
        'Action' => array(
            'name' => 'Action',
            'dataType' => 'TManyContactsAction',
            'required' => false
            ),
        'Addresses' => array(
            'name' => 'Addresses',
            'dataType' => 'array',
            'required' => true
            ),
        'Errors' => array(
            'name' => 'Errors',
            'dataType' => 'int',
            'required' => false
            ),
        'Force' => array(
            'name' => 'Force',
            'dataType' => 'bool',
            'required' => false
            ),
        'ListID' => array(
            'name' => 'ListID',
            'dataType' => 'int',
            'required' => true
            ),
        'Recipients' => array(
            'name' => 'Recipients',
            'dataType' => 'ResultSet',
            'required' => false
            )
        );

    /**
     * Post __construct initializations
     */
    public function init()
    {
        $this->getResultSetPrototype()->setObjectPrototype(new Mailjet\Model\Manycontacts);
        $this->setUrl('http://api.mailjet.com/v3/REST/manycontacts/');
        $hydrator = $this->getResultSetPrototype()->getHydrator();
        $hydrator->addStrategy('Action', new TManyContactsActionStrategy());
        $hydrator->addStrategy('Recipients', new ModelCollectionStrategy($this, 'ListRecipientList'));
    }

    /**
     * Create a new Manycontacts
     *
     * @param Mailjet\Model\Manycontacts
     * @return Mailjet\Model\Manycontacts|false Object created or false
     */
    public function create(Mailjet\Model\Manycontacts &$Manycontacts)
    {
        return parent::_create($Manycontacts);
    }


}

