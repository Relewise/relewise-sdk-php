<?php

namespace Relewise\Tests\Integration;

use Relewise\Infrastructure\HttpClient\BadRequestException;
use Relewise\Models\ClearTextParser;
use Relewise\Models\DataIndexConfiguration;
use Relewise\Models\DeleteSearchIndexRequest;
use Relewise\Models\FieldIndexConfiguration;
use Relewise\Models\HtmlParser;
use Relewise\Models\IndexConfiguration;
use Relewise\Models\Language;
use Relewise\Models\LanguageIndexConfiguration;
use Relewise\Models\LanguageIndexConfigurationEntry;
use Relewise\Models\PredictionConfiguration;
use Relewise\Models\PredictionSourceType;
use Relewise\Models\ProductIndexConfiguration;
use Relewise\Models\SaveSearchIndexRequest;
use Relewise\Models\SearchIndex;
use Relewise\Models\SearchIndexRequest;
use Relewise\Models\SearchIndexResponse;
use Relewise\SearchAdministrator;

class SearchAdministratorTest extends BaseTestCase
{
    public function testSaveSimpleSearchIndex(): void
    {
        $searchAdministrator = $this->searchAdministrator();
        $indexId = $this->fixtureId('search-administrator-simple-index');
        $created = false;

        $request = SaveSearchIndexRequest::create(
            SearchIndex::create($indexId, "a simple test index that is not default", false)
                ->setConfiguration(
                    IndexConfiguration::create()
                        ->setLanguage(LanguageIndexConfiguration::create()
                            ->setLanguages(
                                LanguageIndexConfigurationEntry::create(Language::create("da-dk"), true),
                                LanguageIndexConfigurationEntry::create(Language::create("en-gb"), true)
                            )
                        )
                        ->setProduct(ProductIndexConfiguration::create()
                            ->setId(
                                FieldIndexConfiguration::create(true, 1, PredictionSourceType::CompleteWordSequence, ClearTextParser::create())
                                    ->setPredictionConfiguration(PredictionConfiguration::create()->setIncludeInPredictions(true))
                            )
                            ->setDisplayName(
                                FieldIndexConfiguration::create(true, 9, PredictionSourceType::CompleteWordSequence, ClearTextParser::create())
                                    ->setPredictionConfiguration(PredictionConfiguration::create()->setIncludeInPredictions(true))
                            )
                            ->setData(
                                DataIndexConfiguration::create()
                                    ->addToKeys(
                                        "Tags",
                                        FieldIndexConfiguration::create(true, 8, PredictionSourceType::CompleteWordSequence, ClearTextParser::create())
                                            ->setPredictionConfiguration(PredictionConfiguration::create()->setIncludeInPredictions(true))
                                    )
                                    ->addToKeys(
                                        "Description",
                                        FieldIndexConfiguration::create(true, 5, PredictionSourceType::CompleteWordSequence, HtmlParser::create())
                                            ->setPredictionConfiguration(PredictionConfiguration::create()->setIncludeInPredictions(true))
                                    )
                            )
                        )
                ),
            "PHP Integration test"
            );

        try {
            $response = $this->saveSearchIndexOrSkip($searchAdministrator, $request);
            $created = $response !== null;

            self::assertNotNull($response);
        } finally {
            if ($created) {
                $this->deleteSearchIndex($searchAdministrator, $indexId);
            }
        }
    }

    public function testSaveGetUpdateAndDeleteSearchIndex(): void
    {
        $searchAdministrator = $this->searchAdministrator();
        $indexId = $this->fixtureId('search-administrator-lifecycle-index');
        $created = false;

        // Create
        $saveRequest = SaveSearchIndexRequest::create(
            SearchIndex::create($indexId, "Some Description", false)
                ->setConfiguration(
                    IndexConfiguration::create()
                ),
            "PHP Integration test"
            );
        try {
            $saveResponse = $this->saveSearchIndexOrSkip($searchAdministrator, $saveRequest);
            $created = $saveResponse !== null;
            self::assertNotNull($saveResponse);

            // Read
            $searchIndexRequest = SearchIndexRequest::create($indexId);
            $getResponse = $searchAdministrator->searchIndex($searchIndexRequest);
            self::assertNotNull($getResponse);

            // Update
            $updateRequest = SaveSearchIndexRequest::create(
                SearchIndex::create($indexId, "Another Description", false)
                    ->setConfiguration(
                        IndexConfiguration::create()
                    ),
                "PHP Integration test"
                );
            $updateResponse = $searchAdministrator->saveSearchIndex($updateRequest);
            self::assertNotNull($updateResponse);
        } finally {
            if ($created) {
                $this->deleteSearchIndex($searchAdministrator, $indexId);
            }
        }
    }

    private function deleteSearchIndex(SearchAdministrator $searchAdministrator, string $indexId): void
    {
        $deleteRequest = DeleteSearchIndexRequest::create($indexId, "PHP Integration test");
        $deleteResponse = $searchAdministrator->deleteSearchIndex($deleteRequest);

        self::assertNull($deleteResponse);
    }

    private function saveSearchIndexOrSkip(
        SearchAdministrator $searchAdministrator,
        SaveSearchIndexRequest $request
    ): ?SearchIndexResponse {
        try {
            return $searchAdministrator->saveSearchIndex($request);
        } catch (BadRequestException $exception) {
            if (str_contains($exception->getMessage(), 'maximum number of indexes available for this dataset')) {
                self::markTestSkipped('The dataset does not have capacity for an additional search index.');
            }

            throw $exception;
        }
    }
}
