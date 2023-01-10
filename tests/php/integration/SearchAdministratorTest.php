<?php

namespace Relewise\Tests\Integration;

use Relewise\Models\ClearTextParser;
use Relewise\Models\DataIndexConfiguration;
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
use Relewise\SearchAdministrator;

class SearchAdministratorTest extends BaseTest
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
                                LanguageIndexConfigurationEntry::create(Language::create("da-dk"), true, "en"),
                                LanguageIndexConfigurationEntry::create(Language::create("en-gb"), true, "en")
                            )
                        )
                        ->setProduct(ProductIndexConfiguration::create()
                            ->setId(FieldIndexConfiguration::create(true, 1, PredictionSourceType::Disabled, ClearTextParser::create()))
                            ->setDisplayName(FieldIndexConfiguration::create(true, 9, PredictionSourceType::PartialWordSequences, ClearTextParser::create()))
                            ->setData(
                                DataIndexConfiguration::create()
                                    ->addToKeys("Tags", FieldIndexConfiguration::create(true, 8, PredictionSourceType::IndividualWords, ClearTextParser::create()))
                                    ->addToKeys("Description", FieldIndexConfiguration::create(true, 5, PredictionSourceType::PartialWordSequences, HtmlParser::create()))
                            )
                        )
                ),
            "PHP Integration test"
            );

        $response = $searchAdministrator->saveSearchIndex($request);

        self::assertNotNull($response);
    }
}
