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
 * Newslettertemplatecategory Api
 *
 * Global newsletter template categories
 *
 * @see http://mjdemo.poxx.net/~shubham/newslettertemplatecategory.html
 */
class Newslettertemplatecategory extends AbstractApi
{

    /**
     * Api name
     */
    protected $name = 'newslettertemplatecategory';

    /**
     * Supported Filters
     */
    protected $filters = array('Locale' => array(
            'name' => 'Locale',
            'required' => false
            ));

    /**
     * Supported properties
     */
    protected $properties = array(
        'Description' => array(
            'name' => 'Description',
            'dataType' => 'string',
            'required' => true
            ),
        'ID' => array(
            'name' => 'ID',
            'dataType' => 'int',
            'required' => false
            ),
        'Locale' => array(
            'name' => 'Locale',
            'dataType' => 'string',
            'required' => true
            ),
        'ParentCategoryID' => array(
            'name' => 'ParentCategoryID',
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
        $this->getResultSetPrototype()->setObjectPrototype(new Mailjet\Model\Newslettertemplatecategory);
        $this->setUrl('http://api.mailjet.com/v3/REST/newslettertemplatecategory/');
    }

    /**
     * Return list of Mailjet\Model\Newslettertemplatecategory
     *
     * Return list of Mailjet\Model\Newslettertemplatecategory filtered by $filters if
     * provided
     *
     *
     * @param array key/val filters
     * @return ResultSet\ResultSet List of Mailjet\Model\Newslettertemplatecategory
     */
    public function getList(array $filters = array())
    {
        return parent::_list($filters);
    }

    /**
     * Return list of Mailjet\Model\Newslettertemplatecategory with Locale = $Locale
     *
     * @param string
     * @return ResultSet\ResultSet
     */
    public function getByLocale($Locale)
    {
        $result = $this->getList(array('Locale' => $Locale));
        return $result;
    }

    /**
     * Return Mailjet\Model\Newslettertemplatecategory with id = $id
     *
     * @param int Id of resource to get
     * @return Mailjet\Model\Newslettertemplatecategory
     */
    public function get($id)
    {
        if (empty($id)) {
            throw new Exception\InvalidArgumentException("You must specify the ID");
        }

        return parent::_get($id);
    }


}

