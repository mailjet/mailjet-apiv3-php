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
 * Myprofile Model
 *
 * User profile data: payment information etc.
 */
class Myprofile implements ModelInterface
{

    /**
     * City part of address
     */
    protected $AddressCity = null;

    /**
     * Country part of address
     */
    protected $AddressCountry = null;

    /**
     * Postal code of address (ZIP)
     */
    protected $AddressPostalCode = null;

    /**
     * Street and house number
     */
    protected $AddressStreet = null;

    /**
     * Billing email address
     */
    protected $BillingEmail = null;

    /**
     * User's birthday
     */
    protected $BirthdayAt = null;

    /**
     * Name of the company
     */
    protected $CompanyName = null;

    /**
     * EU name of the company
     */
    protected $CompanyNameEu = null;

    /**
     * Contact telephone
     */
    protected $ContactPhone = null;

    /**
     * Estimated volume of messages
     */
    protected $EstimatedVolume = null;

    /**
     * ?
     */
    protected $Features = null;

    /**
     * Contact person's first name
     */
    protected $Firstname = null;

    /**
     * Unique numerical ID for this object
     */
    protected $ID = null;

    /**
     * Industry in which user works.
     */
    protected $Industry = null;

    /**
     * Contact person's last name
     */
    protected $Lastname = null;

    /**
     * Reference to user
     */
    protected $UserID = null;

    /**
     * VAT rate for this user.
     */
    protected $VAT = null;

    /**
     * User supplied VAT number.
     */
    protected $VATNumber = null;

    /**
     * Status of VAT number checking.
     */
    protected $VATNumberStatus = null;

    /**
     * Mailjet determined VAT number
     */
    protected $VATNumberTrusted = null;

    /**
     * URL of user's website
     */
    protected $Website = null;

    /**
     * Sets the City part of address
     *
     * @param string
     * @return Myprofile
     */
    public function setAddressCity($AddressCity = null)
    {
        $this->AddressCity = $AddressCity;
        return $this;
    }

    /**
     * Gets the City part of address
     *
     * @return string
     */
    public function getAddressCity()
    {
        return $this->AddressCity;
    }

    /**
     * Sets the Country part of address
     *
     * @param string
     * @return Myprofile
     */
    public function setAddressCountry($AddressCountry = null)
    {
        $this->AddressCountry = $AddressCountry;
        return $this;
    }

    /**
     * Gets the Country part of address
     *
     * @return string
     */
    public function getAddressCountry()
    {
        return $this->AddressCountry;
    }

    /**
     * Sets the Postal code of address (ZIP)
     *
     * @param string
     * @return Myprofile
     */
    public function setAddressPostalCode($AddressPostalCode = null)
    {
        $this->AddressPostalCode = $AddressPostalCode;
        return $this;
    }

    /**
     * Gets the Postal code of address (ZIP)
     *
     * @return string
     */
    public function getAddressPostalCode()
    {
        return $this->AddressPostalCode;
    }

    /**
     * Sets the Street and house number
     *
     * @param string
     * @return Myprofile
     */
    public function setAddressStreet($AddressStreet = null)
    {
        $this->AddressStreet = $AddressStreet;
        return $this;
    }

    /**
     * Gets the Street and house number
     *
     * @return string
     */
    public function getAddressStreet()
    {
        return $this->AddressStreet;
    }

    /**
     * Sets the Billing email address
     *
     * @param string
     * @return Myprofile
     */
    public function setBillingEmail($BillingEmail = null)
    {
        $this->BillingEmail = $BillingEmail;
        return $this;
    }

    /**
     * Gets the Billing email address
     *
     * @return string
     */
    public function getBillingEmail()
    {
        return $this->BillingEmail;
    }

    /**
     * Sets the User's birthday
     *
     * @param \Datetime
     * @return Myprofile
     */
    public function setBirthdayAt(\Datetime $BirthdayAt = null)
    {
        $this->BirthdayAt = $BirthdayAt;
        return $this;
    }

    /**
     * Gets the User's birthday
     *
     * @return \Datetime
     */
    public function getBirthdayAt()
    {
        return $this->BirthdayAt;
    }

    /**
     * Sets the Name of the company
     *
     * @param string
     * @return Myprofile
     */
    public function setCompanyName($CompanyName = null)
    {
        $this->CompanyName = $CompanyName;
        return $this;
    }

    /**
     * Gets the Name of the company
     *
     * @return string
     */
    public function getCompanyName()
    {
        return $this->CompanyName;
    }

    /**
     * Sets the EU name of the company
     *
     * @param string
     * @return Myprofile
     */
    public function setCompanyNameEu($CompanyNameEu = null)
    {
        $this->CompanyNameEu = $CompanyNameEu;
        return $this;
    }

    /**
     * Gets the EU name of the company
     *
     * @return string
     */
    public function getCompanyNameEu()
    {
        return $this->CompanyNameEu;
    }

    /**
     * Sets the Contact telephone
     *
     * @param string
     * @return Myprofile
     */
    public function setContactPhone($ContactPhone = null)
    {
        $this->ContactPhone = $ContactPhone;
        return $this;
    }

    /**
     * Gets the Contact telephone
     *
     * @return string
     */
    public function getContactPhone()
    {
        return $this->ContactPhone;
    }

    /**
     * Sets the Estimated volume of messages
     *
     * @param int
     * @return Myprofile
     */
    public function setEstimatedVolume($EstimatedVolume = null)
    {
        $this->EstimatedVolume = $EstimatedVolume;
        return $this;
    }

    /**
     * Gets the Estimated volume of messages
     *
     * @return int
     */
    public function getEstimatedVolume()
    {
        return $this->EstimatedVolume;
    }

    /**
     * Sets the ?
     *
     * @param string
     * @return Myprofile
     */
    public function setFeatures($Features = null)
    {
        $this->Features = $Features;
        return $this;
    }

    /**
     * Gets the ?
     *
     * @return string
     */
    public function getFeatures()
    {
        return $this->Features;
    }

    /**
     * Sets the Contact person's first name
     *
     * @param string
     * @return Myprofile
     */
    public function setFirstname($Firstname = null)
    {
        $this->Firstname = $Firstname;
        return $this;
    }

    /**
     * Gets the Contact person's first name
     *
     * @return string
     */
    public function getFirstname()
    {
        return $this->Firstname;
    }

    /**
     * Sets the Unique numerical ID for this object
     *
     * @param int
     * @return Myprofile
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
     * Sets the Industry in which user works.
     *
     * @param string
     * @return Myprofile
     */
    public function setIndustry($Industry = null)
    {
        $this->Industry = $Industry;
        return $this;
    }

    /**
     * Gets the Industry in which user works.
     *
     * @return string
     */
    public function getIndustry()
    {
        return $this->Industry;
    }

    /**
     * Sets the Contact person's last name
     *
     * @param string
     * @return Myprofile
     */
    public function setLastname($Lastname = null)
    {
        $this->Lastname = $Lastname;
        return $this;
    }

    /**
     * Gets the Contact person's last name
     *
     * @return string
     */
    public function getLastname()
    {
        return $this->Lastname;
    }

    /**
     * Sets the Reference to user
     *
     * @param int
     * @return Myprofile
     */
    public function setUserID($UserID = null)
    {
        $this->UserID = $UserID;
        return $this;
    }

    /**
     * Gets the Reference to user
     *
     * @return int
     */
    public function getUserID()
    {
        return $this->UserID;
    }

    /**
     * Sets the VAT rate for this user.
     *
     * @param string
     * @return Myprofile
     */
    public function setVAT($VAT = null)
    {
        $this->VAT = $VAT;
        return $this;
    }

    /**
     * Gets the VAT rate for this user.
     *
     * @return string
     */
    public function getVAT()
    {
        return $this->VAT;
    }

    /**
     * Sets the User supplied VAT number.
     *
     * @param string
     * @return Myprofile
     */
    public function setVATNumber($VATNumber = null)
    {
        $this->VATNumber = $VATNumber;
        return $this;
    }

    /**
     * Gets the User supplied VAT number.
     *
     * @return string
     */
    public function getVATNumber()
    {
        return $this->VATNumber;
    }

    /**
     * Sets the Status of VAT number checking.
     *
     * @param int
     * @return Myprofile
     */
    public function setVATNumberStatus($VATNumberStatus = null)
    {
        $this->VATNumberStatus = $VATNumberStatus;
        return $this;
    }

    /**
     * Gets the Status of VAT number checking.
     *
     * @return int
     */
    public function getVATNumberStatus()
    {
        return $this->VATNumberStatus;
    }

    /**
     * Sets the Mailjet determined VAT number
     *
     * @param string
     * @return Myprofile
     */
    public function setVATNumberTrusted($VATNumberTrusted = null)
    {
        $this->VATNumberTrusted = $VATNumberTrusted;
        return $this;
    }

    /**
     * Gets the Mailjet determined VAT number
     *
     * @return string
     */
    public function getVATNumberTrusted()
    {
        return $this->VATNumberTrusted;
    }

    /**
     * Sets the URL of user's website
     *
     * @param string
     * @return Myprofile
     */
    public function setWebsite($Website = null)
    {
        $this->Website = $Website;
        return $this;
    }

    /**
     * Gets the URL of user's website
     *
     * @return string
     */
    public function getWebsite()
    {
        return $this->Website;
    }


}

