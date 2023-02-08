<?php

namespace Relewise\Tests\Integration;

use Relewise\Models\DataIndexConfiguration;
use Relewise\Models\DeleteSearchIndexRequest;
use Relewise\Models\FieldIndexConfiguration;
use Relewise\Models\HtmlParser;
use Relewise\Models\IndexConfiguration;
use Relewise\Models\Language;
use Relewise\Models\LanguageIndexConfiguration;
use Relewise\Models\LanguageIndexConfigurationEntry;
use Relewise\Models\PredictionSourceType;
use Relewise\Models\ProductIndexConfiguration;
use Relewise\Models\SaveSearchIndexRequest;
use Relewise\Models\SearchIndex;
use Relewise\Models\SearchIndexRequest;
use Relewise\SearchAdministrator;

class SearchAdministratorTest extends BaseTestCase
{
    public function testSaveSimpleSearchIndex(): void
    {
        $searchAdministrator = new SearchAdministrator($this->DATASET_ID(), $this->API_KEY());

        $request = SaveSearchIndexRequest::create(
            SearchIndex::create("simple", "a simple test index that is not default", false)
                ->setConfiguration(
                    IndexConfiguration::create()
                        ->setLanguage(LanguageIndexConfiguration::create()
                            ->setLanguages(
                                LanguageIndexConfigurationEntry::create(Language::create("da-dk"), true),
                                LanguageIndexConfigurationEntry::create(Language::create("en-gb"), true)
                            )
                        )
                        ->setProduct(ProductIndexConfiguration::create()
                            ->setId(FieldIndexConfiguration::create(true, 1, PredictionSourceType::Disabled))
                            ->setDisplayName(FieldIndexConfiguration::create(true, 9, PredictionSourceType::PartialWordSequences))
                            ->setData(
                                DataIndexConfiguration::create()
                                    ->addToKeys("Tags", FieldIndexConfiguration::create(true, 8, PredictionSourceType::IndividualWords))
                                    ->addToKeys("Description", FieldIndexConfiguration::create(true, 5, PredictionSourceType::PartialWordSequences)->setParser(HtmlParser::create()))
                            )
                        )
                ),
            "PHP Integration test"
            );

        $response = $searchAdministrator->saveSearchIndex($request);

        self::assertNotNull($response);
    }

    public function testSaveGetUpdateAndDeleteSearchIndex(): void
    {
        $searchAdministrator = new SearchAdministrator($this->DATASET_ID(), $this->API_KEY());

        // Create
        $saveRequest = SaveSearchIndexRequest::create(
            SearchIndex::create("to_be_deleted", "Some Description", false)
                ->setConfiguration(
                    IndexConfiguration::create()
                ),
            "PHP Integration test"
            );
        $saveResponse = $searchAdministrator->saveSearchIndex($saveRequest);
        self::assertNotNull($saveResponse);

        // Read
        $searchIndexRequest = SearchIndexRequest::create("to_be_deleted");
        $getResponse = $searchAdministrator->searchIndex($searchIndexRequest);
        self::assertNotNull($getResponse);
        self::assertEquals("Some Description", $getResponse->index->description);

        // Udpdate
        $updateRequest = SaveSearchIndexRequest::create(
            SearchIndex::create("to_be_deleted", "Another Description", false)
                ->setConfiguration(
                    IndexConfiguration::create()
                ),
            "PHP Integration test"
            );
        $updateResponse = $searchAdministrator->saveSearchIndex($updateRequest);
        self::assertNotNull($updateResponse);
        self::assertEquals("Another Description", $updateResponse->index->description);

        // Delete
        $searchIndexRequest = DeleteSearchIndexRequest::create("to_be_deleted", "PHP Integration test");
        $deleteResponse = $searchAdministrator->deleteSearchIndex($searchIndexRequest);
        self::assertNull($deleteResponse);
    }
}
