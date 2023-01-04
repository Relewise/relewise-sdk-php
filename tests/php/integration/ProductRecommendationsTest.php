<?php

namespace Relewise\Tests\Integration;

use \PHPUnit\Framework\TestCase;
use Relewise\Factory\DataValueFactory;
use Relewise\Factory\UserFactory;
use Relewise\Models\DTO\ContainsCondition;
use Relewise\Models\DTO\Currency;
use Relewise\Models\DTO\ContainsConditionCollectionArgumentEvaluationMode;
use Relewise\Models\DTO\FilterCollection;
use Relewise\Models\DTO\Language;
use Relewise\Models\DTO\Money;
use Relewise\Models\DTO\ProductAndVariantId;
use Relewise\Models\DTO\ProductDataFilter;
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
            ->withLanguage(Language::create("en-US"))
            ->withCurrency(Currency::create("USD"))
            ->withDisplayedAtLocationType("integration test")
            ->withUser(UserFactory::byTemporaryId("t-Id"));

        $response = $recommender->purchasedWithProduct($purchasedWtihProduct);

        self::assertNotNull($response);
        self::assertNotEmpty($response->recommendations);
    }

    public function testProductsViewedAfterViewingProduct(): void
    {
        $datasetId = getenv('DATASET_ID') ?: $_ENV['DATASET_ID'];
        $apiKey = getenv('API_KEY') ?: $_ENV['API_KEY'];

        $recommender = new Recommender($datasetId, $apiKey);

        $productsViewedAfterViewingProduct = ProductsViewedAfterViewingProductRequest::create()
            ->withProductAndVariantId(ProductAndVariantId::create()->withProductId("1"))
            ->withLanguage(Language::create("en-US"))
            ->withCurrency(Currency::create("USD"))
            ->withDisplayedAtLocationType("integration test")
            ->withUser(UserFactory::byTemporaryId("t-Id"));

        $response = $recommender->productsViewedAfterViewingProduct($productsViewedAfterViewingProduct);

        self::assertNotNull($response);
        self::assertNotEmpty($response->recommendations);
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
                            ->withConditions(
                                ValueConditionCollection::create()
                                    ->withItems(
                                        ContainsCondition::create()
                                            ->withValue(DataValueFactory::stringListDataValue("d"))
                                            ->withValueCollectionEvaluationMode(ContainsConditionCollectionArgumentEvaluationMode::Any),
                                        ContainsCondition::create()
                                            ->withValue(DataValueFactory::booleanListDataValue(true))
                                            ->withValueCollectionEvaluationMode(ContainsConditionCollectionArgumentEvaluationMode::Any),
                                        ContainsCondition::create()
                                            ->withValue(DataValueFactory::doubleListDataValue(1))
                                            ->withValueCollectionEvaluationMode(ContainsConditionCollectionArgumentEvaluationMode::Any),
                                        ContainsCondition::create()
                                            ->withValue(DataValueFactory::multilingualCollectionDataValueFromLanguageAndCollection(Language::create("en-US"), "d"))
                                            ->withValueCollectionEvaluationMode(ContainsConditionCollectionArgumentEvaluationMode::Any),
                                        ContainsCondition::create()
                                            ->withValue(DataValueFactory::multiCurrencyDataValueFromSingleCurrency(Money::create(Currency::create("USD"), 1)))
                                            ->withValueCollectionEvaluationMode(ContainsConditionCollectionArgumentEvaluationMode::Any),
                                    )
                            )
                    )
            )
            ->withLanguage(Language::create("en-US"))
            ->withCurrency(Currency::create("USD"))
            ->withDisplayedAtLocationType("integration test Conditions")
            ->withUser(UserFactory::anonymous());

        $response = $recommender->productsViewedAfterViewingProduct($productsViewedAfterViewingProduct);

        fwrite(STDOUT, json_encode($response));

        self::assertNotNull($response);
        self::assertEmpty($response->recommendations);
    }
}
