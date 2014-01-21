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

use \Datetime;

/**
 * Eventcallbackurl Model
 *
 * URLs for event mechanisms (triggers) of Mailjet
 */
class Eventcallbackurl implements ModelInterface
{

    /**
     * API Key for which the callback URL is registered.
     */
    protected $APIKeyID = null;

    /**
     * Numerical event type.
     */
    protected $EventType = null;

    /**
     * Unique numerical ID for this object
     */
    protected $ID = null;

    /**
     * Is this a backup URL ?
     */
    protected $IsBackup = false;

    /**
     * Status of the event
     */
    protected $Status = null;

    /**
     * Timestamp indicating when this object was last modified.
     */
    protected $UpdatedAt = null;

    /**
     * URL to use
     */
    protected $Url = null;

    /**
     * Event API version for which this URL is valid.
     */
    protected $Version = null;

    /**
     * Sets the API Key for which the callback URL is registered.
     *
     * @param int
     * @return Eventcallbackurl
     */
    public function setAPIKeyID($APIKeyID)
    {
        $this->APIKeyID = $APIKeyID;
        return $this;
    }

    /**
     * Gets the API Key for which the callback URL is registered.
     *
     * @return int
     */
    public function getAPIKeyID()
    {
        return $this->APIKeyID;
    }

    /**
     * Sets the Numerical event type.
     *
     * @param int
     * @return Eventcallbackurl
     */
    public function setEventType($EventType = null)
    {
        $this->EventType = $EventType;
        return $this;
    }

    /**
     * Gets the Numerical event type.
     *
     * @return int
     */
    public function getEventType()
    {
        return $this->EventType;
    }

    /**
     * Sets the Unique numerical ID for this object
     *
     * @param int
     * @return Eventcallbackurl
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
     * Sets the Is this a backup URL ?
     *
     * @param bool
     * @return Eventcallbackurl
     */
    public function setIsBackup($IsBackup = null)
    {
        $this->IsBackup = $IsBackup;
        return $this;
    }

    /**
     * Gets the Is this a backup URL ?
     *
     * @return bool
     */
    public function getIsBackup()
    {
        return $this->IsBackup;
    }

    /**
     * Sets the Status of the event
     *
     * @param int
     * @return Eventcallbackurl
     */
    public function setStatus($Status = null)
    {
        $this->Status = $Status;
        return $this;
    }

    /**
     * Gets the Status of the event
     *
     * @return int
     */
    public function getStatus()
    {
        return $this->Status;
    }

    /**
     * Sets the Timestamp indicating when this object was last modified.
     *
     * @param \Datetime
     * @return Eventcallbackurl
     */
    public function setUpdatedAt(\Datetime $UpdatedAt = null)
    {
        $this->UpdatedAt = $UpdatedAt;
        return $this;
    }

    /**
     * Gets the Timestamp indicating when this object was last modified.
     *
     * @return \Datetime
     */
    public function getUpdatedAt()
    {
        return $this->UpdatedAt;
    }

    /**
     * Sets the URL to use
     *
     * @param string
     * @return Eventcallbackurl
     */
    public function setUrl($Url)
    {
        $this->Url = $Url;
        return $this;
    }

    /**
     * Gets the URL to use
     *
     * @return string
     */
    public function getUrl()
    {
        return $this->Url;
    }

    /**
     * Sets the Event API version for which this URL is valid.
     *
     * @param int
     * @return Eventcallbackurl
     */
    public function setVersion($Version = null)
    {
        $this->Version = $Version;
        return $this;
    }

    /**
     * Gets the Event API version for which this URL is valid.
     *
     * @return int
     */
    public function getVersion()
    {
        return $this->Version;
    }


}

