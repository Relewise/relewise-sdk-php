<?php
namespace Relewise\Tests\Unit;

use InvalidArgumentException;
use \PHPUnit\Framework\TestCase;
use Relewise\Tracker;

class ClientConstructionTest extends TestCase {
    public function testApiKeyEmpty(): void 
    {
        $apiKey = "";

        $threwInvalidArgumentException = false;
        try {
            $tracker = new Tracker("00000000-0000-0000-0000-000000000001", $apiKey);
        }
        catch (InvalidArgumentException) {
            $threwInvalidArgumentException = true;
        }

        self::assertTrue($threwInvalidArgumentException);
    }

    public function testApiKeySpaceString(): void 
    {
        $apiKey = " ";

        $threwInvalidArgumentException = false;
        try {
            $tracker = new Tracker("00000000-0000-0000-0000-000000000001", $apiKey);
        }
        catch (InvalidArgumentException) {
            $threwInvalidArgumentException = true;
        }

        self::assertTrue($threwInvalidArgumentException);
    }

    public function testApiKeyValid(): void 
    {
        $apiKey = "a-valid-apikey-format";

        $threwInvalidArgumentException = false;
        try {
            $tracker = new Tracker("00000000-0000-0000-0000-000000000001", $apiKey);
        }
        catch (InvalidArgumentException) {
            $threwInvalidArgumentException = true;
        }

        self::assertFalse($threwInvalidArgumentException);
    }
}
