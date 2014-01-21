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
 * Widgetcustomvalue Model
 *
 * Mailjet widget settings
 */
class Widgetcustomvalue implements ModelInterface
{

    /**
     * APIKey to which the widget and custom value belongs
     */
    protected $APIKeyID = null;

    /**
     * Should the value be displayed
     */
    protected $Display = false;

    /**
     * Unique numerical ID for this object
     */
    protected $ID = null;

    /**
     * Name of the custom value
     */
    protected $Name = null;

    /**
     * Value of the custom value
     */
    protected $Value = null;

    /**
     * Widget for which the value is registered.
     */
    protected $WidgetID = null;

    /**
     * Sets the APIKey to which the widget and custom value belongs
     *
     * @param int
     * @return Widgetcustomvalue
     */
    public function setAPIKeyID($APIKeyID = null)
    {
        $this->APIKeyID = $APIKeyID;
        return $this;
    }

    /**
     * Gets the APIKey to which the widget and custom value belongs
     *
     * @return int
     */
    public function getAPIKeyID()
    {
        return $this->APIKeyID;
    }

    /**
     * Sets the Should the value be displayed
     *
     * @param bool
     * @return Widgetcustomvalue
     */
    public function setDisplay($Display = null)
    {
        $this->Display = $Display;
        return $this;
    }

    /**
     * Gets the Should the value be displayed
     *
     * @return bool
     */
    public function getDisplay()
    {
        return $this->Display;
    }

    /**
     * Sets the Unique numerical ID for this object
     *
     * @param int
     * @return Widgetcustomvalue
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
     * Sets the Name of the custom value
     *
     * @param string
     * @return Widgetcustomvalue
     */
    public function setName($Name)
    {
        $this->Name = $Name;
        return $this;
    }

    /**
     * Gets the Name of the custom value
     *
     * @return string
     */
    public function getName()
    {
        return $this->Name;
    }

    /**
     * Sets the Value of the custom value
     *
     * @param string
     * @return Widgetcustomvalue
     */
    public function setValue($Value = null)
    {
        $this->Value = $Value;
        return $this;
    }

    /**
     * Gets the Value of the custom value
     *
     * @return string
     */
    public function getValue()
    {
        return $this->Value;
    }

    /**
     * Sets the Widget for which the value is registered.
     *
     * @param int
     * @return Widgetcustomvalue
     */
    public function setWidgetID($WidgetID)
    {
        $this->WidgetID = $WidgetID;
        return $this;
    }

    /**
     * Gets the Widget for which the value is registered.
     *
     * @return int
     */
    public function getWidgetID()
    {
        return $this->WidgetID;
    }


}

