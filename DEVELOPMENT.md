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
bash .github/test_restore_generator.sh
```

The restore helper targets Ubuntu CI and uses Bash, GNU timeout, and Python 3.
Each restore attempt is limited to 120 seconds, with up to five additional seconds
for forced termination. Offline regression tests run in a separate CI workflow.
