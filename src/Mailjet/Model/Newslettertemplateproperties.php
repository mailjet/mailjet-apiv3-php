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
 * Newslettertemplateproperties Model
 *
 * CSS data for a newsletter template
 */
class Newslettertemplateproperties implements ModelInterface
{

    /**
     * Unique numerical ID for this object
     */
    protected $ID = null;

    /**
     * CSS Property name
     */
    protected $Name = null;

    /**
     * Property Name
     */
    protected $PropertyName = null;

    /**
     * CSS Selector
     */
    protected $Selector = null;

    /**
     * Reference to template
     */
    protected $TemplateID = null;

    /**
     * Value
     */
    protected $Value = null;

    /**
     * Sets the Unique numerical ID for this object
     *
     * @param int
     * @return Newslettertemplateproperties
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
     * Sets the CSS Property name
     *
     * @param string
     * @return Newslettertemplateproperties
     */
    public function setName($Name)
    {
        $this->Name = $Name;
        return $this;
    }

    /**
     * Gets the CSS Property name
     *
     * @return string
     */
    public function getName()
    {
        return $this->Name;
    }

    /**
     * Sets the Property Name
     *
     * @param string
     * @return Newslettertemplateproperties
     */
    public function setPropertyName($PropertyName)
    {
        $this->PropertyName = $PropertyName;
        return $this;
    }

    /**
     * Gets the Property Name
     *
     * @return string
     */
    public function getPropertyName()
    {
        return $this->PropertyName;
    }

    /**
     * Sets the CSS Selector
     *
     * @param string
     * @return Newslettertemplateproperties
     */
    public function setSelector($Selector)
    {
        $this->Selector = $Selector;
        return $this;
    }

    /**
     * Gets the CSS Selector
     *
     * @return string
     */
    public function getSelector()
    {
        return $this->Selector;
    }

    /**
     * Sets the Reference to template
     *
     * @param int
     * @return Newslettertemplateproperties
     */
    public function setTemplateID($TemplateID)
    {
        $this->TemplateID = $TemplateID;
        return $this;
    }

    /**
     * Gets the Reference to template
     *
     * @return int
     */
    public function getTemplateID()
    {
        return $this->TemplateID;
    }

    /**
     * Sets the Value
     *
     * @param string
     * @return Newslettertemplateproperties
     */
    public function setValue($Value)
    {
        $this->Value = $Value;
        return $this;
    }

    /**
     * Gets the Value
     *
     * @return string
     */
    public function getValue()
    {
        return $this->Value;
    }


}

