# relewise-sdk-php

## Setup
### Prerequisites
To run the generator you need to have .NET 7 or newer installed on your machine. [Download .NET 7](https://dotnet.microsoft.com/en-us/download/dotnet/7.0)
### Generate PHP DTO's and clients
To generate the DTO's and clients of the SDK run `generate.ps1` if you're on Windows, else run `generate.sh`.

## Local development using VS Code

Requires dev containers in VS Code and docker.

Setup is created using https://blog.devsense.com/2022/develop-php-in-docker

## Known Bugs
- There are currently no known bugs.

## Things to improve.
- Currently for any nested Enum type we prepend the name of the enum with the name of its outer class so that there can't be any naming collisions. This could be better. We could check if there would actually be any collision and only do this if there would be but that would need an extra pass of all types before generating enums.
- We eventually want to use MessagePack as the serializer.