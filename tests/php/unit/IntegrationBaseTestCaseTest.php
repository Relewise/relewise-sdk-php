<?php

namespace Relewise\Tests\Unit;

require_once dirname(__DIR__) . '/integration/BaseTestCase.php';

use PHPUnit\Framework\TestCase;
use Relewise\Tests\Integration\BaseTestCase;

class IntegrationBaseTestCaseTest extends TestCase
{
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

            public function createFixtureId(string $name): string
            {
                return $this->fixtureId($name);
            }

        };
    }
}
