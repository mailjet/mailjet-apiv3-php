#Mailjet PHP Wrapper for API v3

## Introduction
Provides a simple PHP library for the last version of the [MailJet API](http://dev.mailjet.com/).
The goal of this component is to simplify the usage of the MailJet API for PHP developers.
###Prerequisites
Make sure to have the following details:
* Mailjet API Key
* Mailjet API Secret Key
* PHP (We've built this library to work on 5.4)
* This library


## Installation
To install simply clone a copy of the main git repo by running:

```
git clone git@github.com:mailjet/mailjet-apiv3-php.git
```
or download the contents of this repo as a zip.

```
https://github.com/mailjet/mailjet-apiv3-php/archive/master.zip
```
and unzip it to your desired location.
Once that's done, fire up a terminal, move to the folder you've just created and run the following commands:

```
curl -s https://getcomposer.org/installer | php
php composer.phar install
```

## Usage
To use the Mailjet PHP library ensure you've installed it correctly then simply create a file in which you will write your code.
Create an empty file and name it ```mailjetapi.php```.

The first thing to do is to import the required namespaces and files:

     
    include_once __DIR__ . '/vendor/autoload.php';
    use Mailjet\Api as MailjetApi;
    use Mailjet\Model\Apitoken;
    

**Be Careful:** Make sure you've kept the directory structure intact or the include function will not be able to find the file which autoloads the wrapper's classes
Next, you will add your credentials:

    $APIKey = 'MY_API_KEY_VALUE';
    $secretKey = 'MY_API_SECRET_KEY_VALUE';

Obviously you need to replace the values within the quotes with your own, that you can find at the following URL [Mailjet API Keys](https://www.mailjet.com/account/api_keys) once you've registered and logged in Mailjet.

Now the fun beigins, create a new object which takes as arguments your credentials:

    $wrapper = new MailjetApi\Api($APIKey, $secretKey);

This basically, starts the engine. Now what you're going to do next depends on what you want to POST,DELETE,PUT or GET from the Mailjet servers throught the API.

## Examples
A function that creates a list of contacts ```$Lname```

     function createList($wrapper,$Lname) {
     $apicall = $wrapper->contactslist();
     $newList = new Contactslist();
     $newList->setName($Lname);
     $createList = $apicall->create($newList);
     echo "success - created list\n";
     return $createList->getID();
     }

A function that creates a Contact ```$buddy```

     function createContact($wrapper, $buddy) {
     $apicall = $wrapper->contact();
     $newContact = new Contact();
     $newContact->setEmail($buddy);
     $createContact = $apicall->create($newContact);
     echo "success - created contact\n";
     return $createContact->getID();
     }
     
A function that adds a given contact ID ```$buddyID``` to a given list ```$ListID```

    function addContactToList($wrapper,$ListID,$buddyID) {
    $apicall = $wrapper->Listrecipient();
    $newContactToList = new Listrecipient();
    $newContactToList->setListID($ListID);
    $newContactToList->setContactID($buddyID);
    $addContactToList = $apicall->create($newContactToList);
    echo "success - created contact to list\n";
    return $addContactToList;
    }


## Reporting issues
Open an issue on github or email one of the maintainer. That would be me ;) (orlando at mailjet dot com)
