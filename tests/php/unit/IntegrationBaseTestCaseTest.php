<?php

namespace Relewise\Tests\Unit;

require_once dirname(__DIR__) . '/integration/BaseTestCase.php';

use PHPUnit\Framework\AssertionFailedError;
use PHPUnit\Framework\TestCase;
use Relewise\Tests\Integration\BaseTestCase;

class IntegrationBaseTestCaseTest extends TestCase
{
    public function testUniqueEntityIdsIncludeTheRunAndRemainUnique(): void
    {
        $originalRunId = getenv('GITHUB_RUN_ID');
        putenv('GITHUB_RUN_ID=Run 123');

        try {
            $testCase = $this->testCase();
            $first = $testCase->createUniqueEntityId('Highlight Test');
            $second = $testCase->createUniqueEntityId('Highlight Test');
        } finally {
            $originalRunId === false
                ? putenv('GITHUB_RUN_ID')
                : putenv('GITHUB_RUN_ID=' . $originalRunId);
        }

        self::assertMatchesRegularExpression('/^highlight-test-run-123-[a-f0-9]{12}$/', $first);
        self::assertNotSame($first, $second);
    }

    public function testFixtureIdsAreStableAndNamespaced(): void
    {
        $testCase = $this->testCase();

        self::assertSame(
            'php-sdk-integration-highlight-product-v1',
            $testCase->createFixtureId('Highlight Product')
        );
        self::assertSame(
            $testCase->createFixtureId('Highlight Product'),
            $testCase->createFixtureId('Highlight Product')
        );
    }

    public function testAssertEventuallyReturnsTheFirstMatchingObservation(): void
    {
        $attempts = 0;

        $result = $this->testCase()->eventually(
            function () use (&$attempts): int {
                return ++$attempts;
            },
            static fn (int $value): bool => $value >= 3,
            'the counter reaches three',
            100,
            1,
            2
        );

        self::assertSame(3, $result);
        self::assertSame(3, $attempts);
    }

    public function testAssertEventuallyReportsTheLastObservation(): void
    {
        $this->expectException(AssertionFailedError::class);
        $this->expectExceptionMessage('Condition "a product becomes searchable" was not met');
        $this->expectExceptionMessage('Last observation: {"hits":0}');

        $this->testCase()->eventually(
            static fn (): array => ['hits' => 0],
            static fn (array $value): bool => $value['hits'] === 1,
            'a product becomes searchable',
            2,
            1,
            1
        );
    }

    public function testConfiguredServerUrlIsAppliedToIntegrationClients(): void
    {
        $originalServerUrl = getenv('SERVER_URL');
        putenv('SERVER_URL=https://sandbox-api.relewise.com/');

        try {
            $searcher = $this->testCase()->createSearcher();
        } finally {
            $originalServerUrl === false
                ? putenv('SERVER_URL')
                : putenv('SERVER_URL=' . $originalServerUrl);
        }

        self::assertSame('https://sandbox-api.relewise.com', $searcher->serverUrl);
    }

    public function testIntegrationLanguageCanBeConfigured(): void
    {
        $originalLanguage = getenv('TEST_LANGUAGE');
        putenv('TEST_LANGUAGE=en-GB');

        try {
            $language = $this->testCase()->TEST_LANGUAGE();
        } finally {
            $originalLanguage === false
                ? putenv('TEST_LANGUAGE')
                : putenv('TEST_LANGUAGE=' . $originalLanguage);
        }

        self::assertSame('en-GB', $language);
    }

    private function testCase(): object
    {
        return new class('integration-helper') extends BaseTestCase {
            public function DATASET_ID(): string
            {
                return 'dataset-id';
            }

            public function API_KEY(): string
            {
                return 'api-key';
            }

            public function createSearcher(): \Relewise\Searcher
            {
                return $this->searcher();
            }

            public function createUniqueEntityId(string $prefix): string
            {
                return $this->uniqueEntityId($prefix);
            }

            public function createFixtureId(string $name): string
            {
                return $this->fixtureId($name);
            }

            public function eventually(
                callable $probe,
                callable $condition,
                string $description,
                int $timeoutMilliseconds,
                int $initialDelayMilliseconds,
                int $maxDelayMilliseconds
            ): mixed {
                return $this->assertEventually(
                    $probe,
                    $condition,
                    $description,
                    $timeoutMilliseconds,
                    $initialDelayMilliseconds,
                    $maxDelayMilliseconds
                );
            }
        };
    }
}
