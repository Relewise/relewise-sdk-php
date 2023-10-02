<?php

namespace Relewise\Tests\Integration;

use \PHPUnit\Framework\TestCase;
use Relewise\Factory\DataValueFactory;
use Relewise\Factory\UserFactory;
use Relewise\Infrastructure\HttpClient\RequestTimeoutException;
use Relewise\Models\BatchedTrackingRequest;
use Relewise\Models\Currency;
use Relewise\Models\Language;
use Relewise\Models\Product;
use Relewise\Models\ProductSearchRequest;
use Relewise\Models\ProductUpdate;
use Relewise\Models\ProductUpdateUpdateKind;
use Relewise\Models\ProductView;
use Relewise\Models\User;
use Relewise\Searcher;
use Relewise\Tracker;

class TimeoutTest extends BaseTestCase
{
    public function testTooLowTimeout(): void
    {
        $tracker = new Tracker($this->DATASET_ID(), $this->API_KEY(), 1);

        $data = array();
        for ($i = 1; $i < 10000; $i++) {
            $data[strval($i)] = DataValueFactory::string("test");
        }

        $trackables = array();
        for ($i = 0; $i < 20; $i++) {
            array_push(
                $trackables,
                ProductUpdate::create(
                    Product::create("p-many-" . $i)->setDataFromAssociativeArray($data),
                    array(),
                    ProductUpdateUpdateKind::ReplaceProvidedProperties
                )
            );
        }
        $batchedTracking = BatchedTrackingRequest::create()->setItemsFromArray($trackables);

        $threwTimeoutException = false;
        try {
            $tracker->batchedTracking($batchedTracking);
        }
        catch (RequestTimeoutException) {
            $threwTimeoutException = true;
        }

        self::assertTrue($threwTimeoutException);
    }
}
