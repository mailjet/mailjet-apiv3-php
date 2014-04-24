ZendService\Api 
===============

This is a micro HTTP framework to consume generic API calls in PHP. This framework can be used to
create PHP libraries that consume specific HTTP API using simple configuration array (or files).
This project uses the `Zend\Http\Client` component of [Zend Framework 2](https://github.com/zendframework/zf2).

Release note
------------

This code is in *alpha* version, please don't use it in a production environment.


Installation
------------

You can install this component using [composer](http://getcomposer.org/) with following commands:

```ssh
curl -s https://getcomposer.org/installer | php
php composer.phar install
```

Usage
-----

The `ZendService\Api` component can be used to facilitate the consume of generic API using HTTP.
The micro HTTP framework is able to configure the header, method, body, and query string of a HTTP
request according to specific API parameters. This mapping is provided using a special PHP configuration
array.

You can specify the API parameters using the `setApi` method. This method accepts two parameters:
the name of the API and a closure (callback) that returns the configuration with a PHP array.

Let see an example, image you need to consume an authentication API call with a POST HTTP request using
a [JSON](http://www.json.org/) data format with the following parameters: username and password.
The HTTP request can be represented as follow:

    POST /v1/auth HTTP/1.1
    Host: localhost
    Connection: close
    Content-Type: application/json
    Content-Length: 57

    { 'auth' : { 'username' : 'admin', 'password' : 'test' }}

You need to configure the API call using the `setApi` method in this way (we use the `auth` name for this
API):

```php
use ZendService\Api\Api;

$api = new Api();
$api->setApi('auth', function ($params) {
    return array(
        'url' => 'http://localhost/v1/auth',
        'header' => array(
            'Content-Type' => 'application/json'
        ),
        'method' => 'POST',
        'body' => json_encode(array(
            'auth' => array(
                'username' => $params[0],
                'password' => $params[1]
            )
        )),
        'response' => array(
            'valid_codes' => array('200')
        )
    );
});
```
After that you can execute the API call using the function `auth` (this function is managed by the magic `__call`
function of PHP):

```php
$result = $api->auth('username', 'password');
if ($api->isSuccess()) {
    var_dump($result);
} else {
    printf("Error (%d): %s\n", $api->getStatusCode(), $api->getErrorMsg());
}
```

The mapping with the `auth` arguments and the API specification is managed using the array `$params`.
You have to use the numerical index of the `$params` to match the order of the arguments in the function.
Using the configuration array you can specify all the HTTP data for the API request (headers, body, uri, etc).
You can also specify the HTTP status code for the successful requests using the `valid_codes` parameter
in the `response` section. 

Using a configuration file
--------------------------

You can also use a configuration file for the API calls instead of using the `setApi` method. You need
to create a PHP file with the same name of the API call. This file contains the API configuration array.
For instance, for the previous example you have to create a `auth.php` file containing the following array:

```php
return array(
    'url' => 'http://localhost/v1/auth',
    'header' => array(
        'Content-Type' => 'application/json'
    ),
    'method' => 'POST',
    'body' => json_encode(array(
        'auth' => array(
            'username' => $params[0],
            'password' => $params[1]
        )
    )),
    'response' => array(
        'valid_codes' => array('200')
    )
);
```

You need to set the directory containing this configuration file using the `setApiPath` as follow:

```php
use ZendService\Api\Api;

$api = new Api();
$api->setApiPath('path/to/api/config');
$result = $api->auth('username', 'password');
if ($api->isSuccess()) {
    var_dump($result);
} else {
    printf("Error (%d): %s\n", $api->getStatusCode(), $api->getErrorMsg());
}
```

Set the base URL for the API calls
----------------------------------

If you need to call different API from the same base URL you can use the `setUri` function. This function
set the base URL and you can use relative URI for the specific API calls, for instance imagine you need
to consume an [OpenStack](https://www.openstack.org/) service with the URL http://identity.api.openstack.org,
we can set this address as base URL and use relative address for each API call.

```php
use ZendService\Api\Api;

$api = new Api();
$api->setUrl('http://identity.api.openstack.org');
$api->setApi('authentication', function ($params) {
    return array(
        'url' => '/v2.0/tokens',
        'header' => array(
            'Content-Type' => 'application/json'
        ),
        'method' => 'POST',
        'body' => json_encode(array(
            'auth' => array(
                'passwordCredentials' => array(
                    'username' => $params[0],
                    'password' => $params[1]
                )
            )
        )),
        'response' => array(
            'valid_codes' => array('200', '203')
        )
    );
});
$result = $api->authentication('username', 'password');
if ($api->isSuccess()) {
    printf("Authenticate!\n");
} else {
    printf("Error (%d): %s\n", $api->getStatusCode(), $api->getErrorMsg());
}
```

Note the use of the relative address in the `uri` parameter of the API configuration.


Query string in the API calls
-----------------------------

If you need to pass a query string for an API HTTP call you can use the `setQueryParams` method
of the `Api` class. For instance, imagine you need to pass the HTTP query string `?auth=strong` in
the previous example, you can use the following code:

```php
use ZendService\Api\Api;

$api = new Api();
$api->setQueryParams(array( 'auth' => 'strong' ));
$result = $api->authenticate('username', 'password');
if ($api->isSuccess()) {
    printf("OK!\n");
} else {
    printf("Error (%d): %s\n", $api->getStatusCode(), $api->getErrorMsg());
}
```

You can reset the query string calling the `setQueryParams()` function without a parameter.


Set the default HTTP headers
----------------------------

You can specify a default HTTP headers to be used for all the HTTP calls. For instance, if you need
to call a vendor API passing an authentication token using a special header field you can use this
feature to set a default headers to be used for all the next API calls.

To set a default headers you can use the `setHeaders` function, below is reported an example:

```php
use ZendService\Api\Api;

$api = new Api();
$api->setApiPath('path/to/api/config');
$api->setHeaders(array( 'X-Auth-Token' => 'token' ));
$result = $api->test('foo');
if ($api->isSuccess()) {
    var_dump($result);
} else {
    printf("Error (%d): %s\n", $api->getStatusCode(), $api->getErrorMsg());
}
```

The `test` API will execute a HTTP request using the headers specified in the `test.php` configuration
file plus the `X-Auth-Token` header. Basically, the headers specified in the configuration file are merged
with the default one specified using the `setHeaders` function. You can overwrite the default headers
using the same header key in the configuration file.
