<?php

namespace Relewise\Tests\Integration;
use PHPUnit\Framework\TestCase;

class BaseTestCase extends TestCase
{
    public function testGetDatasetIdAndApiKey(): void
    {
        self::assertNotNull($this->DATASET_ID());
        self::assertNotNull($this->API_KEY());
    }

    public function DATASET_ID() : string
    {
        return getenv('DATASET_ID') ?: $_ENV['DATASET_ID'];
    }

    public function API_KEY() : string
    {
        return getenv('API_KEY') ?: $_ENV['API_KEY'];
    }
}