[doc]: http://dev.mailjet.com/guides/?php#
[ref]: http://dev.mailjet.com/reference/
[api_credential]: https://app.mailjet.com/account/apikeys
[mailjet]: http://www.mailjet.com
[smsDashboard]:https://app.mailjet.com/sms

![alt text](https://www.mailjet.com/images/email/transac/logo_header.png "Mailjet")


# Official Mailjet PHP Wrapper

[![Codacy Badge](https://api.codacy.com/project/badge/grade/3fa729f3750849ce8e0471b0487439cb)](https://www.codacy.com/app/gbadi/mailjet-apiv3-php)
[![Build Status](https://travis-ci.org/mailjet/mailjet-apiv3-php.svg?branch=master)](https://travis-ci.org/mailjet/mailjet-apiv3-php)
![MIT License](https://img.shields.io/badge/license-MIT-007EC7.svg?style=flat-square)
![Current Version](https://img.shields.io/badge/version-1.4.1-green.svg)

## Overview

This repository contains the official PHP wrapper for the Mailjet API.

Check out all the resources and PHP code examples in the [Offical Documentation](https://dev.mailjet.com/guides/?php#getting-started).

## Table of contents

- [Compatibility](#compatibility)
- [Installation](#installation)
- [Authentication](#authentication)
- [Make your first call](#make-your-first-call)
- [Client / Call configuration specifics](#client--call-configuration-specifics)
  - [Options](#options)
    - [API versioning](#api-versioning)
    - [Base URL](#base-url)
  - [Disable API call](#disable-api-call)
- [List of resources](#list-of-resources)
- [Request examples](#request-examples)
  - [POST request](#post-request)
    - [Simple POST request](#simple-post-request)
    - [Using actions](#using-actions)
  - [GET request](#get-request)
    - [Retrieve all objects](#retrieve-all-objects)
    - [Use filtering](#use-filtering)
    - [Retrieve a single object](#retrieve-a-single-object)
  - [PUT request](#put-request)
  - [DELETE request](#delete-request)
  - [Response](#response)
  - [API resources helpers](#api-resources-helpers)
- [SMS API](#sms-api)
  - [Token authentication](#token-authentication)
  - [Example Request](#example-request)
- [Contribute](#contribute)

### Compatibility

This library requires **PHP v5.4** or higher.

### Installation

Use the below code to install the wrapper:

`composer require mailjet/mailjet-apiv3-php`

If you are not using [Composer](https://getcomposer.org/), clone or download [this repository](https://github.com/mailjet/mailjet-apiv3-php-no-composer) that already contains all the dependencies and the `vendor/autoload.php` file. If you encounter an issue, please post it here and not on the mirror repository.

### Authentication

The Mailjet Email API uses your API and Secret keys for authentication. [Grab][api_credential] and save your Mailjet API credentials.

```bash
export MJ_APIKEY_PUBLIC='your API key'
export MJ_APIKEY_PRIVATE='your API secret'
```

> Note: For the SMS API the authorization is based on a Bearer token. See information about it in the [SMS API](#sms-api) section of the readme.

Initialize your [Mailjet][mailjet] Client:

```php
use \Mailjet\Resources;

// getenv will allow us to get the MJ_APIKEY_PUBLIC/PRIVATE variables we created before:

$apikey = getenv('MJ_APIKEY_PUBLIC');
$apisecret = getenv('MJ_APIKEY_PRIVATE');

$mj = new \Mailjet\Client($apikey, $apisecret);

// or, without using environment variables:

$apikey = 'your API key';
$apisecret = 'your API secret';

$mj = new \Mailjet\Client($apikey, $apisecret);
```

### Make your first call

Here's an example on how to send an email:

```php
<?php
require 'vendor/autoload.php';
use \Mailjet\Resources;

// Use your saved credentials, specify that you are using Send API v3.1

$mj = new \Mailjet\Client(getenv('MJ_APIKEY_PUBLIC'), getenv('MJ_APIKEY_PRIVATE'),true,['version' => 'v3.1']);

// Define your request body

$body = [
    'Messages' => [
        [
            'From' => [
                'Email' => "$SENDER_EMAIL",
                'Name' => "Me"
            ],
            'To' => [
                [
                    'Email' => "$RECIPIENT_EMAIL",
                    'Name' => "You"
                ]
            ],
            'Subject' => "My first Mailjet Email!",
            'TextPart' => "Greetings from Mailjet!",
            'HTMLPart' => "<h3>Dear passenger 1, welcome to <a href=\"https://www.mailjet.com/\">Mailjet</a>!</h3>
            <br />May the delivery force be with you!"
        ]
    ]
];

// All resources are located in the Resources class

$response = $mj->post(Resources::$Email, ['body' => $body]);

// Read the response

$response->success() && var_dump($response->getData());
?>
```

## Client / Call Configuration Specifics

To instantiate the library you can use the following constructor:  

`new \Mailjet\Client($MJ_APIKEY_PUBLIC, $MJ_APIKEY_PRIVATE,$CALL,$OPTIONS);`

 - `$MJ_APIKEY_PUBLIC` : public Mailjet API key
 - `$MJ_APIKEY_PRIVATE` : private Mailjet API key
 - `$CALL` : boolean to enable the API call to Mailjet API server (should be `true` to run the API call)
 - `$OPTIONS` : associative PHP array describing the connection options (see Options bellow for full list)

### Options

#### API Versioning

The Mailjet API is spread among three distinct versions:

- `v3` - The Email API
- `v3.1` - Email Send API v3.1, which is the latest version of our Send API
- `v4` - SMS API

Since most Email API endpoints are located under `v3`, it is set as the default one and does not need to be specified when making your request. For the others you need to specify the version using `version`. For example, if using Send API `v3.1`:

```php
$mj = new \Mailjet\Client(getenv('MJ_APIKEY_PUBLIC'), getenv('MJ_APIKEY_PRIVATE'),true,['version' => 'v3.1']);
```

For additional information refer to our [API Reference](https://dev.preprod.mailjet.com/reference/overview/versioning/).

#### Base URL

The default base domain name for the Mailjet API is api.mailjet.com. You can modify this base URL by setting a value for `url` in your call:

```php
$mj = new \Mailjet\Client(getenv('MJ_APIKEY_PUBLIC'),
                          getenv('MJ_APIKEY_PRIVATE'), true,
                          ['url' => "api.us.mailjet.com"]
                        );
```

If your account has been moved to Mailjet's US architecture, the URL value you need to set is `api.us.mailjet.com`.

### Disable API call

By default the API call parameter is always enabled. However, you may want to disable it during testing to prevent unnecessary calls to the Mailjet API. This is done by setting the third parameter to `false`:

```php
$mj = new \Mailjet\Client(getenv('MJ_APIKEY_PUBLIC'), getenv('MJ_APIKEY_PRIVATE'), false);
```

## List of resources

You can find the list of all available resources for this library in [/src/Mailjet/Resources.php](https://github.com/mailjet/mailjet-apiv3-php/blob/master/src/Mailjet/Resources.php). The file lists the names of the PHP resources and the corresponding names in the [API reference][ref].

## Request Examples

### POST Request

Use the `post` method of the Mailjet CLient (i.e. `$mj->post($resource, $params)`)

`$params` will be a PHP associative array with the following keys :

 - `body`: associative PHP array defining the object to create. The properties correspond to the property of the JSON Payload)
 - `id` : ID you want to apply a POST request to (used in case of action on a resource)

#### Simple POST request

```php
<?php
/*
Create a new contact:
*/
require 'vendor/autoload.php';
use \Mailjet\Resources;
$mj = new \Mailjet\Client(getenv('MJ_APIKEY_PUBLIC'), getenv('MJ_APIKEY_PRIVATE'));
$body = [
    'Email' => "email@example.com"
];
$response = $mj->post(Resources::$Contact, ['body' => $body]);
$response->success() && var_dump($response->getData());?>
```

#### Using actions

```php
<?php
/*
Manage the subscription status of a contact to multiple lists
*/
require 'vendor/autoload.php';
use \Mailjet\Resources;
$mj = new \Mailjet\Client(getenv('MJ_APIKEY_PUBLIC'), getenv('MJ_APIKEY_PRIVATE'));
$body = [
    'ContactsLists' => [
        [
            'ListID' => "$ListID_1",
            'Action' => "addnoforce"
        ],
        [
            'ListID' => "$ListID_2",
            'Action' => "addforce"
        ]
    ]
];
$response = $mj->post(Resources::$ContactManagecontactslists, ['id' => $id, 'body' => $body]);
$response->success() && var_dump($response->getData());
?>
```

### GET Request

Use the `get` method of the Mailjet CLient (i.e. `$mj->get($ressource, $params)`)

`$param` will be a PHP associative array with the following keys :

 - `id` : Unique ID of the element you want to get (optional)
 - `filters`: associative array listing the query parameters you want to apply to your get (optional)

#### Retrieve all objects

```php
<?php
/*
Retrieve all contacts:
*/
require 'vendor/autoload.php';
use \Mailjet\Resources;
$mj = new \Mailjet\Client(getenv('MJ_APIKEY_PUBLIC'), getenv('MJ_APIKEY_PRIVATE'));
$response = $mj->get(Resources::$Contact);
$response->success() && var_dump($response->getData());
?>
```

#### Use filtering

```php
<?php
/*
Retrieve all contacts that are not in the campaign exclusion list :
*/
require 'vendor/autoload.php';
use \Mailjet\Resources;
$mj = new \Mailjet\Client(getenv('MJ_APIKEY_PUBLIC'), getenv('MJ_APIKEY_PRIVATE'));
$filters = [
  'IsExcludedFromCampaigns' => 'false'
];
$response = $mj->get(Resources::$Contact, ['filters' => $filters]);
$response->success() && var_dump($response->getData());
?>
```

#### Use paging and sorting

```php
<?php
/*
Retrieve a specific contact ID :
*/
require 'vendor/autoload.php';
use \Mailjet\Resources;
$mj = new \Mailjet\Client(getenv('MJ_APIKEY_PUBLIC'), getenv('MJ_APIKEY_PRIVATE'));
$filters = [
    'Limit'=>40,  // default is 10, max is 1000
    'Offset'=>20,
    'Sort'=>'ArrivedAt DESC',
    'Contact'=>$contact->ID,
    'showSubject'=>true
];
$response = $mj->get(Resources::$Message, ['filters'=>$filters]);
$response->success() && var_dump($response->getData());
?>
```

#### Retrieve a single object

```php
<?php
/*
Retrieve a specific contact ID :
*/
require 'vendor/autoload.php';
use \Mailjet\Resources;
$mj = new \Mailjet\Client(getenv('MJ_APIKEY_PUBLIC'), getenv('MJ_APIKEY_PRIVATE'));
$response = $mj->get(Resources::$Contact, ['id' => $id]);
$response->success() && var_dump($response->getData());
?>
```

### PUT Request

Use the `put` method of the Mailjet CLient (i.e. `$mj->put($ressource, $params)`)

`$param` will be a PHP associative array with the following keys :

 - `id` : Unique ID of the element you want to modify
 - `body`: associative array representing the object property to update

A `PUT` request in the Mailjet API will work as a `PATCH` request - the update will affect only the specified properties. The other properties of an existing resource will neither be modified, nor deleted. It also means that all non-mandatory properties can be omitted from your payload.

Here's an example of a PUT request:

```php
<?php
/*
Update the contact properties for a contact:
*/
require 'vendor/autoload.php';
use \Mailjet\Resources;
$mj = new \Mailjet\Client(getenv('MJ_APIKEY_PUBLIC'), getenv('MJ_APIKEY_PRIVATE'));
$body = [
    'first_name' => "John",
    'last_name' => "Smith"
];
$response = $mj->put(Resources::$ContactData, ['id' => $id, 'body' => $body]);
$response->success() && var_dump($response->getData());
?>
```

### DELETE Request

Use the `delete` method of the Mailjet CLient (i.e. `$mj->delete($ressource, $params)`)

Upon a successful `DELETE` request the response will not include a response body, but only a `204 No Content` response code.

Here's an example of a `DELETE` request:

```php
<?php
/*
Delete an email template:
*/
require 'vendor/autoload.php';
use \Mailjet\Resources;
$mj = new \Mailjet\Client(getenv('MJ_APIKEY_PUBLIC'), getenv('MJ_APIKEY_PRIVATE'));
$response = $mj->delete(Resources::$Template, ['id' => $id]);
$response->success() && var_dump($response->getData());
?>
```

### Response

The `get`, `post`, `put` and `delete` method will return a `Response` object with the following available methods:

 - `success()` : returns a boolean indicating if the API call was successful
 - `getStatus()` : http status code (ie: 200,400 ...)
 - `getData()` : content of the property `data` of the JSON response payload if exist or the full JSON payload returned by the API call. This will be PHP associative array.   
 - `getCount()` : number of elements returned in the response
 - `getReasonPhrase()` : http response message phrases ("OK", "Bad Request" ...)

### API resources helpers

All API resources are listed in the `Resources` object. It will make it easy to find the resources and actions aliases.

```
$response = $mj->delete(Resources::$Template, ['id' => $id]);
$response = $mj->put(Resources::$ContactData, ['id' => $id, 'body' => $body]);
$response = $mj->post(Resources::$ContactManagecontactslists, ['id' => $id, 'body' => $body]);
```

## SMS API

### Token Authentication

Authentication for the SMS API endpoints is done using a bearer token. The bearer token is generated in the [SMS section](https://app.mailjet.com/sms) of your Mailjet account.

To create a new instance of the Mailjet client with token authentication, the token should be provided as the first parameter, and the second must be NULL:

```php
$mj = new \Mailjet\Client(getenv('MJ_APITOKEN'),
                          NULL, true,
                          ['url' => "api.mailjet.com", 'version' => 'v4', 'call' => false]
                        );
```

### Example Request

Here's an example SMS API request:

```php
//Send an SMS
$mj = new \Mailjet\Client(getenv('MJ_APITOKEN'),
                          NULL, true,
                          ['url' => "api.mailjet.com", 'version' => 'v4', 'call' => false]
                        );
$body = [
    'Text' => "Have a nice SMS flight with Mailjet !",
    'To' => "+336000000000",
    'From' => "MJ Pilot",
];
$response = $mj->post(Resources::$SmsSend, ['body' => $body]);
$response->success() && var_dump($response->getData());
```

## Contribute

Mailjet loves developers. You can be part of this project!

This wrapper is a great introduction to the open source world, check out the code!

Feel free to ask anything, and contribute:

- Fork the project.
- Create a new branch.
- Implement your feature or bug fix.
- Add documentation to it.
- Commit, push, open a pull request and voila.

If you have suggestions on how to improve the guides, please submit an issue in our [Official API Documentation repo](https://github.com/mailjet/api-documentation).
