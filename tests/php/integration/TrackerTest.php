<?php declare(strict_types=1);

namespace Relewise\Tests\Integration;

use \PHPUnit\Framework\TestCase;
use Relewise\Factory\UserFactory;
use Relewise\Tracker;

class TrackerTest extends TestCase
{
    public function testProductView(): void 
    {
        $datasetId = getenv('DATASET_ID') ?: $_ENV['DATASET_ID'];
        $apiKey = getenv('API_KEY') ?: $_ENV['API_KEY'];
        
        $tracker = new Tracker($datasetId, $apiKey);

        $response = $tracker->trackProductView(UserFactory::byTemporaryId("t-Id"), "p-1", "v-1");
        self::assertEquals(200, $response->code);
        self::assertEquals(null, $response->body);
    }
}
