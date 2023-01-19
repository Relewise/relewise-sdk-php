# Development

This document describes the process for running this application on your local computer.

## Getting started

This project uses .NET to automatically generate the models used in the PHP client.

To run the generator you need to have .NET 7 or newer installed on your machine. [Download .NET 7](https://dotnet.microsoft.com/en-us/download/dotnet/7.0)

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
