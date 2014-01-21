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
 * Campaign Model
 *
 * Campaigns (or transactional messages) sent by an API key.
 */
class Campaign implements ModelInterface
{

    /**
     * Type of campaign (transactional, campaign)
     */
    protected $CampaignType = null;

    /**
     * Number of messages for which click tracking is requested.
     */
    protected $ClickTracked = null;

    /**
     * Timestamp when object was created in database
     */
    protected $CreatedAt = null;

    /**
     * Custom tag for this campaign, must be unique.
     */
    protected $CustomValue = null;

    /**
     * Unique numerical ID for this object
     */
    protected $FirstMessageID = null;

    /**
     * Sender of the campaign
     */
    protected $FromID = null;

    /**
     * Sender email address for the campaign
     */
    protected $FromEmail = null;

    /**
     * Sender name for the campaign
     */
    protected $FromName = null;

    /**
     * Number of messages containing HTML in this campaign.
     */
    protected $HasHtmlCount = null;

    /**
     * Hash value computed from CustomValue
     */
    protected $HashValue = null;

    /**
     * Number of messages containing HTML in this campaign.
     */
    protected $HasTxtCount = null;

    /**
     * Unique numerical ID for this object
     */
    protected $ID = null;

    /**
     * Has the campaign been deleted by the user.
     */
    protected $IsDeleted = false;

    /**
     * Is this campaign marked as starred?
     */
    protected $IsStarred = false;

    /**
     * Reference to contactslist to which campaign is sent.
     */
    protected $ListID = null;

    /**
     * Newletter ID for which the campaign was created.
     */
    protected $NewsLetterID = null;

    /**
     * Number of messages for which open tracking is requested.
     */
    protected $OpenTracked = null;

    /**
     * Timestamp indicating when last message in this campaign was sent.
     */
    protected $SendEndAt = null;

    /**
     * Timestamp indicating when first message in this campaign was sent.
     */
    protected $SendStartAt = null;

    /**
     * Spam Assassin score for this campaign.
     */
    protected $SpamassScore = null;

    /**
     * Status of this campaign
     */
    protected $Status = null;

    /**
     * Campaign subject
     */
    protected $Subject = null;

    /**
     * Number of messages for which unsubscribe tracking is requested.
     */
    protected $UnsubscribeTrackedCount = null;

    /**
     * Sets the Type of campaign (transactional, campaign)
     *
     * @param int
     * @return Campaign
     */
    public function setCampaignType($CampaignType = null)
    {
        $this->CampaignType = $CampaignType;
        return $this;
    }

    /**
     * Gets the Type of campaign (transactional, campaign)
     *
     * @return int
     */
    public function getCampaignType()
    {
        return $this->CampaignType;
    }

    /**
     * Sets the Number of messages for which click tracking is requested.
     *
     * @param int
     * @return Campaign
     */
    public function setClickTracked($ClickTracked = null)
    {
        $this->ClickTracked = $ClickTracked;
        return $this;
    }

    /**
     * Gets the Number of messages for which click tracking is requested.
     *
     * @return int
     */
    public function getClickTracked()
    {
        return $this->ClickTracked;
    }

    /**
     * Sets the Timestamp when object was created in database
     *
     * @param \Datetime
     * @return Campaign
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
     * Sets the Custom tag for this campaign, must be unique.
     *
     * @param string
     * @return Campaign
     */
    public function setCustomValue($CustomValue = null)
    {
        $this->CustomValue = $CustomValue;
        return $this;
    }

    /**
     * Gets the Custom tag for this campaign, must be unique.
     *
     * @return string
     */
    public function getCustomValue()
    {
        return $this->CustomValue;
    }

    /**
     * Sets the Unique numerical ID for this object
     *
     * @param int
     * @return Campaign
     */
    public function setFirstMessageID($FirstMessageID = null)
    {
        $this->FirstMessageID = $FirstMessageID;
        return $this;
    }

    /**
     * Gets the Unique numerical ID for this object
     *
     * @return int
     */
    public function getFirstMessageID()
    {
        return $this->FirstMessageID;
    }

    /**
     * Sets the Sender of the campaign
     *
     * @param int
     * @return Campaign
     */
    public function setFromID($FromID = null)
    {
        $this->FromID = $FromID;
        return $this;
    }

    /**
     * Gets the Sender of the campaign
     *
     * @return int
     */
    public function getFromID()
    {
        return $this->FromID;
    }

    /**
     * Sets the Sender email address for the campaign
     *
     * @param string
     * @return Campaign
     */
    public function setFromEmail($FromEmail)
    {
        $this->FromEmail = $FromEmail;
        return $this;
    }

    /**
     * Gets the Sender email address for the campaign
     *
     * @return string
     */
    public function getFromEmail()
    {
        return $this->FromEmail;
    }

    /**
     * Sets the Sender name for the campaign
     *
     * @param string
     * @return Campaign
     */
    public function setFromName($FromName = null)
    {
        $this->FromName = $FromName;
        return $this;
    }

    /**
     * Gets the Sender name for the campaign
     *
     * @return string
     */
    public function getFromName()
    {
        return $this->FromName;
    }

    /**
     * Sets the Number of messages containing HTML in this campaign.
     *
     * @param int
     * @return Campaign
     */
    public function setHasHtmlCount($HasHtmlCount = null)
    {
        $this->HasHtmlCount = $HasHtmlCount;
        return $this;
    }

    /**
     * Gets the Number of messages containing HTML in this campaign.
     *
     * @return int
     */
    public function getHasHtmlCount()
    {
        return $this->HasHtmlCount;
    }

    /**
     * Sets the Hash value computed from CustomValue
     *
     * @param string
     * @return Campaign
     */
    public function setHashValue($HashValue = null)
    {
        $this->HashValue = $HashValue;
        return $this;
    }

    /**
     * Gets the Hash value computed from CustomValue
     *
     * @return string
     */
    public function getHashValue()
    {
        return $this->HashValue;
    }

    /**
     * Sets the Number of messages containing HTML in this campaign.
     *
     * @param int
     * @return Campaign
     */
    public function setHasTxtCount($HasTxtCount = null)
    {
        $this->HasTxtCount = $HasTxtCount;
        return $this;
    }

    /**
     * Gets the Number of messages containing HTML in this campaign.
     *
     * @return int
     */
    public function getHasTxtCount()
    {
        return $this->HasTxtCount;
    }

    /**
     * Sets the Unique numerical ID for this object
     *
     * @param int
     * @return Campaign
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
     * Sets the Has the campaign been deleted by the user.
     *
     * @param bool
     * @return Campaign
     */
    public function setIsDeleted($IsDeleted = null)
    {
        $this->IsDeleted = $IsDeleted;
        return $this;
    }

    /**
     * Gets the Has the campaign been deleted by the user.
     *
     * @return bool
     */
    public function getIsDeleted()
    {
        return $this->IsDeleted;
    }

    /**
     * Sets the Is this campaign marked as starred?
     *
     * @param bool
     * @return Campaign
     */
    public function setIsStarred($IsStarred = null)
    {
        $this->IsStarred = $IsStarred;
        return $this;
    }

    /**
     * Gets the Is this campaign marked as starred?
     *
     * @return bool
     */
    public function getIsStarred()
    {
        return $this->IsStarred;
    }

    /**
     * Sets the Reference to contactslist to which campaign is sent.
     *
     * @param int
     * @return Campaign
     */
    public function setListID($ListID = null)
    {
        $this->ListID = $ListID;
        return $this;
    }

    /**
     * Gets the Reference to contactslist to which campaign is sent.
     *
     * @return int
     */
    public function getListID()
    {
        return $this->ListID;
    }

    /**
     * Sets the Newletter ID for which the campaign was created.
     *
     * @param int
     * @return Campaign
     */
    public function setNewsLetterID($NewsLetterID = null)
    {
        $this->NewsLetterID = $NewsLetterID;
        return $this;
    }

    /**
     * Gets the Newletter ID for which the campaign was created.
     *
     * @return int
     */
    public function getNewsLetterID()
    {
        return $this->NewsLetterID;
    }

    /**
     * Sets the Number of messages for which open tracking is requested.
     *
     * @param int
     * @return Campaign
     */
    public function setOpenTracked($OpenTracked = null)
    {
        $this->OpenTracked = $OpenTracked;
        return $this;
    }

    /**
     * Gets the Number of messages for which open tracking is requested.
     *
     * @return int
     */
    public function getOpenTracked()
    {
        return $this->OpenTracked;
    }

    /**
     * Sets the Timestamp indicating when last message in this campaign was sent.
     *
     * @param \Datetime
     * @return Campaign
     */
    public function setSendEndAt(\Datetime $SendEndAt = null)
    {
        $this->SendEndAt = $SendEndAt;
        return $this;
    }

    /**
     * Gets the Timestamp indicating when last message in this campaign was sent.
     *
     * @return \Datetime
     */
    public function getSendEndAt()
    {
        return $this->SendEndAt;
    }

    /**
     * Sets the Timestamp indicating when first message in this campaign was sent.
     *
     * @param \Datetime
     * @return Campaign
     */
    public function setSendStartAt(\Datetime $SendStartAt = null)
    {
        $this->SendStartAt = $SendStartAt;
        return $this;
    }

    /**
     * Gets the Timestamp indicating when first message in this campaign was sent.
     *
     * @return \Datetime
     */
    public function getSendStartAt()
    {
        return $this->SendStartAt;
    }

    /**
     * Sets the Spam Assassin score for this campaign.
     *
     * @param string
     * @return Campaign
     */
    public function setSpamassScore($SpamassScore = null)
    {
        $this->SpamassScore = $SpamassScore;
        return $this;
    }

    /**
     * Gets the Spam Assassin score for this campaign.
     *
     * @return string
     */
    public function getSpamassScore()
    {
        return $this->SpamassScore;
    }

    /**
     * Sets the Status of this campaign
     *
     * @param int
     * @return Campaign
     */
    public function setStatus($Status = null)
    {
        $this->Status = $Status;
        return $this;
    }

    /**
     * Gets the Status of this campaign
     *
     * @return int
     */
    public function getStatus()
    {
        return $this->Status;
    }

    /**
     * Sets the Campaign subject
     *
     * @param string
     * @return Campaign
     */
    public function setSubject($Subject = null)
    {
        $this->Subject = $Subject;
        return $this;
    }

    /**
     * Gets the Campaign subject
     *
     * @return string
     */
    public function getSubject()
    {
        return $this->Subject;
    }

    /**
     * Sets the Number of messages for which unsubscribe tracking is requested.
     *
     * @param int
     * @return Campaign
     */
    public function setUnsubscribeTrackedCount($UnsubscribeTrackedCount = null)
    {
        $this->UnsubscribeTrackedCount = $UnsubscribeTrackedCount;
        return $this;
    }

    /**
     * Gets the Number of messages for which unsubscribe tracking is requested.
     *
     * @return int
     */
    public function getUnsubscribeTrackedCount()
    {
        return $this->UnsubscribeTrackedCount;
    }


}

