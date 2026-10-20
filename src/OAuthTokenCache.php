<?php declare(strict_types=1);

namespace Relewise;

use Relewise\Infrastructure\HttpClient\Deadline;

/** Application-supplied storage and coordination for tokens shared across PHP requests. */
interface OAuthTokenCache
{
    /**
     * Execute the callback once under an exclusive lock for this key and return its result.
     * Bound lock waiting by the deadline; always release the lock, including on exceptions.
     * Exclusivity must last through acquisition and storage, including any lock lease renewal.
     * Unrelated keys must not share a lock.
     * @param callable(): OAuthToken $callback
     */
    public function synchronized(string $key, Deadline $deadline, callable $callback): OAuthToken;

    /** Called under the key's lock. Bound all storage operations by the same deadline. */
    public function get(string $key, Deadline $deadline): ?OAuthTokenCacheEntry;

    /** Called under the key's lock. A null entry removes any previously cached token. */
    public function set(string $key, ?OAuthTokenCacheEntry $entry, Deadline $deadline): void;
}
