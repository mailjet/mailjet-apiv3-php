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
 * Message Model
 *
 * API Key messages processed by Mailjet. One record per processed email.
 */
class Message implements ModelInterface
{

    /**
     * Timestamp indicated when the message arrived at Mailjet
     */
    protected $ArrivedAt = null;

    /**
     * Number of attachments detected in the message.
     */
    protected $AttachmentCount = null;

    /**
     * Number of attempts made to deliver the message.
     */
    protected $AttemptCount = null;

    /**
     * Reference to campaign in which this message is delivered.
     */
    protected $CampaignID = null;

    /**
     * ?
     */
    protected $CheckString = null;

    /**
     * Reference to contact to which message was sent.
     */
    protected $ContactID = null;

    /**
     * Delay between arrival and delivery [?]
     */
    protected $Delay = null;

    /**
     * Reference to destination domain
     */
    protected $DestinationID = null;

    /**
     * Reference to DSM information for domain.
     */
    protected $Dsn = null;

    /**
     * Time spent processing the text of the message (milliseconds)
     */
    protected $FilterTime = null;

    /**
     * Reference to the sender of the message.
     */
    protected $FromID = null;

    /**
     * Unique numerical ID for this object
     */
    protected $ID = null;

    /**
     * Was click tracking requested for this message ?
     */
    protected $IsClickTracked = false;

    /**
     * Did the message contain a HTML part ?
     */
    protected $IsHTMLPartIncluded = false;

    /**
     * Was open tracking requested for this message ?
     */
    protected $IsOpenTracked = false;

    /**
     * Did the message contain a text part ?
     */
    protected $IsTextPartIncluded = false;

    /**
     * Was unsubscription tracking requested for this message ?
     */
    protected $IsUnsubTracked = false;

    /**
     * Size of the message (in bytes)
     */
    protected $MessageSize = null;

    /**
     * Subscription plan used to send the message.
     */
    protected $PlanSubscriptionID = null;

    /**
     * IP pool used to send the message.
     */
    protected $PoolIPId = null;

    /**
     * Postfix Queue ID for this message.
     */
    protected $PostfixQid = null;

    /**
     * Spam assassin score for this message.
     */
    protected $SpamassassinScore = null;

    /**
     * Matched spam assassin rules.
     */
    protected $SpamassRules = null;

    /**
     * Current state of the message.
     */
    protected $StateID = null;

    /**
     * Is the state of the message permanent (i.e. will no longer change)
     */
    protected $StatePermanent = false;

    /**
     * Status of the message.
     */
    protected $Status = null;

    /**
     * Timestamp when the message information was last changed.
     */
    protected $UpdatedAt = null;

    /**
     * Sets the Timestamp indicated when the message arrived at Mailjet
     *
     * @param \Datetime
     * @return Message
     */
    public function setArrivedAt(\Datetime $ArrivedAt = null)
    {
        $this->ArrivedAt = $ArrivedAt;
        return $this;
    }

    /**
     * Gets the Timestamp indicated when the message arrived at Mailjet
     *
     * @return \Datetime
     */
    public function getArrivedAt()
    {
        return $this->ArrivedAt;
    }

    /**
     * Sets the Number of attachments detected in the message.
     *
     * @param int
     * @return Message
     */
    public function setAttachmentCount($AttachmentCount = null)
    {
        $this->AttachmentCount = $AttachmentCount;
        return $this;
    }

    /**
     * Gets the Number of attachments detected in the message.
     *
     * @return int
     */
    public function getAttachmentCount()
    {
        return $this->AttachmentCount;
    }

    /**
     * Sets the Number of attempts made to deliver the message.
     *
     * @param int
     * @return Message
     */
    public function setAttemptCount($AttemptCount = null)
    {
        $this->AttemptCount = $AttemptCount;
        return $this;
    }

    /**
     * Gets the Number of attempts made to deliver the message.
     *
     * @return int
     */
    public function getAttemptCount()
    {
        return $this->AttemptCount;
    }

    /**
     * Sets the Reference to campaign in which this message is delivered.
     *
     * @param int
     * @return Message
     */
    public function setCampaignID($CampaignID)
    {
        $this->CampaignID = $CampaignID;
        return $this;
    }

    /**
     * Gets the Reference to campaign in which this message is delivered.
     *
     * @return int
     */
    public function getCampaignID()
    {
        return $this->CampaignID;
    }

    /**
     * Sets the ?
     *
     * @param string
     * @return Message
     */
    public function setCheckString($CheckString = null)
    {
        $this->CheckString = $CheckString;
        return $this;
    }

    /**
     * Gets the ?
     *
     * @return string
     */
    public function getCheckString()
    {
        return $this->CheckString;
    }

    /**
     * Sets the Reference to contact to which message was sent.
     *
     * @param int
     * @return Message
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
     * Sets the Delay between arrival and delivery [?]
     *
     * @param string
     * @return Message
     */
    public function setDelay($Delay = null)
    {
        $this->Delay = $Delay;
        return $this;
    }

    /**
     * Gets the Delay between arrival and delivery [?]
     *
     * @return string
     */
    public function getDelay()
    {
        return $this->Delay;
    }

    /**
     * Sets the Reference to destination domain
     *
     * @param int
     * @return Message
     */
    public function setDestinationID($DestinationID)
    {
        $this->DestinationID = $DestinationID;
        return $this;
    }

    /**
     * Gets the Reference to destination domain
     *
     * @return int
     */
    public function getDestinationID()
    {
        return $this->DestinationID;
    }

    /**
     * Sets the Reference to DSM information for domain.
     *
     * @param string
     * @return Message
     */
    public function setDsn($Dsn = null)
    {
        $this->Dsn = $Dsn;
        return $this;
    }

    /**
     * Gets the Reference to DSM information for domain.
     *
     * @return string
     */
    public function getDsn()
    {
        return $this->Dsn;
    }

    /**
     * Sets the Time spent processing the text of the message (milliseconds)
     *
     * @param int
     * @return Message
     */
    public function setFilterTime($FilterTime = null)
    {
        $this->FilterTime = $FilterTime;
        return $this;
    }

    /**
     * Gets the Time spent processing the text of the message (milliseconds)
     *
     * @return int
     */
    public function getFilterTime()
    {
        return $this->FilterTime;
    }

    /**
     * Sets the Reference to the sender of the message.
     *
     * @param int
     * @return Message
     */
    public function setFromID($FromID)
    {
        $this->FromID = $FromID;
        return $this;
    }

    /**
     * Gets the Reference to the sender of the message.
     *
     * @return int
     */
    public function getFromID()
    {
        return $this->FromID;
    }

    /**
     * Sets the Unique numerical ID for this object
     *
     * @param int
     * @return Message
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
     * Sets the Was click tracking requested for this message ?
     *
     * @param bool
     * @return Message
     */
    public function setIsClickTracked($IsClickTracked = null)
    {
        $this->IsClickTracked = $IsClickTracked;
        return $this;
    }

    /**
     * Gets the Was click tracking requested for this message ?
     *
     * @return bool
     */
    public function getIsClickTracked()
    {
        return $this->IsClickTracked;
    }

    /**
     * Sets the Did the message contain a HTML part ?
     *
     * @param bool
     * @return Message
     */
    public function setIsHTMLPartIncluded($IsHTMLPartIncluded = null)
    {
        $this->IsHTMLPartIncluded = $IsHTMLPartIncluded;
        return $this;
    }

    /**
     * Gets the Did the message contain a HTML part ?
     *
     * @return bool
     */
    public function getIsHTMLPartIncluded()
    {
        return $this->IsHTMLPartIncluded;
    }

    /**
     * Sets the Was open tracking requested for this message ?
     *
     * @param bool
     * @return Message
     */
    public function setIsOpenTracked($IsOpenTracked = null)
    {
        $this->IsOpenTracked = $IsOpenTracked;
        return $this;
    }

    /**
     * Gets the Was open tracking requested for this message ?
     *
     * @return bool
     */
    public function getIsOpenTracked()
    {
        return $this->IsOpenTracked;
    }

    /**
     * Sets the Did the message contain a text part ?
     *
     * @param bool
     * @return Message
     */
    public function setIsTextPartIncluded($IsTextPartIncluded = null)
    {
        $this->IsTextPartIncluded = $IsTextPartIncluded;
        return $this;
    }

    /**
     * Gets the Did the message contain a text part ?
     *
     * @return bool
     */
    public function getIsTextPartIncluded()
    {
        return $this->IsTextPartIncluded;
    }

    /**
     * Sets the Was unsubscription tracking requested for this message ?
     *
     * @param bool
     * @return Message
     */
    public function setIsUnsubTracked($IsUnsubTracked = null)
    {
        $this->IsUnsubTracked = $IsUnsubTracked;
        return $this;
    }

    /**
     * Gets the Was unsubscription tracking requested for this message ?
     *
     * @return bool
     */
    public function getIsUnsubTracked()
    {
        return $this->IsUnsubTracked;
    }

    /**
     * Sets the Size of the message (in bytes)
     *
     * @param int
     * @return Message
     */
    public function setMessageSize($MessageSize = null)
    {
        $this->MessageSize = $MessageSize;
        return $this;
    }

    /**
     * Gets the Size of the message (in bytes)
     *
     * @return int
     */
    public function getMessageSize()
    {
        return $this->MessageSize;
    }

    /**
     * Sets the Subscription plan used to send the message.
     *
     * @param int
     * @return Message
     */
    public function setPlanSubscriptionID($PlanSubscriptionID)
    {
        $this->PlanSubscriptionID = $PlanSubscriptionID;
        return $this;
    }

    /**
     * Gets the Subscription plan used to send the message.
     *
     * @return int
     */
    public function getPlanSubscriptionID()
    {
        return $this->PlanSubscriptionID;
    }

    /**
     * Sets the IP pool used to send the message.
     *
     * @param int
     * @return Message
     */
    public function setPoolIPId($PoolIPId = null)
    {
        $this->PoolIPId = $PoolIPId;
        return $this;
    }

    /**
     * Gets the IP pool used to send the message.
     *
     * @return int
     */
    public function getPoolIPId()
    {
        return $this->PoolIPId;
    }

    /**
     * Sets the Postfix Queue ID for this message.
     *
     * @param string
     * @return Message
     */
    public function setPostfixQid($PostfixQid = null)
    {
        $this->PostfixQid = $PostfixQid;
        return $this;
    }

    /**
     * Gets the Postfix Queue ID for this message.
     *
     * @return string
     */
    public function getPostfixQid()
    {
        return $this->PostfixQid;
    }

    /**
     * Sets the Spam assassin score for this message.
     *
     * @param string
     * @return Message
     */
    public function setSpamassassinScore($SpamassassinScore = null)
    {
        $this->SpamassassinScore = $SpamassassinScore;
        return $this;
    }

    /**
     * Gets the Spam assassin score for this message.
     *
     * @return string
     */
    public function getSpamassassinScore()
    {
        return $this->SpamassassinScore;
    }

    /**
     * Sets the Matched spam assassin rules.
     *
     * @param string
     * @return Message
     */
    public function setSpamassRules($SpamassRules = null)
    {
        $this->SpamassRules = $SpamassRules;
        return $this;
    }

    /**
     * Gets the Matched spam assassin rules.
     *
     * @return string
     */
    public function getSpamassRules()
    {
        return $this->SpamassRules;
    }

    /**
     * Sets the Current state of the message.
     *
     * @param int
     * @return Message
     */
    public function setStateID($StateID = null)
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
     * Sets the Is the state of the message permanent (i.e. will no longer change)
     *
     * @param bool
     * @return Message
     */
    public function setStatePermanent($StatePermanent = null)
    {
        $this->StatePermanent = $StatePermanent;
        return $this;
    }

    /**
     * Gets the Is the state of the message permanent (i.e. will no longer change)
     *
     * @return bool
     */
    public function getStatePermanent()
    {
        return $this->StatePermanent;
    }

    /**
     * Sets the Status of the message.
     *
     * @param int
     * @return Message
     */
    public function setStatus($Status = null)
    {
        $this->Status = $Status;
        return $this;
    }

    /**
     * Gets the Status of the message.
     *
     * @return int
     */
    public function getStatus()
    {
        return $this->Status;
    }

    /**
     * Sets the Timestamp when the message information was last changed.
     *
     * @param \Datetime
     * @return Message
     */
    public function setUpdatedAt(\Datetime $UpdatedAt = null)
    {
        $this->UpdatedAt = $UpdatedAt;
        return $this;
    }

    /**
     * Gets the Timestamp when the message information was last changed.
     *
     * @return \Datetime
     */
    public function getUpdatedAt()
    {
        return $this->UpdatedAt;
    }


}

