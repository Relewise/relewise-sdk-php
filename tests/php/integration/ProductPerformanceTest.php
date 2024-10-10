<?php


namespace Relewise\Tests\Integration;

use Relewise\Analyzer;
use Relewise\Models\ProductPerformanceRequest;
use Relewise\Models\ProductPerformanceRequestOrderByOptions;
use Relewise\Models\stringstringKeyValuePair;
use Relewise\Models\ProductPerformanceResult;
use Relewise\Tests\Integration\BaseTestCase;

class ProductPerformanceTest extends BaseTestCase
{
    public function testProductPerformanceRequest(): void
    {
        $analyzer = new Analyzer($this->DATASET_ID(), $this->API_KEY());

        $request = ProductPerformanceRequest::create(
            language: null,
            currency: null,
            byVariant: false,
            numberOfResultsPerRequest: 10,
            skipNumberOfResults: 0
        )->setOrderBy(ProductPerformanceRequestOrderByOptions::RankBySales)
        ->setFromUnixTimeSeconds(time() - 60 * 60 * 24 * 30)
        ->setToUnixTimeSeconds(time())
        ->addToClassifications(stringstringKeyValuePair::create("Country", "DK"));

        $response = $analyzer->productPerformance($request);

        self::assertNotNull($response);
        /** @var ProductPerformanceResult $first */
        $first = $response->results[0];
        /** @var ProductPerformanceResult $second */
        $fifth = $response->results[4]; // This might be flaky. It is just to check that some element lower down has a smaller number of orders.

        self::assertTrue($first->classifications[0]->sales->orders > $fifth->classifications[0]->sales->orders);
    }
}