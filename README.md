[doc]: http://dev.mailjet.com/guides/?php#
[ref]: http://dev.mailjet.com/reference/
[api_credential]: https://app.mailjet.com/account/api_keys
[mailjet]: http://www.mailjet.com
[smsDashboard]:https://app.mailjet.com/sms

![alt text](https://www.mailjet.com/images/email/transac/logo_header.png "Mailjet")


# Official Mailjet PHP Wrapper

## Overview

This repository contains the official PHP wrapper for the Mailjet API.

Check out all the resources and PHP code examples in the [Offical Documentation](https://dev.mailjet.com/guides/?php#getting-started). If you have suggestions on how to improve the guides, please submit an issue in our [Official API Documentation repo](https://github.com/mailjet/api-documentation).

## Table of contents

- [Compatibility](#compatibility)
- [Installation](#installation)
- [Authentication](#authentication)
- [Make your first call](#make-your-first-call)
- [Client / Call configuration specifics](#client--call-configuration-specifics)
  - [API versioning](#api-versioning)
  - [Base URL](#base-url)
  - [Disable API call](#disable-api-call)
  - [Disable HTTPS](#disable-https)
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
- [Use HTTP proxy](#use-http-proxy)
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
$apisecret = 'your API secrret';

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

You have the option to modify the way you will construct the client or your calls. To do that, you should add an array of parameters. If a parameter is not mentioned in the array, it will use its default value.

For the options to take effect, you need to add a `true` value before the array.

### API Versioning

The Mailjet API is spread among three distinct versions:

- `v3` - The Email API
- `v3.1` - Email Send API v3.1, which is the latest version of our Send API
- `v4` - SMS API

Since most Email API endpoints are located under `v3`, it is set as the default one and does not need to be specified when making your request. For the others you need to specify the version using `version`. For example, if using Send API `v3.1`:

```php
$mj = new \Mailjet\Client(getenv('MJ_APIKEY_PUBLIC'), getenv('MJ_APIKEY_PRIVATE'),true,['version' => 'v3.1']);
```

For additional information refer to our [API Reference](https://dev.preprod.mailjet.com/reference/overview/versioning/).

### Base URL

The default base domain name for the Mailjet API is api.mailjet.com. You can modify this base URL by setting a value for `url` in your call:

```php
$mj = new \Mailjet\Client(getenv('MJ_APIKEY_PUBLIC'),
                          getenv('MJ_APIKEY_PRIVATE'), true,
                          ['url' => "api.mailjet.com"]
                        );
```

If your account has been moved to Mailjet's US architecture, the URL value you need to set is `api.us.mailjet.com`

### Disable API call

By default the API call parameter is always enabled. However, you may want to disable it during testing to prevent unnecessary calls to the Mailjet API. This is done by setting the `call` parameter to `false`:

```php
$mj = new \Mailjet\Client(getenv('MJ_APIKEY_PUBLIC'), getenv('MJ_APIKEY_PRIVATE'),true,['call' => 'false']);
```

### Disable HTTPS

By default all HTTP requests will be set as secure ones (HTTPS). We don't recommend disabling this option, but if you need to do so, set a `false` falue to the `https` parameter:

```php
$mj = new \Mailjet\Client(getenv('MJ_APIKEY_PUBLIC'), getenv('MJ_APIKEY_PRIVATE'),true,['https' => 'false']);
```

## Request Examples

### POST Request

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
$response = $mj->delete(Resources::$Template, ['id' => $id);
$response->success() && var_dump($response->getData());
?>
```

## Use HTTP Proxy

[option seems to be missing from PHP wrapper]

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
$response = $mj->post(Resources::$Contact, ['body' => $body]);
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
