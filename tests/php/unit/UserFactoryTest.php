<?php declare(strict_types=1);

namespace Relewise\Tests\Unit;

use Relewise\Factory\UserFactory;
use \PHPUnit\Framework\TestCase;

class StackTest extends TestCase {

    public function testAnonymous(): void {
        
        $user = UserFactory::anonymous();

        self::assertNotNull($user);
    }
}