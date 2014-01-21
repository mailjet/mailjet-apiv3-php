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
 * Trigger Model
 *
 * Triggers for outgoing events
 */
class Trigger implements ModelInterface
{

    /**
     * Timestamp when object was written to the database
     */
    protected $AddedTs = null;

    /**
     * Reference to API key to whom this trigger belongs.
     */
    protected $APIKey = null;

    /**
     * JSON with event details
     */
    protected $Details = null;

    /**
     * Type of event
     */
    protected $Event = null;

    /**
     * Unique numerical ID for this object
     */
    protected $ID = null;

    /**
     * Reference to user to whom this trigger belongs.
     */
    protected $User = null;

    /**
     * Sets the Timestamp when object was written to the database
     *
     * @param int
     * @return Trigger
     */
    public function setAddedTs($AddedTs = null)
    {
        $this->AddedTs = $AddedTs;
        return $this;
    }

    /**
     * Gets the Timestamp when object was written to the database
     *
     * @return int
     */
    public function getAddedTs()
    {
        return $this->AddedTs;
    }

    /**
     * Sets the Reference to API key to whom this trigger belongs.
     *
     * @param int
     * @return Trigger
     */
    public function setAPIKey($APIKey = null)
    {
        $this->APIKey = $APIKey;
        return $this;
    }

    /**
     * Gets the Reference to API key to whom this trigger belongs.
     *
     * @return int
     */
    public function getAPIKey()
    {
        return $this->APIKey;
    }

    /**
     * Sets the JSON with event details
     *
     * @param string
     * @return Trigger
     */
    public function setDetails($Details = null)
    {
        $this->Details = $Details;
        return $this;
    }

    /**
     * Gets the JSON with event details
     *
     * @return string
     */
    public function getDetails()
    {
        return $this->Details;
    }

    /**
     * Sets the Type of event
     *
     * @param int
     * @return Trigger
     */
    public function setEvent($Event = null)
    {
        $this->Event = $Event;
        return $this;
    }

    /**
     * Gets the Type of event
     *
     * @return int
     */
    public function getEvent()
    {
        return $this->Event;
    }

    /**
     * Sets the Unique numerical ID for this object
     *
     * @param int
     * @return Trigger
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
     * Sets the Reference to user to whom this trigger belongs.
     *
     * @param int
     * @return Trigger
     */
    public function setUser($User = null)
    {
        $this->User = $User;
        return $this;
    }

    /**
     * Gets the Reference to user to whom this trigger belongs.
     *
     * @return int
     */
    public function getUser()
    {
        return $this->User;
    }


}

