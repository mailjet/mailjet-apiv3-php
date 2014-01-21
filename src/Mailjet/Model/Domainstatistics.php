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
 * Domainstatistics Model
 *
 * API key Campaign/Message/click statistics grouped per domain.
 */
class Domainstatistics implements ModelInterface
{

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
     * Number of messages delivered to their destination.
     */
    protected $DeliveredCount = null;

    /**
     * Domain name (lowercase)
     */
    protected $Domain = null;

    /**
     * Unique numerical ID for this object
     */
    protected $ID = null;

    /**
     * Number of message open registrations.
     */
    protected $OpenedCount = null;

    /**
     * Total number of messages processed by Mailjet
     */
    protected $ProcessedCount = null;

    /**
     * Number of messages waiting in send queue
     */
    protected $QueuedCount = null;

    /**
     * Number of spam complaints
     */
    protected $SpamComplaintCount = null;

    /**
     * Number of registered unsubscribe requests.
     */
    protected $UnsubscribedCount = null;

    /**
     * Sets the Number of blocked messages.
     *
     * @param int
     * @return Domainstatistics
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
     * @return Domainstatistics
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
     * @return Domainstatistics
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
     * Sets the Number of messages delivered to their destination.
     *
     * @param int
     * @return Domainstatistics
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
     * Sets the Domain name (lowercase)
     *
     * @param string
     * @return Domainstatistics
     */
    public function setDomain($Domain = null)
    {
        $this->Domain = $Domain;
        return $this;
    }

    /**
     * Gets the Domain name (lowercase)
     *
     * @return string
     */
    public function getDomain()
    {
        return $this->Domain;
    }

    /**
     * Sets the Unique numerical ID for this object
     *
     * @param int
     * @return Domainstatistics
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
     * Sets the Number of message open registrations.
     *
     * @param int
     * @return Domainstatistics
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
     * Sets the Total number of messages processed by Mailjet
     *
     * @param int
     * @return Domainstatistics
     */
    public function setProcessedCount($ProcessedCount = null)
    {
        $this->ProcessedCount = $ProcessedCount;
        return $this;
    }

    /**
     * Gets the Total number of messages processed by Mailjet
     *
     * @return int
     */
    public function getProcessedCount()
    {
        return $this->ProcessedCount;
    }

    /**
     * Sets the Number of messages waiting in send queue
     *
     * @param int
     * @return Domainstatistics
     */
    public function setQueuedCount($QueuedCount = null)
    {
        $this->QueuedCount = $QueuedCount;
        return $this;
    }

    /**
     * Gets the Number of messages waiting in send queue
     *
     * @return int
     */
    public function getQueuedCount()
    {
        return $this->QueuedCount;
    }

    /**
     * Sets the Number of spam complaints
     *
     * @param int
     * @return Domainstatistics
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
     * Sets the Number of registered unsubscribe requests.
     *
     * @param int
     * @return Domainstatistics
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

