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
 * Myprofile Api
 *
 * User profile data: payment information etc.
 *
 * @see http://mjdemo.poxx.net/~shubham/myprofile.html
 */
class Myprofile extends AbstractApi
{

    /**
     * Api name
     */
    protected $name = 'myprofile';

    /**
     * Supported Filters
     */
    protected $filters = array('User' => array(
            'name' => 'User',
            'required' => false
            ));

    /**
     * Supported properties
     */
    protected $properties = array(
        'AddressCity' => array(
            'name' => 'AddressCity',
            'dataType' => 'string',
            'required' => false
            ),
        'AddressCountry' => array(
            'name' => 'AddressCountry',
            'dataType' => 'string',
            'required' => false
            ),
        'AddressPostalCode' => array(
            'name' => 'AddressPostalCode',
            'dataType' => 'string',
            'required' => false
            ),
        'AddressStreet' => array(
            'name' => 'AddressStreet',
            'dataType' => 'string',
            'required' => false
            ),
        'BillingEmail' => array(
            'name' => 'BillingEmail',
            'dataType' => 'string',
            'required' => false
            ),
        'BirthdayAt' => array(
            'name' => 'BirthdayAt',
            'dataType' => '\Datetime',
            'required' => false
            ),
        'CompanyName' => array(
            'name' => 'CompanyName',
            'dataType' => 'string',
            'required' => false
            ),
        'CompanyNameEu' => array(
            'name' => 'CompanyNameEu',
            'dataType' => 'string',
            'required' => false
            ),
        'ContactPhone' => array(
            'name' => 'ContactPhone',
            'dataType' => 'string',
            'required' => false
            ),
        'EstimatedVolume' => array(
            'name' => 'EstimatedVolume',
            'dataType' => 'int',
            'required' => false
            ),
        'Features' => array(
            'name' => 'Features',
            'dataType' => 'string',
            'required' => false
            ),
        'Firstname' => array(
            'name' => 'Firstname',
            'dataType' => 'string',
            'required' => false
            ),
        'ID' => array(
            'name' => 'ID',
            'dataType' => 'int',
            'required' => false
            ),
        'Industry' => array(
            'name' => 'Industry',
            'dataType' => 'string',
            'required' => false
            ),
        'Lastname' => array(
            'name' => 'Lastname',
            'dataType' => 'string',
            'required' => false
            ),
        'UserID' => array(
            'name' => 'UserID',
            'dataType' => 'int',
            'required' => false
            ),
        'VAT' => array(
            'name' => 'VAT',
            'dataType' => 'string',
            'required' => false
            ),
        'VATNumber' => array(
            'name' => 'VATNumber',
            'dataType' => 'string',
            'required' => false
            ),
        'VATNumberStatus' => array(
            'name' => 'VATNumberStatus',
            'dataType' => 'int',
            'required' => false
            ),
        'VATNumberTrusted' => array(
            'name' => 'VATNumberTrusted',
            'dataType' => 'string',
            'required' => false
            ),
        'Website' => array(
            'name' => 'Website',
            'dataType' => 'string',
            'required' => false
            )
        );

    /**
     * Post __construct initializations
     */
    public function init()
    {
        $this->getResultSetPrototype()->setObjectPrototype(new Mailjet\Model\Myprofile);
        $this->setUrl('http://api.mailjet.com/v3/REST/myprofile/');
        $hydrator = $this->getResultSetPrototype()->getHydrator();
        $hydrator->addStrategy('BirthdayAt', new TRFC3339DateTimeStrategy());
    }

    /**
     * Return list of Mailjet\Model\Myprofile
     *
     * Return list of Mailjet\Model\Myprofile filtered by $filters if provided
     *
     *
     * @param array key/val filters
     * @return ResultSet\ResultSet List of Mailjet\Model\Myprofile
     */
    public function getList(array $filters = array())
    {
        return parent::_list($filters);
    }

    /**
     * Return list of Mailjet\Model\Myprofile with User = $User
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
     * Return Mailjet\Model\Myprofile with id = $id
     *
     * @param int Id of resource to get
     * @return Mailjet\Model\Myprofile
     */
    public function get($id)
    {
        if (empty($id)) {
            throw new Exception\InvalidArgumentException("You must specify the ID");
        }

        return parent::_get($id);
    }

    /**
     * Update existing Myprofile
     *
     * @param Mailjet\Model\Myprofile
     * @return Mailjet\Model\Myprofile|false Object created or false
     */
    public function update(Mailjet\Model\Myprofile &$Myprofile)
    {
        return parent::_update($Myprofile);
    }


}

