<?php

use PHPUnit\Framework\TestCase;
use Relewise\Factory;

class UserFactoryTest extends TestCase {
    public function anonymous(): void {
        
        $user = UserFactory.anonymous();

        static::assertNotNull($user);

    }
}