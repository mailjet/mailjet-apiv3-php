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
 * Newslettertemplateproperties Api
 *
 * CSS data for a newsletter template
 *
 * @see http://mjdemo.poxx.net/~shubham/newslettertemplateproperties.html
 */
class Newslettertemplateproperties extends AbstractApi
{

    /**
     * Api name
     */
    protected $name = 'newslettertemplateproperties';

    /**
     * Supported Filters
     */
    protected $filters = array('NewsLetterTemplate' => array(
            'name' => 'NewsLetterTemplate',
            'required' => false
            ));

    /**
     * Supported properties
     */
    protected $properties = array(
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
        'PropertyName' => array(
            'name' => 'PropertyName',
            'dataType' => 'string',
            'required' => true
            ),
        'Selector' => array(
            'name' => 'Selector',
            'dataType' => 'string',
            'required' => true
            ),
        'TemplateID' => array(
            'name' => 'TemplateID',
            'dataType' => 'int',
            'required' => true
            ),
        'Value' => array(
            'name' => 'Value',
            'dataType' => 'string',
            'required' => true
            )
        );

    /**
     * Post __construct initializations
     */
    public function init()
    {
        $this->getResultSetPrototype()->setObjectPrototype(new Mailjet\Model\Newslettertemplateproperties);
        $this->setUrl('http://api.mailjet.com/v3/REST/newslettertemplateproperties/');
    }

    /**
     * Return list of Mailjet\Model\Newslettertemplateproperties
     *
     * Return list of Mailjet\Model\Newslettertemplateproperties filtered by $filters
     * if provided
     *
     *
     * @param array key/val filters
     * @return ResultSet\ResultSet List of Mailjet\Model\Newslettertemplateproperties
     */
    public function getList(array $filters = array())
    {
        return parent::_list($filters);
    }

    /**
     * Return list of Mailjet\Model\Newslettertemplateproperties with
     * NewsLetterTemplate = $NewsLetterTemplate
     *
     * @param int
     * @return ResultSet\ResultSet
     */
    public function getByNewsLetterTemplate($NewsLetterTemplate)
    {
        $result = $this->getList(array('NewsLetterTemplate' => $NewsLetterTemplate));
        return $result;
    }

    /**
     * Return Mailjet\Model\Newslettertemplateproperties with id = $id
     *
     * @param int Id of resource to get
     * @return Mailjet\Model\Newslettertemplateproperties
     */
    public function get($id)
    {
        if (empty($id)) {
            throw new Exception\InvalidArgumentException("You must specify the ID");
        }

        return parent::_get($id);
    }

    /**
     * Update existing Newslettertemplateproperties
     *
     * @param Mailjet\Model\Newslettertemplateproperties
     * @return Mailjet\Model\Newslettertemplateproperties|false Object created or false
     */
    public function update(Mailjet\Model\Newslettertemplateproperties &$Newslettertemplateproperties)
    {
        return parent::_update($Newslettertemplateproperties);
    }

    /**
     * Create a new Newslettertemplateproperties
     *
     * @param Mailjet\Model\Newslettertemplateproperties
     * @return Mailjet\Model\Newslettertemplateproperties|false Object created or false
     */
    public function create(Mailjet\Model\Newslettertemplateproperties &$Newslettertemplateproperties)
    {
        return parent::_create($Newslettertemplateproperties);
    }

    /**
     * Delete the Newslettertemplateproperties with id = $id
     *
     * @param integer Id to delete
     * @return bool True on success
     */
    public function delete($id)
    {
        return parent::_delete($id);
    }


}

