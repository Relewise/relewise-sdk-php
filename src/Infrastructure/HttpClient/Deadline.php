<?php declare(strict_types=1);

namespace Relewise\Infrastructure\HttpClient;

/** One process-local, monotonic timeout budget. Do not persist it in a cache. */
final class Deadline
{
    private readonly float $expiresAt;

    public function __construct(int $timeout)
    {
        if ($timeout < 1)
        {
            throw new \InvalidArgumentException('timeout must be positive.');
        }
        $this->expiresAt = hrtime(true) / 1e9 + $timeout;
    }

    /** Floor the allowance so a transport never rounds up or receives zero (unlimited). */
    public function remainingMilliseconds(): int
    {
        $remaining = (int) floor(($this->expiresAt - hrtime(true) / 1e9) * 1000);
        if ($remaining < 1)
        {
            throw new RequestTimeoutException('The OAuth operation timeout was exhausted.');
        }
        return $remaining;
    }

    public function throwIfExpired(): void
    {
        $this->remainingMilliseconds();
    }
}
