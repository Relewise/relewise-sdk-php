<?php declare(strict_types=1);
namespace Relewise\Factory;
use Relewise\Models\DTO\User;

class UserFactory {
    public static function anonymous() {
        return new User();
    }

    public static function byTemporaryId(string $temporaryId) {
        $user = new User();
        $user->temporaryId = $temporaryId;
        return $user;
    }
}
