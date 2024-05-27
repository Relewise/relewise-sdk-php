<?php declare(strict_types=1);

namespace Relewise\Models;

use DateTime;

enum RelativeTimeComparison : string
{
    case Before = 'Before';
    case After = 'After';
}
