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
 * Toplinkclicked Model
 *
 * Top links clicked historgram
 */
class Toplinkclicked implements ModelInterface
{

    /**
     * Number of registered clicks.
     */
    protected $ClickedCount = null;

    /**
     * Unique numerical ID for this object
     */
    protected $ID = null;

    /**
     * Unique ID for the link.
     */
    protected $LinkId = null;

    /**
     * Actual link clicked
     */
    protected $Url = null;

    /**
     * Sets the Number of registered clicks.
     *
     * @param int
     * @return Toplinkclicked
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
     * Sets the Unique numerical ID for this object
     *
     * @param int
     * @return Toplinkclicked
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
     * Sets the Unique ID for the link.
     *
     * @param int
     * @return Toplinkclicked
     */
    public function setLinkId($LinkId = null)
    {
        $this->LinkId = $LinkId;
        return $this;
    }

    /**
     * Gets the Unique ID for the link.
     *
     * @return int
     */
    public function getLinkId()
    {
        return $this->LinkId;
    }

    /**
     * Sets the Actual link clicked
     *
     * @param string
     * @return Toplinkclicked
     */
    public function setUrl($Url = null)
    {
        $this->Url = $Url;
        return $this;
    }

    /**
     * Gets the Actual link clicked
     *
     * @return string
     */
    public function getUrl()
    {
        return $this->Url;
    }


}

