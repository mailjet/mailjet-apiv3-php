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
 * Listrecipient Model
 *
 * Member of a contacts list (link between contact and contactslist)
 */
class Listrecipient implements ModelInterface
{

    /**
     * Reference to contact which is suscribed to the contactslist.
     */
    protected $ContactID = null;

    /**
     * Unique numerical ID for this object
     */
    protected $ID = null;

    /**
     * Is this subscription active
     */
    protected $IsActive = false;

    /**
     * Has the contact been unsubscribed from the list ?
     */
    protected $IsUnsubscribed = false;

    /**
     * Contacts list to which contact is subscribed
     */
    protected $ListID = null;

    /**
     * Timestamp when unsubscription was registered.
     */
    protected $UnsubscribedAt = null;

    /**
     * Sets the Reference to contact which is suscribed to the contactslist.
     *
     * @param int
     * @return Listrecipient
     */
    public function setContactID($ContactID)
    {
        $this->ContactID = $ContactID;
        return $this;
    }

    /**
     * Gets the Reference to contact which is suscribed to the contactslist.
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
     * @return Listrecipient
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
     * Sets the Is this subscription active
     *
     * @param bool
     * @return Listrecipient
     */
    public function setIsActive($IsActive = null)
    {
        $this->IsActive = $IsActive;
        return $this;
    }

    /**
     * Gets the Is this subscription active
     *
     * @return bool
     */
    public function getIsActive()
    {
        return $this->IsActive;
    }

    /**
     * Sets the Has the contact been unsubscribed from the list ?
     *
     * @param bool
     * @return Listrecipient
     */
    public function setIsUnsubscribed($IsUnsubscribed = null)
    {
        $this->IsUnsubscribed = $IsUnsubscribed;
        return $this;
    }

    /**
     * Gets the Has the contact been unsubscribed from the list ?
     *
     * @return bool
     */
    public function getIsUnsubscribed()
    {
        return $this->IsUnsubscribed;
    }

    /**
     * Sets the Contacts list to which contact is subscribed
     *
     * @param int
     * @return Listrecipient
     */
    public function setListID($ListID)
    {
        $this->ListID = $ListID;
        return $this;
    }

    /**
     * Gets the Contacts list to which contact is subscribed
     *
     * @return int
     */
    public function getListID()
    {
        return $this->ListID;
    }

    /**
     * Sets the Timestamp when unsubscription was registered.
     *
     * @param \Datetime
     * @return Listrecipient
     */
    public function setUnsubscribedAt(\Datetime $UnsubscribedAt = null)
    {
        $this->UnsubscribedAt = $UnsubscribedAt;
        return $this;
    }

    /**
     * Gets the Timestamp when unsubscription was registered.
     *
     * @return \Datetime
     */
    public function getUnsubscribedAt()
    {
        return $this->UnsubscribedAt;
    }


}

