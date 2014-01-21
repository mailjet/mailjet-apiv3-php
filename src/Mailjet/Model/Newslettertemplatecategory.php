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
 * Newslettertemplatecategory Model
 *
 * Global newsletter template categories
 */
class Newslettertemplatecategory implements ModelInterface
{

    /**
     * Category description (localized)
     */
    protected $Description = null;

    /**
     * Unique numerical ID for this object
     */
    protected $ID = null;

    /**
     * Locale in which the information in this record is recorded.
     */
    protected $Locale = null;

    /**
     * Parent category reference.
     */
    protected $ParentCategoryID = null;

    /**
     * Category name.
     */
    protected $Value = null;

    /**
     * Sets the Category description (localized)
     *
     * @param string
     * @return Newslettertemplatecategory
     */
    public function setDescription($Description)
    {
        $this->Description = $Description;
        return $this;
    }

    /**
     * Gets the Category description (localized)
     *
     * @return string
     */
    public function getDescription()
    {
        return $this->Description;
    }

    /**
     * Sets the Unique numerical ID for this object
     *
     * @param int
     * @return Newslettertemplatecategory
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
     * Sets the Locale in which the information in this record is recorded.
     *
     * @param string
     * @return Newslettertemplatecategory
     */
    public function setLocale($Locale)
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
     * Sets the Parent category reference.
     *
     * @param int
     * @return Newslettertemplatecategory
     */
    public function setParentCategoryID($ParentCategoryID)
    {
        $this->ParentCategoryID = $ParentCategoryID;
        return $this;
    }

    /**
     * Gets the Parent category reference.
     *
     * @return int
     */
    public function getParentCategoryID()
    {
        return $this->ParentCategoryID;
    }

    /**
     * Sets the Category name.
     *
     * @param string
     * @return Newslettertemplatecategory
     */
    public function setValue($Value)
    {
        $this->Value = $Value;
        return $this;
    }

    /**
     * Gets the Category name.
     *
     * @return string
     */
    public function getValue()
    {
        return $this->Value;
    }


}

