<?php declare(strict_types=1);

namespace Relewise\NonGeneratedModels;

use InvalidArgumentException;

class TimeSpan
{
    public int $days;
    public int $hours;
    public int $minutes;
    public int $seconds;
    public int $microseconds;

    public function __construct(string $timespan)
    {
        // Match [days.]hh:mm:ss[.fffffff]
        if (!preg_match('/^(?:(\d+)\.)?(\d{1,2}):(\d{2}):(\d{2})(?:\.(\d{1,7}))?$/', $timespan, $m)) {
            throw new InvalidArgumentException("Invalid TimeSpan format: '$timespan'");
        }

        $this->days = isset($m[1]) ? (int)$m[1] : 0;
        $this->hours = (int)$m[2];
        $this->minutes = (int)$m[3];
        $this->seconds = (int)$m[4];
        $fraction = isset($m[5]) ? $m[5] : '0';

        // Pad/truncate to 6 digits for microseconds
        $this->microseconds = (int)str_pad(substr($fraction, 0, 6), 6, '0');
    }

    public function toSeconds(): float
    {
        return $this->days * 86400 +
               $this->hours * 3600 +
               $this->minutes * 60 +
               $this->seconds +
               $this->microseconds / 1_000_000;
    }

    public function __toString(): string
    {
        $dayPart = $this->days > 0 ? "{$this->days}." : "";
        return sprintf(
            '%s%02d:%02d:%02d.%06d',
            $dayPart,
            $this->hours,
            $this->minutes,
            $this->seconds,
            $this->microseconds
        );
    }
}
