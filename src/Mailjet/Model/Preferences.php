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
 * Preferences Model
 *
 * User preferences in key=value format
 */
class Preferences implements ModelInterface
{

    /**
     * Unique numerical ID for this object
     */
    protected $ID = null;

    /**
     * Name of preference
     */
    protected $Key = null;

    /**
     * User for which this is the preference
     */
    protected $UserID = null;

    /**
     * Value of preference
     */
    protected $Value = null;

    /**
     * Sets the Unique numerical ID for this object
     *
     * @param int
     * @return Preferences
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
     * Sets the Name of preference
     *
     * @param string
     * @return Preferences
     */
    public function setKey($Key)
    {
        $this->Key = $Key;
        return $this;
    }

    /**
     * Gets the Name of preference
     *
     * @return string
     */
    public function getKey()
    {
        return $this->Key;
    }

    /**
     * Sets the User for which this is the preference
     *
     * @param int
     * @return Preferences
     */
    public function setUserID($UserID)
    {
        $this->UserID = $UserID;
        return $this;
    }

    /**
     * Gets the User for which this is the preference
     *
     * @return int
     */
    public function getUserID()
    {
        return $this->UserID;
    }

    /**
     * Sets the Value of preference
     *
     * @param string
     * @return Preferences
     */
    public function setValue($Value = null)
    {
        $this->Value = $Value;
        return $this;
    }

    /**
     * Gets the Value of preference
     *
     * @return string
     */
    public function getValue()
    {
        return $this->Value;
    }


}

