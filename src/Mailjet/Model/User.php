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
 * User Model
 *
 * Mailjet User account definition
 */
class User implements ModelInterface
{

    /**
     * Reference to administrator assigned to this user
     */
    protected $AccountManagerAdminId = null;

    /**
     * Timestamp when object was created in database
     */
    protected $CreatedAt = null;

    /**
     * Email address of user
     */
    protected $Email = null;

    /**
     * Unique numerical ID for this object
     */
    protected $ID = null;

    /**
     * Is the user activated
     */
    protected $IsActivated = false;

    /**
     * Is the user banned ?
     */
    protected $IsBanned = false;

    /**
     * Is the user part of the Beta testers [?]
     */
    protected $IsBeta = false;

    /**
     * Is the user allowed to pay cash ?
     */
    protected $IsCashAllowed = false;

    /**
     * Is the user information complete ?
     */
    protected $IsCompleted = false;

    /**
     * Is the user profile complete ?
     */
    protected $IsProfileCompleted = false;

    /**
     * Has the user accepted the Mailjet Rules ?
     */
    protected $IsRulesAccepted = false;

    /**
     * Has the user been temporarily blocked ?
     */
    protected $IsTemporaryBlocked = false;

    /**
     * Timestamp when user last logged in.
     */
    protected $LastLoginAt = null;

    /**
     * Locale in which the information in this record is recorded.
     */
    protected $Locale = null;

    /**
     * Maximum number of API keys the user is allowed to have.
     */
    protected $MaxAllowedAPIKeys = null;

    /**
     * Timestamp when user data was last modified.
     */
    protected $ModifiedAt = null;

    /**
     * New email in case of email change
     */
    protected $NewEmail = null;

    /**
     * Timestamp when new password was requested.
     */
    protected $NewPasswordRequestedAt = null;

    /**
     * Timezone for this user
     */
    protected $Timezone = null;

    /**
     * User's Last UMP score
     */
    protected $UMPScoreLast = null;

    /**
     * User's original UMP score
     */
    protected $UMPScoreOrig = null;

    /**
     * User name
     */
    protected $Username = null;

    /**
     * Timestamp when user was last warned about hitting his rate limit.
     */
    protected $WarnedRatelimitAt = null;

    /**
     * Sets the Reference to administrator assigned to this user
     *
     * @param int
     * @return User
     */
    public function setAccountManagerAdminId($AccountManagerAdminId = null)
    {
        $this->AccountManagerAdminId = $AccountManagerAdminId;
        return $this;
    }

    /**
     * Gets the Reference to administrator assigned to this user
     *
     * @return int
     */
    public function getAccountManagerAdminId()
    {
        return $this->AccountManagerAdminId;
    }

    /**
     * Sets the Timestamp when object was created in database
     *
     * @param \Datetime
     * @return User
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
     * Sets the Email address of user
     *
     * @param string
     * @return User
     */
    public function setEmail($Email = null)
    {
        $this->Email = $Email;
        return $this;
    }

    /**
     * Gets the Email address of user
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
     * @return User
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
     * Sets the Is the user activated
     *
     * @param bool
     * @return User
     */
    public function setIsActivated($IsActivated = null)
    {
        $this->IsActivated = $IsActivated;
        return $this;
    }

    /**
     * Gets the Is the user activated
     *
     * @return bool
     */
    public function getIsActivated()
    {
        return $this->IsActivated;
    }

    /**
     * Sets the Is the user banned ?
     *
     * @param bool
     * @return User
     */
    public function setIsBanned($IsBanned = null)
    {
        $this->IsBanned = $IsBanned;
        return $this;
    }

    /**
     * Gets the Is the user banned ?
     *
     * @return bool
     */
    public function getIsBanned()
    {
        return $this->IsBanned;
    }

    /**
     * Sets the Is the user part of the Beta testers [?]
     *
     * @param bool
     * @return User
     */
    public function setIsBeta($IsBeta = null)
    {
        $this->IsBeta = $IsBeta;
        return $this;
    }

    /**
     * Gets the Is the user part of the Beta testers [?]
     *
     * @return bool
     */
    public function getIsBeta()
    {
        return $this->IsBeta;
    }

    /**
     * Sets the Is the user allowed to pay cash ?
     *
     * @param bool
     * @return User
     */
    public function setIsCashAllowed($IsCashAllowed = null)
    {
        $this->IsCashAllowed = $IsCashAllowed;
        return $this;
    }

    /**
     * Gets the Is the user allowed to pay cash ?
     *
     * @return bool
     */
    public function getIsCashAllowed()
    {
        return $this->IsCashAllowed;
    }

    /**
     * Sets the Is the user information complete ?
     *
     * @param bool
     * @return User
     */
    public function setIsCompleted($IsCompleted = null)
    {
        $this->IsCompleted = $IsCompleted;
        return $this;
    }

    /**
     * Gets the Is the user information complete ?
     *
     * @return bool
     */
    public function getIsCompleted()
    {
        return $this->IsCompleted;
    }

    /**
     * Sets the Is the user profile complete ?
     *
     * @param bool
     * @return User
     */
    public function setIsProfileCompleted($IsProfileCompleted = null)
    {
        $this->IsProfileCompleted = $IsProfileCompleted;
        return $this;
    }

    /**
     * Gets the Is the user profile complete ?
     *
     * @return bool
     */
    public function getIsProfileCompleted()
    {
        return $this->IsProfileCompleted;
    }

    /**
     * Sets the Has the user accepted the Mailjet Rules ?
     *
     * @param bool
     * @return User
     */
    public function setIsRulesAccepted($IsRulesAccepted = null)
    {
        $this->IsRulesAccepted = $IsRulesAccepted;
        return $this;
    }

    /**
     * Gets the Has the user accepted the Mailjet Rules ?
     *
     * @return bool
     */
    public function getIsRulesAccepted()
    {
        return $this->IsRulesAccepted;
    }

    /**
     * Sets the Has the user been temporarily blocked ?
     *
     * @param bool
     * @return User
     */
    public function setIsTemporaryBlocked($IsTemporaryBlocked = null)
    {
        $this->IsTemporaryBlocked = $IsTemporaryBlocked;
        return $this;
    }

    /**
     * Gets the Has the user been temporarily blocked ?
     *
     * @return bool
     */
    public function getIsTemporaryBlocked()
    {
        return $this->IsTemporaryBlocked;
    }

    /**
     * Sets the Timestamp when user last logged in.
     *
     * @param \Datetime
     * @return User
     */
    public function setLastLoginAt(\Datetime $LastLoginAt = null)
    {
        $this->LastLoginAt = $LastLoginAt;
        return $this;
    }

    /**
     * Gets the Timestamp when user last logged in.
     *
     * @return \Datetime
     */
    public function getLastLoginAt()
    {
        return $this->LastLoginAt;
    }

    /**
     * Sets the Locale in which the information in this record is recorded.
     *
     * @param string
     * @return User
     */
    public function setLocale($Locale = null)
    {
        $this->Locale = $Locale;
        return $this;
    }

    /**
     * Gets the Locale in which the information in this record is recorded.
     *
     * @return string
     */
    public function getLocale()
    {
        return $this->Locale;
    }

    /**
     * Sets the Maximum number of API keys the user is allowed to have.
     *
     * @param int
     * @return User
     */
    public function setMaxAllowedAPIKeys($MaxAllowedAPIKeys = null)
    {
        $this->MaxAllowedAPIKeys = $MaxAllowedAPIKeys;
        return $this;
    }

    /**
     * Gets the Maximum number of API keys the user is allowed to have.
     *
     * @return int
     */
    public function getMaxAllowedAPIKeys()
    {
        return $this->MaxAllowedAPIKeys;
    }

    /**
     * Sets the Timestamp when user data was last modified.
     *
     * @param \Datetime
     * @return User
     */
    public function setModifiedAt(\Datetime $ModifiedAt = null)
    {
        $this->ModifiedAt = $ModifiedAt;
        return $this;
    }

    /**
     * Gets the Timestamp when user data was last modified.
     *
     * @return \Datetime
     */
    public function getModifiedAt()
    {
        return $this->ModifiedAt;
    }

    /**
     * Sets the New email in case of email change
     *
     * @param string
     * @return User
     */
    public function setNewEmail($NewEmail = null)
    {
        $this->NewEmail = $NewEmail;
        return $this;
    }

    /**
     * Gets the New email in case of email change
     *
     * @return string
     */
    public function getNewEmail()
    {
        return $this->NewEmail;
    }

    /**
     * Sets the Timestamp when new password was requested.
     *
     * @param \Datetime
     * @return User
     */
    public function setNewPasswordRequestedAt(\Datetime $NewPasswordRequestedAt = null)
    {
        $this->NewPasswordRequestedAt = $NewPasswordRequestedAt;
        return $this;
    }

    /**
     * Gets the Timestamp when new password was requested.
     *
     * @return \Datetime
     */
    public function getNewPasswordRequestedAt()
    {
        return $this->NewPasswordRequestedAt;
    }

    /**
     * Sets the Timezone for this user
     *
     * @param string
     * @return User
     */
    public function setTimezone($Timezone = null)
    {
        $this->Timezone = $Timezone;
        return $this;
    }

    /**
     * Gets the Timezone for this user
     *
     * @return string
     */
    public function getTimezone()
    {
        return $this->Timezone;
    }

    /**
     * Sets the User's Last UMP score
     *
     * @param string
     * @return User
     */
    public function setUMPScoreLast($UMPScoreLast = null)
    {
        $this->UMPScoreLast = $UMPScoreLast;
        return $this;
    }

    /**
     * Gets the User's Last UMP score
     *
     * @return string
     */
    public function getUMPScoreLast()
    {
        return $this->UMPScoreLast;
    }

    /**
     * Sets the User's original UMP score
     *
     * @param string
     * @return User
     */
    public function setUMPScoreOrig($UMPScoreOrig = null)
    {
        $this->UMPScoreOrig = $UMPScoreOrig;
        return $this;
    }

    /**
     * Gets the User's original UMP score
     *
     * @return string
     */
    public function getUMPScoreOrig()
    {
        return $this->UMPScoreOrig;
    }

    /**
     * Sets the User name
     *
     * @param string
     * @return User
     */
    public function setUsername($Username)
    {
        $this->Username = $Username;
        return $this;
    }

    /**
     * Gets the User name
     *
     * @return string
     */
    public function getUsername()
    {
        return $this->Username;
    }

    /**
     * Sets the Timestamp when user was last warned about hitting his rate limit.
     *
     * @param \Datetime
     * @return User
     */
    public function setWarnedRatelimitAt(\Datetime $WarnedRatelimitAt = null)
    {
        $this->WarnedRatelimitAt = $WarnedRatelimitAt;
        return $this;
    }

    /**
     * Gets the Timestamp when user was last warned about hitting his rate limit.
     *
     * @return \Datetime
     */
    public function getWarnedRatelimitAt()
    {
        return $this->WarnedRatelimitAt;
    }


}

