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
 * Openinformation Model
 *
 * API Key message open information
 */
class Openinformation implements ModelInterface
{

    /**
     * Timestamp indicating when the message arrived.
     */
    protected $ArrivedAt = null;

    /**
     * Reference to Campaign in which message is sent
     */
    protected $CampaignID = null;

    /**
     * Reference to contact to which message was sent.
     */
    protected $ContactID = null;

    /**
     * Unique numerical ID for this object
     */
    protected $ID = null;

    /**
     * Unique numerical ID for this object
     */
    protected $MessageID = null;

    /**
     * Timestamp when message open registration was received.
     */
    protected $OpenedAt = null;

    /**
     * Useragent used to view the message.
     */
    protected $UserAgent = null;

    /**
     * Sets the Timestamp indicating when the message arrived.
     *
     * @param \Datetime
     * @return Openinformation
     */
    public function setArrivedAt(\Datetime $ArrivedAt = null)
    {
        $this->ArrivedAt = $ArrivedAt;
        return $this;
    }

    /**
     * Gets the Timestamp indicating when the message arrived.
     *
     * @return \Datetime
     */
    public function getArrivedAt()
    {
        return $this->ArrivedAt;
    }

    /**
     * Sets the Reference to Campaign in which message is sent
     *
     * @param int
     * @return Openinformation
     */
    public function setCampaignID($CampaignID)
    {
        $this->CampaignID = $CampaignID;
        return $this;
    }

    /**
     * Gets the Reference to Campaign in which message is sent
     *
     * @return int
     */
    public function getCampaignID()
    {
        return $this->CampaignID;
    }

    /**
     * Sets the Reference to contact to which message was sent.
     *
     * @param int
     * @return Openinformation
     */
    public function setContactID($ContactID)
    {
        $this->ContactID = $ContactID;
        return $this;
    }

    /**
     * Gets the Reference to contact to which message was sent.
     *
     * @return int
     */
    public function getContactID()
    {
        return $this->ContactID;
    }

    /**
     * Sets the Unique numerical ID for this object
     *
     * @param int
     * @return Openinformation
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
     * Sets the Unique numerical ID for this object
     *
     * @param int
     * @return Openinformation
     */
    public function setMessageID($MessageID = null)
    {
        $this->MessageID = $MessageID;
        return $this;
    }

    /**
     * Gets the Unique numerical ID for this object
     *
     * @return int
     */
    public function getMessageID()
    {
        return $this->MessageID;
    }

    /**
     * Sets the Timestamp when message open registration was received.
     *
     * @param \Datetime
     * @return Openinformation
     */
    public function setOpenedAt(\Datetime $OpenedAt = null)
    {
        $this->OpenedAt = $OpenedAt;
        return $this;
    }

    /**
     * Gets the Timestamp when message open registration was received.
     *
     * @return \Datetime
     */
    public function getOpenedAt()
    {
        return $this->OpenedAt;
    }

    /**
     * Sets the Useragent used to view the message.
     *
     * @param int
     * @return Openinformation
     */
    public function setUserAgent($UserAgent = null)
    {
        $this->UserAgent = $UserAgent;
        return $this;
    }

    /**
     * Gets the Useragent used to view the message.
     *
     * @return int
     */
    public function getUserAgent()
    {
        return $this->UserAgent;
    }


}

