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
 * Newslettertemplateblock Api
 *
 * HTML data for a block from a newsletter template
 *
 * @see http://mjdemo.poxx.net/~shubham/newslettertemplateblock.html
 */
class Newslettertemplateblock extends AbstractApi
{

    /**
     * Api name
     */
    protected $name = 'newslettertemplateblock';

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
        'Align' => array(
            'name' => 'Align',
            'dataType' => 'string',
            'required' => false
            ),
        'Alt' => array(
            'name' => 'Alt',
            'dataType' => 'string',
            'required' => false
            ),
        'BlockType' => array(
            'name' => 'BlockType',
            'dataType' => 'string',
            'required' => false
            ),
        'Color' => array(
            'name' => 'Color',
            'dataType' => 'string',
            'required' => false
            ),
        'Content' => array(
            'name' => 'Content',
            'dataType' => 'string',
            'required' => false
            ),
        'Filename' => array(
            'name' => 'Filename',
            'dataType' => 'string',
            'required' => false
            ),
        'Fontfamily' => array(
            'name' => 'Fontfamily',
            'dataType' => 'string',
            'required' => false
            ),
        'Fontsize' => array(
            'name' => 'Fontsize',
            'dataType' => 'string',
            'required' => false
            ),
        'ID' => array(
            'name' => 'ID',
            'dataType' => 'int',
            'required' => false
            ),
        'Line' => array(
            'name' => 'Line',
            'dataType' => 'int',
            'required' => false
            ),
        'Link' => array(
            'name' => 'Link',
            'dataType' => 'string',
            'required' => false
            ),
        'Pos' => array(
            'name' => 'Pos',
            'dataType' => 'int',
            'required' => false
            ),
        'Siblings' => array(
            'name' => 'Siblings',
            'dataType' => 'int',
            'required' => false
            ),
        'SrcHeight' => array(
            'name' => 'SrcHeight',
            'dataType' => 'int',
            'required' => false
            ),
        'SrcWidth' => array(
            'name' => 'SrcWidth',
            'dataType' => 'int',
            'required' => false
            ),
        'TemplateID' => array(
            'name' => 'TemplateID',
            'dataType' => 'int',
            'required' => true
            ),
        'Url' => array(
            'name' => 'Url',
            'dataType' => 'string',
            'required' => false
            ),
        'Width' => array(
            'name' => 'Width',
            'dataType' => 'string',
            'required' => false
            )
        );

    /**
     * Post __construct initializations
     */
    public function init()
    {
        $this->getResultSetPrototype()->setObjectPrototype(new Mailjet\Model\Newslettertemplateblock);
        $this->setUrl('http://api.mailjet.com/v3/REST/newslettertemplateblock/');
    }

    /**
     * Return list of Mailjet\Model\Newslettertemplateblock
     *
     * Return list of Mailjet\Model\Newslettertemplateblock filtered by $filters if
     * provided
     *
     *
     * @param array key/val filters
     * @return ResultSet\ResultSet List of Mailjet\Model\Newslettertemplateblock
     */
    public function getList(array $filters = array())
    {
        return parent::_list($filters);
    }

    /**
     * Return list of Mailjet\Model\Newslettertemplateblock with NewsLetterTemplate =
     * $NewsLetterTemplate
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
     * Return Mailjet\Model\Newslettertemplateblock with id = $id
     *
     * @param int Id of resource to get
     * @return Mailjet\Model\Newslettertemplateblock
     */
    public function get($id)
    {
        if (empty($id)) {
            throw new Exception\InvalidArgumentException("You must specify the ID");
        }

        return parent::_get($id);
    }

    /**
     * Update existing Newslettertemplateblock
     *
     * @param Mailjet\Model\Newslettertemplateblock
     * @return Mailjet\Model\Newslettertemplateblock|false Object created or false
     */
    public function update(Mailjet\Model\Newslettertemplateblock &$Newslettertemplateblock)
    {
        return parent::_update($Newslettertemplateblock);
    }

    /**
     * Create a new Newslettertemplateblock
     *
     * @param Mailjet\Model\Newslettertemplateblock
     * @return Mailjet\Model\Newslettertemplateblock|false Object created or false
     */
    public function create(Mailjet\Model\Newslettertemplateblock &$Newslettertemplateblock)
    {
        return parent::_create($Newslettertemplateblock);
    }

    /**
     * Delete the Newslettertemplateblock with id = $id
     *
     * @param integer Id to delete
     * @return bool True on success
     */
    public function delete($id)
    {
        return parent::_delete($id);
    }


}

