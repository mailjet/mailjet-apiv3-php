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
 * Messageinformation Model
 *
 * API Key campaign/message information.
 */
class Messageinformation implements ModelInterface
{

    /**
     * reference to Campaign to which message belongs.
     */
    protected $CampaignID = null;

    /**
     * Number of click track requests.
     */
    protected $ClickTrackedCount = null;

    /**
     * Reference to contact to which message was sent.
     */
    protected $ContactID = null;

    /**
     * Timestamp when object was created in database
     */
    protected $CreatedAt = null;

    /**
     * Unique numerical ID for this object
     */
    protected $ID = null;

    /**
     * Size of the message.
     */
    protected $MessageSize = null;

    /**
     * Number of open track requests.
     */
    protected $OpenTrackedCount = null;

    /**
     * Number of messages waiting in send queue
     */
    protected $QueuedCount = null;

    /**
     * Timestamp indicating when last message was sent for the campaign.
     */
    protected $SendEndAt = null;

    /**
     * Number of actual sent attempts.
     */
    protected $SentCount = null;

    /**
     * Matched spam assassin rules.
     */
    protected $SpamAssassinRuleListID = null;

    /**
     * Spam assassin score for this message.
     */
    protected $SpamAssassinScore = null;

    /**
     * Sets the reference to Campaign to which message belongs.
     *
     * @param int
     * @return Messageinformation
     */
    public function setCampaignID($CampaignID = null)
    {
        $this->CampaignID = $CampaignID;
        return $this;
    }

    /**
     * Gets the reference to Campaign to which message belongs.
     *
     * @return int
     */
    public function getCampaignID()
    {
        return $this->CampaignID;
    }

    /**
     * Sets the Number of click track requests.
     *
     * @param int
     * @return Messageinformation
     */
    public function setClickTrackedCount($ClickTrackedCount = null)
    {
        $this->ClickTrackedCount = $ClickTrackedCount;
        return $this;
    }

    /**
     * Gets the Number of click track requests.
     *
     * @return int
     */
    public function getClickTrackedCount()
    {
        return $this->ClickTrackedCount;
    }

    /**
     * Sets the Reference to contact to which message was sent.
     *
     * @param int
     * @return Messageinformation
     */
    public function setContactID($ContactID = null)
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
     * Sets the Timestamp when object was created in database
     *
     * @param \Datetime
     * @return Messageinformation
     */
    public function setCreatedAt(\Datetime $CreatedAt = null)
    {
        $this->CreatedAt = $CreatedAt;
        return $this;
    }

    /**
     * Gets the Timestamp when object was created in database
     *
     * @return \Datetime
     */
    public function getCreatedAt()
    {
        return $this->CreatedAt;
    }

    /**
     * Sets the Unique numerical ID for this object
     *
     * @param int
     * @return Messageinformation
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
     * Sets the Size of the message.
     *
     * @param int
     * @return Messageinformation
     */
    public function setMessageSize($MessageSize = null)
    {
        $this->MessageSize = $MessageSize;
        return $this;
    }

    /**
     * Gets the Size of the message.
     *
     * @return int
     */
    public function getMessageSize()
    {
        return $this->MessageSize;
    }

    /**
     * Sets the Number of open track requests.
     *
     * @param int
     * @return Messageinformation
     */
    public function setOpenTrackedCount($OpenTrackedCount = null)
    {
        $this->OpenTrackedCount = $OpenTrackedCount;
        return $this;
    }

    /**
     * Gets the Number of open track requests.
     *
     * @return int
     */
    public function getOpenTrackedCount()
    {
        return $this->OpenTrackedCount;
    }

    /**
     * Sets the Number of messages waiting in send queue
     *
     * @param int
     * @return Messageinformation
     */
    public function setQueuedCount($QueuedCount = null)
    {
        $this->QueuedCount = $QueuedCount;
        return $this;
    }

    /**
     * Gets the Number of messages waiting in send queue
     *
     * @return int
     */
    public function getQueuedCount()
    {
        return $this->QueuedCount;
    }

    /**
     * Sets the Timestamp indicating when last message was sent for the campaign.
     *
     * @param \Datetime
     * @return Messageinformation
     */
    public function setSendEndAt(\Datetime $SendEndAt = null)
    {
        $this->SendEndAt = $SendEndAt;
        return $this;
    }

    /**
     * Gets the Timestamp indicating when last message was sent for the campaign.
     *
     * @return \Datetime
     */
    public function getSendEndAt()
    {
        return $this->SendEndAt;
    }

    /**
     * Sets the Number of actual sent attempts.
     *
     * @param int
     * @return Messageinformation
     */
    public function setSentCount($SentCount = null)
    {
        $this->SentCount = $SentCount;
        return $this;
    }

    /**
     * Gets the Number of actual sent attempts.
     *
     * @return int
     */
    public function getSentCount()
    {
        return $this->SentCount;
    }

    /**
     * Sets the Matched spam assassin rules.
     *
     * @param int
     * @return Messageinformation
     */
    public function setSpamAssassinRuleListID($SpamAssassinRuleListID = null)
    {
        $this->SpamAssassinRuleListID = $SpamAssassinRuleListID;
        return $this;
    }

    /**
     * Gets the Matched spam assassin rules.
     *
     * @return int
     */
    public function getSpamAssassinRuleListID()
    {
        return $this->SpamAssassinRuleListID;
    }

    /**
     * Sets the Spam assassin score for this message.
     *
     * @param string
     * @return Messageinformation
     */
    public function setSpamAssassinScore($SpamAssassinScore = null)
    {
        $this->SpamAssassinScore = $SpamAssassinScore;
        return $this;
    }

    /**
     * Gets the Spam assassin score for this message.
     *
     * @return string
     */
    public function getSpamAssassinScore()
    {
        return $this->SpamAssassinScore;
    }


}

