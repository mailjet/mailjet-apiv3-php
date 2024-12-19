<?php

declare(strict_types=1);

/*
 * Copyright (C) 2013 Mailgun
 *
 * This software may be modified and distributed under the terms
 * of the MIT license. See the LICENSE file for details.
 */

namespace Mailjet;

use Mailjet\Normalizer\ContactNormalizer;

/**
 * This is the Mailjet Resources Class
 *
 * @category Mailjet_API
 * @author   Guillaume Badi <gbadi@mailjet.com>
 * @license  MIT https://opensource.org/licenses/MIT
 * @see      dev.mailjet.com
 */
class Resources
{
    public static array $Email = ['send', ''/*, 'v3.1'*/];
    public static array $Aggregategraphstatistics = ['aggregategraphstatistics', ''];
    public static array $Apikey = ['apikey', ''];
    public static array $Apikeyaccess = ['apikeyaccess', ''];
    public static array $Apikeytotals = ['apikeytotals', ''];
    public static array $Apitoken = ['apitoken', ''];
    public static array $Axtesting = ['axtesting', ''];
    public static array $Batchjob = ['batchjob', ''];
    public static array $BatchjobCsverror = ['batchjob', 'csverror/text:csv'];
    public static array $BatchjobJsonerror = ['batchjob', 'JSONError/application:json/LAST'];
    public static array $Bouncestatistics = ['bouncestatistics', ''];
    public static array $Campaign = ['campaign', ''];
    public static array $Campaignaggregate = ['campaignaggregate', ''];
    public static array $Campaigndraft = ['campaigndraft', ''];
    public static array $CampaigndraftSchedule = ['campaigndraft', 'schedule'];
    public static array $CampaigndraftStatus = ['campaigndraft', 'status'];
    public static array $CampaigndraftSend = ['campaigndraft', 'send'];
    public static array $CampaigndraftTest = ['campaigndraft', 'test'];
    public static array $CampaigndraftDetailcontent = ['campaigndraft', 'detailcontent'];
    public static array $Campaigngraphstatistics = ['campaigngraphstatistics', ''];
    public static array $Campaignoverview = ['campaignoverview', ''];
    public static array $Campaignstatistics = ['campaignstatistics', ''];
    public static array $Clickstatistics = ['clickstatistics', ''];
    public static array $Contact = ['contact', '', 'normalizer' => ContactNormalizer::class];
    public static array $Contacts = ['contacts', ''];
    public static array $ContactManagecontactslists = ['contact', 'managecontactslists'];
    public static array $ContactGetcontactslists = ['contact', 'getcontactslists'];
    public static array $ContactManagemanycontacts = ['contact', 'managemanycontacts'];
    public static array $Contactdata = ['contactdata', ''];
    public static array $Contactfilter = ['contactfilter', ''];
    public static array $Contacthistorydata = ['contacthistorydata', ''];
    public static array $Contactmetadata = ['contactmetadata', ''];
    public static array $Contactslist = ['contactslist', ''];
    public static array $ContactslistCsvdata = ['contactslist', 'csvdata/text:plain'];
    public static array $ContactslistManagecontact = ['contactslist', 'ManageContact'];
    public static array $ContactslistManagemanycontacts = ['contactslist', 'ManageManyContacts'];
    public static array $ContactslistImportlist = ['contactslist', 'ImportList'];
    public static array $Contactslistsignup = ['contactslistsignup', ''];
    public static array $Contactstatistics = ['contactstatistics', ''];
    public static array $Csvimport = ['csvimport', ''];
    public static array $Dns = ['dns', ''];
    public static array $DnsCheck = ['dns', 'check'];
    public static array $Domainstatistics = ['domainstatistics', ''];
    public static array $Eventcallbackurl = ['eventcallbackurl', ''];
    public static array $Geostatistics = ['geostatistics', ''];
    public static array $Graphstatistics = ['graphstatistics', ''];
    public static array $Listrecipient = ['listrecipient', ''];
    public static array $Listrecipientstatistics = ['listrecipientstatistics', ''];
    public static array $Liststatistics = ['liststatistics', ''];
    public static array $Message = ['message', ''];
    public static array $Messagehistory = ['messagehistory', ''];
    public static array $Messageinformation = ['messageinformation', ''];
    public static array $Messagesentstatistics = ['messagesentstatistics', ''];
    public static array $Messagestate = ['messagestate', ''];
    public static array $Messagestatistics = ['messagestatistics', ''];
    public static array $Metadata = ['metadata', ''];
    public static array $Metasender = ['metasender', ''];
    public static array $Myprofile = ['myprofile', ''];
    public static array $Newsletter = ['newsletter', ''];
    public static array $NewsletterSchedule = ['newsletter', 'schedule'];
    public static array $NewsletterStatus = ['newsletter', 'status'];
    public static array $NewsletterSend = ['newsletter', 'send'];
    public static array $NewsletterTest = ['newsletter', 'test'];
    public static array $NewsletterDetailcontent = ['newsletter', 'detailcontent'];
    public static array $Newslettertemplate = ['newslettertemplate', ''];
    public static array $Newslettertemplatecategory = ['newslettertemplatecategory', ''];
    public static array $Openinformation = ['openinformation', ''];
    public static array $Openstatistics = ['openstatistics', ''];
    public static array $Parseroute = ['parseroute', ''];
    public static array $Preferences = ['preferences', ''];
    public static array $Preset = ['preset', ''];
    public static array $Sender = ['sender', ''];
    public static array $SenderValidate = ['sender', 'validate'];
    public static array $Senderstatistics = ['senderstatistics', ''];
    public static array $Template = ['template', ''];
    public static array $TemplateDetailcontent = ['template', 'detailcontent'];
    public static array $TemplateDetailpreviews = ['template', 'detailpreviews'];
    public static array $TemplateDisplaypreview = ['template', 'displaypreview'];
    public static array $TemplateDetailthumbnail = ['template', 'detailthumbnail'];
    public static array $TemplateDisplaythumbnail = ['template', 'displaythumbnail'];
    public static array $Toplinkclicked = ['toplinkclicked', ''];
    public static array $Trigger = ['trigger', ''];
    public static array $User = ['user', ''];
    public static array $UserActivate = ['user', 'activate'];
    public static array $Useragentstatistics = ['useragentstatistics', ''];
    public static array $Widget = ['widget', ''];
    public static array $Widgetcustomvalue = ['widgetcustomvalue', ''];
    public static array $Statcounters = ['statcounters', ''];
    public static array $StatisticsLinkclick = ['statistics', 'link-click'];
    public static array $StatisticsRecipientesp = ['statistics', 'recipient-esp'];
    public static array $Sms = ['sms', ''];
    public static array $SmsSend = ['sms-send', ''];
    public static array $SmsExport = ['sms', 'export'];
    public static array $SmsCount = ['sms', 'count'];
}
