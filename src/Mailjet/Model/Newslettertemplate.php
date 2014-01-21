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
 * Newslettertemplate Model
 *
 * Newsletter templates
 */
class Newslettertemplate implements ModelInterface
{

    /**
     * Category for this newsletter
     */
    protected $CategoryID = null;

    /**
     * Timestamp when object was created in database
     */
    protected $CreatedAt = null;

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
     * Locale in which the information in this record is recorded.
     */
    protected $Locale = null;

    /**
     * Name for this newsletter
     */
    protected $Name = null;

    /**
     * Type of permalink that should be added to the newsletter.
     */
    protected $Permalink = null;

    /**
     * ?
     */
    protected $PermalinkWYSIWYGType = null;

    /**
     * When specified in POST or PUT, copy data from this newsletter.
     */
    protected $SourceNewsLetterID = null;

    /**
     * Status of the newsletter template
     */
    protected $Status = null;

    /**
     * Timestamp when newsletter template data was last updated.
     */
    protected $UpdatedAt = null;

    /**
     * Sets the Category for this newsletter
     *
     * @param int
     * @return Newslettertemplate
     */
    public function setCategoryID($CategoryID = null)
    {
        $this->CategoryID = $CategoryID;
        return $this;
    }

    /**
     * Gets the Category for this newsletter
     *
     * @return int
     */
    public function getCategoryID()
    {
        return $this->CategoryID;
    }

    /**
     * Sets the Timestamp when object was created in database
     *
     * @param \Datetime
     * @return Newslettertemplate
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
     * Sets the Footer type to generate.
     *
     * @param string
     * @return Newslettertemplate
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
     * @return Newslettertemplate
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
     * @return Newslettertemplate
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
     * @return Newslettertemplate
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
     * @return Newslettertemplate
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
     * @return Newslettertemplate
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
     * @return Newslettertemplate
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
     * @return Newslettertemplate
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
     * Sets the Locale in which the information in this record is recorded.
     *
     * @param string
     * @return Newslettertemplate
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
     * Sets the Name for this newsletter
     *
     * @param string
     * @return Newslettertemplate
     */
    public function setName($Name = null)
    {
        $this->Name = $Name;
        return $this;
    }

    /**
     * Gets the Name for this newsletter
     *
     * @return string
     */
    public function getName()
    {
        return $this->Name;
    }

    /**
     * Sets the Type of permalink that should be added to the newsletter.
     *
     * @param string
     * @return Newslettertemplate
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
     * Sets the ?
     *
     * @param int
     * @return Newslettertemplate
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
     * Sets the When specified in POST or PUT, copy data from this newsletter.
     *
     * @param int
     * @return Newslettertemplate
     */
    public function setSourceNewsLetterID($SourceNewsLetterID = null)
    {
        $this->SourceNewsLetterID = $SourceNewsLetterID;
        return $this;
    }

    /**
     * Gets the When specified in POST or PUT, copy data from this newsletter.
     *
     * @return int
     */
    public function getSourceNewsLetterID()
    {
        return $this->SourceNewsLetterID;
    }

    /**
     * Sets the Status of the newsletter template
     *
     * @param int
     * @return Newslettertemplate
     */
    public function setStatus($Status = null)
    {
        $this->Status = $Status;
        return $this;
    }

    /**
     * Gets the Status of the newsletter template
     *
     * @return int
     */
    public function getStatus()
    {
        return $this->Status;
    }

    /**
     * Sets the Timestamp when newsletter template data was last updated.
     *
     * @param \Datetime
     * @return Newslettertemplate
     */
    public function setUpdatedAt(\Datetime $UpdatedAt = null)
    {
        $this->UpdatedAt = $UpdatedAt;
        return $this;
    }

    /**
     * Gets the Timestamp when newsletter template data was last updated.
     *
     * @return \Datetime
     */
    public function getUpdatedAt()
    {
        return $this->UpdatedAt;
    }


}

