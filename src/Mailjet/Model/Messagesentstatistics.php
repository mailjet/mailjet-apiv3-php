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
 * Messagesentstatistics Model
 *
 * API Key Statistical campaign/message data.
 */
class Messagesentstatistics implements ModelInterface
{

    /**
     * When did the message arrive at Mailjet
     */
    protected $ArrivalTs = null;

    /**
     * Was the message blocked ?
     */
    protected $Blocked = false;

    /**
     * Has the message bounced ?
     */
    protected $Bounce = false;

    /**
     * reference to the Campaign to which message belongs.
     */
    protected $CampaignID = null;

    /**
     * Was a click registered for this message ?
     */
    protected $Click = false;

    /**
     * Number of recipients for this campaign.
     */
    protected $CntRecipients = null;

    /**
     * Reference to contact to which message was sent.
     */
    protected $ContactID = null;

    /**
     * Unique numerical ID for this object
     */
    protected $ID = null;

    /**
     * Was the message opened ?
     */
    protected $Open = false;

    /**
     * Is the message still in the queue ?
     */
    protected $Queued = false;

    /**
     * Was the message sent ?
     */
    protected $Sent = false;

    /**
     * Was a spam complaint registered for this message ?
     */
    protected $Spam = false;

    /**
     * Current state of the message.
     */
    protected $StateID = null;

    /**
     * Is the current state of the message permanent ?
     */
    protected $StatePermanent = false;

    /**
     * Current status of the message.
     */
    protected $Status = null;

    /**
     * Sets the When did the message arrive at Mailjet
     *
     * @param \Datetime
     * @return Messagesentstatistics
     */
    public function setArrivalTs(\Datetime $ArrivalTs = null)
    {
        $this->ArrivalTs = $ArrivalTs;
        return $this;
    }

    /**
     * Gets the When did the message arrive at Mailjet
     *
     * @return \Datetime
     */
    public function getArrivalTs()
    {
        return $this->ArrivalTs;
    }

    /**
     * Sets the Was the message blocked ?
     *
     * @param bool
     * @return Messagesentstatistics
     */
    public function setBlocked($Blocked = null)
    {
        $this->Blocked = $Blocked;
        return $this;
    }

    /**
     * Gets the Was the message blocked ?
     *
     * @return bool
     */
    public function getBlocked()
    {
        return $this->Blocked;
    }

    /**
     * Sets the Has the message bounced ?
     *
     * @param bool
     * @return Messagesentstatistics
     */
    public function setBounce($Bounce = null)
    {
        $this->Bounce = $Bounce;
        return $this;
    }

    /**
     * Gets the Has the message bounced ?
     *
     * @return bool
     */
    public function getBounce()
    {
        return $this->Bounce;
    }

    /**
     * Sets the reference to the Campaign to which message belongs.
     *
     * @param int
     * @return Messagesentstatistics
     */
    public function setCampaignID($CampaignID)
    {
        $this->CampaignID = $CampaignID;
        return $this;
    }

    /**
     * Gets the reference to the Campaign to which message belongs.
     *
     * @return int
     */
    public function getCampaignID()
    {
        return $this->CampaignID;
    }

    /**
     * Sets the Was a click registered for this message ?
     *
     * @param bool
     * @return Messagesentstatistics
     */
    public function setClick($Click = null)
    {
        $this->Click = $Click;
        return $this;
    }

    /**
     * Gets the Was a click registered for this message ?
     *
     * @return bool
     */
    public function getClick()
    {
        return $this->Click;
    }

    /**
     * Sets the Number of recipients for this campaign.
     *
     * @param int
     * @return Messagesentstatistics
     */
    public function setCntRecipients($CntRecipients = null)
    {
        $this->CntRecipients = $CntRecipients;
        return $this;
    }

    /**
     * Gets the Number of recipients for this campaign.
     *
     * @return int
     */
    public function getCntRecipients()
    {
        return $this->CntRecipients;
    }

    /**
     * Sets the Reference to contact to which message was sent.
     *
     * @param int
     * @return Messagesentstatistics
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
     * @return Messagesentstatistics
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
     * Sets the Was the message opened ?
     *
     * @param bool
     * @return Messagesentstatistics
     */
    public function setOpen($Open = null)
    {
        $this->Open = $Open;
        return $this;
    }

    /**
     * Gets the Was the message opened ?
     *
     * @return bool
     */
    public function getOpen()
    {
        return $this->Open;
    }

    /**
     * Sets the Is the message still in the queue ?
     *
     * @param bool
     * @return Messagesentstatistics
     */
    public function setQueued($Queued = null)
    {
        $this->Queued = $Queued;
        return $this;
    }

    /**
     * Gets the Is the message still in the queue ?
     *
     * @return bool
     */
    public function getQueued()
    {
        return $this->Queued;
    }

    /**
     * Sets the Was the message sent ?
     *
     * @param bool
     * @return Messagesentstatistics
     */
    public function setSent($Sent = null)
    {
        $this->Sent = $Sent;
        return $this;
    }

    /**
     * Gets the Was the message sent ?
     *
     * @return bool
     */
    public function getSent()
    {
        return $this->Sent;
    }

    /**
     * Sets the Was a spam complaint registered for this message ?
     *
     * @param bool
     * @return Messagesentstatistics
     */
    public function setSpam($Spam = null)
    {
        $this->Spam = $Spam;
        return $this;
    }

    /**
     * Gets the Was a spam complaint registered for this message ?
     *
     * @return bool
     */
    public function getSpam()
    {
        return $this->Spam;
    }

    /**
     * Sets the Current state of the message.
     *
     * @param int
     * @return Messagesentstatistics
     */
    public function setStateID($StateID)
    {
        $this->StateID = $StateID;
        return $this;
    }

    /**
     * Gets the Current state of the message.
     *
     * @return int
     */
    public function getStateID()
    {
        return $this->StateID;
    }

    /**
     * Sets the Is the current state of the message permanent ?
     *
     * @param bool
     * @return Messagesentstatistics
     */
    public function setStatePermanent($StatePermanent = null)
    {
        $this->StatePermanent = $StatePermanent;
        return $this;
    }

    /**
     * Gets the Is the current state of the message permanent ?
     *
     * @return bool
     */
    public function getStatePermanent()
    {
        return $this->StatePermanent;
    }

    /**
     * Sets the Current status of the message.
     *
     * @param string
     * @return Messagesentstatistics
     */
    public function setStatus($Status = null)
    {
        $this->Status = $Status;
        return $this;
    }

    /**
     * Gets the Current status of the message.
     *
     * @return string
     */
    public function getStatus()
    {
        return $this->Status;
    }


}

