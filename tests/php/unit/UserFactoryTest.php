<?php
namespace Relewise\Tests\Unit;

use Relewise\Factory\UserFactory;
use \PHPUnit\Framework\TestCase;

class UserFactoryTest extends TestCase {

    public function testAnonymous(): void 
    {
        $user = UserFactory::anonymous();

        self::assertNotNull($user);
    }

    public function testByTemporaryId(): void 
    {
        $user = UserFactory::byTemporaryId("test");

        self::assertNotNull($user);
        self::assertEquals("test", $user->TemporaryId);
    }

    public function testClassifications(): void 
    {
        $user = UserFactory::anonymous();
        $user->Classifications = array("Country" => "DK");

        self::assertEquals("DK", $user->Classifications["Country"]);
    }
}
