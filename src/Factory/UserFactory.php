<?php declare(strict_types=1);
namespace Relewise\Factory;
use Relewise\Models\DTO\User;

class UserFactory {
    public static function anonymous() {
        return new User();
    }

    public static function byAuthenticatedId(string $authenticatedId, ?string $temporaryId = null) {
        $user = new User();
        $user->authenticatedId = $authenticatedId;
        if ($temporaryId != Null) {
            $user->temporaryId = $temporaryId;
        }
        return $user;
    }

    public static function byTemporaryId(string $temporaryId) {
        return (new User())
            ->setTemporaryId($temporaryId);
    }

    public static function byIdentifier(string $key, string $value) {
        return (new User())
            ->addIdentifiers($key, $value);
    }

    public static function byIdentifiers(array $identifiers) {
        $result = new User();
        $result->identifiers = $identifiers;
        return $result;
    }

    public static function byEmail(string $email) {
        return (new User())
            ->setEmail($email);
    }

    public static function byFingerprint(string $fingerprint) {
        return (new User())
            ->setFingerprint($fingerprint);
    }
}
