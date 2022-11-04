<?php declare(strict_types=1);

namespace Relewise\Tests\Unit;

use PHPUnit\Framework\TestCase;
use Relewise\Factory\UserFactory;

/**
 * @internal
 *
 * @coversDefaultClass \Relewise\Factory\UserFactory
 */
class StackTest extends TestCase {

    public function testAnonymous(): void {
        
        $user = UserFactory.anonymous();

        this->assertNotNull($user);
    }
}