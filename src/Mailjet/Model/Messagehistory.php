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

use Mailjet\Type\TMessageEventType;

/**
 * Messagehistory Model
 *
 * Event history of a message
 */
class Messagehistory implements ModelInterface
{

    /**
     * Timestamp when event was registered.
     */
    protected $EventAt = null;

    /**
     * Type of event
     */
    protected $EventType = 'sent';

    /**
     * Useragent used to trigger the event (when applicable)
     */
    protected $Useragent = null;

    /**
     * Sets the Timestamp when event was registered.
     *
     * @param int
     * @return Messagehistory
     */
    public function setEventAt($EventAt = null)
    {
        $this->EventAt = $EventAt;
        return $this;
    }

    /**
     * Gets the Timestamp when event was registered.
     *
     * @return int
     */
    public function getEventAt()
    {
        return $this->EventAt;
    }

    /**
     * Sets the Type of event
     *
     * @param TMessageEventType
     * @return Messagehistory
     */
    public function setEventType(TMessageEventType $EventType = null)
    {
        $this->EventType = $EventType;
        return $this;
    }

    /**
     * Gets the Type of event
     *
     * @return TMessageEventType
     */
    public function getEventType()
    {
        return $this->EventType;
    }

    /**
     * Sets the Useragent used to trigger the event (when applicable)
     *
     * @param string
     * @return Messagehistory
     */
    public function setUseragent($Useragent = null)
    {
        $this->Useragent = $Useragent;
        return $this;
    }

    /**
     * Gets the Useragent used to trigger the event (when applicable)
     *
     * @return string
     */
    public function getUseragent()
    {
        return $this->Useragent;
    }


}

