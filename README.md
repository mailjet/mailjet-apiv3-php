
[doc]: http://dev.mailjet.com/guides/?php#
[api_credential]: https://app.mailjet.com/account/api_keys
[mailjet]: http://www.mailjet.com

![alt text](http://cdn.appstorm.net/web.appstorm.net/files/2012/02/mailjet_logo_200x200.png "Mailjet")

[![Build Status](https://travis-ci.org/mailjet/mailjet-apiv3-php.svg?branch=master)](https://travis-ci.org/mailjet/mailjet-apiv3-php)

[Mailjet][mailjet] API Client.

Check out all the resources and all the PHP code examples on the official documentation: [Maijlet Documentation][doc]

## Requirements

`PHP >= 5.4`

## Getting Started !

[grab][api_credential] and save your Mailjet API credentials:

``` bash

export MJ_APIKEY_PUBLIC='your api key'
export MJ_APIKEY_PRIVATE='your api secret'

```

Initialize your Mailjet Client:

``` php
<?php

use \Mailjet\Resources;

$apikey = getenv('MJ_APIKEY_PUBLIC');
$apisecret = getenv('MJ_APIKEY_PRIVATE');

$client = new \Mailjet\Client($apikey, $apisecret);
?>
```
It's as easy as 1, 2, 3 !

## Make your first request

### Get your user informations:

``` php

$me = $client->get(Resources::$User);

```

### Read the result:

`$me->success()` will be false in case of error.

`$me->getData()` will contain the requested data, error message etc..

`$me->getCount()` will provide the number of element requested

`$me->getTotal()` will provide the total count of all results

### Debug

`$me->getStatus()` contains the server http response code

`$me->request->getUrl()` contains the call url

`$me->request->getFilters()` contains the provided filters

and `$me->request->getBody()` contains the request body

## Send Emails

``` php

<?php

$email = [
  'FromName' => 'Roger Smith',
  'FromEmail' => 'roger@smith.com',
  'Subject' => 'Hey!',
  'Text-Part' => 'Hello Humans!',
  'Html-Part' => '<p>Hello Humans</p>',
  'Recipients' => [
      ['Email' => 'stan@smith.com', 'Name' => 'Stan'],
      ['Email' => 'francine@smith.com', 'Name' => 'Francine']
  ]
];

$client->post(Resources::$Email, ['body' => $email]);

?>

```

## Call a resource with an action

``` php

<?php

$client->get(Resources::$ContactGetcontactslists, ['id' => $contact_id]);

?>

```

## Copy/Paste Examples

### View a single contact
``` php

<?php

namespace example;
use \Mailjet\Resources;

require 'vendor/autoload.php';

$apikey = getenv('MJ_APIKEY_PUBLIC');
$apisecret = getenv('MJ_APIKEY_PRIVATE');

$mj = new \Mailjet\Client($apikey, $apisecret);

$response = $mj->get(Resources::$Contact, ['id' => $contact_id]));

if ($response->success())
{
  $contact = $response->getData();
  // ...
}

?>
```

## Send a pull request

 - Fork the project.
 - Create a topic branch.
 - Implement your feature or bug fix.
 - Add documentation for your feature or bug fix.
 - Add specs for your feature or bug fix.
 - Commit and push your changes.
 - Submit a pull request. Please do not include changes to the gemspec, or version file.
