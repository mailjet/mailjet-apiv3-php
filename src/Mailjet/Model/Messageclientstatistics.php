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
 * Messageclientstatistics Model
 *
 * Per API Key User agent statistics for user agents
 */
class Messageclientstatistics implements ModelInterface
{

    /**
     * Number of times this useragent was used.
     */
    protected $Count = null;

    /**
     * Domain from which useragent was used
     */
    protected $Domain = null;

    /**
     * Unique numerical ID for this object
     */
    protected $ID = null;

    /**
     * Reference to user agent
     */
    protected $UserAgent = null;

    /**
     * Sets the Number of times this useragent was used.
     *
     * @param int
     * @return Messageclientstatistics
     */
    public function setCount($Count = null)
    {
        $this->Count = $Count;
        return $this;
    }

    /**
     * Gets the Number of times this useragent was used.
     *
     * @return int
     */
    public function getCount()
    {
        return $this->Count;
    }

    /**
     * Sets the Domain from which useragent was used
     *
     * @param string
     * @return Messageclientstatistics
     */
    public function setDomain($Domain)
    {
        $this->Domain = $Domain;
        return $this;
    }

    /**
     * Gets the Domain from which useragent was used
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
     * @return Messageclientstatistics
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
     * Sets the Reference to user agent
     *
     * @param int
     * @return Messageclientstatistics
     */
    public function setUserAgent($UserAgent)
    {
        $this->UserAgent = $UserAgent;
        return $this;
    }

    /**
     * Gets the Reference to user agent
     *
     * @return int
     */
    public function getUserAgent()
    {
        return $this->UserAgent;
    }


}

