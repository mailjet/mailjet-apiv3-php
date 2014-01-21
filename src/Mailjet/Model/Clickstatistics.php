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
 * Clickstatistics Model
 *
 * Click statistics for messages
 */
class Clickstatistics implements ModelInterface
{

    /**
     * Timestamp of registration of click.
     */
    protected $ClickedAt = null;

    /**
     * Delay between registration of click and sending of message.
     */
    protected $ClickedDelay = null;

    /**
     * Contact for which click was registered.
     */
    protected $ContactID = null;

    /**
     * Unique numerical ID for the click event
     */
    protected $ID = null;

    /**
     * Reference to Message for which click was registered.
     */
    protected $MessageID = null;

    /**
     * URL that was clicked
     */
    protected $Url = null;

    /**
     * User agent that was used to open the URL.
     */
    protected $UserAgent = null;

    /**
     * Sets the Timestamp of registration of click.
     *
     * @param \Datetime
     * @return Clickstatistics
     */
    public function setClickedAt(\Datetime $ClickedAt = null)
    {
        $this->ClickedAt = $ClickedAt;
        return $this;
    }

    /**
     * Gets the Timestamp of registration of click.
     *
     * @return \Datetime
     */
    public function getClickedAt()
    {
        return $this->ClickedAt;
    }

    /**
     * Sets the Delay between registration of click and sending of message.
     *
     * @param int
     * @return Clickstatistics
     */
    public function setClickedDelay($ClickedDelay = null)
    {
        $this->ClickedDelay = $ClickedDelay;
        return $this;
    }

    /**
     * Gets the Delay between registration of click and sending of message.
     *
     * @return int
     */
    public function getClickedDelay()
    {
        return $this->ClickedDelay;
    }

    /**
     * Sets the Contact for which click was registered.
     *
     * @param int
     * @return Clickstatistics
     */
    public function setContactID($ContactID)
    {
        $this->ContactID = $ContactID;
        return $this;
    }

    /**
     * Gets the Contact for which click was registered.
     *
     * @return int
     */
    public function getContactID()
    {
        return $this->ContactID;
    }

    /**
     * Sets the Unique numerical ID for the click event
     *
     * @param int
     * @return Clickstatistics
     */
    public function setID($ID = null)
    {
        $this->ID = $ID;
        return $this;
    }

    /**
     * Gets the Unique numerical ID for the click event
     *
     * @return int
     */
    public function getID()
    {
        return $this->ID;
    }

    /**
     * Sets the Reference to Message for which click was registered.
     *
     * @param int
     * @return Clickstatistics
     */
    public function setMessageID($MessageID)
    {
        $this->MessageID = $MessageID;
        return $this;
    }

    /**
     * Gets the Reference to Message for which click was registered.
     *
     * @return int
     */
    public function getMessageID()
    {
        return $this->MessageID;
    }

    /**
     * Sets the URL that was clicked
     *
     * @param string
     * @return Clickstatistics
     */
    public function setUrl($Url)
    {
        $this->Url = $Url;
        return $this;
    }

    /**
     * Gets the URL that was clicked
     *
     * @return string
     */
    public function getUrl()
    {
        return $this->Url;
    }

    /**
     * Sets the User agent that was used to open the URL.
     *
     * @param int
     * @return Clickstatistics
     */
    public function setUserAgent($UserAgent)
    {
        $this->UserAgent = $UserAgent;
        return $this;
    }

    /**
     * Gets the User agent that was used to open the URL.
     *
     * @return int
     */
    public function getUserAgent()
    {
        return $this->UserAgent;
    }


}

