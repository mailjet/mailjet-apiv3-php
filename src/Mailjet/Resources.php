<?php
/**
 * PHP version 5
 *
 * This is the Mailjet Resources file
 *
 * @category Mailjet_API
 * @package  Mailjet-apiv3
 * @author   Guillaume Badi <gbadi@mailjet.com>
 * @license  MIT https://opensource.org/licenses/MIT
 * @link     dev.mailjet.com
 */

namespace Mailjet;

/**
 * PHP version 5
 *
 * This is the Mailjet Resources Class
 *
 * @category Mailjet_API
 * @package  Mailjet-apiv3
 * @author   Guillaume Badi <gbadi@mailjet.com>
 * @license  MIT https://opensource.org/licenses/MIT
 * @link     dev.mailjet.com
 */
class Resources
{
    public static $Email = ['send', '', ['v3/', 'v3.1/']];
    public static $Aggregategraphstatistics = ['aggregategraphstatistics', '', ['v3/']];
    public static $Apikey = ['apikey', '', ['v3/']];
    public static $Apikeyaccess = ['apikeyaccess', '', ['v3/']];
    public static $Apikeytotals = ['apikeytotals', '', ['v3/']];
    public static $Apitoken = ['apitoken', '', ['v3/']];
    public static $Axtesting = ['axtesting', '', ['v3/']];
    public static $Batchjob = ['batchjob', '', ['v3/']];
    public static $BatchjobCsverror = ['batchjob', 'csverror/text:csv', ['v3/']];
    public static $BatchjobJsonerror = ['batchjob', 'JSONError/application:json/LAST', ['v3/']];
    public static $Bouncestatistics = ['bouncestatistics', '', ['v3/']];
    public static $Campaign = ['campaign', '', ['v3/']];
    public static $Campaignaggregate = ['campaignaggregate', '', ['v3/']];
    public static $Campaigndraft = ['campaigndraft', '', ['v3/']];
    public static $CampaigndraftSchedule = ['campaigndraft', 'schedule', ['v3/']];
    public static $CampaigndraftStatus = ['campaigndraft', 'status', ['v3/']];
    public static $CampaigndraftSend = ['campaigndraft', 'send', ['v3/']];
    public static $CampaigndraftTest = ['campaigndraft', 'test', ['v3/']];
    public static $CampaigndraftDetailcontent = ['campaigndraft', 'detailcontent', ['v3/']];
    public static $Campaigngraphstatistics = ['campaigngraphstatistics', '', ['v3/']];
    public static $Campaignoverview = ['campaignoverview', '', ['v3/']];
    public static $Campaignstatistics = ['campaignstatistics', '', ['v3/']];
    public static $Clickstatistics = ['clickstatistics', '', ['v3/']];
    public static $Contact = ['contact', '', ['v3/']];
    public static $ContactManagecontactslists = ['contact', 'managecontactslists', ['v3/']];
    public static $ContactGetcontactslists = ['contact', 'getcontactslists', ['v3/']];
    public static $ContactManagemanycontacts = ['contact', 'managemanycontacts', ['v3/']];
    public static $Contactdata = ['contactdata', '', ['v3/']];
    public static $Contactfilter = ['contactfilter', '', ['v3/']];
    public static $Contacthistorydata = ['contacthistorydata', '', ['v3/']];
    public static $Contactmetadata = ['contactmetadata', '', ['v3/']];
    public static $Contactslist = ['contactslist', '', ['v3/']];
    public static $ContactslistCsvdata = ['contactslist', 'csvdata/text:plain', ['v3/']];
    public static $ContactslistManagecontact = ['contactslist', 'ManageContact', ['v3/']];
    public static $ContactslistManagemanycontacts = ['contactslist', 'ManageManyContacts', ['v3/']];
    public static $ContactslistImportlist = ['contactslist', 'ImportList', ['v3/']];
    public static $Contactslistsignup = ['contactslistsignup', '', ['v3/']];
    public static $Contactstatistics = ['contactstatistics', '', ['v3/']];
    public static $Csvimport = ['csvimport', '', ['v3/']];
    public static $Dns = ['dns', '', ['v3/']];
    public static $DnsCheck = ['dns', 'check', ['v3/']];
    public static $Domainstatistics = ['domainstatistics', '', ['v3/']];
    public static $Eventcallbackurl = ['eventcallbackurl', '', ['v3/']];
    public static $Geostatistics = ['geostatistics', '', ['v3/']];
    public static $Graphstatistics = ['graphstatistics', '', ['v3/']];
    public static $Listrecipient = ['listrecipient', '', ['v3/']];
    public static $Listrecipientstatistics = ['listrecipientstatistics', '', ['v3/']];
    public static $Liststatistics = ['liststatistics', '', ['v3/']];
    public static $Message = ['message', '', ['v3/']];
    public static $Messagehistory = ['messagehistory', '', ['v3/']];
    public static $Messageinformation = ['messageinformation', '', ['v3/']];
    public static $Messagesentstatistics = ['messagesentstatistics', '', ['v3/']];
    public static $Messagestate = ['messagestate', '', ['v3/']];
    public static $Messagestatistics = ['messagestatistics', '', ['v3/']];
    public static $Metadata = ['metadata', '', ['v3/']];
    public static $Metasender = ['metasender', '', ['v3/']];
    public static $Myprofile = ['myprofile', '', ['v3/']];
    public static $Newsletter = ['newsletter', '', ['v3/']];
    public static $NewsletterSchedule = ['newsletter', 'schedule', ['v3/']];
    public static $NewsletterStatus = ['newsletter', 'status', ['v3/']];
    public static $NewsletterSend = ['newsletter', 'send', ['v3/']];
    public static $NewsletterTest = ['newsletter', 'test', ['v3/']];
    public static $NewsletterDetailcontent = ['newsletter', 'detailcontent', ['v3/']];
    public static $Newslettertemplate = ['newslettertemplate', '', ['v3/']];
    public static $Newslettertemplatecategory = ['newslettertemplatecategory', '', ['v3/']];
    public static $Openinformation = ['openinformation', '', ['v3/']];
    public static $Openstatistics = ['openstatistics', '', ['v3/']];
    public static $Parseroute = ['parseroute', '', ['v3/']];
    public static $Preferences = ['preferences', '', ['v3/']];
    public static $Preset = ['preset', '', ['v3/']];
    public static $Sender = ['sender', '', ['v3/']];
    public static $SenderValidate = ['sender', 'validate', ['v3/']];
    public static $Senderstatistics = ['senderstatistics', '', ['v3/']];
    public static $Template = ['template', '', ['v3/']];
    public static $TemplateDetailcontent = ['template', 'detailcontent', ['v3/']];
    public static $TemplateDetailpreviews = ['template', 'detailpreviews', ['v3/']];
    public static $TemplateDisplaypreview = ['template', 'displaypreview', ['v3/']];
    public static $TemplateDetailthumbnail = ['template', 'detailthumbnail', ['v3/']];
    public static $TemplateDisplaythumbnail = ['template', 'displaythumbnail', ['v3/']];
    public static $Toplinkclicked = ['toplinkclicked', '', ['v3/']];
    public static $Trigger = ['trigger', '', ['v3/']];
    public static $User = ['user', '', ['v3/']];
    public static $UserActivate = ['user', 'activate', ['v3/']];
    public static $Useragentstatistics = ['useragentstatistics', '', ['v3/']];
    public static $Widget = ['widget', '', ['v3/']];
    public static $Widgetcustomvalue = ['widgetcustomvalue', '', ['v3/']];
}
