<?php declare(strict_types=1);

namespace Relewise\Models;

use DateTime;

enum SortMode : string
{
    case Auto = 'Auto';
    case Alphabetical = 'Alphabetical';
    case Numerical = 'Numerical';
}
