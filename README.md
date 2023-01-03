# relewise-sdk-php

## Setup
### Prerequisites
To run the generator you need to have .NET 7 or newer installed on your machine. [Download .NET 7](https://dotnet.microsoft.com/en-us/download/dotnet/7.0)
### Generate PHP DTO's and clients
To generate the DTO's and clients of the SDK run `generate.ps1` if you're on Windows, else run `generate.sh`.

## Local development using VS Code

Requires dev containers in VS Code and docker.

Setup is created using https://blog.devsense.com/2022/develop-php-in-docker

### Known Bugs
#### Wrongly generated
- Category (is generated as a concrete class, but is actually abstract.)
- UpdateKind (This name is used by multiple Enums with different values so we have to include the name of the encapsulating class somehow.)
#### Not generated
- ContentCategoryIdFilterCategoryQuery (because we don't generate Generic abstract classes with 1 generic argument)
- DecompoundRuleSearchRulesResponse (because we don't generate Generic abstract classes with 1 generic argument)
- DecompoundRuleSaveSearchRulesRequest (because we don't generate Generic abstract classes with 1 generic argument)
- DecompoundRuleSaveSearchRulesResponse (because we don't generate Generic abstract classes with 1 generic argument)
- stringstringKeyValuePair (because we don't generate Generic abstract classes with 2 generic arguments)