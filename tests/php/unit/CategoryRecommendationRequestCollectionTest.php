<?php declare(strict_types=1);

namespace Relewise\Tests\Unit;

use PHPUnit\Framework\Attributes\DataProvider;
use PHPUnit\Framework\TestCase;
use Relewise\Models\ContentCategoryRecommendationRequestCollection;
use Relewise\Models\PopularContentCategoriesRecommendationRequest;
use Relewise\Models\PopularProductCategoriesRecommendationRequest;
use Relewise\Models\ProductCategoryRecommendationRequestCollection;

class CategoryRecommendationRequestCollectionTest extends TestCase
{
    public static function collections(): array
    {
        return [
            'product distinct' => [ProductCategoryRecommendationRequestCollection::class, PopularProductCategoriesRecommendationRequest::class, true],
            'product not distinct' => [ProductCategoryRecommendationRequestCollection::class, PopularProductCategoriesRecommendationRequest::class, false],
            'content distinct' => [ContentCategoryRecommendationRequestCollection::class, PopularContentCategoriesRecommendationRequest::class, true],
            'content not distinct' => [ContentCategoryRecommendationRequestCollection::class, PopularContentCategoriesRecommendationRequest::class, false],
        ];
    }

    #[DataProvider('collections')]
    public function testCreatePreservesRequestsInOrderAndDistinctFlag(string $collectionClass, string $requestClass, bool $distinct): void
    {
        $first = (new $requestClass())->setDisplayedAtLocationType('first');
        $second = (new $requestClass())->setDisplayedAtLocationType('second');

        $collection = $collectionClass::create($distinct, $first, $second);

        self::assertSame([$first, $second], $collection->requests);
        self::assertSame($distinct, $collection->requireDistinctCategoriesAcrossResults);
        $json = json_decode(json_encode($collection, JSON_THROW_ON_ERROR), true, 512, JSON_THROW_ON_ERROR);
        self::assertSame($distinct, $json['requireDistinctCategoriesAcrossResults']);
        self::assertSame(['first', 'second'], array_column($json['requests'], 'displayedAtLocationType'));
        self::assertSame([0, 1], array_keys($json['requests']));
    }

    #[DataProvider('collections')]
    public function testCreateInitializesEmptyRequests(string $collectionClass, string $requestClass, bool $distinct): void
    {
        $collection = $collectionClass::create($distinct);

        self::assertSame([], $collection->requests);
        self::assertSame($distinct, $collection->requireDistinctCategoriesAcrossResults);
        $json = json_decode(json_encode($collection, JSON_THROW_ON_ERROR), true, 512, JSON_THROW_ON_ERROR);
        self::assertSame([], $json['requests']);
        self::assertSame($distinct, $json['requireDistinctCategoriesAcrossResults']);
    }

    #[DataProvider('collections')]
    public function testCreateAcceptsHistoricalNamedBooleanArgument(string $collectionClass, string $requestClass, bool $distinct): void
    {
        // Preserve the original spelling because PHP callers can use parameter names.
        $collection = $collectionClass::create(requireDistinctCategoriesesAcrossResults: $distinct);

        self::assertSame($distinct, $collection->requireDistinctCategoriesAcrossResults);
        self::assertSame([], $collection->requests);
    }

    #[DataProvider('collections')]
    public function testContextValuesPreserveFactoryArguments(string $collectionClass, string $requestClass, bool $distinct): void
    {
        $request = (new $requestClass())->setDisplayedAtLocationType('first');
        $collection = $collectionClass::create($distinct, $request)
            ->setContextValuesFromAssociativeArray(['DeviceType' => 'Mobile'])
            ->addToContextValues('SplitTestVariant', 'A');

        $json = json_decode(json_encode($collection, JSON_THROW_ON_ERROR), true, 512, JSON_THROW_ON_ERROR);
        self::assertSame($distinct, $json['requireDistinctCategoriesAcrossResults']);
        self::assertSame(['first'], array_column($json['requests'], 'displayedAtLocationType'));
        self::assertSame(['DeviceType' => 'Mobile', 'SplitTestVariant' => 'A'], $json['contextValues']);
    }
}
