# AGENTS.md

## Purpose
This file is the operating guide for contributors and coding agents working in `relewise-sdk-php`.

The repository is a PHP SDK with generated client/models and integration-heavy tests. Follow this guide to keep changes scoped, reproducible, and aligned with CI.

## Repository Map
- `src`: PHP SDK source (clients, infrastructure, models, factories).
- `tests`: PHPUnit bootstrap, env loader, and test suites (`php/integration`, `php/unit`).
- `Generator`: .NET generator project that writes SDK code into `src`.
- `.github/workflows`: CI, publish, and Trello automation workflows.
- `generate.ps1` / `generate.sh`: entry points for code generation.
- `composer.json`: package metadata and PHP/test dependencies.
- `DEVELOPMENT.md`: local development notes.

## Repository Skills
- `update-sdk`:
  - Location: `.agents/skills/update-sdk/SKILL.md`
  - Use when asked to regenerate generated SDK code from `Generator`.
  - This skill enforces Trello URL pre-requisite, clean-main preflight checks, timestamped chore branch creation, validation commands, and Trello-first PR descriptions.

## Core Working Conventions
- Run commands from repository root unless explicitly noted.
- Keep changes minimal and directly related to the task.
- Do not commit secrets (`DATASET_ID`, `API_KEY`, tokens).
- Treat generator output as generated code:
  - `src/Models` is generator-owned.
  - Client surfaces in `src` are also produced by generator workflows.
- Prefer updating `Generator` + running generation scripts over manual edits in generated files.

## Generation Workflow
Prerequisite: .NET 10 SDK or newer.

Use one of:

```powershell
./generate.ps1
```

```bash
./generate.sh
```

Both scripts run the .NET generator and write output to `src`.

## Runbook
Install dependencies:

```powershell
composer install
```

Generate SDK code:

```powershell
./generate.ps1
```

```bash
./generate.sh
```

Run all tests configured by CI:

```powershell
vendor/bin/phpunit --configuration tests/phpunit.xml --testsuite Unit
```

Run unit-only folder (optional fast loop):

```powershell
vendor/bin/phpunit tests/php/unit --configuration tests/phpunit.xml
```

## Testing and Credentials
- Many tests require `DATASET_ID` and `API_KEY`.
- CI injects those from secrets.
- Local runs can load them from `tests/.env` via `tests/Bootstrap_phpunit.php` and `tests/DotEnv.php`.
- If credentials are unavailable, report integration coverage as not run.

## Validation Policy (CI-Aligned, Pragmatic)
- Required for normal changes:
  - Run generation if change touches generator-owned code paths.
  - Run PHPUnit with `tests/phpunit.xml`.
- Required for behavior/API changes:
  - Run tests that exercise affected flows.
  - Include integration-oriented coverage when credentials are available.
- For workflow/tooling changes:
  - Validate relevant command paths still run locally.

## SDK Update Guidance
For generation-driven SDK refresh tasks, prefer using the `update-sdk` skill:

```text
$update-sdk
```

Use `update-sdk` when the goal is regenerating PHP SDK code and opening a branch/PR flow tied to a Trello card.

## PR Expectations
Each PR should include:
- Scope: what changed and why.
- Risk notes: behavioral areas potentially impacted.
- Validation: commands run and outcomes.
- Generation note: whether `generate.ps1` / `generate.sh` was run.

## Known Pitfalls
- Manual edits to generated code will drift from generator output.
- `tests/phpunit.xml` points at `tests/php`, so default suite includes both unit and integration folders.
- Tests depending on `DATASET_ID`/`API_KEY` fail fast when env is missing.
- Keep runtime assumptions aligned with `composer.json` (`php: ^8.1`).
