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
 * Metasender Model
 *
 * Definition of send domains authorized to send mails for an API Key
 */
class Metasender implements ModelInterface
{

    /**
     * Timestamp when object was created in database
     */
    protected $CreatedAt = null;

    /**
     * User provided readable description of the domain
     */
    protected $Description = null;

    /**
     * The email address (lowercase), which may consist of a wildcard (*) in the local
     * part.
     */
    protected $Email = null;

    /**
     * Filename expected on the domain name webserver, used for verifying the domain,
     * in case of a catch-all address.
     */
    protected $Filename = null;

    /**
     * Unique numerical ID for this object
     */
    protected $ID = null;

    /**
     * Is the domain authorized to send mails through Mailjet.
     */
    protected $IsEnabled = false;

    /**
     * Sets the Timestamp when object was created in database
     *
     * @param \Datetime
     * @return Metasender
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
     * Sets the User provided readable description of the domain
     *
     * @param string
     * @return Metasender
     */
    public function setDescription($Description = null)
    {
        $this->Description = $Description;
        return $this;
    }

    /**
     * Gets the User provided readable description of the domain
     *
     * @return string
     */
    public function getDescription()
    {
        return $this->Description;
    }

    /**
     * Sets the The email address (lowercase), which may consist of a wildcard (*) in
     * the local part.
     *
     * @param string
     * @return Metasender
     */
    public function setEmail($Email)
    {
        $this->Email = $Email;
        return $this;
    }

    /**
     * Gets the The email address (lowercase), which may consist of a wildcard (*) in
     * the local part.
     *
     * @return string
     */
    public function getEmail()
    {
        return $this->Email;
    }

    /**
     * Sets the Filename expected on the domain name webserver, used for verifying the
     * domain, in case of a catch-all address.
     *
     * @param string
     * @return Metasender
     */
    public function setFilename($Filename = null)
    {
        $this->Filename = $Filename;
        return $this;
    }

    /**
     * Gets the Filename expected on the domain name webserver, used for verifying the
     * domain, in case of a catch-all address.
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
     * @return Metasender
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
     * Sets the Is the domain authorized to send mails through Mailjet.
     *
     * @param bool
     * @return Metasender
     */
    public function setIsEnabled($IsEnabled = null)
    {
        $this->IsEnabled = $IsEnabled;
        return $this;
    }

    /**
     * Gets the Is the domain authorized to send mails through Mailjet.
     *
     * @return bool
     */
    public function getIsEnabled()
    {
        return $this->IsEnabled;
    }


}

