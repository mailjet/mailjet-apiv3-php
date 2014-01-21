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
use Mailjet\Type\TSenderStatus;

/**
 * Sender Model
 *
 * API Key sender email address
 */
class Sender implements ModelInterface
{

    /**
     * Key used when confirming validity of this sender.
     */
    protected $ConfirmKey = null;

    /**
     * Timestamp when object was created in database
     */
    protected $CreatedAt = null;

    /**
     * DNS domain to which sender belongs.
     */
    protected $DNSID = null;

    /**
     * Email Address of this sender
     */
    protected $Email = null;

    /**
     * Type of emails that can be sent from this address
     */
    protected $EmailType = null;

    /**
     * Filename expected on the domain name webserver, used for verifying the domain in
     * case of a catch-all address.
     */
    protected $Filename = null;

    /**
     * Unique numerical ID for this object
     */
    protected $ID = null;

    /**
     * Is this the default sender for this API key ?
     */
    protected $IsDefaultSender = false;

    /**
     * User-provided name for this sender
     */
    protected $Name = null;

    /**
     * Status of the sender
     */
    protected $Status = 'Inactive';

    /**
     * Timestamp of last UMP check for this sender
     */
    protected $UMPCheckedAt = null;

    /**
     * Sets the Key used when confirming validity of this sender.
     *
     * @param string
     * @return Sender
     */
    public function setConfirmKey($ConfirmKey = null)
    {
        $this->ConfirmKey = $ConfirmKey;
        return $this;
    }

    /**
     * Gets the Key used when confirming validity of this sender.
     *
     * @return string
     */
    public function getConfirmKey()
    {
        return $this->ConfirmKey;
    }

    /**
     * Sets the Timestamp when object was created in database
     *
     * @param \Datetime
     * @return Sender
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
     * Sets the DNS domain to which sender belongs.
     *
     * @param int
     * @return Sender
     */
    public function setDNSID($DNSID = null)
    {
        $this->DNSID = $DNSID;
        return $this;
    }

    /**
     * Gets the DNS domain to which sender belongs.
     *
     * @return int
     */
    public function getDNSID()
    {
        return $this->DNSID;
    }

    /**
     * Sets the Email Address of this sender
     *
     * @param string
     * @return Sender
     */
    public function setEmail($Email)
    {
        $this->Email = $Email;
        return $this;
    }

    /**
     * Gets the Email Address of this sender
     *
     * @return string
     */
    public function getEmail()
    {
        return $this->Email;
    }

    /**
     * Sets the Type of emails that can be sent from this address
     *
     * @param int
     * @return Sender
     */
    public function setEmailType($EmailType = null)
    {
        $this->EmailType = $EmailType;
        return $this;
    }

    /**
     * Gets the Type of emails that can be sent from this address
     *
     * @return int
     */
    public function getEmailType()
    {
        return $this->EmailType;
    }

    /**
     * Sets the Filename expected on the domain name webserver, used for verifying the
     * domain in case of a catch-all address.
     *
     * @param string
     * @return Sender
     */
    public function setFilename($Filename = null)
    {
        $this->Filename = $Filename;
        return $this;
    }

    /**
     * Gets the Filename expected on the domain name webserver, used for verifying the
     * domain in case of a catch-all address.
     *
     * @return string
     */
    public function getFilename()
    {
        return $this->Filename;
    }

    /**
     * Sets the Unique numerical ID for this object
     *
     * @param int
     * @return Sender
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
     * Sets the Is this the default sender for this API key ?
     *
     * @param bool
     * @return Sender
     */
    public function setIsDefaultSender($IsDefaultSender = null)
    {
        $this->IsDefaultSender = $IsDefaultSender;
        return $this;
    }

    /**
     * Gets the Is this the default sender for this API key ?
     *
     * @return bool
     */
    public function getIsDefaultSender()
    {
        return $this->IsDefaultSender;
    }

    /**
     * Sets the User-provided name for this sender
     *
     * @param string
     * @return Sender
     */
    public function setName($Name = null)
    {
        $this->Name = $Name;
        return $this;
    }

    /**
     * Gets the User-provided name for this sender
     *
     * @return string
     */
    public function getName()
    {
        return $this->Name;
    }

    /**
     * Sets the Status of the sender
     *
     * @param TSenderStatus
     * @return Sender
     */
    public function setStatus(TSenderStatus $Status = null)
    {
        $this->Status = $Status;
        return $this;
    }

    /**
     * Gets the Status of the sender
     *
     * @return TSenderStatus
     */
    public function getStatus()
    {
        return $this->Status;
    }

    /**
     * Sets the Timestamp of last UMP check for this sender
     *
     * @param \Datetime
     * @return Sender
     */
    public function setUMPCheckedAt(\Datetime $UMPCheckedAt = null)
    {
        $this->UMPCheckedAt = $UMPCheckedAt;
        return $this;
    }

    /**
     * Gets the Timestamp of last UMP check for this sender
     *
     * @return \Datetime
     */
    public function getUMPCheckedAt()
    {
        return $this->UMPCheckedAt;
    }


}

