<?php declare(strict_types=1);

namespace Relewise;

/** Persist both the original token expiry and the UTC renewal boundary. */
final class OAuthTokenCacheEntry
{
    public function __construct(
        public readonly OAuthToken $token,
        public readonly float $renewAt
    ) {
    }
}
