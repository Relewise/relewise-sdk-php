<?php

namespace Relewise\Tests\Integration;

use \PHPUnit\Framework\TestCase;
use Relewise\Factory\DataValueFactory;
use Relewise\Factory\UserFactory;
use Relewise\Models\CategoryScope;
use Relewise\Models\Currency;
use Relewise\Models\DataDoubleSelector;
use Relewise\Models\FilterCollection;
use Relewise\Models\Language;
use Relewise\Models\Multilingual;
use Relewise\Models\MultilingualValue;
use Relewise\Models\Product;
use Relewise\Models\ProductCategoryIdFilter;
use Relewise\Models\ProductCategorySearchRequest;
use Relewise\Models\ProductDataRelevanceModifier;
use Relewise\Models\ProductHighlightProps;
use Relewise\Models\ProductProductHighlightPropsHighlightSettingsLimits;
use Relewise\Models\ProductProductHighlightPropsHighlightSettingsResponseShape;
use Relewise\Models\ProductSearchRequest;
use Relewise\Models\ProductSearchSettings;
use Relewise\Models\ProductSearchSettingsHighlightSettings;
use Relewise\Models\ProductUpdate;
use Relewise\Models\RelevanceModifierCollection;
use Relewise\Models\TrackProductUpdateRequest;
use Relewise\Searcher;
use Relewise\Tracker;
use Relewise\Models\ProductProductHighlightPropsHighlightSettingsOffsetSettings;

class SearchTest extends BaseTestCase
{
    public function testProductSearchWithNoConditions(): void
    {
        $searcher = new Searcher($this->DATASET_ID(), $this->API_KEY());

        $productSearch = ProductSearchRequest::create(
            Language::create("en-US"),
            Currency::create("USD"),
            UserFactory::byTemporaryId("t-Id"),
            "integration test",
            "p-1",
            0,
            3
        )->setRelevanceModifiers(
            RelevanceModifierCollection::create(
                ProductDataRelevanceModifier::create(
                    "NoveltyBoostModifier",
                    array(),
                    DataDoubleSelector::create("NoveltyBoostModifier")
                )
            )
        );

        $response = $searcher->productSearch($productSearch);

        self::assertNotNull($response);
        self::assertGreaterThan(0, $response->hits);
        self::assertNotEmpty($response->results);
    }

    public function testProductCategorySearchWithNoConditions(): void
    {
        $searcher = new Searcher($this->DATASET_ID(), $this->API_KEY());

        $productCategorySearch = ProductCategorySearchRequest::create(
            Language::create("en-US"),
            Currency::create("USD"),
            UserFactory::byTemporaryId("t-Id"),
            "integration test",
            Null,
            0,
            3
        )->setRelevanceModifiers(
            RelevanceModifierCollection::create(
                ProductDataRelevanceModifier::create(
                    "NoveltyBoostModifier",
                    array(),
                    DataDoubleSelector::create("NoveltyBoostModifier")
                )
            )
        );

        $response = $searcher->productCategorySearch($productCategorySearch);

        self::assertNotNull($response);
        self::assertGreaterThan(0, $response->hits);
        self::assertNotEmpty($response->results);
    }

    public function testProductSearchWithCategoryFilter(): void
    {
        $searcher = new Searcher($this->DATASET_ID(), $this->API_KEY());

        $productSearch = ProductSearchRequest::create(
            Language::create("en-US"),
            Currency::create("USD"),
            UserFactory::byTemporaryId("t-Id"),
            "integration test",
            term: Null,
            skip: 0,
            take: 20
        )->setFilters(
            FilterCollection::create(
                ProductCategoryIdFilter::create(CategoryScope::Ancestor)
                    ->setCategoryIds("c-1")
            )
        );

        $response = $searcher->productSearch($productSearch);

        self::assertNotNull($response);
        self::assertGreaterThan(0, $response->hits);
        self::assertNotEmpty($response->results);
    }

    public function testProductSearchWithHighlight(): void
    {
        $tracker = new Tracker($this->DATASET_ID(), $this->API_KEY());

        $tracker->trackProductUpdate(TrackProductUpdateRequest::create(
            ProductUpdate::create(
                Product::create("p-1")
                    ->addToData("Description", DataValueFactory::multilingual(
                        Multilingual::create(MultilingualValue::create(Language::create("en-US"), "the last word is highlighted"))
                    )),
                array()
            )
        ));

        $searcher = new Searcher($this->DATASET_ID(), $this->API_KEY());

        $productSearch = ProductSearchRequest::create(
            Language::create("en-US"),
            Currency::create("USD"),
            UserFactory::anonymous(),
            "integration test",
            "highlighted",
            0,
            3
        )->setSettings(
            ProductSearchSettings::create()
                ->setHighlight(ProductSearchSettingsHighlightSettings::create()
                    ->setEnabled(true)
                    ->setLimit(ProductProductHighlightPropsHighlightSettingsLimits::create()
                        ->setMaxSnippetsPerField(1)
                        ->setMaxSnippetsPerEntry(1)
                        ->setMaxEntryLimit(1)
                    )
                    ->setHighlightable(ProductHighlightProps::create()
                        ->addToDataKeys("Description")
                    )
                    ->setShape(ProductProductHighlightPropsHighlightSettingsResponseShape::create()
                        ->setOffsets(ProductProductHighlightPropsHighlightSettingsOffsetSettings::create()
                            ->setInclude(true)     
                        )
                    )
                )
        );

        $response = $searcher->productSearch($productSearch);
        self::assertNotNull($response);
        self::assertGreaterThan(0, $response->hits);

        $productResult = $response->results[0];

        self::assertNotNull($productResult->highlight);
        self::assertNotNull($productResult->highlight->offsets);
        self::assertNotNull($productResult->highlight->offsets->data);
        self::assertGreaterThan(0, count($productResult->highlight->offsets->data));
        self::assertNotNull($productResult->highlight->offsets->data[0]);
        self::assertEquals("Description", $productResult->highlight->offsets->data[0]["key"]);
        self::assertNotNull($productResult->highlight->offsets->data[0]["value"]);
        self::assertNotNull($productResult->highlight->offsets->data[0]["value"][0]);
        self::assertEquals(17, $productResult->highlight->offsets->data[0]["value"][0]["lowerBoundInclusive"]);
        self::assertEquals(28, $productResult->highlight->offsets->data[0]["value"][0]["upperBoundInclusive"]);
    }
}

