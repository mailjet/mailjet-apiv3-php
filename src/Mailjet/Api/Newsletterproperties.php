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
 * Newsletterproperties Api
 *
 * CSS data for a newsletter
 *
 * @see http://mjdemo.poxx.net/~shubham/newsletterproperties.html
 */
class Newsletterproperties extends AbstractApi
{

    /**
     * Api name
     */
    protected $name = 'newsletterproperties';

    /**
     * Supported Filters
     */
    protected $filters = array('NewsLetter' => array(
            'name' => 'NewsLetter',
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
        'NewsLetterID' => array(
            'name' => 'NewsLetterID',
            'dataType' => 'int',
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
        $this->getResultSetPrototype()->setObjectPrototype(new Mailjet\Model\Newsletterproperties);
        $this->setUrl('http://api.mailjet.com/v3/REST/newsletterproperties/');
    }

    /**
     * Return list of Mailjet\Model\Newsletterproperties
     *
     * Return list of Mailjet\Model\Newsletterproperties filtered by $filters if
     * provided
     *
     *
     * @param array key/val filters
     * @return ResultSet\ResultSet List of Mailjet\Model\Newsletterproperties
     */
    public function getList(array $filters = array())
    {
        return parent::_list($filters);
    }

    /**
     * Return list of Mailjet\Model\Newsletterproperties with NewsLetter = $NewsLetter
     *
     * @param int
     * @return ResultSet\ResultSet
     */
    public function getByNewsLetter($NewsLetter)
    {
        $result = $this->getList(array('NewsLetter' => $NewsLetter));
        return $result;
    }

    /**
     * Return Mailjet\Model\Newsletterproperties with id = $id
     *
     * @param int Id of resource to get
     * @return Mailjet\Model\Newsletterproperties
     */
    public function get($id)
    {
        if (empty($id)) {
            throw new Exception\InvalidArgumentException("You must specify the ID");
        }

        return parent::_get($id);
    }

    /**
     * Update existing Newsletterproperties
     *
     * @param Mailjet\Model\Newsletterproperties
     * @return Mailjet\Model\Newsletterproperties|false Object created or false
     */
    public function update(Mailjet\Model\Newsletterproperties &$Newsletterproperties)
    {
        return parent::_update($Newsletterproperties);
    }

    /**
     * Create a new Newsletterproperties
     *
     * @param Mailjet\Model\Newsletterproperties
     * @return Mailjet\Model\Newsletterproperties|false Object created or false
     */
    public function create(Mailjet\Model\Newsletterproperties &$Newsletterproperties)
    {
        return parent::_create($Newsletterproperties);
    }

    /**
     * Delete the Newsletterproperties with id = $id
     *
     * @param integer Id to delete
     * @return bool True on success
     */
    public function delete($id)
    {
        return parent::_delete($id);
    }


}

