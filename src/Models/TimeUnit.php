<?php declare(strict_types=1);

namespace Relewise\Models;

use DateTime;

enum TimeUnit : string
{
    case UnixMilliseconds = 'UnixMilliseconds';
    case UnixSeconds = 'UnixSeconds';
    case UnixMinutes = 'UnixMinutes';
}
