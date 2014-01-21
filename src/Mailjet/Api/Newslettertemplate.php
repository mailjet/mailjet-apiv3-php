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
 * Newslettertemplate Api
 *
 * Newsletter templates
 *
 * @see http://mjdemo.poxx.net/~shubham/newslettertemplate.html
 */
class Newslettertemplate extends AbstractApi
{

    /**
     * Api name
     */
    protected $name = 'newslettertemplate';

    /**
     * Supported Filters
     */
    protected $filters = array(
        'IsPublic' => array(
            'name' => 'IsPublic',
            'required' => false
            ),
        'NewsLetterTemplateCategory' => array(
            'name' => 'NewsLetterTemplateCategory',
            'required' => false
            )
        );

    /**
     * Supported properties
     */
    protected $properties = array(
        'CategoryID' => array(
            'name' => 'CategoryID',
            'dataType' => 'int',
            'required' => false
            ),
        'CreatedAt' => array(
            'name' => 'CreatedAt',
            'dataType' => '\Datetime',
            'required' => false
            ),
        'Footer' => array(
            'name' => 'Footer',
            'dataType' => 'string',
            'required' => false
            ),
        'FooterAddress' => array(
            'name' => 'FooterAddress',
            'dataType' => 'string',
            'required' => false
            ),
        'FooterWYSIWYGType' => array(
            'name' => 'FooterWYSIWYGType',
            'dataType' => 'int',
            'required' => false
            ),
        'HeaderFilename' => array(
            'name' => 'HeaderFilename',
            'dataType' => 'string',
            'required' => false
            ),
        'HeaderLink' => array(
            'name' => 'HeaderLink',
            'dataType' => 'string',
            'required' => false
            ),
        'HeaderText' => array(
            'name' => 'HeaderText',
            'dataType' => 'string',
            'required' => false
            ),
        'HeaderUrl' => array(
            'name' => 'HeaderUrl',
            'dataType' => 'string',
            'required' => false
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
        'Name' => array(
            'name' => 'Name',
            'dataType' => 'string',
            'required' => false
            ),
        'Permalink' => array(
            'name' => 'Permalink',
            'dataType' => 'string',
            'required' => false
            ),
        'PermalinkWYSIWYGType' => array(
            'name' => 'PermalinkWYSIWYGType',
            'dataType' => 'int',
            'required' => false
            ),
        'SourceNewsLetterID' => array(
            'name' => 'SourceNewsLetterID',
            'dataType' => 'int',
            'required' => false
            ),
        'Status' => array(
            'name' => 'Status',
            'dataType' => 'int',
            'required' => false
            ),
        'UpdatedAt' => array(
            'name' => 'UpdatedAt',
            'dataType' => '\Datetime',
            'required' => false
            )
        );

    /**
     * Post __construct initializations
     */
    public function init()
    {
        $this->getResultSetPrototype()->setObjectPrototype(new Mailjet\Model\Newslettertemplate);
        $this->setUrl('http://api.mailjet.com/v3/REST/newslettertemplate/');
        $hydrator = $this->getResultSetPrototype()->getHydrator();
        $hydrator->addStrategy('CreatedAt', new TRFC3339DateTimeStrategy());
        $hydrator->addStrategy('UpdatedAt', new TRFC3339DateTimeStrategy());
    }

    /**
     * Return list of Mailjet\Model\Newslettertemplate
     *
     * Return list of Mailjet\Model\Newslettertemplate filtered by $filters if provided
     *
     *
     * @param array key/val filters
     * @return ResultSet\ResultSet List of Mailjet\Model\Newslettertemplate
     */
    public function getList(array $filters = array())
    {
        return parent::_list($filters);
    }

    /**
     * Return list of Mailjet\Model\Newslettertemplate with IsPublic = $IsPublic
     *
     * @param bool
     * @return ResultSet\ResultSet
     */
    public function getByIsPublic($IsPublic)
    {
        $result = $this->getList(array('IsPublic' => $IsPublic));
        return $result;
    }

    /**
     * Return list of Mailjet\Model\Newslettertemplate with NewsLetterTemplateCategory
     * = $NewsLetterTemplateCategory
     *
     * @param int
     * @return ResultSet\ResultSet
     */
    public function getByNewsLetterTemplateCategory($NewsLetterTemplateCategory)
    {
        $result = $this->getList(array('NewsLetterTemplateCategory' => $NewsLetterTemplateCategory));
        return $result;
    }

    /**
     * Return Mailjet\Model\Newslettertemplate with id = $id
     *
     * @param int Id of resource to get
     * @return Mailjet\Model\Newslettertemplate
     */
    public function get($id)
    {
        if (empty($id)) {
            throw new Exception\InvalidArgumentException("You must specify the ID");
        }

        return parent::_get($id);
    }

    /**
     * Update existing Newslettertemplate
     *
     * @param Mailjet\Model\Newslettertemplate
     * @return Mailjet\Model\Newslettertemplate|false Object created or false
     */
    public function update(Mailjet\Model\Newslettertemplate &$Newslettertemplate)
    {
        return parent::_update($Newslettertemplate);
    }

    /**
     * Create a new Newslettertemplate
     *
     * @param Mailjet\Model\Newslettertemplate
     * @return Mailjet\Model\Newslettertemplate|false Object created or false
     */
    public function create(Mailjet\Model\Newslettertemplate &$Newslettertemplate)
    {
        return parent::_create($Newslettertemplate);
    }


}

