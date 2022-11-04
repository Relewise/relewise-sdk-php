<?php declare(strict_types=1);

namespace Relewise\Tests\Unit;

use Relewise\Factory\UserFactory;

class StackTest extends \PHPUnit\Framework\TestCase {

    public function testAnonymous(): void {
        
        $user = UserFactory::anonymous();

        self::assertNotNull($user);
    }
}