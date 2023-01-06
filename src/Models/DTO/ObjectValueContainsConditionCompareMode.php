<?php declare(strict_types=1);

namespace Relewise\Models\DTO;

use DateTime;

enum ObjectValueContainsConditionCompareMode : string
{
    case All = 'All';
    case Any = 'Any';
}
