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
 * Openstatistics Model
 *
 * API Key Statistical message open information
 */
class Openstatistics implements ModelInterface
{

    /**
     * Number of message open registrations.
     */
    protected $OpenedCount = null;

    /**
     * Delay between delivery and open (in seconds)
     */
    protected $OpenedDelay = null;

    /**
     * Total number of messages processed by Mailjet
     */
    protected $ProcessedCount = null;

    /**
     * Sets the Number of message open registrations.
     *
     * @param int
     * @return Openstatistics
     */
    public function setOpenedCount($OpenedCount = null)
    {
        $this->OpenedCount = $OpenedCount;
        return $this;
    }

    /**
     * Gets the Number of message open registrations.
     *
     * @return int
     */
    public function getOpenedCount()
    {
        return $this->OpenedCount;
    }

    /**
     * Sets the Delay between delivery and open (in seconds)
     *
     * @param string
     * @return Openstatistics
     */
    public function setOpenedDelay($OpenedDelay = null)
    {
        $this->OpenedDelay = $OpenedDelay;
        return $this;
    }

    /**
     * Gets the Delay between delivery and open (in seconds)
     *
     * @return string
     */
    public function getOpenedDelay()
    {
        return $this->OpenedDelay;
    }

    /**
     * Sets the Total number of messages processed by Mailjet
     *
     * @param int
     * @return Openstatistics
     */
    public function setProcessedCount($ProcessedCount = null)
    {
        $this->ProcessedCount = $ProcessedCount;
        return $this;
    }

    /**
     * Gets the Total number of messages processed by Mailjet
     *
     * @return int
     */
    public function getProcessedCount()
    {
        return $this->ProcessedCount;
    }


}

