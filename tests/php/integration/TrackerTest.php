<?php
namespace Relewise\Tests\Integration;

use \PHPUnit\Framework\TestCase;
use Relewise\Factory\UserFactory;
use Relewise\Models\DTO\ProductVariant;
use Relewise\Tracker;
use Relewise\Models\DTO\Product;
use Relewise\Models\DTO\ProductView;
use Relewise\Models\DTO\TrackProductViewRequest;

class TrackerTest extends TestCase
{
    public function testProductView(): void 
    {
        $datasetId = getenv('DATASET_ID') ?: $_ENV['DATASET_ID'];
        $apiKey = getenv('API_KEY') ?: $_ENV['API_KEY'];
        
        $tracker = new Tracker($datasetId, $apiKey);

        $productViewRequest = TrackProductViewRequest::create()
            ->withProductView(
                ProductView::create()
                    ->withUser(UserFactory::byTemporaryId("t-Id"))
                    ->withProduct(Product::create()->withId("p-1"))
                    ->withVariant(ProductVariant::create()->withId("v-1"))
            );

        $response = $tracker->TrackProductViewRequest($productViewRequest);
        self::assertEquals(200, $response->code);
        self::assertEquals(null, $response->body);
    }
}
