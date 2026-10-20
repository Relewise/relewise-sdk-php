# Development

This document describes the process for running this application on your local computer.

## Getting started

This project uses .NET to automatically generate the models used in the PHP client.

To run the generator you need to have .NET 10 or newer installed on your machine. [Download .NET 10](https://dotnet.microsoft.com/en-us/download/dotnet/10.0)

Then to generate the models and clients of the SDK run `generate.ps1` if you're on Windows, else run `generate.sh`.

## Local Development using VS Code

Requires dev containers in VS Code and Docker.

Setup is created using https://blog.devsense.com/2022/develop-php-in-docker

## Using local server for development

You can change the server url that the client uses for each of the clients by setting the property `serverUrl`.

If you run it in the dev container and wish to access a local port then replace `localhost` with `host.docker.internal` in the server url and remember to use `http` instead of `https`.

## Running tests

The tests needs a `DATASET_ID` and a `API_KEY` which it loads from the environment.

You can add these easily by creating a file called `.env` in the `/tests` folder.

Once you have these setup you can run the tests directly from within the UI of VS Code in the dev container.

### Live OAuth integration tests

Use a non-production dataset and a dedicated OAuth credential. Add these values to
the Git-ignored `tests/.env`, without surrounding quotes:

```text
DATASET_ID=<dataset UUID>
SERVER_URL=<HTTPS dataset server base URL>
OAUTH_CLIENT_ID=<OAuth credential UUID>
OAUTH_CLIENT_SECRET=<OAuth credential secret>
TEST_LANGUAGE=en-US
```

The OAuth tests require permissions for product search, product updates, product
view tracking, and product deletion. They create a random `php-sdk-oauth-*` product
and delete it in cleanup; tracking events remain. They also send one deliberately
invalid Bearer token to verify recovery and one invalid client secret to verify
that acquisition failure prevents API traffic. Transport observations retain
status codes, durations, and payload hashes, never tokens or credentials.

The suite skips unless explicitly enabled:

```powershell
$env:RUN_OAUTH_INTEGRATION = '1'
php vendor/bin/phpunit --configuration tests/phpunit.xml --testsuite OAuth
```

To run API-key regression coverage as well, configure `API_KEY` for the same test
dataset. Prepare the fixtures as CI does, then run the full suite:

```powershell
php tests/seed-integration-fixtures.php
php vendor/bin/phpunit --configuration tests/phpunit.xml
```

The existing integration suite and preparation step create and modify additional
`php-sdk-*` fixtures and tracking events, and some fixtures remain afterward.

These tests do not reload the engine, rotate credentials, or validate an
application's distributed-cache adapter. Those require separately arranged tests.

## Automated API version generation

The `Generate API Version` workflow requires `api-version` (a stable version such as
`1.320.0`) and `trello-card-url`. It waits up to 60 minutes for an exact NuGet
restore, with each restore attempt limited to 120 seconds and a 65-minute job
limit. The wait runs outside the shared integration dataset queue.

Generation restores the same exact version again on its own runner and verifies
`project.assets.json` before building. It runs the verified Release build without
another restore. The normal local generation scripts still use the latest package.

If readiness times out, inspect the failed run and NuGet publication status, then
use **Re-run failed jobs** to retry the same version and card. There is no automatic
retry after the deadline; a later release is not a substitute for recovering the
failed run. Deploy these workflow inputs before enabling the API caller change.

Offline readiness tests (no credentials or package downloads):

```sh
pwsh -NoProfile -File .github/test_restore_generator.ps1
```

The restore helper targets Ubuntu CI and uses PowerShell 7 and GNU timeout.
Each restore attempt is limited to 120 seconds, with up to five additional seconds
for forced termination. Offline regression tests run in a separate CI workflow.
