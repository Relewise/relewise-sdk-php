<?php declare(strict_types=1);
namespace Relewise\Factory;
use Relewise\Models\DTO\User;

class UserFactory {
    public static function anonymous() {
        return User::create();
    }

    public static function byAuthenticatedId(string $authenticatedId, ?string $temporaryId) {
        $user = new User();
        $user->authenticatedId = $authenticatedId;
        if ($temporaryId != Null) {
            $user->temporaryId = $temporaryId;
        }
        return $user;
    }

    public static function byTemporaryId(string $temporaryId) {
        return User::create()
            ->withTemporaryId($temporaryId);
    }

    public static function byIdentifier(string $key, string $value) {
        return User::create()
            ->withIdentifiers(array($key => $value));
    }

    public static function byIdentifiers(array $identifiers) {
        return User::create()
            ->withIdentifiers($identifiers);
    }

    public static function byEmail(string $email) {
        return User::create()
            ->withEmail($email);
    }

    public static function byFingerprint(string $fingerprint) {
        return User::create()
            ->withFingerprint($fingerprint);
    }
}
