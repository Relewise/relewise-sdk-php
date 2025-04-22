<?php declare(strict_types=1);
namespace Relewise\Factory;

use DateInterval;
use InvalidArgumentException;

class DateIntervalFactory {
    public static function fromTimeSpanString(string $timeSpanString) {
        
        // Match [days.]hh:mm:ss[.fffffff]
        if (!preg_match('/^(?:(\d+)\.)?(\d{1,2}):(\d{2}):(\d{2})(?:\.(\d{1,7}))?$/', $timeSpanString, $m)) {
            throw new InvalidArgumentException("Invalid TimeSpan format: '$timeSpanString'");
        }

        $days = isset($m[1]) ? (int)$m[1] : 0;
        $hours = ($days * 24) + (int)$m[2];
        $minutes = (int)$m[3];
        $seconds = (int)$m[4];
        $fraction = isset($m[5]) ? $m[5] : '0';

        // Pad/truncate to 6 digits for microseconds
        $microseconds = (int)str_pad(substr($fraction, 0, 6), 6, '0');
        
        return DateInterval::createFromDateString("$hours hours + $minutes minutes + $seconds seconds + $microseconds microseconds");
    }
}
