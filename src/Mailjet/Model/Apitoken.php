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
 * Apitoken Model
 *
 * Access token for API
 */
class Apitoken implements ModelInterface
{

    /**
     * Access rights of this token, in serialized PHP.
     */
    protected $AllowedAccess = null;

    /**
     * Reference to API Key to which this token belongs.
     */
    protected $APIKeyID = null;

    /**
     * Last registered IP address for this token.
     */
    protected $CatchedIp = null;

    /**
     * Timestamp when object was created in database
     */
    protected $CreatedAt = null;

    /**
     * Timestamp of first use of this token.
     */
    protected $FirstUsedAt = null;

    /**
     * Unique numerical ID for this object
     */
    protected $ID = null;

    /**
     * Is this token still active
     */
    protected $IsActive = false;

    /**
     * Language (locale) for this token.
     */
    protected $Lang = null;

    /**
     * Timestamp of last use of this token.
     */
    protected $LastUsedAt = null;

    /**
     * Payload for this token.
     */
    protected $SentData = null;

    /**
     * Timezone to use for this token.
     */
    protected $Timezone = null;

    /**
     * Unique identifier for this token, to be used by user.
     */
    protected $Token = null;

    /**
     * Type of token
     */
    protected $TokenType = null;

    /**
     * Period during which token is considered valid.
     */
    protected $ValidFor = null;

    /**
     * Sets the Access rights of this token, in serialized PHP.
     *
     * @param string
     * @return Apitoken
     */
    public function setAllowedAccess($AllowedAccess)
    {
        $this->AllowedAccess = $AllowedAccess;
        return $this;
    }

    /**
     * Gets the Access rights of this token, in serialized PHP.
     *
     * @return string
     */
    public function getAllowedAccess()
    {
        return $this->AllowedAccess;
    }

    /**
     * Sets the Reference to API Key to which this token belongs.
     *
     * @param int
     * @return Apitoken
     */
    public function setAPIKeyID($APIKeyID)
    {
        $this->APIKeyID = $APIKeyID;
        return $this;
    }

    /**
     * Gets the Reference to API Key to which this token belongs.
     *
     * @return int
     */
    public function getAPIKeyID()
    {
        return $this->APIKeyID;
    }

    /**
     * Sets the Last registered IP address for this token.
     *
     * @param string
     * @return Apitoken
     */
    public function setCatchedIp($CatchedIp = null)
    {
        $this->CatchedIp = $CatchedIp;
        return $this;
    }

    /**
     * Gets the Last registered IP address for this token.
     *
     * @return string
     */
    public function getCatchedIp()
    {
        return $this->CatchedIp;
    }

    /**
     * Sets the Timestamp when object was created in database
     *
     * @param \Datetime
     * @return Apitoken
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
     * Sets the Timestamp of first use of this token.
     *
     * @param \Datetime
     * @return Apitoken
     */
    public function setFirstUsedAt(\Datetime $FirstUsedAt = null)
    {
        $this->FirstUsedAt = $FirstUsedAt;
        return $this;
    }

    /**
     * Gets the Timestamp of first use of this token.
     *
     * @return \Datetime
     */
    public function getFirstUsedAt()
    {
        return $this->FirstUsedAt;
    }

    /**
     * Sets the Unique numerical ID for this object
     *
     * @param int
     * @return Apitoken
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
     * Sets the Is this token still active
     *
     * @param bool
     * @return Apitoken
     */
    public function setIsActive($IsActive = null)
    {
        $this->IsActive = $IsActive;
        return $this;
    }

    /**
     * Gets the Is this token still active
     *
     * @return bool
     */
    public function getIsActive()
    {
        return $this->IsActive;
    }

    /**
     * Sets the Language (locale) for this token.
     *
     * @param string
     * @return Apitoken
     */
    public function setLang($Lang = null)
    {
        $this->Lang = $Lang;
        return $this;
    }

    /**
     * Gets the Language (locale) for this token.
     *
     * @return string
     */
    public function getLang()
    {
        return $this->Lang;
    }

    /**
     * Sets the Timestamp of last use of this token.
     *
     * @param \Datetime
     * @return Apitoken
     */
    public function setLastUsedAt(\Datetime $LastUsedAt = null)
    {
        $this->LastUsedAt = $LastUsedAt;
        return $this;
    }

    /**
     * Gets the Timestamp of last use of this token.
     *
     * @return \Datetime
     */
    public function getLastUsedAt()
    {
        return $this->LastUsedAt;
    }

    /**
     * Sets the Payload for this token.
     *
     * @param string
     * @return Apitoken
     */
    public function setSentData($SentData = null)
    {
        $this->SentData = $SentData;
        return $this;
    }

    /**
     * Gets the Payload for this token.
     *
     * @return string
     */
    public function getSentData()
    {
        return $this->SentData;
    }

    /**
     * Sets the Timezone to use for this token.
     *
     * @param string
     * @return Apitoken
     */
    public function setTimezone($Timezone = null)
    {
        $this->Timezone = $Timezone;
        return $this;
    }

    /**
     * Gets the Timezone to use for this token.
     *
     * @return string
     */
    public function getTimezone()
    {
        return $this->Timezone;
    }

    /**
     * Sets the Unique identifier for this token, to be used by user.
     *
     * @param string
     * @return Apitoken
     */
    public function setToken($Token = null)
    {
        $this->Token = $Token;
        return $this;
    }

    /**
     * Gets the Unique identifier for this token, to be used by user.
     *
     * @return string
     */
    public function getToken()
    {
        return $this->Token;
    }

    /**
     * Sets the Type of token
     *
     * @param string
     * @return Apitoken
     */
    public function setTokenType($TokenType)
    {
        $this->TokenType = $TokenType;
        return $this;
    }

    /**
     * Gets the Type of token
     *
     * @return string
     */
    public function getTokenType()
    {
        return $this->TokenType;
    }

    /**
     * Sets the Period during which token is considered valid.
     *
     * @param int
     * @return Apitoken
     */
    public function setValidFor($ValidFor = null)
    {
        $this->ValidFor = $ValidFor;
        return $this;
    }

    /**
     * Gets the Period during which token is considered valid.
     *
     * @return int
     */
    public function getValidFor()
    {
        return $this->ValidFor;
    }


}

