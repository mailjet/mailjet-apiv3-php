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
use Mailjet\Hydrator\Strategy\TResourceOpsStrategy;
use Zend\Json\Json;
use Zend\InputFilter;

/**
 * Metadata Api
 *
 * Mailjet API meta data
 *
 * @see http://mjdemo.poxx.net/~shubham/metadata.html
 */
class Metadata extends AbstractApi
{

    /**
     * Api name
     */
    protected $name = 'metadata';

    /**
     * Supported Filters
     */
    protected $filters = array(
        'PublicResources' => array(
            'name' => 'PublicResources',
            'required' => false
            ),
        'ReadOnlyResources' => array(
            'name' => 'ReadOnlyResources',
            'required' => false
            ),
        'ResourceName' => array(
            'name' => 'ResourceName',
            'required' => false
            )
        );

    /**
     * Supported properties
     */
    protected $properties = array(
        'Description' => array(
            'name' => 'Description',
            'dataType' => 'string',
            'required' => false
            ),
        'Filters' => array(
            'name' => 'Filters',
            'dataType' => 'int',
            'required' => false
            ),
        'IsReadOnly' => array(
            'name' => 'IsReadOnly',
            'dataType' => 'bool',
            'required' => false
            ),
        'Name' => array(
            'name' => 'Name',
            'dataType' => 'string',
            'required' => false
            ),
        'PrivateOperations' => array(
            'name' => 'PrivateOperations',
            'dataType' => 'TResourceOps',
            'required' => false
            ),
        'Properties' => array(
            'name' => 'Properties',
            'dataType' => 'int',
            'required' => false
            ),
        'PublicOperations' => array(
            'name' => 'PublicOperations',
            'dataType' => 'TResourceOps',
            'required' => false
            ),
        'SortInfo' => array(
            'name' => 'SortInfo',
            'dataType' => 'int',
            'required' => false
            ),
        'UniqueKey' => array(
            'name' => 'UniqueKey',
            'dataType' => 'string',
            'required' => false
            )
        );

    /**
     * Post __construct initializations
     */
    public function init()
    {
        $this->getResultSetPrototype()->setObjectPrototype(new Mailjet\Model\Metadata);
        $this->setUrl('http://api.mailjet.com/v3/REST/metadata/');
        $hydrator = $this->getResultSetPrototype()->getHydrator();
        $hydrator->addStrategy('PrivateOperations', new TResourceOpsStrategy());
        $hydrator->addStrategy('PublicOperations', new TResourceOpsStrategy());
    }

    /**
     * Return list of Mailjet\Model\Metadata
     *
     * Return list of Mailjet\Model\Metadata filtered by $filters if provided
     *
     *
     * @param array key/val filters
     * @return ResultSet\ResultSet List of Mailjet\Model\Metadata
     */
    public function getList(array $filters = array())
    {
        return parent::_list($filters);
    }

    /**
     * Return list of Mailjet\Model\Metadata with PublicResources = $PublicResources
     *
     * @param bool
     * @return ResultSet\ResultSet
     */
    public function getByPublicResources($PublicResources)
    {
        $result = $this->getList(array('PublicResources' => $PublicResources));
        return $result;
    }

    /**
     * Return list of Mailjet\Model\Metadata with ReadOnlyResources =
     * $ReadOnlyResources
     *
     * @param bool
     * @return ResultSet\ResultSet
     */
    public function getByReadOnlyResources($ReadOnlyResources)
    {
        $result = $this->getList(array('ReadOnlyResources' => $ReadOnlyResources));
        return $result;
    }

    /**
     * Return list of Mailjet\Model\Metadata with ResourceName = $ResourceName
     *
     * @param string
     * @return ResultSet\ResultSet
     */
    public function getByResourceName($ResourceName)
    {
        $result = $this->getList(array('ResourceName' => $ResourceName));
        return $result;
    }

    /**
     * Return Mailjet\Model\Metadata with id = $id
     *
     * @param int Id of resource to get
     * @return Mailjet\Model\Metadata
     */
    public function get($id)
    {
        if (empty($id)) {
            throw new Exception\InvalidArgumentException("You must specify the ID");
        }

        return parent::_get($id);
    }


}

