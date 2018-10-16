<?php
namespace Mailjet;

/**
 * PHP version 5
 *
 * This is the Mailjet Resources Class
 *
 * @category Mailjet_API
 * @package Mailjet-apiv3
 * @author Guillaume Badi <gbadi@mailjet.com>
 * @license MIT https://opensource.org/licenses/MIT
 * @link dev.mailjet.com
 */
class Resources
{
    public static $Email = ['send', ''/*, 'v3.1'*/];
    public static $Aggregategraphstatistics = ['aggregategraphstatistics', ''];
    public static $Apikey = ['apikey', ''];
    public static $Apikeyaccess = ['apikeyaccess', ''];
    public static $Apikeytotals = ['apikeytotals', ''];
    public static $Apitoken = ['apitoken', ''];
    public static $Axtesting = ['axtesting', ''];
    public static $Batchjob = ['batchjob', ''];
    public static $BatchjobCsverror = ['batchjob', 'csverror/text:csv'];
    public static $BatchjobJsonerror = ['batchjob', 'JSONError/application:json/LAST'];
    public static $Bouncestatistics = ['bouncestatistics', ''];
    public static $Campaign = ['campaign', ''];
    public static $Campaignaggregate = ['campaignaggregate', ''];
    public static $Campaigndraft = ['campaigndraft', ''];
    public static $CampaigndraftSchedule = ['campaigndraft', 'schedule'];
    public static $CampaigndraftStatus = ['campaigndraft', 'status'];
    public static $CampaigndraftSend = ['campaigndraft', 'send'];
    public static $CampaigndraftTest = ['campaigndraft', 'test'];
    public static $CampaigndraftDetailcontent = ['campaigndraft', 'detailcontent'];
    public static $Campaigngraphstatistics = ['campaigngraphstatistics', ''];
    public static $Campaignoverview = ['campaignoverview', ''];
    public static $Campaignstatistics = ['campaignstatistics', ''];
    public static $Clickstatistics = ['clickstatistics', ''];
    public static $Contact = ['contact', ''];
    public static $ContactManagecontactslists = ['contact', 'managecontactslists'];
    public static $ContactGetcontactslists = ['contact', 'getcontactslists'];
    public static $ContactManagemanycontacts = ['contact', 'managemanycontacts'];
    public static $Contactdata = ['contactdata', ''];
    public static $Contactfilter = ['contactfilter', ''];
    public static $Contacthistorydata = ['contacthistorydata', ''];
    public static $Contactmetadata = ['contactmetadata', ''];
    public static $Contactslist = ['contactslist', ''];
    public static $ContactslistCsvdata = ['contactslist', 'csvdata/text:plain'];
    public static $ContactslistManagecontact = ['contactslist', 'ManageContact'];
    public static $ContactslistManagemanycontacts = ['contactslist', 'ManageManyContacts'];
    public static $ContactslistImportlist = ['contactslist', 'ImportList'];
    public static $Contactslistsignup = ['contactslistsignup', ''];
    public static $Contactstatistics = ['contactstatistics', ''];
    public static $Csvimport = ['csvimport', ''];
    public static $Dns = ['dns', ''];
    public static $DnsCheck = ['dns', 'check'];
    public static $Domainstatistics = ['domainstatistics', ''];
    public static $Eventcallbackurl = ['eventcallbackurl', ''];
    public static $Geostatistics = ['geostatistics', ''];
    public static $Graphstatistics = ['graphstatistics', ''];
    public static $Listrecipient = ['listrecipient', ''];
    public static $Listrecipientstatistics = ['listrecipientstatistics', ''];
    public static $Liststatistics = ['liststatistics', ''];
    public static $Message = ['message', ''];
    public static $Messagehistory = ['messagehistory', ''];
    public static $Messageinformation = ['messageinformation', ''];
    public static $Messagesentstatistics = ['messagesentstatistics', ''];
    public static $Messagestate = ['messagestate', ''];
    public static $Messagestatistics = ['messagestatistics', ''];
    public static $Metadata = ['metadata', ''];
    public static $Metasender = ['metasender', ''];
    public static $Myprofile = ['myprofile', ''];
    public static $Newsletter = ['newsletter', ''];
    public static $NewsletterSchedule = ['newsletter', 'schedule'];
    public static $NewsletterStatus = ['newsletter', 'status'];
    public static $NewsletterSend = ['newsletter', 'send'];
    public static $NewsletterTest = ['newsletter', 'test'];
    public static $NewsletterDetailcontent = ['newsletter', 'detailcontent'];
    public static $Newslettertemplate = ['newslettertemplate', ''];
    public static $Newslettertemplatecategory = ['newslettertemplatecategory', ''];
    public static $Openinformation = ['openinformation', ''];
    public static $Openstatistics = ['openstatistics', ''];
    public static $Parseroute = ['parseroute', ''];
    public static $Preferences = ['preferences', ''];
    public static $Preset = ['preset', ''];
    public static $Sender = ['sender', ''];
    public static $SenderValidate = ['sender', 'validate'];
    public static $Senderstatistics = ['senderstatistics', ''];
    public static $Template = ['template', ''];
    public static $TemplateDetailcontent = ['template', 'detailcontent'];
    public static $TemplateDetailpreviews = ['template', 'detailpreviews'];
    public static $TemplateDisplaypreview = ['template', 'displaypreview'];
    public static $TemplateDetailthumbnail = ['template', 'detailthumbnail'];
    public static $TemplateDisplaythumbnail = ['template', 'displaythumbnail'];
    public static $Toplinkclicked = ['toplinkclicked', ''];
    public static $Trigger = ['trigger', ''];
    public static $User = ['user', ''];
    public static $UserActivate = ['user', 'activate'];
    public static $Useragentstatistics = ['useragentstatistics', ''];
    public static $Widget = ['widget', ''];
    public static $Widgetcustomvalue = ['widgetcustomvalue', ''];
    public static $Statcounters = ['statcounters', ''];
    public static $StatisticsLinkclick = ['statistics', 'link-click'];
    public static $StatisticsRecipientesp = ['statistics', 'recipient-esp'];
    public static $Sms = ['sms', ''];
    public static $SmsSend = ['sms-send', ''];
    public static $SmsExport = ['sms', 'export'];
    public static $SmsCount = ['sms', 'count'];
}
