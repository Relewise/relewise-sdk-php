<?php


namespace Relewise\Tests\Integration;

use Relewise\Models\ProductPerformanceRequest;
use Relewise\Models\ProductPerformanceRequestOrderByOptions;
use Relewise\Tests\Integration\BaseTestCase;

class ProductPerformanceTest extends BaseTestCase
{
    public function testProductPerformanceRequest(): void
    {
        $analyzer = $this->analyzer();

        $request = ProductPerformanceRequest::create(
            language: null,
            currency: null,
            byVariant: false,
            numberOfResultsPerRequest: 10,
            skipNumberOfResults: 0
        )->setOrderBy(ProductPerformanceRequestOrderByOptions::RankBySales)
            ->setFromUnixTimeSeconds(time() - 60 * 60 * 24 * 30)
            ->setToUnixTimeSeconds(time());

        $response = $analyzer->productPerformance($request);

        self::assertNotNull($response);
        self::assertIsArray($response->results);
    }
}
