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
 * Apikeyaccess Model
 *
 * Access rights description on API keys for subaccounts/users
 */
class Apikeyaccess implements ModelInterface
{

    /**
     * JSON describing access rights.
     */
    protected $AllowedAccess = null;

    /**
     * API key for which the rights are descibed.
     */
    protected $APIKeyID = null;

    /**
     * Timestamp when object was created in database
     */
    protected $CreatedAt = null;

    /**
     * Custom name for this set of rights
     */
    protected $CustomName = null;

    /**
     * Unique numerical ID for this object
     */
    protected $ID = null;

    /**
     * Is this object active (rights enforced) or not
     */
    protected $IsActive = false;

    /**
     * Timestamp of last registered activity for this API Key
     */
    protected $LastActivityAt = null;

    /**
     * Reference to Real user
     */
    protected $RealUserID = null;

    /**
     * Reference to subaccount
     */
    protected $SubaccountID = null;

    /**
     * Unique Token used to retrieve these access rights.
     */
    protected $Token = null;

    /**
     * Timestamp when object was last updated in database.
     */
    protected $UpdatedAt = null;

    /**
     * Reference to user for whom access is described.
     */
    protected $UserID = null;

    /**
     * Sets the JSON describing access rights.
     *
     * @param string
     * @return Apikeyaccess
     */
    public function setAllowedAccess($AllowedAccess = null)
    {
        $this->AllowedAccess = $AllowedAccess;
        return $this;
    }

    /**
     * Gets the JSON describing access rights.
     *
     * @return string
     */
    public function getAllowedAccess()
    {
        return $this->AllowedAccess;
    }

    /**
     * Sets the API key for which the rights are descibed.
     *
     * @param int
     * @return Apikeyaccess
     */
    public function setAPIKeyID($APIKeyID)
    {
        $this->APIKeyID = $APIKeyID;
        return $this;
    }

    /**
     * Gets the API key for which the rights are descibed.
     *
     * @return int
     */
    public function getAPIKeyID()
    {
        return $this->APIKeyID;
    }

    /**
     * Sets the Timestamp when object was created in database
     *
     * @param \Datetime
     * @return Apikeyaccess
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
     * Sets the Custom name for this set of rights
     *
     * @param string
     * @return Apikeyaccess
     */
    public function setCustomName($CustomName = null)
    {
        $this->CustomName = $CustomName;
        return $this;
    }

    /**
     * Gets the Custom name for this set of rights
     *
     * @return string
     */
    public function getCustomName()
    {
        return $this->CustomName;
    }

    /**
     * Sets the Unique numerical ID for this object
     *
     * @param int
     * @return Apikeyaccess
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
     * Sets the Is this object active (rights enforced) or not
     *
     * @param bool
     * @return Apikeyaccess
     */
    public function setIsActive($IsActive = null)
    {
        $this->IsActive = $IsActive;
        return $this;
    }

    /**
     * Gets the Is this object active (rights enforced) or not
     *
     * @return bool
     */
    public function getIsActive()
    {
        return $this->IsActive;
    }

    /**
     * Sets the Timestamp of last registered activity for this API Key
     *
     * @param \Datetime
     * @return Apikeyaccess
     */
    public function setLastActivityAt(\Datetime $LastActivityAt = null)
    {
        $this->LastActivityAt = $LastActivityAt;
        return $this;
    }

    /**
     * Gets the Timestamp of last registered activity for this API Key
     *
     * @return \Datetime
     */
    public function getLastActivityAt()
    {
        return $this->LastActivityAt;
    }

    /**
     * Sets the Reference to Real user
     *
     * @param int
     * @return Apikeyaccess
     */
    public function setRealUserID($RealUserID = null)
    {
        $this->RealUserID = $RealUserID;
        return $this;
    }

    /**
     * Gets the Reference to Real user
     *
     * @return int
     */
    public function getRealUserID()
    {
        return $this->RealUserID;
    }

    /**
     * Sets the Reference to subaccount
     *
     * @param int
     * @return Apikeyaccess
     */
    public function setSubaccountID($SubaccountID = null)
    {
        $this->SubaccountID = $SubaccountID;
        return $this;
    }

    /**
     * Gets the Reference to subaccount
     *
     * @return int
     */
    public function getSubaccountID()
    {
        return $this->SubaccountID;
    }

    /**
     * Sets the Unique Token used to retrieve these access rights.
     *
     * @param string
     * @return Apikeyaccess
     */
    public function setToken($Token = null)
    {
        $this->Token = $Token;
        return $this;
    }

    /**
     * Gets the Unique Token used to retrieve these access rights.
     *
     * @return string
     */
    public function getToken()
    {
        return $this->Token;
    }

    /**
     * Sets the Timestamp when object was last updated in database.
     *
     * @param \Datetime
     * @return Apikeyaccess
     */
    public function setUpdatedAt(\Datetime $UpdatedAt = null)
    {
        $this->UpdatedAt = $UpdatedAt;
        return $this;
    }

    /**
     * Gets the Timestamp when object was last updated in database.
     *
     * @return \Datetime
     */
    public function getUpdatedAt()
    {
        return $this->UpdatedAt;
    }

    /**
     * Sets the Reference to user for whom access is described.
     *
     * @param int
     * @return Apikeyaccess
     */
    public function setUserID($UserID)
    {
        $this->UserID = $UserID;
        return $this;
    }

    /**
     * Gets the Reference to user for whom access is described.
     *
     * @return int
     */
    public function getUserID()
    {
        return $this->UserID;
    }


}

