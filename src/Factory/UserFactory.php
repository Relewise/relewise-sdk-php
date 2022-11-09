<?php

namespace Relewise\Factory;
use Relewise\Models\DTO\User;

class UserFactory {
    public static function anonymous() {
        return new User();
    }

    public static function byTemporaryId(string $temporaryId) {
        $user = new User();
        $user::$temporary_id = $temporaryId;
        return $user;
    }
}