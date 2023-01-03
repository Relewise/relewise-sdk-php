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
        self::assertEquals("test", $user->temporaryId);
    }

    public function testClassifications(): void 
    {
        $user = UserFactory::anonymous();
        $user->classifications = array("Country" => "DK");

        self::assertEquals("DK", $user->classifications["Country"]);
    }

    public function testIdentifier(): void
    {
        $user = UserFactory::byIdentifier("idKey", "idValue");

        self::assertNotEmpty($user->identifiers);
        self::assertEquals("idKey", array_keys($user->identifiers)[0]);
        self::assertEquals("idValue", $user->identifiers["idKey"]);
    }

    public function testIdentifiers(): void
    {
        $user = UserFactory::byIdentifiers(["idKey1" => "idValue1", "idKey2" => "idValue2"]);

        self::assertNotEmpty($user->identifiers);
        self::assertEquals("idKey1", array_keys($user->identifiers)[0]);
        self::assertEquals("idValue1", $user->identifiers["idKey1"]);
        self::assertEquals("idKey2", array_keys($user->identifiers)[1]);
        self::assertEquals("idValue2", $user->identifiers["idKey2"]);
    }

    public function testEmail(): void
    {
        $user = UserFactory::byEmail("test@relewise.com");

        self::assertEquals("test@relewise.com", $user->email);
    }

    public function testFingerprint(): void
    {
        $user = UserFactory::byFingerprint("this_is_a_unique_fingerprint_to_this_untracked_device");

        self::assertEquals("this_is_a_unique_fingerprint_to_this_untracked_device", $user->fingerprint);
    }
}
