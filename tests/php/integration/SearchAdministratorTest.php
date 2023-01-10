<?php

namespace Relewise\Tests\Integration;

use Relewise\Models\DTO\ClearTextParser;
use Relewise\Models\DTO\DataIndexConfiguration;
use Relewise\Models\DTO\FieldIndexConfiguration;
use Relewise\Models\DTO\HtmlParser;
use Relewise\Models\DTO\IndexConfiguration;
use Relewise\Models\DTO\Language;
use Relewise\Models\DTO\LanguageIndexConfiguration;
use Relewise\Models\DTO\LanguageIndexConfigurationEntry;
use Relewise\Models\DTO\PredictionSourceType;
use Relewise\Models\DTO\ProductIndexConfiguration;
use Relewise\Models\DTO\SaveSearchIndexRequest;
use Relewise\Models\DTO\SearchIndex;
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
