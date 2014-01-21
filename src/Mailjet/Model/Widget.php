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
 * Widget Model
 *
 * Mailjet widget definitions.
 */
class Widget implements ModelInterface
{

    /**
     * Timestamp when widget was created
     */
    protected $CreatedAt = null;

    /**
     * Reference to Sender address for this widget
     */
    protected $FromID = null;

    /**
     * Unique numerical ID for this object
     */
    protected $ID = null;

    /**
     * Is thewidget still active.
     */
    protected $IsActive = false;

    /**
     * Contactslist for which this widget handles subscriptions.
     */
    protected $ListID = null;

    /**
     * Locale in which the information in this record is recorded.
     */
    protected $Locale = null;

    /**
     * Name for this widget
     */
    protected $Name = null;

    /**
     * Reply To email address for this widhet
     */
    protected $Replyto = null;

    /**
     * Sender name for this widget
     */
    protected $Sendername = null;

    /**
     * Subject for this widget
     */
    protected $Subject = null;

    /**
     * Message to send when sending mail for this widget
     */
    protected $TemplateID = null;

    /**
     * Sets the Timestamp when widget was created
     *
     * @param int
     * @return Widget
     */
    public function setCreatedAt($CreatedAt = null)
    {
        $this->CreatedAt = $CreatedAt;
        return $this;
    }

    /**
     * Gets the Timestamp when widget was created
     *
     * @return int
     */
    public function getCreatedAt()
    {
        return $this->CreatedAt;
    }

    /**
     * Sets the Reference to Sender address for this widget
     *
     * @param int
     * @return Widget
     */
    public function setFromID($FromID)
    {
        $this->FromID = $FromID;
        return $this;
    }

    /**
     * Gets the Reference to Sender address for this widget
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
     * @return Widget
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
     * Sets the Is thewidget still active.
     *
     * @param bool
     * @return Widget
     */
    public function setIsActive($IsActive = null)
    {
        $this->IsActive = $IsActive;
        return $this;
    }

    /**
     * Gets the Is thewidget still active.
     *
     * @return bool
     */
    public function getIsActive()
    {
        return $this->IsActive;
    }

    /**
     * Sets the Contactslist for which this widget handles subscriptions.
     *
     * @param int
     * @return Widget
     */
    public function setListID($ListID)
    {
        $this->ListID = $ListID;
        return $this;
    }

    /**
     * Gets the Contactslist for which this widget handles subscriptions.
     *
     * @return int
     */
    public function getListID()
    {
        return $this->ListID;
    }

    /**
     * Sets the Locale in which the information in this record is recorded.
     *
     * @param string
     * @return Widget
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
     * Sets the Name for this widget
     *
     * @param string
     * @return Widget
     */
    public function setName($Name = null)
    {
        $this->Name = $Name;
        return $this;
    }

    /**
     * Gets the Name for this widget
     *
     * @return string
     */
    public function getName()
    {
        return $this->Name;
    }

    /**
     * Sets the Reply To email address for this widhet
     *
     * @param string
     * @return Widget
     */
    public function setReplyto($Replyto = null)
    {
        $this->Replyto = $Replyto;
        return $this;
    }

    /**
     * Gets the Reply To email address for this widhet
     *
     * @return string
     */
    public function getReplyto()
    {
        return $this->Replyto;
    }

    /**
     * Sets the Sender name for this widget
     *
     * @param string
     * @return Widget
     */
    public function setSendername($Sendername = null)
    {
        $this->Sendername = $Sendername;
        return $this;
    }

    /**
     * Gets the Sender name for this widget
     *
     * @return string
     */
    public function getSendername()
    {
        return $this->Sendername;
    }

    /**
     * Sets the Subject for this widget
     *
     * @param string
     * @return Widget
     */
    public function setSubject($Subject = null)
    {
        $this->Subject = $Subject;
        return $this;
    }

    /**
     * Gets the Subject for this widget
     *
     * @return string
     */
    public function getSubject()
    {
        return $this->Subject;
    }

    /**
     * Sets the Message to send when sending mail for this widget
     *
     * @param int
     * @return Widget
     */
    public function setTemplateID($TemplateID = null)
    {
        $this->TemplateID = $TemplateID;
        return $this;
    }

    /**
     * Gets the Message to send when sending mail for this widget
     *
     * @return int
     */
    public function getTemplateID()
    {
        return $this->TemplateID;
    }


}

