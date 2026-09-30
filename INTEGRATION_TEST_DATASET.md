# PHP SDK integration dataset

The PHPUnit configuration runs unit and integration tests together. CI, API-version generation, and release publishing all run the integration tests against the dataset selected by `DATASET_ID` and `API_KEY`. The API-version workflow also sends a search request to warm the API before running tests.
Integration tests create their own tracked products and users and remove them in teardown. Use a dedicated SDK dataset so fixture IDs cannot collide with unrelated data.

Before switching to a dedicated dataset:

- Create a dataset with a usable `default` search index. The search-administrator test checks the missing-index response without changing the default index.
- Create an API key for that dataset that can search, request recommendations, track data, and administer search indexes. Keep the key in the repository's `INTEGRATIONTESTS_API_KEY` Actions secret.
- Ensure search requests work for `en-US`/`USD` and `da-dk`/`DKK`. Tests that require `RecentlyPurchasedFacet` currently skip if the feature is unavailable.
- Run the complete PHPUnit suite against the new dataset before switching the release workflow. Recommendation tests assert the SDK response contract; they do not require preloaded products or recommendation history.

The workflows use dataset `a5dab1ca-e6f3-43e7-93c5-69eea1bf8cfd` at `https://sandbox-api.relewise.com/`. Configure that dataset's API key as the repository's `INTEGRATIONTESTS_API_KEY` Actions secret before running them.
