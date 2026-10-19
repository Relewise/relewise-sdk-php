<?php declare(strict_types=1);

namespace Relewise;

/** An OAuth access token and its expiry, without the early-renewal margin. */
final class OAuthToken
{
    public function __construct(
        public readonly string $accessToken,
        public readonly \DateTimeImmutable $expiresAt
    ) {
    }
}
