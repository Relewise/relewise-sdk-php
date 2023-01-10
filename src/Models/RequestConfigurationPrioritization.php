<?php declare(strict_types=1);

namespace Relewise\Models;

use DateTime;

enum RequestConfigurationPrioritization : string
{
    case Merge = 'Merge';
    case Suppress = 'Suppress';
}
