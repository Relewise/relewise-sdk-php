<?php declare(strict_types=1);

namespace Relewise\Models;

use DateTime;

enum MerchandisingRuleStatusName : string
{
    case Active = 'Active';
    case Inactive = 'Inactive';
}
