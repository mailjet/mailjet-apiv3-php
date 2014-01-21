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
 * Newsletterblock Api
 *
 * HTML data for a block from a newsletter
 *
 * @see http://mjdemo.poxx.net/~shubham/newsletterblock.html
 */
class Newsletterblock extends AbstractApi
{

    /**
     * Api name
     */
    protected $name = 'newsletterblock';

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
        'NewsLetterID' => array(
            'name' => 'NewsLetterID',
            'dataType' => 'int',
            'required' => true
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
        $this->getResultSetPrototype()->setObjectPrototype(new Mailjet\Model\Newsletterblock);
        $this->setUrl('http://api.mailjet.com/v3/REST/newsletterblock/');
    }

    /**
     * Return list of Mailjet\Model\Newsletterblock
     *
     * Return list of Mailjet\Model\Newsletterblock filtered by $filters if provided
     *
     *
     * @param array key/val filters
     * @return ResultSet\ResultSet List of Mailjet\Model\Newsletterblock
     */
    public function getList(array $filters = array())
    {
        return parent::_list($filters);
    }

    /**
     * Return list of Mailjet\Model\Newsletterblock with NewsLetter = $NewsLetter
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
     * Return Mailjet\Model\Newsletterblock with id = $id
     *
     * @param int Id of resource to get
     * @return Mailjet\Model\Newsletterblock
     */
    public function get($id)
    {
        if (empty($id)) {
            throw new Exception\InvalidArgumentException("You must specify the ID");
        }

        return parent::_get($id);
    }

    /**
     * Update existing Newsletterblock
     *
     * @param Mailjet\Model\Newsletterblock
     * @return Mailjet\Model\Newsletterblock|false Object created or false
     */
    public function update(Mailjet\Model\Newsletterblock &$Newsletterblock)
    {
        return parent::_update($Newsletterblock);
    }

    /**
     * Create a new Newsletterblock
     *
     * @param Mailjet\Model\Newsletterblock
     * @return Mailjet\Model\Newsletterblock|false Object created or false
     */
    public function create(Mailjet\Model\Newsletterblock &$Newsletterblock)
    {
        return parent::_create($Newsletterblock);
    }

    /**
     * Delete the Newsletterblock with id = $id
     *
     * @param integer Id to delete
     * @return bool True on success
     */
    public function delete($id)
    {
        return parent::_delete($id);
    }


}

