<?php

namespace Relewise\Tests\Integration;

use \PHPUnit\Framework\TestCase;
use Relewise\Factory\DataValueFactory;
use Relewise\Factory\UserFactory;
use Relewise\Models\CategoryScope;
use Relewise\Models\ContainsCondition;
use Relewise\Models\Currency;
use Relewise\Models\ContainsConditionCollectionArgumentEvaluationMode;
use Relewise\Models\FilterCollection;
use Relewise\Models\Language;
use Relewise\Models\Money;
use Relewise\Models\Multilingual;
use Relewise\Models\MultilingualValue;
use Relewise\Models\PopularityTypes;
use Relewise\Models\PopularProductsRequest;
use Relewise\Models\ProductAndVariantId;
use Relewise\Models\ProductCategoryIdFilter;
use Relewise\Models\ProductDataFilter;
use Relewise\Models\ProductsViewedAfterViewingProductRequest;
use Relewise\Models\PurchasedWithProductRequest;
use Relewise\Models\ValueConditionCollection;
use Relewise\Recommender;

class ProductRecommendationsTest extends BaseTestCase
{
    public function testPurchasedWithProduct(): void
    {
        $recommender = $this->recommender();

        $purchasedWtihProduct = PurchasedWithProductRequest::create(
            Language::create("en-US"),
            Currency::create("USD"),
            "integration test",
            UserFactory::byTemporaryId("t-Id"),
            ProductAndVariantId::create("1")
        );

        $response = $recommender->purchasedWithProduct($purchasedWtihProduct);

        self::assertNotNull($response);
    }

    public function testPopularProductsWithFilter(): void
    {
        $recommender = $this->recommender();

        $purchasedWtihProduct = PopularProductsRequest::create(
            Language::create("en-US"),
            Currency::create("USD"),
            "integration test",
            UserFactory::byTemporaryId("t-Id"),
            PopularityTypes::MostPurchased
        )->setFilters(
            FilterCollection::create(
                ProductCategoryIdFilter::create(CategoryScope::Ancestor, negated: true)
                    ->setCategoryIds("c-1")
            )
        );

        $response = $recommender->popularProducts($purchasedWtihProduct);

        self::assertNotNull($response);
    }
    
    public function testProductsViewedAfterViewingProduct(): void
    {
        $recommender = $this->recommender();

        $productsViewedAfterViewingProduct = ProductsViewedAfterViewingProductRequest::create(
            Language::create("en-US"),
            Currency::create("USD"),
            "integration test",
            UserFactory::byTemporaryId("t-Id"),
            ProductAndVariantId::create("1")
        );

        $response = $recommender->productsViewedAfterViewingProduct($productsViewedAfterViewingProduct);

        self::assertNotNull($response);
    }

    public function testProductsViewedAfterViewingProductWithAllConditions(): void
    {
        $recommender = $this->recommender();

        $productsViewedAfterViewingProduct = ProductsViewedAfterViewingProductRequest::create(
            Language::create("en-US"),
            Currency::create("USD"),
            "integration test Conditions",
            UserFactory::anonymous(),
            ProductAndVariantId::create("1")
        )->setFilters(
            FilterCollection::create(
                ProductDataFilter::create("ShortDescription")
                    ->setConditions(
                        ValueConditionCollection::create()
                            ->setItems(
                                ContainsCondition::create()
                                    ->setValue(DataValueFactory::stringList("d"))
                                    ->setValueCollectionEvaluationMode(ContainsConditionCollectionArgumentEvaluationMode::Any),
                                ContainsCondition::create()
                                    ->setValue(DataValueFactory::booleanList(true))
                                    ->setValueCollectionEvaluationMode(ContainsConditionCollectionArgumentEvaluationMode::Any),
                                ContainsCondition::create()
                                    ->setValue(DataValueFactory::floatList(1))
                                    ->setValueCollectionEvaluationMode(ContainsConditionCollectionArgumentEvaluationMode::Any),
                                ContainsCondition::create()
                                    ->setValue(DataValueFactory::multilingual(Multilingual::create(MultilingualValue::create(Language::create("en-US"), "u"))))
                                    ->setValueCollectionEvaluationMode(ContainsConditionCollectionArgumentEvaluationMode::Any),
                                ContainsCondition::create()
                                    ->setValue(DataValueFactory::multilingualCollectionWithSingleLanguage(Language::create("en-US"), "d"))
                                    ->setValueCollectionEvaluationMode(ContainsConditionCollectionArgumentEvaluationMode::Any),
                                ContainsCondition::create()
                                    ->setValue(DataValueFactory::multiCurrencyFromMultipleMoney(Money::create(Currency::create("USD"), 1)))
                                    ->setValueCollectionEvaluationMode(ContainsConditionCollectionArgumentEvaluationMode::Any),
                            )
                    )
            )
        );

        $response = $recommender->productsViewedAfterViewingProduct($productsViewedAfterViewingProduct);

        self::assertNotNull($response);
    }
}
