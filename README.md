#Mailjet PHP Wrapper for API v3
|Work| In| Progress|
|----|---|---------|
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

    <?php 
    include_once __DIR__ . '/vendor/autoload.php';
    use Mailjet\Api as MailjetApi;
    use Mailjet\Model\Apitoken;
    ?>

**Be Careful:** Make sure you've kept the directory structure intact or the include function will not be able to find the file which autoloads the wrapper's classes
Next, you will add your credentials:

    $APIKey = 'MY_API_KEY_VALUE';
    $secretKey = 'MY_API_SECRET_KEY_VALUE';

Obviously you need to replace the values within the quotes with your own, that you can find at the following URL [Mailjet API Keys](https://www.mailjet.com/account/api_keys) once you've registered and logged in Mailjet.

## Examples
## Reporting issues
