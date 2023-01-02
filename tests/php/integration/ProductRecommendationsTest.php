<?php

namespace Relewise\Tests\Integration;

use \PHPUnit\Framework\TestCase;
use Relewise\Factory\DataValueFactory;
use Relewise\Factory\UserFactory;
use Relewise\Models\DTO\ContainsCondition;
use Relewise\Models\DTO\Currency;
use Relewise\Models\DTO\CollectionArgumentEvaluationMode;
use Relewise\Models\DTO\FilterCollection;
use Relewise\Models\DTO\Language;
use Relewise\Models\DTO\Money;
use Relewise\Models\DTO\ProductAndVariantId;
use Relewise\Models\DTO\ProductDataFilter;
use Relewise\Models\DTO\ProductRecommendationRequestSettings;
use Relewise\Models\DTO\ProductsViewedAfterViewingProductRequest;
use Relewise\Models\DTO\PurchasedWithProductRequest;
use Relewise\Models\DTO\ValueConditionCollection;
use Relewise\Recommender;

class ProductRecommendationsTest extends TestCase
{
    public function testPurchasedWithProduct(): void
    {
        $datasetId = getenv('DATASET_ID') ?: $_ENV['DATASET_ID'];
        $apiKey = getenv('API_KEY') ?: $_ENV['API_KEY'];

        $recommender = new Recommender($datasetId, $apiKey);

        $purchasedWtihProduct = PurchasedWithProductRequest::create()
            ->withProductAndVariantId(ProductAndVariantId::create()->withProductId("1"))
            ->withLanguage(Language::create()->withValue("en-US"))
            ->withCurrency(Currency::create()->withValue("USD"))
            ->withDisplayedAtLocationType("integration test")
            ->withUser(UserFactory::byTemporaryId("t-Id"));

        $response = $recommender->purchasedWithProductRequest($purchasedWtihProduct);

        self::assertNotNull($response);
        self::assertNotEmpty($response->Recommendations);
    }

    public function testProductsViewedAfterViewingProduct(): void
    {
        $datasetId = getenv('DATASET_ID') ?: $_ENV['DATASET_ID'];
        $apiKey = getenv('API_KEY') ?: $_ENV['API_KEY'];

        $recommender = new Recommender($datasetId, $apiKey);

        $productsViewedAfterViewingProduct = ProductsViewedAfterViewingProductRequest::create()
            ->withProductAndVariantId(ProductAndVariantId::create()->withProductId("1"))
            ->withLanguage(Language::create()->withValue("en-US"))
            ->withCurrency(Currency::create()->withValue("USD"))
            ->withDisplayedAtLocationType("integration test")
            ->withUser(UserFactory::byTemporaryId("t-Id"));

        $response = $recommender->productsViewedAfterViewingProductRequest($productsViewedAfterViewingProduct);

        self::assertNotNull($response);
        self::assertNotEmpty($response->Recommendations);
    }

    public function testProductsViewedAfterViewingProductWithAllConditions(): void
    {
        $datasetId = getenv('DATASET_ID') ?: $_ENV['DATASET_ID'];
        $apiKey = getenv('API_KEY') ?: $_ENV['API_KEY'];

        $recommender = new Recommender($datasetId, $apiKey);

        $productsViewedAfterViewingProduct = ProductsViewedAfterViewingProductRequest::create()
            ->withProductAndVariantId(ProductAndVariantId::create()->withProductId("1"))
            ->withFilters(
                FilterCollection::create()
                    ->withItems(
                        ProductDataFilter::create()
                            ->withKey("ShortDescription")
                            // ->withFilterOutIfKeyIsNotFound(true)
                            // ->withMustMatchAllConditions(true)
                            ->withConditions(
                                ValueConditionCollection::create()
                                    ->withItems(
                                        ContainsCondition::create()
                                            ->withValue(DataValueFactory::stringListDataValue("d"))
                                            ->withValueCollectionEvaluationMode(CollectionArgumentEvaluationMode::Any),
                                        ContainsCondition::create()
                                            ->withValue(DataValueFactory::booleanListDataValue(true))
                                            ->withValueCollectionEvaluationMode(CollectionArgumentEvaluationMode::Any),
                                        ContainsCondition::create()
                                            ->withValue(DataValueFactory::doubleListDataValue(1))
                                            ->withValueCollectionEvaluationMode(CollectionArgumentEvaluationMode::Any),
                                        ContainsCondition::create()
                                            ->withValue(DataValueFactory::multilingualCollectionDataValueFromLanguageAndCollection(Language::create()->withValue("en-us"), "d"))
                                            ->withValueCollectionEvaluationMode(CollectionArgumentEvaluationMode::Any),
                                        ContainsCondition::create()
                                            ->withValue(DataValueFactory::multiCurrencyDataValueFromSingleCurrency(Money::create()->withCurrency(Currency::create()->withValue("USD"))->withAmount(1)))
                                            ->withValueCollectionEvaluationMode(CollectionArgumentEvaluationMode::Any),
                                    )
                            )
                    )
            )
            ->withLanguage(Language::create()->withValue("en-US"))
            ->withCurrency(Currency::create()->withValue("USD"))
            ->withDisplayedAtLocationType("integration test Conditions")
            ->withUser(UserFactory::anonymous());

        $response = $recommender->productsViewedAfterViewingProductRequest($productsViewedAfterViewingProduct);

        self::assertNotNull($response);
        self::assertEmpty($response->Recommendations);
    }
}
