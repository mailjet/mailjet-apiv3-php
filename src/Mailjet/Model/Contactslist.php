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
 * Contactslist Model
 *
 * API key contact lists
 */
class Contactslist implements ModelInterface
{

    /**
     * Email address at which this contacts of this list can be reached.
     */
    protected $Address = null;

    /**
     * Timestamp when object was created in database
     */
    protected $CreatedAt = null;

    /**
     * Unique numerical ID for this object
     */
    protected $ID = null;

    /**
     * Has this list been deleted or not.
     */
    protected $IsDeleted = false;

    /**
     * User-specified name for this contact list (must be unique)
     */
    protected $Name = null;

    /**
     * Number of subscribers for this list.
     */
    protected $SubscriberCount = null;

    /**
     * UMP status for this list.
     */
    protected $UMPStatus = null;

    /**
     * Sets the Email address at which this contacts of this list can be reached.
     *
     * @param string
     * @return Contactslist
     */
    public function setAddress($Address = null)
    {
        $this->Address = $Address;
        return $this;
    }

    /**
     * Gets the Email address at which this contacts of this list can be reached.
     *
     * @return string
     */
    public function getAddress()
    {
        return $this->Address;
    }

    /**
     * Sets the Timestamp when object was created in database
     *
     * @param \Datetime
     * @return Contactslist
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
     * @return Contactslist
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
     * Sets the Has this list been deleted or not.
     *
     * @param bool
     * @return Contactslist
     */
    public function setIsDeleted($IsDeleted = null)
    {
        $this->IsDeleted = $IsDeleted;
        return $this;
    }

    /**
     * Gets the Has this list been deleted or not.
     *
     * @return bool
     */
    public function getIsDeleted()
    {
        return $this->IsDeleted;
    }

    /**
     * Sets the User-specified name for this contact list (must be unique)
     *
     * @param string
     * @return Contactslist
     */
    public function setName($Name = null)
    {
        $this->Name = $Name;
        return $this;
    }

    /**
     * Gets the User-specified name for this contact list (must be unique)
     *
     * @return string
     */
    public function getName()
    {
        return $this->Name;
    }

    /**
     * Sets the Number of subscribers for this list.
     *
     * @param int
     * @return Contactslist
     */
    public function setSubscriberCount($SubscriberCount = null)
    {
        $this->SubscriberCount = $SubscriberCount;
        return $this;
    }

    /**
     * Gets the Number of subscribers for this list.
     *
     * @return int
     */
    public function getSubscriberCount()
    {
        return $this->SubscriberCount;
    }

    /**
     * Sets the UMP status for this list.
     *
     * @param int
     * @return Contactslist
     */
    public function setUMPStatus($UMPStatus = null)
    {
        $this->UMPStatus = $UMPStatus;
        return $this;
    }

    /**
     * Gets the UMP status for this list.
     *
     * @return int
     */
    public function getUMPStatus()
    {
        return $this->UMPStatus;
    }


}

