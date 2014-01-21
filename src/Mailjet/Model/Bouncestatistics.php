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
 * Bouncestatistics Model
 *
 * Message bounce statistics for an API Key
 */
class Bouncestatistics implements ModelInterface
{

    /**
     * Timestamp of bounce
     */
    protected $BouncedAt = null;

    /**
     * Reference to Campaign for which bounce occurred
     */
    protected $CampaignID = null;

    /**
     * Reference to Contact for which bounce occurred
     */
    protected $ContactID = null;

    /**
     * Unique numerical ID for this object
     */
    protected $ID = null;

    /**
     * Is contact blocked
     */
    protected $IsBlocked = false;

    /**
     * Is this a permanent bounce
     */
    protected $IsStatePermanent = false;

    /**
     * Current state of the message causing the bounce
     */
    protected $StateID = null;

    /**
     * Sets the Timestamp of bounce
     *
     * @param \Datetime
     * @return Bouncestatistics
     */
    public function setBouncedAt(\Datetime $BouncedAt = null)
    {
        $this->BouncedAt = $BouncedAt;
        return $this;
    }

    /**
     * Gets the Timestamp of bounce
     *
     * @return \Datetime
     */
    public function getBouncedAt()
    {
        return $this->BouncedAt;
    }

    /**
     * Sets the Reference to Campaign for which bounce occurred
     *
     * @param int
     * @return Bouncestatistics
     */
    public function setCampaignID($CampaignID)
    {
        $this->CampaignID = $CampaignID;
        return $this;
    }

    /**
     * Gets the Reference to Campaign for which bounce occurred
     *
     * @return int
     */
    public function getCampaignID()
    {
        return $this->CampaignID;
    }

    /**
     * Sets the Reference to Contact for which bounce occurred
     *
     * @param int
     * @return Bouncestatistics
     */
    public function setContactID($ContactID)
    {
        $this->ContactID = $ContactID;
        return $this;
    }

    /**
     * Gets the Reference to Contact for which bounce occurred
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
     * @return Bouncestatistics
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
     * Sets the Is contact blocked
     *
     * @param bool
     * @return Bouncestatistics
     */
    public function setIsBlocked($IsBlocked = null)
    {
        $this->IsBlocked = $IsBlocked;
        return $this;
    }

    /**
     * Gets the Is contact blocked
     *
     * @return bool
     */
    public function getIsBlocked()
    {
        return $this->IsBlocked;
    }

    /**
     * Sets the Is this a permanent bounce
     *
     * @param bool
     * @return Bouncestatistics
     */
    public function setIsStatePermanent($IsStatePermanent = null)
    {
        $this->IsStatePermanent = $IsStatePermanent;
        return $this;
    }

    /**
     * Gets the Is this a permanent bounce
     *
     * @return bool
     */
    public function getIsStatePermanent()
    {
        return $this->IsStatePermanent;
    }

    /**
     * Sets the Current state of the message causing the bounce
     *
     * @param int
     * @return Bouncestatistics
     */
    public function setStateID($StateID = null)
    {
        $this->StateID = $StateID;
        return $this;
    }

    /**
     * Gets the Current state of the message causing the bounce
     *
     * @return int
     */
    public function getStateID()
    {
        return $this->StateID;
    }


}

