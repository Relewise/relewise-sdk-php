<?php

use PHPUnit\Framework\TestCase;
use Relewise\Factory\UserFactory;

final class StackTest extends TestCase {

    public function testAnonymous(): void {
        
        $user = UserFactory.anonymous();

        this->assertNotNull($user);
    }
}