<?php

namespace Mailjet\Api;

/**
 * Mailjet Api
 *
 * Wrapper used (as proxy) to consume apis
 *
 * @see http://mjdemo.poxx.net/~shubham
 */
class Api extends AbstractApi
{

    /**
     * Helper for apikey calls
     *
     * @return Apikey
     */
    public function apikey()
    {
        return $this->api('Apikey');
    }

    /**
     * Helper for apikeyaccess calls
     *
     * @return Apikeyaccess
     */
    public function apikeyaccess()
    {
        return $this->api('Apikeyaccess');
    }

    /**
     * Helper for apikeytotals calls
     *
     * @return Apikeytotals
     */
    public function apikeytotals()
    {
        return $this->api('Apikeytotals');
    }

    /**
     * Helper for apitoken calls
     *
     * @return Apitoken
     */
    public function apitoken()
    {
        return $this->api('Apitoken');
    }

    /**
     * Helper for batchjob calls
     *
     * @return Batchjob
     */
    public function batchjob()
    {
        return $this->api('Batchjob');
    }

    /**
     * Helper for bouncestatistics calls
     *
     * @return Bouncestatistics
     */
    public function bouncestatistics()
    {
        return $this->api('Bouncestatistics');
    }

    /**
     * Helper for campaign calls
     *
     * @return Campaign
     */
    public function campaign()
    {
        return $this->api('Campaign');
    }

    /**
     * Helper for campaignstatistics calls
     *
     * @return Campaignstatistics
     */
    public function campaignstatistics()
    {
        return $this->api('Campaignstatistics');
    }

    /**
     * Helper for clickstatistics calls
     *
     * @return Clickstatistics
     */
    public function clickstatistics()
    {
        return $this->api('Clickstatistics');
    }

    /**
     * Helper for contact calls
     *
     * @return Contact
     */
    public function contact()
    {
        return $this->api('Contact');
    }

    /**
     * Helper for contactslist calls
     *
     * @return Contactslist
     */
    public function contactslist()
    {
        return $this->api('Contactslist');
    }

    /**
     * Helper for contactslistsignup calls
     *
     * @return Contactslistsignup
     */
    public function contactslistsignup()
    {
        return $this->api('Contactslistsignup');
    }

    /**
     * Helper for contactstatistics calls
     *
     * @return Contactstatistics
     */
    public function contactstatistics()
    {
        return $this->api('Contactstatistics');
    }

    /**
     * Helper for domainstatistics calls
     *
     * @return Domainstatistics
     */
    public function domainstatistics()
    {
        return $this->api('Domainstatistics');
    }

    /**
     * Helper for eventcallbackurl calls
     *
     * @return Eventcallbackurl
     */
    public function eventcallbackurl()
    {
        return $this->api('Eventcallbackurl');
    }

    /**
     * Helper for geostatistics calls
     *
     * @return Geostatistics
     */
    public function geostatistics()
    {
        return $this->api('Geostatistics');
    }

    /**
     * Helper for graphstatistics calls
     *
     * @return Graphstatistics
     */
    public function graphstatistics()
    {
        return $this->api('Graphstatistics');
    }

    /**
     * Helper for listrecipient calls
     *
     * @return Listrecipient
     */
    public function listrecipient()
    {
        return $this->api('Listrecipient');
    }

    /**
     * Helper for listrecipientstatistics calls
     *
     * @return Listrecipientstatistics
     */
    public function listrecipientstatistics()
    {
        return $this->api('Listrecipientstatistics');
    }

    /**
     * Helper for liststatistics calls
     *
     * @return Liststatistics
     */
    public function liststatistics()
    {
        return $this->api('Liststatistics');
    }

    /**
     * Helper for manycontacts calls
     *
     * @return Manycontacts
     */
    public function manycontacts()
    {
        return $this->api('Manycontacts');
    }

    /**
     * Helper for message calls
     *
     * @return Message
     */
    public function message()
    {
        return $this->api('Message');
    }

    /**
     * Helper for messageclientstatistics calls
     *
     * @return Messageclientstatistics
     */
    public function messageclientstatistics()
    {
        return $this->api('Messageclientstatistics');
    }

    /**
     * Helper for messagehistory calls
     *
     * @return Messagehistory
     */
    public function messagehistory()
    {
        return $this->api('Messagehistory');
    }

    /**
     * Helper for messageinformation calls
     *
     * @return Messageinformation
     */
    public function messageinformation()
    {
        return $this->api('Messageinformation');
    }

    /**
     * Helper for messagesentstatistics calls
     *
     * @return Messagesentstatistics
     */
    public function messagesentstatistics()
    {
        return $this->api('Messagesentstatistics');
    }

    /**
     * Helper for messagestate calls
     *
     * @return Messagestate
     */
    public function messagestate()
    {
        return $this->api('Messagestate');
    }

    /**
     * Helper for messagestatistics calls
     *
     * @return Messagestatistics
     */
    public function messagestatistics()
    {
        return $this->api('Messagestatistics');
    }

    /**
     * Helper for metadata calls
     *
     * @return Metadata
     */
    public function metadata()
    {
        return $this->api('Metadata');
    }

    /**
     * Helper for metasender calls
     *
     * @return Metasender
     */
    public function metasender()
    {
        return $this->api('Metasender');
    }

    /**
     * Helper for myprofile calls
     *
     * @return Myprofile
     */
    public function myprofile()
    {
        return $this->api('Myprofile');
    }

    /**
     * Helper for newsletter calls
     *
     * @return Newsletter
     */
    public function newsletter()
    {
        return $this->api('Newsletter');
    }

    /**
     * Helper for newsletterblock calls
     *
     * @return Newsletterblock
     */
    public function newsletterblock()
    {
        return $this->api('Newsletterblock');
    }

    /**
     * Helper for newsletterproperties calls
     *
     * @return Newsletterproperties
     */
    public function newsletterproperties()
    {
        return $this->api('Newsletterproperties');
    }

    /**
     * Helper for newslettertemplate calls
     *
     * @return Newslettertemplate
     */
    public function newslettertemplate()
    {
        return $this->api('Newslettertemplate');
    }

    /**
     * Helper for newslettertemplateblock calls
     *
     * @return Newslettertemplateblock
     */
    public function newslettertemplateblock()
    {
        return $this->api('Newslettertemplateblock');
    }

    /**
     * Helper for newslettertemplatecategory calls
     *
     * @return Newslettertemplatecategory
     */
    public function newslettertemplatecategory()
    {
        return $this->api('Newslettertemplatecategory');
    }

    /**
     * Helper for newslettertemplateproperties calls
     *
     * @return Newslettertemplateproperties
     */
    public function newslettertemplateproperties()
    {
        return $this->api('Newslettertemplateproperties');
    }

    /**
     * Helper for openinformation calls
     *
     * @return Openinformation
     */
    public function openinformation()
    {
        return $this->api('Openinformation');
    }

    /**
     * Helper for openstatistics calls
     *
     * @return Openstatistics
     */
    public function openstatistics()
    {
        return $this->api('Openstatistics');
    }

    /**
     * Helper for preferences calls
     *
     * @return Preferences
     */
    public function preferences()
    {
        return $this->api('Preferences');
    }

    /**
     * Helper for sender calls
     *
     * @return Sender
     */
    public function sender()
    {
        return $this->api('Sender');
    }

    /**
     * Helper for senderstatistics calls
     *
     * @return Senderstatistics
     */
    public function senderstatistics()
    {
        return $this->api('Senderstatistics');
    }

    /**
     * Helper for toplinkclicked calls
     *
     * @return Toplinkclicked
     */
    public function toplinkclicked()
    {
        return $this->api('Toplinkclicked');
    }

    /**
     * Helper for trigger calls
     *
     * @return Trigger
     */
    public function trigger()
    {
        return $this->api('Trigger');
    }

    /**
     * Helper for user calls
     *
     * @return User
     */
    public function user()
    {
        return $this->api('User');
    }

    /**
     * Helper for useragentstatistics calls
     *
     * @return Useragentstatistics
     */
    public function useragentstatistics()
    {
        return $this->api('Useragentstatistics');
    }

    /**
     * Helper for widget calls
     *
     * @return Widget
     */
    public function widget()
    {
        return $this->api('Widget');
    }

    /**
     * Helper for widgetcustomvalue calls
     *
     * @return Widgetcustomvalue
     */
    public function widgetcustomvalue()
    {
        return $this->api('Widgetcustomvalue');
    }


}

