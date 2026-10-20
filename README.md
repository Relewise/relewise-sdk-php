# relewise-sdk-php
[![GitHub license](https://img.shields.io/badge/license-MIT-blue.svg)](./LICENSE)
[![Latest Stable Version](https://poser.pugx.org/relewise/client/v)](https://packagist.org/packages/relewise/client)
[![PHP Version Require](https://poser.pugx.org/relewise/client/require/php)](https://packagist.org/packages/relewise/client)
[![PRs Welcome](https://img.shields.io/badge/PRs-welcome-brightgreen.svg)](https://github.com/Relewise/relewise-sdk-php/pulls)

## Installation

Install via composer.

```
composer require relewise/client
```

## Usage

To see examples of how to use the package [checkout our PHP documentation](https://docs.relewise.com/docs/examples/php/)

### OAuth client credentials

For backend integrations, all five clients (`Searcher`, `Recommender`, `Tracker`,
`SearchAdministrator`, and `Analyzer`) support OAuth in addition to API keys:

```php
$searcher = \Relewise\Searcher::createWithOAuth(
    datasetId: $datasetId,
    clientId: $clientId,
    clientSecret: $clientSecret,
    serverUrl: $datasetServerUrl,
    timeout: 5
);
```

Use the OAuth credential's ID and secret from My Relewise; the client ID is separate
from the dataset ID. Keep credentials on the backend. The dataset server URL
must use HTTPS. Existing calls such as `new Searcher($datasetId, $apiKey)` keep
using API-key authentication.

Dataset and client IDs must be nonzero UUIDs. Reuse the client to cache tokens in
memory. Tokens renew on demand at
`expiresAt - min(10, floor(expires_in / 10))` seconds: at 290 seconds for a
300-second token, and at expiry for a five-second token. There is no background renewal.
An HTTP 401 with a Bearer `invalid_token` challenge triggers one renewal and one
retry; other failures are not automatically retried. The request URL and payload
are preserved during that retry.

To share the cache between client instances, pass the same provider:

```php
$provider = new \Relewise\OAuthTokenProvider($clientId, $clientSecret);
$searcher = new \Relewise\Searcher($datasetId, '', oauthTokenProvider: $provider);
$tracker = new \Relewise\Tracker($datasetId, '', oauthTokenProvider: $provider);
$searcher->serverUrl = $datasetServerUrl;
$tracker->serverUrl = $datasetServerUrl;
```

### Standalone token acquisition

A backend can acquire a token without sending an API request:

```php
$provider = new \Relewise\OAuthTokenProvider($clientId, $clientSecret);
$token = $provider->getToken(
    endpoint: rtrim($datasetServerUrl, '/') . '/' . $datasetId . '/oauth/token',
    client: new \Relewise\Infrastructure\HttpClient\DeadlineCurlClient(),
    timeout: 5
);
$accessToken = $token->accessToken;
$expiresAt = $token->expiresAt; // DateTimeImmutable, original expiry in UTC
```

Cached reads retain the original expiry. Keep the provider on the backend.
Only expose tokens with permissions appropriate for the browser, and ensure both
backend acquisition and browser requests satisfy the credential's IP restrictions.
Never expose the client secret to the browser.

### HTTP transports and timeouts

Pass `httpClient` to any client constructor or `createWithOAuth()`, or call
`setHttpClient($transport)`. The selected transport handles both acquisition and
API requests, with authorization supplied separately on each request.

```php
$searcher = \Relewise\Searcher::createWithOAuth(
    $datasetId, $clientId, $clientSecret, $datasetServerUrl,
    httpClient: $transport
);
```

Custom OAuth transports must implement
`Relewise\Infrastructure\HttpClient\DeadlineAwareClient`, which extends the existing
`Client` interface with:

```php
public function postWithDeadline(
    $url, $data, array $header,
    \Relewise\Infrastructure\HttpClient\Deadline $deadline,
    int $httpVersion = CURL_HTTP_VERSION_NONE
): \Relewise\Infrastructure\HttpClient\Response;
```

Use `$deadline->remainingMilliseconds()` immediately before blocking work and
`$deadline->throwIfExpired()` after it. Both throw `RequestTimeoutException` when
less than one millisecond remains. Carry that same deadline through preparation,
queueing, connections, redirects, and any internal retries. Do not reset the budget
or forward authorization to a different origin. Preserve your transport's redirect
policy; the SDK does not replace your chosen transport.

OAuth uses the final `DeadlineCurlClient` by default, which uses millisecond
transfer and connection timeouts and does not follow redirects. API-key clients
continue using `CurlClient` and its existing seconds-based `Client::post()` contract.
Existing `CurlClient` subclasses are not automatically opted into OAuth: they must
explicitly implement the deadline contract, including their existing custom behavior.
Unsupported OAuth transports are rejected before network activity.

Omitting `timeout` retains each client's existing default (120 seconds for
`Analyzer`, 30 for `SearchAdministrator`, and 5 for the other clients).
For OAuth, one timeout covers serialization, cache and lock waiting, token
acquisition, the API call, and any token replacement and retry. Standalone provider
acquisition creates its own budget. Generated batch methods retain a separate
budget for each chunk.

This is a cooperative timeout: the SDK checks for expiry around blocking work and
rejects late results, but synchronous PHP cannot interrupt arbitrary application
code. Enforcement also depends on the transport, resolver, and cache implementation.
A timeout cannot undo a remote write that has already completed. Network failures
and timeouts do not trigger OAuth retries.

### Sharing tokens across PHP web requests

By default, the cache belongs to the provider instance and is tied to the token
endpoint. It disappears when that instance is destroyed. Creating a provider on
every web request can therefore acquire a token on every page request. The server's
default issuance limit is 60 tokens per credential per minute, configurable on the
server.

For persistence, supply an application adapter implementing `Relewise\OAuthTokenCache`:

```php
// $tokenCache implements OAuthTokenCache using your application's cache and locks.
$provider = new \Relewise\OAuthTokenProvider($clientId, $clientSecret, $tokenCache);
// Or pass tokenCache: $tokenCache to createWithOAuth().
```

The contract has three operations:

- `synchronized($key, $deadline, $callback)` acquires an exclusive lock for that key,
  runs the callback once, returns its `OAuthToken`, and releases the lock in `finally`.
  Bound waiting by the deadline. Keep exclusivity through acquisition and storage;
  any lease must last or be renewed until the callback finishes.
- `get($key, $deadline)` returns an `OAuthTokenCacheEntry` or `null`.
- `set($key, $entry, $deadline)` stores the entry; a `null` entry removes it.

`get` and `set` run under the lock and must also honor the deadline. Store the
entry's access token, original `expiresAt`, and `renewAt` UTC Unix timestamp without
recalculating them when reading. Storage TTL may expire an entry at its renewal
boundary; it must not extend that boundary. Protect cached tokens as credentials.
Do not persist the process-local `Deadline`.

The SDK supplies an opaque hashed key bound to endpoint (including dataset) and
credential configuration, so rotating the secret changes the key without exposing
it. It re-reads shared storage under the lock before acquisition. A delayed
rejection of token A reuses a valid replacement B; failed acquisition leaves the
entry empty so a later caller can retry.

Plain cache reads/writes without atomic coordination are insufficient. The SDK
does not mandate a backend or ship a distributed-lock implementation. Cross-process
coordination depends on the supplied adapter and its lock scope. The default
in-memory provider is for synchronous use and does not promise concurrent Fiber or
async acquisition safety.

## Contributing

Pull requests are always welcome.  
Please fork this repository and make a PR when you are ready with your contribution.  

Otherwise you are welcome to open an Issue in our [issue tracker](https://github.com/Relewise/relewise-sdk-php/issues).

## License

relewise-sdk-php is licensed under the [MIT license](./LICENSE)

## Local Development

Check [DEVELOPMENT.md](./DEVELOPMENT.md) for details on running this project locally for development.
