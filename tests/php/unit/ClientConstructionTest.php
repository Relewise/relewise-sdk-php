<?php
namespace Relewise\Tests\Unit;

use InvalidArgumentException;
use \PHPUnit\Framework\TestCase;
use Relewise\Tracker;

class ClientConstructionTest extends TestCase {
    public function testApiKeyEmpty(): void 
    {
        $this->expectException(InvalidArgumentException::class);

        new Tracker("00000000-0000-0000-0000-000000000001", "");
    }

    public function testApiKeySpaceString(): void 
    {
        $this->expectException(InvalidArgumentException::class);

        new Tracker("00000000-0000-0000-0000-000000000001", " ");
    }

    public function testApiKeyValid(): void 
    {
        $tracker = new Tracker("00000000-0000-0000-0000-000000000001", "a-valid-apikey-format");

        self::assertNotNull($tracker);
    }
}
