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
 * Contactslistsignup Model
 *
 * Contacts list signup request
 */
class Contactslistsignup implements ModelInterface
{

    /**
     * Timestamp when signup confirmation was registered.
     */
    protected $ConfirmAt = null;

    /**
     * IP address detected during signup confirmation.
     */
    protected $ConfirmIp = null;

    /**
     * Teference to Contact to be signed up.
     */
    protected $ContactID = null;

    /**
     * Email address to be signed up.
     */
    protected $Email = null;

    /**
     * Unique numerical ID for this object
     */
    protected $ID = null;

    /**
     * Contact list to which contact will be subscribed.
     */
    protected $ListID = null;

    /**
     * Reference to recipient to which contact corresponds.
     */
    protected $RecipientID = null;

    /**
     * Timestamp of sign up registration.
     */
    protected $SignupAt = null;

    /**
     * IP address detected during signup registration.
     */
    protected $SignupIp = null;

    /**
     * Unique confirmation key needed for confirmation.
     */
    protected $SignupKey = null;

    /**
     * Where did the signup request come from.
     */
    protected $Source = null;

    /**
     * ID of signup request entity (usually widget ID).
     */
    protected $SourceId = null;

    /**
     * Sets the Timestamp when signup confirmation was registered.
     *
     * @param int
     * @return Contactslistsignup
     */
    public function setConfirmAt($ConfirmAt = null)
    {
        $this->ConfirmAt = $ConfirmAt;
        return $this;
    }

    /**
     * Gets the Timestamp when signup confirmation was registered.
     *
     * @return int
     */
    public function getConfirmAt()
    {
        return $this->ConfirmAt;
    }

    /**
     * Sets the IP address detected during signup confirmation.
     *
     * @param string
     * @return Contactslistsignup
     */
    public function setConfirmIp($ConfirmIp = null)
    {
        $this->ConfirmIp = $ConfirmIp;
        return $this;
    }

    /**
     * Gets the IP address detected during signup confirmation.
     *
     * @return string
     */
    public function getConfirmIp()
    {
        return $this->ConfirmIp;
    }

    /**
     * Sets the Teference to Contact to be signed up.
     *
     * @param int
     * @return Contactslistsignup
     */
    public function setContactID($ContactID = null)
    {
        $this->ContactID = $ContactID;
        return $this;
    }

    /**
     * Gets the Teference to Contact to be signed up.
     *
     * @return int
     */
    public function getContactID()
    {
        return $this->ContactID;
    }

    /**
     * Sets the Email address to be signed up.
     *
     * @param string
     * @return Contactslistsignup
     */
    public function setEmail($Email)
    {
        $this->Email = $Email;
        return $this;
    }

    /**
     * Gets the Email address to be signed up.
     *
     * @return string
     */
    public function getEmail()
    {
        return $this->Email;
    }

    /**
     * Sets the Unique numerical ID for this object
     *
     * @param int
     * @return Contactslistsignup
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
     * Sets the Contact list to which contact will be subscribed.
     *
     * @param int
     * @return Contactslistsignup
     */
    public function setListID($ListID)
    {
        $this->ListID = $ListID;
        return $this;
    }

    /**
     * Gets the Contact list to which contact will be subscribed.
     *
     * @return int
     */
    public function getListID()
    {
        return $this->ListID;
    }

    /**
     * Sets the Reference to recipient to which contact corresponds.
     *
     * @param int
     * @return Contactslistsignup
     */
    public function setRecipientID($RecipientID = null)
    {
        $this->RecipientID = $RecipientID;
        return $this;
    }

    /**
     * Gets the Reference to recipient to which contact corresponds.
     *
     * @return int
     */
    public function getRecipientID()
    {
        return $this->RecipientID;
    }

    /**
     * Sets the Timestamp of sign up registration.
     *
     * @param int
     * @return Contactslistsignup
     */
    public function setSignupAt($SignupAt = null)
    {
        $this->SignupAt = $SignupAt;
        return $this;
    }

    /**
     * Gets the Timestamp of sign up registration.
     *
     * @return int
     */
    public function getSignupAt()
    {
        return $this->SignupAt;
    }

    /**
     * Sets the IP address detected during signup registration.
     *
     * @param string
     * @return Contactslistsignup
     */
    public function setSignupIp($SignupIp = null)
    {
        $this->SignupIp = $SignupIp;
        return $this;
    }

    /**
     * Gets the IP address detected during signup registration.
     *
     * @return string
     */
    public function getSignupIp()
    {
        return $this->SignupIp;
    }

    /**
     * Sets the Unique confirmation key needed for confirmation.
     *
     * @param string
     * @return Contactslistsignup
     */
    public function setSignupKey($SignupKey = null)
    {
        $this->SignupKey = $SignupKey;
        return $this;
    }

    /**
     * Gets the Unique confirmation key needed for confirmation.
     *
     * @return string
     */
    public function getSignupKey()
    {
        return $this->SignupKey;
    }

    /**
     * Sets the Where did the signup request come from.
     *
     * @param string
     * @return Contactslistsignup
     */
    public function setSource($Source)
    {
        $this->Source = $Source;
        return $this;
    }

    /**
     * Gets the Where did the signup request come from.
     *
     * @return string
     */
    public function getSource()
    {
        return $this->Source;
    }

    /**
     * Sets the ID of signup request entity (usually widget ID).
     *
     * @param int
     * @return Contactslistsignup
     */
    public function setSourceId($SourceId = null)
    {
        $this->SourceId = $SourceId;
        return $this;
    }

    /**
     * Gets the ID of signup request entity (usually widget ID).
     *
     * @return int
     */
    public function getSourceId()
    {
        return $this->SourceId;
    }


}

