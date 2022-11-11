<?php
namespace Relewise\Tests\Integration;

use \PHPUnit\Framework\TestCase;
use Relewise\Tests\DotEnv;
use Relewise\Tracker;

class TrackerTest extends TestCase
{
    public function testProductView(): void 
    {
        DotEnv::load();
        $datasetId = getenv('DATASET_ID') ?: $_ENV['DATASET_ID'];
        $apiKey = getenv('API_KEY') ?: $_ENV['API_KEY'];
        
        $tracker = new Tracker($datasetId, $apiKey);

        $response = $tracker->trackProductView("p-1");
        self::assertEquals(200, $response->code);
        self::assertEquals(null, $response->body);
    }
}