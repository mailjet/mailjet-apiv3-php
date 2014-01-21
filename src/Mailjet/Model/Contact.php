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
 * Contact Model
 *
 * API Key contacts (email addresses)
 */
class Contact implements ModelInterface
{

    /**
     * Timestamp when object was created in database
     */
    protected $CreatedAt = null;

    /**
     * Number of messages delivered to this contact.
     */
    protected $DeliveredCount = null;

    /**
     * Email address of this contact
     */
    protected $Email = null;

    /**
     * Unique numerical ID for this object
     */
    protected $ID = null;

    /**
     * Is an opt-in for a contactslist subscription pending ?
     */
    protected $IsOptInPending = false;

    /**
     * Is this contact complaining of spam ?
     */
    protected $IsSpamComplaining = false;

    /**
     * Timestamp of last registered activity for this contact
     */
    protected $LastActivityAt = null;

    /**
     * Timestamp of last update of this contact
     */
    protected $LastUpdateAt = null;

    /**
     * User-provided name for this contact
     */
    protected $Name = null;

    /**
     * Timestamp of last unsubscribe request.
     */
    protected $UnsubscribedAt = null;

    /**
     * Description of who initiated the unsubscribe request.
     */
    protected $UnsubscribedBy = null;

    /**
     * Sets the Timestamp when object was created in database
     *
     * @param \Datetime
     * @return Contact
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
     * Sets the Number of messages delivered to this contact.
     *
     * @param int
     * @return Contact
     */
    public function setDeliveredCount($DeliveredCount = null)
    {
        $this->DeliveredCount = $DeliveredCount;
        return $this;
    }

    /**
     * Gets the Number of messages delivered to this contact.
     *
     * @return int
     */
    public function getDeliveredCount()
    {
        return $this->DeliveredCount;
    }

    /**
     * Sets the Email address of this contact
     *
     * @param string
     * @return Contact
     */
    public function setEmail($Email)
    {
        $this->Email = $Email;
        return $this;
    }

    /**
     * Gets the Email address of this contact
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
     * @return Contact
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
     * Sets the Is an opt-in for a contactslist subscription pending ?
     *
     * @param bool
     * @return Contact
     */
    public function setIsOptInPending($IsOptInPending = null)
    {
        $this->IsOptInPending = $IsOptInPending;
        return $this;
    }

    /**
     * Gets the Is an opt-in for a contactslist subscription pending ?
     *
     * @return bool
     */
    public function getIsOptInPending()
    {
        return $this->IsOptInPending;
    }

    /**
     * Sets the Is this contact complaining of spam ?
     *
     * @param bool
     * @return Contact
     */
    public function setIsSpamComplaining($IsSpamComplaining = null)
    {
        $this->IsSpamComplaining = $IsSpamComplaining;
        return $this;
    }

    /**
     * Gets the Is this contact complaining of spam ?
     *
     * @return bool
     */
    public function getIsSpamComplaining()
    {
        return $this->IsSpamComplaining;
    }

    /**
     * Sets the Timestamp of last registered activity for this contact
     *
     * @param \Datetime
     * @return Contact
     */
    public function setLastActivityAt(\Datetime $LastActivityAt = null)
    {
        $this->LastActivityAt = $LastActivityAt;
        return $this;
    }

    /**
     * Gets the Timestamp of last registered activity for this contact
     *
     * @return \Datetime
     */
    public function getLastActivityAt()
    {
        return $this->LastActivityAt;
    }

    /**
     * Sets the Timestamp of last update of this contact
     *
     * @param \Datetime
     * @return Contact
     */
    public function setLastUpdateAt(\Datetime $LastUpdateAt = null)
    {
        $this->LastUpdateAt = $LastUpdateAt;
        return $this;
    }

    /**
     * Gets the Timestamp of last update of this contact
     *
     * @return \Datetime
     */
    public function getLastUpdateAt()
    {
        return $this->LastUpdateAt;
    }

    /**
     * Sets the User-provided name for this contact
     *
     * @param string
     * @return Contact
     */
    public function setName($Name = null)
    {
        $this->Name = $Name;
        return $this;
    }

    /**
     * Gets the User-provided name for this contact
     *
     * @return string
     */
    public function getName()
    {
        return $this->Name;
    }

    /**
     * Sets the Timestamp of last unsubscribe request.
     *
     * @param \Datetime
     * @return Contact
     */
    public function setUnsubscribedAt(\Datetime $UnsubscribedAt = null)
    {
        $this->UnsubscribedAt = $UnsubscribedAt;
        return $this;
    }

    /**
     * Gets the Timestamp of last unsubscribe request.
     *
     * @return \Datetime
     */
    public function getUnsubscribedAt()
    {
        return $this->UnsubscribedAt;
    }

    /**
     * Sets the Description of who initiated the unsubscribe request.
     *
     * @param string
     * @return Contact
     */
    public function setUnsubscribedBy($UnsubscribedBy = null)
    {
        $this->UnsubscribedBy = $UnsubscribedBy;
        return $this;
    }

    /**
     * Gets the Description of who initiated the unsubscribe request.
     *
     * @return string
     */
    public function getUnsubscribedBy()
    {
        return $this->UnsubscribedBy;
    }


}

