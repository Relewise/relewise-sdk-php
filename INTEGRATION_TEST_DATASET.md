# PHP SDK integration dataset

The PHPUnit configuration runs unit and integration tests together. CI, API-version generation, and release publishing seed persistent fixtures before running tests against the dataset selected by `DATASET_ID` and `API_KEY`. The API-version workflow also sends a search request to warm the API before seeding.

Use a dedicated SDK dataset. The seed step updates `php-sdk-search-product` and `php-sdk-search-category` and tracks a view for `php-sdk-search-user` using the public API. It waits up to five minutes for the category and recently viewed searches to return the fixture. Normal tests use stable `php-sdk-` IDs and retain products, categories, brands, and users so indexing and behavior persist across runs. Only the delete test and the timeout test use disposable product IDs and scoped cleanup. The disable test re-enables its own product in a `finally` block.

For a local run, configure `DATASET_ID`, `API_KEY`, and optionally `SERVER_URL` in the environment or `tests/.env`, then run:

```sh
composer install
php tests/seed-integration-fixtures.php
vendor/bin/phpunit --configuration tests/phpunit.xml
```

The dataset needs a usable `default` search index and an API key that can search, request recommendations, track data, and administer search indexes. Search must work for `en-US`/`USD` and `da-dk`/`DKK`. Seeding does not rebuild indexes or refresh candidate caches through the UI. Highlight coverage checks request acceptance; it does not require an index configured for highlights. The unsupported RecentlyPurchasedFacet integration test has been removed, matching the JavaScript SDK.

The workflows use dataset `a5dab1ca-e6f3-43e7-93c5-69eea1bf8cfd` at `https://sandbox-api.relewise.com/`. Configure that dataset's API key as the repository's `INTEGRATION_TESTS_DATASET_API_KEY` Actions secret. The workflows serialize their runs against this dataset.
