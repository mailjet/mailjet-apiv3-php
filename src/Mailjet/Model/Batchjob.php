<?php
/**
 * MailJet Model
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


namespace Mailjet\Model;

/**
 * Batchjob Model
 *
 * Batch jobs in the mailjet system.
 */
class Batchjob implements ModelInterface
{

    /**
     * Timestamp indicating when batch process was last seen alive.
     */
    protected $AliveAt = null;

    /**
     * API key for which this batch job is destined.
     */
    protected $APIKeyID = null;

    /**
     * Size of processing blocks (e.g. number of contacts to process as one block in a
     * contact import job).
     */
    protected $Blocksize = null;

    /**
     * Total number of items to process. (if applicable)
     */
    protected $Count = null;

    /**
     * Current item being processed (if applicable)
     */
    protected $Current = null;

    /**
     * Reference to more data for this batch job.
     */
    protected $Data = null;

    /**
     * Number of errors encountered.
     */
    protected $Errcount = null;

    /**
     * Maximum amount of errors allowed before aborting the job (as a percentage %)
     */
    protected $ErrTreshold = null;

    /**
     * Unique numerical ID for this object
     */
    protected $ID = null;

    /**
     * Timestamp indicating when job was processed completely.
     */
    protected $JobEnd = null;

    /**
     * Timestamp indicating when job processing was started.
     */
    protected $JobStart = null;

    /**
     * Type of job.
     */
    protected $JobType = null;

    /**
     * Method to use when handling job (e.g. contact import: force, noforce etc.)
     */
    protected $Method = null;

    /**
     * Reference to object being handled (e.g. contact import: the contactslist ID.)
     */
    protected $RefId = null;

    /**
     * Timestamp when batch job request was submitted.
     */
    protected $RequestAt = null;

    /**
     * Current status of the job. Can be set to Abort to cancel treatment.
     */
    protected $Status = null;

    /**
     * General purpose processing speed limit indicator.
     */
    protected $Throttle = null;

    /**
     * Sets the Timestamp indicating when batch process was last seen alive.
     *
     * @param int
     * @return Batchjob
     */
    public function setAliveAt($AliveAt = null)
    {
        $this->AliveAt = $AliveAt;
        return $this;
    }

    /**
     * Gets the Timestamp indicating when batch process was last seen alive.
     *
     * @return int
     */
    public function getAliveAt()
    {
        return $this->AliveAt;
    }

    /**
     * Sets the API key for which this batch job is destined.
     *
     * @param int
     * @return Batchjob
     */
    public function setAPIKeyID($APIKeyID = null)
    {
        $this->APIKeyID = $APIKeyID;
        return $this;
    }

    /**
     * Gets the API key for which this batch job is destined.
     *
     * @return int
     */
    public function getAPIKeyID()
    {
        return $this->APIKeyID;
    }

    /**
     * Sets the Size of processing blocks (e.g. number of contacts to process as one
     * block in a contact import job).
     *
     * @param int
     * @return Batchjob
     */
    public function setBlocksize($Blocksize = null)
    {
        $this->Blocksize = $Blocksize;
        return $this;
    }

    /**
     * Gets the Size of processing blocks (e.g. number of contacts to process as one
     * block in a contact import job).
     *
     * @return int
     */
    public function getBlocksize()
    {
        return $this->Blocksize;
    }

    /**
     * Sets the Total number of items to process. (if applicable)
     *
     * @param int
     * @return Batchjob
     */
    public function setCount($Count = null)
    {
        $this->Count = $Count;
        return $this;
    }

    /**
     * Gets the Total number of items to process. (if applicable)
     *
     * @return int
     */
    public function getCount()
    {
        return $this->Count;
    }

    /**
     * Sets the Current item being processed (if applicable)
     *
     * @param int
     * @return Batchjob
     */
    public function setCurrent($Current = null)
    {
        $this->Current = $Current;
        return $this;
    }

    /**
     * Gets the Current item being processed (if applicable)
     *
     * @return int
     */
    public function getCurrent()
    {
        return $this->Current;
    }

    /**
     * Sets the Reference to more data for this batch job.
     *
     * @param int
     * @return Batchjob
     */
    public function setData($Data)
    {
        $this->Data = $Data;
        return $this;
    }

    /**
     * Gets the Reference to more data for this batch job.
     *
     * @return int
     */
    public function getData()
    {
        return $this->Data;
    }

    /**
     * Sets the Number of errors encountered.
     *
     * @param int
     * @return Batchjob
     */
    public function setErrcount($Errcount = null)
    {
        $this->Errcount = $Errcount;
        return $this;
    }

    /**
     * Gets the Number of errors encountered.
     *
     * @return int
     */
    public function getErrcount()
    {
        return $this->Errcount;
    }

    /**
     * Sets the Maximum amount of errors allowed before aborting the job (as a
     * percentage %)
     *
     * @param int
     * @return Batchjob
     */
    public function setErrTreshold($ErrTreshold = null)
    {
        $this->ErrTreshold = $ErrTreshold;
        return $this;
    }

    /**
     * Gets the Maximum amount of errors allowed before aborting the job (as a
     * percentage %)
     *
     * @return int
     */
    public function getErrTreshold()
    {
        return $this->ErrTreshold;
    }

    /**
     * Sets the Unique numerical ID for this object
     *
     * @param int
     * @return Batchjob
     */
    public function setID($ID = null)
    {
        $this->ID = $ID;
        return $this;
    }

    /**
     * Gets the Unique numerical ID for this object
     *
     * @return int
     */
    public function getID()
    {
        return $this->ID;
    }

    /**
     * Sets the Timestamp indicating when job was processed completely.
     *
     * @param int
     * @return Batchjob
     */
    public function setJobEnd($JobEnd = null)
    {
        $this->JobEnd = $JobEnd;
        return $this;
    }

    /**
     * Gets the Timestamp indicating when job was processed completely.
     *
     * @return int
     */
    public function getJobEnd()
    {
        return $this->JobEnd;
    }

    /**
     * Sets the Timestamp indicating when job processing was started.
     *
     * @param int
     * @return Batchjob
     */
    public function setJobStart($JobStart = null)
    {
        $this->JobStart = $JobStart;
        return $this;
    }

    /**
     * Gets the Timestamp indicating when job processing was started.
     *
     * @return int
     */
    public function getJobStart()
    {
        return $this->JobStart;
    }

    /**
     * Sets the Type of job.
     *
     * @param string
     * @return Batchjob
     */
    public function setJobType($JobType)
    {
        $this->JobType = $JobType;
        return $this;
    }

    /**
     * Gets the Type of job.
     *
     * @return string
     */
    public function getJobType()
    {
        return $this->JobType;
    }

    /**
     * Sets the Method to use when handling job (e.g. contact import: force, noforce
     * etc.)
     *
     * @param string
     * @return Batchjob
     */
    public function setMethod($Method = null)
    {
        $this->Method = $Method;
        return $this;
    }

    /**
     * Gets the Method to use when handling job (e.g. contact import: force, noforce
     * etc.)
     *
     * @return string
     */
    public function getMethod()
    {
        return $this->Method;
    }

    /**
     * Sets the Reference to object being handled (e.g. contact import: the
     * contactslist ID.)
     *
     * @param int
     * @return Batchjob
     */
    public function setRefId($RefId = null)
    {
        $this->RefId = $RefId;
        return $this;
    }

    /**
     * Gets the Reference to object being handled (e.g. contact import: the
     * contactslist ID.)
     *
     * @return int
     */
    public function getRefId()
    {
        return $this->RefId;
    }

    /**
     * Sets the Timestamp when batch job request was submitted.
     *
     * @param int
     * @return Batchjob
     */
    public function setRequestAt($RequestAt = null)
    {
        $this->RequestAt = $RequestAt;
        return $this;
    }

    /**
     * Gets the Timestamp when batch job request was submitted.
     *
     * @return int
     */
    public function getRequestAt()
    {
        return $this->RequestAt;
    }

    /**
     * Sets the Current status of the job. Can be set to Abort to cancel treatment.
     *
     * @param string
     * @return Batchjob
     */
    public function setStatus($Status = null)
    {
        $this->Status = $Status;
        return $this;
    }

    /**
     * Gets the Current status of the job. Can be set to Abort to cancel treatment.
     *
     * @return string
     */
    public function getStatus()
    {
        return $this->Status;
    }

    /**
     * Sets the General purpose processing speed limit indicator.
     *
     * @param int
     * @return Batchjob
     */
    public function setThrottle($Throttle = null)
    {
        $this->Throttle = $Throttle;
        return $this;
    }

    /**
     * Gets the General purpose processing speed limit indicator.
     *
     * @return int
     */
    public function getThrottle()
    {
        return $this->Throttle;
    }


}

