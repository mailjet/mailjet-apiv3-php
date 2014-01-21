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
 * Widgetcustomvalue Api
 *
 * Mailjet widget settings
 *
 * @see http://mjdemo.poxx.net/~shubham/widgetcustomvalue.html
 */
class Widgetcustomvalue extends AbstractApi
{

    /**
     * Api name
     */
    protected $name = 'widgetcustomvalue';

    /**
     * Supported Filters
     */
    protected $filters = array(
        'Name' => array(
            'name' => 'Name',
            'required' => false
            ),
        'Widget' => array(
            'name' => 'Widget',
            'required' => false
            )
        );

    /**
     * Supported properties
     */
    protected $properties = array(
        'APIKeyID' => array(
            'name' => 'APIKeyID',
            'dataType' => 'int',
            'required' => false
            ),
        'Display' => array(
            'name' => 'Display',
            'dataType' => 'bool',
            'required' => false
            ),
        'ID' => array(
            'name' => 'ID',
            'dataType' => 'int',
            'required' => false
            ),
        'Name' => array(
            'name' => 'Name',
            'dataType' => 'string',
            'required' => true
            ),
        'Value' => array(
            'name' => 'Value',
            'dataType' => 'string',
            'required' => false
            ),
        'WidgetID' => array(
            'name' => 'WidgetID',
            'dataType' => 'int',
            'required' => true
            )
        );

    /**
     * Post __construct initializations
     */
    public function init()
    {
        $this->getResultSetPrototype()->setObjectPrototype(new Mailjet\Model\Widgetcustomvalue);
        $this->setUrl('http://api.mailjet.com/v3/REST/widgetcustomvalue/');
    }

    /**
     * Return list of Mailjet\Model\Widgetcustomvalue
     *
     * Return list of Mailjet\Model\Widgetcustomvalue filtered by $filters if provided
     *
     *
     * @param array key/val filters
     * @return ResultSet\ResultSet List of Mailjet\Model\Widgetcustomvalue
     */
    public function getList(array $filters = array())
    {
        return parent::_list($filters);
    }

    /**
     * Return list of Mailjet\Model\Widgetcustomvalue with Name = $Name
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
     * Return list of Mailjet\Model\Widgetcustomvalue with Widget = $Widget
     *
     * @param int
     * @return ResultSet\ResultSet
     */
    public function getByWidget($Widget)
    {
        $result = $this->getList(array('Widget' => $Widget));
        return $result;
    }

    /**
     * Return Mailjet\Model\Widgetcustomvalue with id = $id
     *
     * @param int Id of resource to get
     * @return Mailjet\Model\Widgetcustomvalue
     */
    public function get($id)
    {
        if (empty($id)) {
            throw new Exception\InvalidArgumentException("You must specify the ID");
        }

        return parent::_get($id);
    }

    /**
     * Update existing Widgetcustomvalue
     *
     * @param Mailjet\Model\Widgetcustomvalue
     * @return Mailjet\Model\Widgetcustomvalue|false Object created or false
     */
    public function update(Mailjet\Model\Widgetcustomvalue &$Widgetcustomvalue)
    {
        return parent::_update($Widgetcustomvalue);
    }

    /**
     * Create a new Widgetcustomvalue
     *
     * @param Mailjet\Model\Widgetcustomvalue
     * @return Mailjet\Model\Widgetcustomvalue|false Object created or false
     */
    public function create(Mailjet\Model\Widgetcustomvalue &$Widgetcustomvalue)
    {
        return parent::_create($Widgetcustomvalue);
    }

    /**
     * Delete the Widgetcustomvalue with id = $id
     *
     * @param integer Id to delete
     * @return bool True on success
     */
    public function delete($id)
    {
        return parent::_delete($id);
    }


}

