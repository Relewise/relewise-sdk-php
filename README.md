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

Use the OAuth API key's ID and secret from My Relewise; the client ID is separate
from the dataset ID. Keep credentials on the backend. The dataset server URL
must use HTTPS. Existing calls such as `new Searcher($datasetId, $apiKey)` keep
using API-key authentication.

Reuse the client to cache tokens in memory. Tokens renew shortly before expiry.
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

The cache belongs to the provider instance and is tied to the token endpoint.
It does not persist across PHP requests or worker processes, and does not provide
cross-process locking. This synchronous SDK does not coordinate concurrent token
acquisition through custom asynchronous transports.

Omitting `timeout` retains each client's existing default (120 seconds for
`Analyzer`, 30 for `SearchAdministrator`, and 5 for the other clients).
As with existing PHP SDK requests, `timeout` applies to each HTTP exchange.
A cold-cache request that receives an invalid-token challenge can make four
exchanges: token acquisition, API call, token renewal, and API retry. This differs
from the .NET client's total-operation timeout.

## Contributing

Pull requests are always welcome.  
Please fork this repository and make a PR when you are ready with your contribution.  

Otherwise you are welcome to open an Issue in our [issue tracker](https://github.com/Relewise/relewise-sdk-php/issues).

## License

relewise-sdk-php is licensed under the [MIT license](./LICENSE)

## Local Development

Check [DEVELOPMENT.md](./DEVELOPMENT.md) for details on running this project locally for development.
