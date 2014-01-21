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
 * Useragentstatistics Model
 *
 * API Key message Open/Click statistical data grouped per user agent (browser)
 */
class Useragentstatistics implements ModelInterface
{

    /**
     * Number of clicks using this browser
     */
    protected $Count = null;

    /**
     * User of messages clicked using this browser
     */
    protected $DistinctCount = null;

    /**
     * Platform on which the browser runs.
     */
    protected $Platform = null;

    /**
     * Description of user agent
     */
    protected $UserAgent = null;

    /**
     * Sets the Number of clicks using this browser
     *
     * @param int
     * @return Useragentstatistics
     */
    public function setCount($Count = null)
    {
        $this->Count = $Count;
        return $this;
    }

    /**
     * Gets the Number of clicks using this browser
     *
     * @return int
     */
    public function getCount()
    {
        return $this->Count;
    }

    /**
     * Sets the User of messages clicked using this browser
     *
     * @param int
     * @return Useragentstatistics
     */
    public function setDistinctCount($DistinctCount = null)
    {
        $this->DistinctCount = $DistinctCount;
        return $this;
    }

    /**
     * Gets the User of messages clicked using this browser
     *
     * @return int
     */
    public function getDistinctCount()
    {
        return $this->DistinctCount;
    }

    /**
     * Sets the Platform on which the browser runs.
     *
     * @param string
     * @return Useragentstatistics
     */
    public function setPlatform($Platform)
    {
        $this->Platform = $Platform;
        return $this;
    }

    /**
     * Gets the Platform on which the browser runs.
     *
     * @return string
     */
    public function getPlatform()
    {
        return $this->Platform;
    }

    /**
     * Sets the Description of user agent
     *
     * @param string
     * @return Useragentstatistics
     */
    public function setUserAgent($UserAgent)
    {
        $this->UserAgent = $UserAgent;
        return $this;
    }

    /**
     * Gets the Description of user agent
     *
     * @return string
     */
    public function getUserAgent()
    {
        return $this->UserAgent;
    }


}

