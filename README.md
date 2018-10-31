
[doc]: http://dev.mailjet.com/guides/?php#
[api_credential]: https://app.mailjet.com/account/api_keys
[mailjet]: http://www.mailjet.com

![alt text](http://cdn.appstorm.net/web.appstorm.net/files/2012/02/mailjet_logo_200x200.png "Mailjet")

[![Codacy Badge](https://api.codacy.com/project/badge/grade/3fa729f3750849ce8e0471b0487439cb)](https://www.codacy.com/app/gbadi/mailjet-apiv3-php)
[![Build Status](https://travis-ci.org/mailjet/mailjet-apiv3-php.svg?branch=master)](https://travis-ci.org/mailjet/mailjet-apiv3-php)
![MIT License](https://img.shields.io/badge/license-MIT-007EC7.svg?style=flat-square)
![Current Version](https://img.shields.io/badge/version-1.1.8-green.svg)

[Mailjet][mailjet] API Client.

Check out all the resources and all the PHP code examples on the official documentation: [Mailjet Documentation][doc]

## Requirements

`PHP >= 5.4`

## Installation

``` bash
composer require mailjet/mailjet-apiv3-php
```
Without composer:

Clone or download [this repository](https://github.com/mailjet/mailjet-apiv3-php-no-composer) that already contains all the dependencies and the `vendor/autoload.php` file. If you encounter an issue, please post it here and not on the mirror repository.

## Getting Started!

[Grab][api_credential] and save your Mailjet API credentials.
It will create some variables available in your code, via the `getenv` function:

``` bash

export MJ_APIKEY_PUBLIC='your api key'
export MJ_APIKEY_PRIVATE='your api secret'

```

Initialize your [Mailjet][mailjet] Client:

``` php
<?php

use \Mailjet\Resources;

// getenv will allow us to get the MJ_APIKEY_PUBLIC/PRIVATE variables we created before
$apikey = getenv('MJ_APIKEY_PUBLIC');
$apisecret = getenv('MJ_APIKEY_PRIVATE');

// or

$apikey = 'my api key';
$apisecret = 'my api secrret';

$mj = new \Mailjet\Client($apikey, $apisecret);
?>
```
It's as easy as 1, 2, 3!


## Make your first call

``` php
<?php
require 'vendor/autoload.php';

use \Mailjet\Resources;

// use your saved credentials
$mj = new \Mailjet\Client(getenv('MJ_APIKEY_PUBLIC'), getenv('MJ_APIKEY_PRIVATE'));

// Resources are all located in the Resources class
$response = $mj->get(Resources::$Contact);

/*
  Read the response
*/
if ($response->success())
  var_dump($response->getData());
else
  var_dump($response->getStatus());

```

### [Filtering resources](http://dev.mailjet.com/guides/?php#filtering-resources)

The [Mailjet][mailjet] API provides a set of general filters that can be applied to a GET request for each resource. In addition to these general filters, each API resource has its own filters that can be used when performing the GET:

``` php
<?php

$filters = ['Limit' => '150'];

$response = $mj->get(Resources::$Contact, ['filters' => $filters]);

```

### [Send transactional emails](http://dev.mailjet.com/guides/?php#send-transactional-email)

You can send transactional messages with Mailjet's v3.1 Send API with the following code:  

``` php
<?php
/*
This calls sends an email to one recipient.
*/
require 'vendor/autoload.php';
use \Mailjet\Resources;
$mj = new \Mailjet\Client(getenv('MJ_APIKEY_PUBLIC'), getenv('MJ_APIKEY_PRIVATE'),
              true,['version' => 'v3.1']);
$body = [
    'Messages' => [
        [
            'From' => [
                'Email' => "pilot@mailjet.com",
                'Name' => "Mailjet Pilot"
            ],
            'To' => [
                [
                    'Email' => "passenger1@mailjet.com",
                    'Name' => "passenger 1"
                ]
            ],
            'Subject' => "Your email flight plan!",
            'TextPart' => "Dear passenger 1, welcome to Mailjet! May the delivery force be with you!",
            'HTMLPart' => "<h3>Dear passenger 1, welcome to Mailjet!</h3><br />May the delivery force be with you!"
        ]
    ]
];
$response = $mj->post(Resources::$Email, ['body' => $body]);
$response->success() && var_dump($response->getData());
?>
```

In case you wish to use Mailjet's Send API v3, you can find the legacy documentation and code samples [here](https://dev.mailjet.com/legacy/?php#send-api-v3-august-2017).


### [Send marketing campaign](http://dev.mailjet.com/guides/?php#send-marketing-campaigns)

In order to send your first newsletter, you need to have at least one active sender address in the Sender domains & addresses section.

``` php
<?php

$body = [
    'Recipients' => [
        [
            'Email' => "mailjet@example.org",
            'Name' => "Mailjet"
        ]
    ]
];

$response = $mj->post(Resources::$NewsletterTest, ['id' => $id, 'body' => $body]);

?>
```

### [Event API - real time notifications](http://dev.mailjet.com/guides/?php#event-api-real-time-notifications)

The [Event API](https://www.mailjet.com/feature/event-api/) offers a real-time notification through http request on any events related to the messages you sent. The main supported events are open, click, bounce, spam, blocked, unsub and sent. This event notification works for transactional and marketing emails.

The endpoint is a URL our server will call for each event (it can lead to a lot of hits). You can use the API to setup a new endpoint using the /eventcallbackurl resource. Alternatively, you can configure this in your account preferences, in the Event Tracking section.

``` php
<?php

$body = [
    'EventType' => "open",
    'Url' => "https://mydomain.com/event_handler"
];

$response = $mj->post(Resources::$Eventcallbackurl, ['body' => $body]);
```

### [Statistics](http://dev.mailjet.com/guides/?php#statistics)

The [Mailjet][mailjet] API offers resources to extract information for every message you send. You can also filter through the message statistics to view specific metrics for your messages.

``` php
<?php

$response = $mj->get(Resources::$Message, ['id' => $id]);
```

### [Parse API - Inbound emails](http://dev.mailjet.com/guides/?php#parse-api-inbound-emails)

The Parse API allows you to have inbound emails parsed and their content delivered to a webhook of your choice.
In order to begin receiving emails to your webhook, create a new instance of the Parse API via a POST request on the /parseroute resource.

``` php
<?php

$body = [
    'Url' => 'https://www.mydomain.com/mj_parse.php'
];

$response = $mj->post(Resources::$Parseroute, ['body' => $body]);

```

## Version 1.2.0 of the PHP wrapper

This version modifies the way to construct the Client or the calls. We add the possibility to add an array with parameters on both Client creation and API call (please note that each of these parameters are preset and are not mandatory in the creation or the call):

Properties of the $settings (Client constructor) and $options (API call function)

 - url (Default: api.mailjet.com): domain name of the API 
 - version (Default: v3): API version (only working for Mailjet API V3+)
 - call (Default: true): turns on(true) / off the call to the API
 - secured (Default: true): turns on(true) / off the use of 'https'

### A basic example: 

``` php 
<?php 
...

// Client constructors with specific settings: 
$mj = new \Mailjet\Client(getenv('MJ_APIKEY_PUBLIC'),
                          getenv('MJ_APIKEY_PRIVATE'), true, 
                          ['url' => "www.mailjet.com", 'version' => 'v3', 'call' => false]
                        );

// API call with specific options. The options passed in the call will only be used for this call.
$response = $mj->get(Resources::$Contact, [], ['version' => 'v3']);

```

Priority list of options, settings, and default configurations in order of precedence:  

API call > Client constructor > Resource (only with version, available in the Resources Class - [Resources.php](src/Mailjet/Resources.php)) > Wrapper configuration ([Config.php](src/Mailjet/Config.php)) 

## Version 1.4.0 of the PHP wrapper

This version adds the possibility to use authentication with bearer token and use the [SMS features](https://dev.mailjet.com/guides-sms/#overview) of the API. The bearer token can be generated in the [SMS menu](https://app.mailjet.com/sms) of your Mailjet account.

To create a new instance of the Mailjet client with token auth the token should be provided as the first parameter, the second must be NULL:
``` php
$mj = new \Mailjet\Client(getenv('MJ_APITOKEN'),
                          NULL, true, 
                          ['url' => "www.mailjet.com", 'version' => 'v3', 'call' => false]
                        );
```

An example SMS API request. The available SMS resources can be seen [here](src/Mailjet/Resources.php#L106).
``` php
$mj = new \Mailjet\Client($token);
$response = $mj->get(Resources::$Sms);
if ($response->success()) {
    var_dump($response->getData());
} else {
    var_dump($response->getStatus());
}
```

## Send a pull request

 - Fork the project.
 - Create a topic branch.
 - Implement your feature/bug fix.
 - Add documentation for your feature or bug fix.
 - Add specs for your feature or bug fix.
 - Commit and push your changes.
 - Submit a pull request. Please do not include changes to the gemspec, or version file.
