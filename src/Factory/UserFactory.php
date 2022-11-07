<?php

namespace Relewise\Factory;
use Relewise\Models\DTO\User;

class UserFactory {
    public static function anonymous() {
        return new User();
    }

    public static function byTemporaryId(string $temporary_id) {
        $user = new User();
        $user.$temporary_id = $temporary_id;
        return $user;
    }
}