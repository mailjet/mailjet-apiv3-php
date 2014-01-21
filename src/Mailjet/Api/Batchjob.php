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
use \Datetime;

/**
 * Batchjob Api
 *
 * Batch jobs in the mailjet system.
 *
 * @see http://mjdemo.poxx.net/~shubham/batchjob.html
 */
class Batchjob extends AbstractApi
{

    /**
     * Api name
     */
    protected $name = 'batchjob';

    /**
     * Supported Filters
     */
    protected $filters = array(
        'APIKey' => array(
            'name' => 'APIKey',
            'required' => false
            ),
        'Data' => array(
            'name' => 'Data',
            'required' => false
            ),
        'MaxJobEnd' => array(
            'name' => 'MaxJobEnd',
            'required' => false
            ),
        'MaxJobStart' => array(
            'name' => 'MaxJobStart',
            'required' => false
            ),
        'MaxRequestAt' => array(
            'name' => 'MaxRequestAt',
            'required' => false
            ),
        'Method' => array(
            'name' => 'Method',
            'required' => false
            ),
        'MinJobEnd' => array(
            'name' => 'MinJobEnd',
            'required' => false
            ),
        'MinJobStart' => array(
            'name' => 'MinJobStart',
            'required' => false
            ),
        'MinRequestAt' => array(
            'name' => 'MinRequestAt',
            'required' => false
            ),
        'RefID' => array(
            'name' => 'RefID',
            'required' => false
            ),
        'Status' => array(
            'name' => 'Status',
            'required' => false
            )
        );

    /**
     * Supported properties
     */
    protected $properties = array(
        'AliveAt' => array(
            'name' => 'AliveAt',
            'dataType' => 'int',
            'required' => false
            ),
        'APIKeyID' => array(
            'name' => 'APIKeyID',
            'dataType' => 'int',
            'required' => false
            ),
        'Blocksize' => array(
            'name' => 'Blocksize',
            'dataType' => 'int',
            'required' => false
            ),
        'Count' => array(
            'name' => 'Count',
            'dataType' => 'int',
            'required' => false
            ),
        'Current' => array(
            'name' => 'Current',
            'dataType' => 'int',
            'required' => false
            ),
        'Data' => array(
            'name' => 'Data',
            'dataType' => 'int',
            'required' => true
            ),
        'Errcount' => array(
            'name' => 'Errcount',
            'dataType' => 'int',
            'required' => false
            ),
        'ErrTreshold' => array(
            'name' => 'ErrTreshold',
            'dataType' => 'int',
            'required' => false
            ),
        'ID' => array(
            'name' => 'ID',
            'dataType' => 'int',
            'required' => false
            ),
        'JobEnd' => array(
            'name' => 'JobEnd',
            'dataType' => 'int',
            'required' => false
            ),
        'JobStart' => array(
            'name' => 'JobStart',
            'dataType' => 'int',
            'required' => false
            ),
        'JobType' => array(
            'name' => 'JobType',
            'dataType' => 'string',
            'required' => true
            ),
        'Method' => array(
            'name' => 'Method',
            'dataType' => 'string',
            'required' => false
            ),
        'RefId' => array(
            'name' => 'RefId',
            'dataType' => 'int',
            'required' => false
            ),
        'RequestAt' => array(
            'name' => 'RequestAt',
            'dataType' => 'int',
            'required' => false
            ),
        'Status' => array(
            'name' => 'Status',
            'dataType' => 'string',
            'required' => false
            ),
        'Throttle' => array(
            'name' => 'Throttle',
            'dataType' => 'int',
            'required' => false
            )
        );

    /**
     * Post __construct initializations
     */
    public function init()
    {
        $this->getResultSetPrototype()->setObjectPrototype(new Mailjet\Model\Batchjob);
        $this->setUrl('http://api.mailjet.com/v3/REST/batchjob/');
    }

    /**
     * Return list of Mailjet\Model\Batchjob
     *
     * Return list of Mailjet\Model\Batchjob filtered by $filters if provided
     *
     *
     * @param array key/val filters
     * @return ResultSet\ResultSet List of Mailjet\Model\Batchjob
     */
    public function getList(array $filters = array())
    {
        return parent::_list($filters);
    }

    /**
     * Return list of Mailjet\Model\Batchjob with APIKey = $APIKey
     *
     * @param int
     * @return ResultSet\ResultSet
     */
    public function getByAPIKey($APIKey)
    {
        $result = $this->getList(array('APIKey' => $APIKey));
        return $result;
    }

    /**
     * Return list of Mailjet\Model\Batchjob with Data = $Data
     *
     * @param int
     * @return ResultSet\ResultSet
     */
    public function getByData($Data)
    {
        $result = $this->getList(array('Data' => $Data));
        return $result;
    }

    /**
     * Return list of Mailjet\Model\Batchjob with MaxJobEnd = $MaxJobEnd
     *
     * @param \Datetime
     * @return ResultSet\ResultSet
     */
    public function getByMaxJobEnd(\Datetime $MaxJobEnd)
    {
        $result = $this->getList(array('MaxJobEnd' => $MaxJobEnd));
        return $result;
    }

    /**
     * Return list of Mailjet\Model\Batchjob with MaxJobStart = $MaxJobStart
     *
     * @param \Datetime
     * @return ResultSet\ResultSet
     */
    public function getByMaxJobStart(\Datetime $MaxJobStart)
    {
        $result = $this->getList(array('MaxJobStart' => $MaxJobStart));
        return $result;
    }

    /**
     * Return list of Mailjet\Model\Batchjob with MaxRequestAt = $MaxRequestAt
     *
     * @param \Datetime
     * @return ResultSet\ResultSet
     */
    public function getByMaxRequestAt(\Datetime $MaxRequestAt)
    {
        $result = $this->getList(array('MaxRequestAt' => $MaxRequestAt));
        return $result;
    }

    /**
     * Return list of Mailjet\Model\Batchjob with Method = $Method
     *
     * @param string
     * @return ResultSet\ResultSet
     */
    public function getByMethod($Method)
    {
        $result = $this->getList(array('Method' => $Method));
        return $result;
    }

    /**
     * Return list of Mailjet\Model\Batchjob with MinJobEnd = $MinJobEnd
     *
     * @param \Datetime
     * @return ResultSet\ResultSet
     */
    public function getByMinJobEnd(\Datetime $MinJobEnd)
    {
        $result = $this->getList(array('MinJobEnd' => $MinJobEnd));
        return $result;
    }

    /**
     * Return list of Mailjet\Model\Batchjob with MinJobStart = $MinJobStart
     *
     * @param \Datetime
     * @return ResultSet\ResultSet
     */
    public function getByMinJobStart(\Datetime $MinJobStart)
    {
        $result = $this->getList(array('MinJobStart' => $MinJobStart));
        return $result;
    }

    /**
     * Return list of Mailjet\Model\Batchjob with MinRequestAt = $MinRequestAt
     *
     * @param \Datetime
     * @return ResultSet\ResultSet
     */
    public function getByMinRequestAt(\Datetime $MinRequestAt)
    {
        $result = $this->getList(array('MinRequestAt' => $MinRequestAt));
        return $result;
    }

    /**
     * Return list of Mailjet\Model\Batchjob with RefID = $RefID
     *
     * @param int
     * @return ResultSet\ResultSet
     */
    public function getByRefID($RefID)
    {
        $result = $this->getList(array('RefID' => $RefID));
        return $result;
    }

    /**
     * Return list of Mailjet\Model\Batchjob with Status = $Status
     *
     * @param string
     * @return ResultSet\ResultSet
     */
    public function getByStatus($Status)
    {
        $result = $this->getList(array('Status' => $Status));
        return $result;
    }

    /**
     * Return Mailjet\Model\Batchjob with id = $id
     *
     * @param int Id of resource to get
     * @return Mailjet\Model\Batchjob
     */
    public function get($id)
    {
        if (empty($id)) {
            throw new Exception\InvalidArgumentException("You must specify the ID");
        }

        return parent::_get($id);
    }

    /**
     * Update existing Batchjob
     *
     * @param Mailjet\Model\Batchjob
     * @return Mailjet\Model\Batchjob|false Object created or false
     */
    public function update(Mailjet\Model\Batchjob &$Batchjob)
    {
        return parent::_update($Batchjob);
    }

    /**
     * Create a new Batchjob
     *
     * @param Mailjet\Model\Batchjob
     * @return Mailjet\Model\Batchjob|false Object created or false
     */
    public function create(Mailjet\Model\Batchjob &$Batchjob)
    {
        return parent::_create($Batchjob);
    }


}

