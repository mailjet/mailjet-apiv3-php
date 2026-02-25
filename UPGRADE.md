# Upgrading from v1 to v2

## Main change: Bring Your Own HTTP Client

v2 removes the hard dependency on Guzzle. The library now works with **any** PSR-18 HTTP client through [php-http/discovery](https://github.com/php-http/discovery).

If you don't have a PSR-18 client in your project, Composer will auto-install a compatible default (typically Guzzle). If you already use Symfony HttpClient or another PSR-18 implementation, it will be detected automatically.

You can also inject your own HTTP client explicitly:

```php
$httpClient = new \GuzzleHttp\Client(['timeout' => 30]);
$mj = new \Mailjet\Client($apikey, $apisecret, true, [], $httpClient);
```

## Removed methods

The following methods on `\Mailjet\Client` have been removed. HTTP transport options are now configured on the injected PSR-18 client:

| v2 (removed)                              | v3 (replacement)                                                          |
|-------------------------------------------|---------------------------------------------------------------------------|
| `$mj->setTimeout(30)`                     | `new \GuzzleHttp\Client(['timeout' => 30])`                              |
| `$mj->setConnectionTimeout(5)`            | `new \GuzzleHttp\Client(['connect_timeout' => 5])`                       |
| `$mj->setHttpProxy(['http' => '...'])`    | `new \GuzzleHttp\Client(['proxy' => ['http' => '...']])`                 |
| `$mj->addRequestOption('key', 'value')`   | Configure on the injected HTTP client                                     |
| `$mj->getTimeout()`                       | Removed — query your HTTP client directly                                 |
| `$mj->getConnectionTimeout()`             | Removed — query your HTTP client directly                                 |
| `$mj->getRequestOptions()`                | Removed — query your HTTP client directly                                 |

### Removed constants

`Client::TIMEOUT`, `Client::CONNECT_TIMEOUT`, `Client::PROXY` have been removed.

## Removed methods on `\Mailjet\Request`

The following proxy methods have been removed:

- `send()`, `sendRequest()`, `sendAsync()`, `request()`, `requestAsync()`

These were Guzzle-specific and not part of the public API contract.

## Changed exception types

v2 threw Guzzle-specific exceptions on HTTP errors:

```php
// v2
try {
    $response = $mj->get(Resources::$Contact);
} catch (\GuzzleHttp\Exception\ClientException $e) {
    // 4xx
} catch (\GuzzleHttp\Exception\ServerException $e) {
    // 5xx
}
```

v2 uses PSR-18 semantics: **4xx/5xx responses are returned normally** (no exception). Exceptions are only thrown for network-level failures:

```php
// v3
try {
    $response = $mj->get(Resources::$Contact);
} catch (\Psr\Http\Client\ClientExceptionInterface $e) {
    // Network error (timeout, DNS failure, etc.)
}

// Check HTTP status via the response object
if (!$response->success()) {
    echo $response->getStatus();        // e.g. 401
    echo $response->getReasonPhrase();  // e.g. "Unauthorized"
}
```

## IPv6 / SSL connectivity issues

v2 forced IPv4 by default via `force_ip_resolve`. In v2, configure this on the HTTP client:

```php
$httpClient = new \GuzzleHttp\Client(['force_ip_resolve' => 'v4']);
$mj = new \Mailjet\Client($apikey, $apisecret, true, [], $httpClient);
```

## Minimum requirements

- PHP 8.1+
- A PSR-18 HTTP client (`psr/http-client-implementation`)
- A PSR-17 HTTP factory (`psr/http-factory-implementation`)
