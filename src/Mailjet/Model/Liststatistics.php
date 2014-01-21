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
 * Liststatistics Model
 *
 * API Key campaign/message/click statistics grouped by contacts list.
 */
class Liststatistics implements ModelInterface
{

    /**
     * Number of active list members
     */
    protected $ActiveCount = null;

    /**
     * Number of registered unsubscribe requests. (only calculated when CalcActiveUnsub
     * filter is active)
     */
    protected $ActiveUnsubscribedCount = null;

    /**
     * List address
     */
    protected $Address = null;

    /**
     * Number of blocked messages.
     */
    protected $BlockedCount = null;

    /**
     * Number of bounced messages.
     */
    protected $BouncedCount = null;

    /**
     * Number of registered clicks.
     */
    protected $ClickedCount = null;

    /**
     * Timestamp when object was created in database
     */
    protected $CreatedAt = null;

    /**
     * Number of messages delivered to their destination.
     */
    protected $DeliveredCount = null;

    /**
     * Unique numerical ID for this object
     */
    protected $ID = null;

    /**
     * Is the list Deleted or not ?
     */
    protected $IsDeleted = false;

    /**
     * Timestamp of last registered activity for this contactlist
     */
    protected $LastActivityAt = null;

    /**
     * List name
     */
    protected $Name = null;

    /**
     * Number of message open registrations.
     */
    protected $OpenedCount = null;

    /**
     * Number of spam complaints
     */
    protected $SpamComplaintCount = null;

    /**
     * Number of subscribers
     */
    protected $SubscriberCount = null;

    /**
     * Number of registered unsubscribe requests.
     */
    protected $UnsubscribedCount = null;

    /**
     * Sets the Number of active list members
     *
     * @param int
     * @return Liststatistics
     */
    public function setActiveCount($ActiveCount = null)
    {
        $this->ActiveCount = $ActiveCount;
        return $this;
    }

    /**
     * Gets the Number of active list members
     *
     * @return int
     */
    public function getActiveCount()
    {
        return $this->ActiveCount;
    }

    /**
     * Sets the Number of registered unsubscribe requests. (only calculated when
     * CalcActiveUnsub filter is active)
     *
     * @param int
     * @return Liststatistics
     */
    public function setActiveUnsubscribedCount($ActiveUnsubscribedCount = null)
    {
        $this->ActiveUnsubscribedCount = $ActiveUnsubscribedCount;
        return $this;
    }

    /**
     * Gets the Number of registered unsubscribe requests. (only calculated when
     * CalcActiveUnsub filter is active)
     *
     * @return int
     */
    public function getActiveUnsubscribedCount()
    {
        return $this->ActiveUnsubscribedCount;
    }

    /**
     * Sets the List address
     *
     * @param string
     * @return Liststatistics
     */
    public function setAddress($Address = null)
    {
        $this->Address = $Address;
        return $this;
    }

    /**
     * Gets the List address
     *
     * @return string
     */
    public function getAddress()
    {
        return $this->Address;
    }

    /**
     * Sets the Number of blocked messages.
     *
     * @param int
     * @return Liststatistics
     */
    public function setBlockedCount($BlockedCount = null)
    {
        $this->BlockedCount = $BlockedCount;
        return $this;
    }

    /**
     * Gets the Number of blocked messages.
     *
     * @return int
     */
    public function getBlockedCount()
    {
        return $this->BlockedCount;
    }

    /**
     * Sets the Number of bounced messages.
     *
     * @param int
     * @return Liststatistics
     */
    public function setBouncedCount($BouncedCount = null)
    {
        $this->BouncedCount = $BouncedCount;
        return $this;
    }

    /**
     * Gets the Number of bounced messages.
     *
     * @return int
     */
    public function getBouncedCount()
    {
        return $this->BouncedCount;
    }

    /**
     * Sets the Number of registered clicks.
     *
     * @param int
     * @return Liststatistics
     */
    public function setClickedCount($ClickedCount = null)
    {
        $this->ClickedCount = $ClickedCount;
        return $this;
    }

    /**
     * Gets the Number of registered clicks.
     *
     * @return int
     */
    public function getClickedCount()
    {
        return $this->ClickedCount;
    }

    /**
     * Sets the Timestamp when object was created in database
     *
     * @param \Datetime
     * @return Liststatistics
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
     * Sets the Number of messages delivered to their destination.
     *
     * @param int
     * @return Liststatistics
     */
    public function setDeliveredCount($DeliveredCount = null)
    {
        $this->DeliveredCount = $DeliveredCount;
        return $this;
    }

    /**
     * Gets the Number of messages delivered to their destination.
     *
     * @return int
     */
    public function getDeliveredCount()
    {
        return $this->DeliveredCount;
    }

    /**
     * Sets the Unique numerical ID for this object
     *
     * @param int
     * @return Liststatistics
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
     * Sets the Is the list Deleted or not ?
     *
     * @param bool
     * @return Liststatistics
     */
    public function setIsDeleted($IsDeleted = null)
    {
        $this->IsDeleted = $IsDeleted;
        return $this;
    }

    /**
     * Gets the Is the list Deleted or not ?
     *
     * @return bool
     */
    public function getIsDeleted()
    {
        return $this->IsDeleted;
    }

    /**
     * Sets the Timestamp of last registered activity for this contactlist
     *
     * @param \Datetime
     * @return Liststatistics
     */
    public function setLastActivityAt(\Datetime $LastActivityAt = null)
    {
        $this->LastActivityAt = $LastActivityAt;
        return $this;
    }

    /**
     * Gets the Timestamp of last registered activity for this contactlist
     *
     * @return \Datetime
     */
    public function getLastActivityAt()
    {
        return $this->LastActivityAt;
    }

    /**
     * Sets the List name
     *
     * @param string
     * @return Liststatistics
     */
    public function setName($Name = null)
    {
        $this->Name = $Name;
        return $this;
    }

    /**
     * Gets the List name
     *
     * @return string
     */
    public function getName()
    {
        return $this->Name;
    }

    /**
     * Sets the Number of message open registrations.
     *
     * @param int
     * @return Liststatistics
     */
    public function setOpenedCount($OpenedCount = null)
    {
        $this->OpenedCount = $OpenedCount;
        return $this;
    }

    /**
     * Gets the Number of message open registrations.
     *
     * @return int
     */
    public function getOpenedCount()
    {
        return $this->OpenedCount;
    }

    /**
     * Sets the Number of spam complaints
     *
     * @param int
     * @return Liststatistics
     */
    public function setSpamComplaintCount($SpamComplaintCount = null)
    {
        $this->SpamComplaintCount = $SpamComplaintCount;
        return $this;
    }

    /**
     * Gets the Number of spam complaints
     *
     * @return int
     */
    public function getSpamComplaintCount()
    {
        return $this->SpamComplaintCount;
    }

    /**
     * Sets the Number of subscribers
     *
     * @param int
     * @return Liststatistics
     */
    public function setSubscriberCount($SubscriberCount = null)
    {
        $this->SubscriberCount = $SubscriberCount;
        return $this;
    }

    /**
     * Gets the Number of subscribers
     *
     * @return int
     */
    public function getSubscriberCount()
    {
        return $this->SubscriberCount;
    }

    /**
     * Sets the Number of registered unsubscribe requests.
     *
     * @param int
     * @return Liststatistics
     */
    public function setUnsubscribedCount($UnsubscribedCount = null)
    {
        $this->UnsubscribedCount = $UnsubscribedCount;
        return $this;
    }

    /**
     * Gets the Number of registered unsubscribe requests.
     *
     * @return int
     */
    public function getUnsubscribedCount()
    {
        return $this->UnsubscribedCount;
    }


}

