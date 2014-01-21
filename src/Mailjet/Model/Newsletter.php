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
 * Newsletter Model
 *
 * Newsletter data
 */
class Newsletter implements ModelInterface
{

    /**
     * Callback URL
     */
    protected $Callback = null;

    /**
     * Reference to campaign created for this newsletter.
     */
    protected $CampaignID = null;

    /**
     * Reference to contacts list to which newsletter will be sent.
     */
    protected $ContactsListID = null;

    /**
     * Timestamp when object was created in database
     */
    protected $CreatedAt = null;

    /**
     * When the newsletter was delivered.
     */
    protected $DeliveredAt = null;

    /**
     * Edit mode for newsletter
     */
    protected $EditMode = null;

    /**
     * Edit type
     */
    protected $EditType = null;

    /**
     * Raw SMTP message sent by Mailjet
     */
    protected $EmailSMTPMsg = null;

    /**
     * Footer type to generate.
     */
    protected $Footer = null;

    /**
     * Address to use in footer.
     */
    protected $FooterAddress = null;

    /**
     * What kind of footer to generate.
     */
    protected $FooterWYSIWYGType = null;

    /**
     * Filename to use in header
     */
    protected $HeaderFilename = null;

    /**
     * Link used in header
     */
    protected $HeaderLink = null;

    /**
     * Text of header
     */
    protected $HeaderText = null;

    /**
     * URL used in header
     */
    protected $HeaderUrl = null;

    /**
     * Unique numerical ID for this object
     */
    protected $ID = null;

    /**
     * IP address used to create newsletter
     */
    protected $Ip = null;

    /**
     * Has the newsletter been handled by Mailjet ?
     */
    protected $IsHandled = false;

    /**
     * Is this a starred newsletter ?
     */
    protected $IsStarred = false;

    /**
     * Does the newsletter include a text version ?
     */
    protected $IsTextPartIncluded = false;

    /**
     * Locale in which the information in this record is recorded.
     */
    protected $Locale = null;

    /**
     * Timestamp when newsletter content was last modified.
     */
    protected $ModifiedAt = null;

    /**
     * Modification status of the newsletter.
     */
    protected $ModStatus = null;

    /**
     * Type of permalink that should be added to the newsletter.
     */
    protected $Permalink = null;

    /**
     * Host for the permalink
     */
    protected $PermalinkHost = null;

    /**
     * ?
     */
    protected $PermalinkWYSIWYGType = null;

    /**
     * ?
     */
    protected $PolitenessMode = null;

    /**
     * Reply-To address for the mail.
     */
    protected $ReplyEmail = null;

    /**
     * Sender
     */
    protected $Sender = null;

    /**
     * Sender email address in headers
     */
    protected $SenderEmail = null;

    /**
     * Name of the sender in Sender headers
     */
    protected $SenderName = null;

    /**
     * Status of the newsletter
     */
    protected $Status = null;

    /**
     * Newsletter subject
     */
    protected $Subject = null;

    /**
     * Template from which this newsletter was generated, or as which it was last
     * saved.
     */
    protected $TemplateID = null;

    /**
     * Address used for testing
     */
    protected $TestAddress = null;

    /**
     * Newsletter title
     */
    protected $Title = null;

    /**
     * Timestamp when newsletter data was last updated.
     */
    protected $UpdatedAt = null;

    /**
     * URL where an online version of the newsletter can be found [?]
     */
    protected $Url = null;

    /**
     * Sets the Callback URL
     *
     * @param string
     * @return Newsletter
     */
    public function setCallback($Callback = null)
    {
        $this->Callback = $Callback;
        return $this;
    }

    /**
     * Gets the Callback URL
     *
     * @return string
     */
    public function getCallback()
    {
        return $this->Callback;
    }

    /**
     * Sets the Reference to campaign created for this newsletter.
     *
     * @param int
     * @return Newsletter
     */
    public function setCampaignID($CampaignID = null)
    {
        $this->CampaignID = $CampaignID;
        return $this;
    }

    /**
     * Gets the Reference to campaign created for this newsletter.
     *
     * @return int
     */
    public function getCampaignID()
    {
        return $this->CampaignID;
    }

    /**
     * Sets the Reference to contacts list to which newsletter will be sent.
     *
     * @param int
     * @return Newsletter
     */
    public function setContactsListID($ContactsListID = null)
    {
        $this->ContactsListID = $ContactsListID;
        return $this;
    }

    /**
     * Gets the Reference to contacts list to which newsletter will be sent.
     *
     * @return int
     */
    public function getContactsListID()
    {
        return $this->ContactsListID;
    }

    /**
     * Sets the Timestamp when object was created in database
     *
     * @param \Datetime
     * @return Newsletter
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
     * Sets the When the newsletter was delivered.
     *
     * @param \Datetime
     * @return Newsletter
     */
    public function setDeliveredAt(\Datetime $DeliveredAt = null)
    {
        $this->DeliveredAt = $DeliveredAt;
        return $this;
    }

    /**
     * Gets the When the newsletter was delivered.
     *
     * @return \Datetime
     */
    public function getDeliveredAt()
    {
        return $this->DeliveredAt;
    }

    /**
     * Sets the Edit mode for newsletter
     *
     * @param string
     * @return Newsletter
     */
    public function setEditMode($EditMode = null)
    {
        $this->EditMode = $EditMode;
        return $this;
    }

    /**
     * Gets the Edit mode for newsletter
     *
     * @return string
     */
    public function getEditMode()
    {
        return $this->EditMode;
    }

    /**
     * Sets the Edit type
     *
     * @param string
     * @return Newsletter
     */
    public function setEditType($EditType = null)
    {
        $this->EditType = $EditType;
        return $this;
    }

    /**
     * Gets the Edit type
     *
     * @return string
     */
    public function getEditType()
    {
        return $this->EditType;
    }

    /**
     * Sets the Raw SMTP message sent by Mailjet
     *
     * @param string
     * @return Newsletter
     */
    public function setEmailSMTPMsg($EmailSMTPMsg = null)
    {
        $this->EmailSMTPMsg = $EmailSMTPMsg;
        return $this;
    }

    /**
     * Gets the Raw SMTP message sent by Mailjet
     *
     * @return string
     */
    public function getEmailSMTPMsg()
    {
        return $this->EmailSMTPMsg;
    }

    /**
     * Sets the Footer type to generate.
     *
     * @param string
     * @return Newsletter
     */
    public function setFooter($Footer = null)
    {
        $this->Footer = $Footer;
        return $this;
    }

    /**
     * Gets the Footer type to generate.
     *
     * @return string
     */
    public function getFooter()
    {
        return $this->Footer;
    }

    /**
     * Sets the Address to use in footer.
     *
     * @param string
     * @return Newsletter
     */
    public function setFooterAddress($FooterAddress = null)
    {
        $this->FooterAddress = $FooterAddress;
        return $this;
    }

    /**
     * Gets the Address to use in footer.
     *
     * @return string
     */
    public function getFooterAddress()
    {
        return $this->FooterAddress;
    }

    /**
     * Sets the What kind of footer to generate.
     *
     * @param int
     * @return Newsletter
     */
    public function setFooterWYSIWYGType($FooterWYSIWYGType = null)
    {
        $this->FooterWYSIWYGType = $FooterWYSIWYGType;
        return $this;
    }

    /**
     * Gets the What kind of footer to generate.
     *
     * @return int
     */
    public function getFooterWYSIWYGType()
    {
        return $this->FooterWYSIWYGType;
    }

    /**
     * Sets the Filename to use in header
     *
     * @param string
     * @return Newsletter
     */
    public function setHeaderFilename($HeaderFilename = null)
    {
        $this->HeaderFilename = $HeaderFilename;
        return $this;
    }

    /**
     * Gets the Filename to use in header
     *
     * @return string
     */
    public function getHeaderFilename()
    {
        return $this->HeaderFilename;
    }

    /**
     * Sets the Link used in header
     *
     * @param string
     * @return Newsletter
     */
    public function setHeaderLink($HeaderLink = null)
    {
        $this->HeaderLink = $HeaderLink;
        return $this;
    }

    /**
     * Gets the Link used in header
     *
     * @return string
     */
    public function getHeaderLink()
    {
        return $this->HeaderLink;
    }

    /**
     * Sets the Text of header
     *
     * @param string
     * @return Newsletter
     */
    public function setHeaderText($HeaderText = null)
    {
        $this->HeaderText = $HeaderText;
        return $this;
    }

    /**
     * Gets the Text of header
     *
     * @return string
     */
    public function getHeaderText()
    {
        return $this->HeaderText;
    }

    /**
     * Sets the URL used in header
     *
     * @param string
     * @return Newsletter
     */
    public function setHeaderUrl($HeaderUrl = null)
    {
        $this->HeaderUrl = $HeaderUrl;
        return $this;
    }

    /**
     * Gets the URL used in header
     *
     * @return string
     */
    public function getHeaderUrl()
    {
        return $this->HeaderUrl;
    }

    /**
     * Sets the Unique numerical ID for this object
     *
     * @param int
     * @return Newsletter
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
     * Sets the IP address used to create newsletter
     *
     * @param string
     * @return Newsletter
     */
    public function setIp($Ip = null)
    {
        $this->Ip = $Ip;
        return $this;
    }

    /**
     * Gets the IP address used to create newsletter
     *
     * @return string
     */
    public function getIp()
    {
        return $this->Ip;
    }

    /**
     * Sets the Has the newsletter been handled by Mailjet ?
     *
     * @param bool
     * @return Newsletter
     */
    public function setIsHandled($IsHandled = null)
    {
        $this->IsHandled = $IsHandled;
        return $this;
    }

    /**
     * Gets the Has the newsletter been handled by Mailjet ?
     *
     * @return bool
     */
    public function getIsHandled()
    {
        return $this->IsHandled;
    }

    /**
     * Sets the Is this a starred newsletter ?
     *
     * @param bool
     * @return Newsletter
     */
    public function setIsStarred($IsStarred = null)
    {
        $this->IsStarred = $IsStarred;
        return $this;
    }

    /**
     * Gets the Is this a starred newsletter ?
     *
     * @return bool
     */
    public function getIsStarred()
    {
        return $this->IsStarred;
    }

    /**
     * Sets the Does the newsletter include a text version ?
     *
     * @param bool
     * @return Newsletter
     */
    public function setIsTextPartIncluded($IsTextPartIncluded = null)
    {
        $this->IsTextPartIncluded = $IsTextPartIncluded;
        return $this;
    }

    /**
     * Gets the Does the newsletter include a text version ?
     *
     * @return bool
     */
    public function getIsTextPartIncluded()
    {
        return $this->IsTextPartIncluded;
    }

    /**
     * Sets the Locale in which the information in this record is recorded.
     *
     * @param string
     * @return Newsletter
     */
    public function setLocale($Locale)
    {
        $this->Locale = $Locale;
        return $this;
    }

    /**
     * Gets the Locale in which the information in this record is recorded.
     *
     * @return string
     */
    public function getLocale()
    {
        return $this->Locale;
    }

    /**
     * Sets the Timestamp when newsletter content was last modified.
     *
     * @param \Datetime
     * @return Newsletter
     */
    public function setModifiedAt(\Datetime $ModifiedAt = null)
    {
        $this->ModifiedAt = $ModifiedAt;
        return $this;
    }

    /**
     * Gets the Timestamp when newsletter content was last modified.
     *
     * @return \Datetime
     */
    public function getModifiedAt()
    {
        return $this->ModifiedAt;
    }

    /**
     * Sets the Modification status of the newsletter.
     *
     * @param int
     * @return Newsletter
     */
    public function setModStatus($ModStatus = null)
    {
        $this->ModStatus = $ModStatus;
        return $this;
    }

    /**
     * Gets the Modification status of the newsletter.
     *
     * @return int
     */
    public function getModStatus()
    {
        return $this->ModStatus;
    }

    /**
     * Sets the Type of permalink that should be added to the newsletter.
     *
     * @param string
     * @return Newsletter
     */
    public function setPermalink($Permalink = null)
    {
        $this->Permalink = $Permalink;
        return $this;
    }

    /**
     * Gets the Type of permalink that should be added to the newsletter.
     *
     * @return string
     */
    public function getPermalink()
    {
        return $this->Permalink;
    }

    /**
     * Sets the Host for the permalink
     *
     * @param string
     * @return Newsletter
     */
    public function setPermalinkHost($PermalinkHost = null)
    {
        $this->PermalinkHost = $PermalinkHost;
        return $this;
    }

    /**
     * Gets the Host for the permalink
     *
     * @return string
     */
    public function getPermalinkHost()
    {
        return $this->PermalinkHost;
    }

    /**
     * Sets the ?
     *
     * @param int
     * @return Newsletter
     */
    public function setPermalinkWYSIWYGType($PermalinkWYSIWYGType = null)
    {
        $this->PermalinkWYSIWYGType = $PermalinkWYSIWYGType;
        return $this;
    }

    /**
     * Gets the ?
     *
     * @return int
     */
    public function getPermalinkWYSIWYGType()
    {
        return $this->PermalinkWYSIWYGType;
    }

    /**
     * Sets the ?
     *
     * @param int
     * @return Newsletter
     */
    public function setPolitenessMode($PolitenessMode = null)
    {
        $this->PolitenessMode = $PolitenessMode;
        return $this;
    }

    /**
     * Gets the ?
     *
     * @return int
     */
    public function getPolitenessMode()
    {
        return $this->PolitenessMode;
    }

    /**
     * Sets the Reply-To address for the mail.
     *
     * @param string
     * @return Newsletter
     */
    public function setReplyEmail($ReplyEmail = null)
    {
        $this->ReplyEmail = $ReplyEmail;
        return $this;
    }

    /**
     * Gets the Reply-To address for the mail.
     *
     * @return string
     */
    public function getReplyEmail()
    {
        return $this->ReplyEmail;
    }

    /**
     * Sets the Sender
     *
     * @param string
     * @return Newsletter
     */
    public function setSender($Sender)
    {
        $this->Sender = $Sender;
        return $this;
    }

    /**
     * Gets the Sender
     *
     * @return string
     */
    public function getSender()
    {
        return $this->Sender;
    }

    /**
     * Sets the Sender email address in headers
     *
     * @param string
     * @return Newsletter
     */
    public function setSenderEmail($SenderEmail)
    {
        $this->SenderEmail = $SenderEmail;
        return $this;
    }

    /**
     * Gets the Sender email address in headers
     *
     * @return string
     */
    public function getSenderEmail()
    {
        return $this->SenderEmail;
    }

    /**
     * Sets the Name of the sender in Sender headers
     *
     * @param string
     * @return Newsletter
     */
    public function setSenderName($SenderName = null)
    {
        $this->SenderName = $SenderName;
        return $this;
    }

    /**
     * Gets the Name of the sender in Sender headers
     *
     * @return string
     */
    public function getSenderName()
    {
        return $this->SenderName;
    }

    /**
     * Sets the Status of the newsletter
     *
     * @param int
     * @return Newsletter
     */
    public function setStatus($Status = null)
    {
        $this->Status = $Status;
        return $this;
    }

    /**
     * Gets the Status of the newsletter
     *
     * @return int
     */
    public function getStatus()
    {
        return $this->Status;
    }

    /**
     * Sets the Newsletter subject
     *
     * @param string
     * @return Newsletter
     */
    public function setSubject($Subject)
    {
        $this->Subject = $Subject;
        return $this;
    }

    /**
     * Gets the Newsletter subject
     *
     * @return string
     */
    public function getSubject()
    {
        return $this->Subject;
    }

    /**
     * Sets the Template from which this newsletter was generated, or as which it was
     * last saved.
     *
     * @param int
     * @return Newsletter
     */
    public function setTemplateID($TemplateID = null)
    {
        $this->TemplateID = $TemplateID;
        return $this;
    }

    /**
     * Gets the Template from which this newsletter was generated, or as which it was
     * last saved.
     *
     * @return int
     */
    public function getTemplateID()
    {
        return $this->TemplateID;
    }

    /**
     * Sets the Address used for testing
     *
     * @param string
     * @return Newsletter
     */
    public function setTestAddress($TestAddress = null)
    {
        $this->TestAddress = $TestAddress;
        return $this;
    }

    /**
     * Gets the Address used for testing
     *
     * @return string
     */
    public function getTestAddress()
    {
        return $this->TestAddress;
    }

    /**
     * Sets the Newsletter title
     *
     * @param string
     * @return Newsletter
     */
    public function setTitle($Title = null)
    {
        $this->Title = $Title;
        return $this;
    }

    /**
     * Gets the Newsletter title
     *
     * @return string
     */
    public function getTitle()
    {
        return $this->Title;
    }

    /**
     * Sets the Timestamp when newsletter data was last updated.
     *
     * @param \Datetime
     * @return Newsletter
     */
    public function setUpdatedAt(\Datetime $UpdatedAt = null)
    {
        $this->UpdatedAt = $UpdatedAt;
        return $this;
    }

    /**
     * Gets the Timestamp when newsletter data was last updated.
     *
     * @return \Datetime
     */
    public function getUpdatedAt()
    {
        return $this->UpdatedAt;
    }

    /**
     * Sets the URL where an online version of the newsletter can be found [?]
     *
     * @param string
     * @return Newsletter
     */
    public function setUrl($Url = null)
    {
        $this->Url = $Url;
        return $this;
    }

    /**
     * Gets the URL where an online version of the newsletter can be found [?]
     *
     * @return string
     */
    public function getUrl()
    {
        return $this->Url;
    }


}

