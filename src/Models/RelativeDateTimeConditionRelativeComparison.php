<?php declare(strict_types=1);

namespace Relewise\Models;

use DateTime;

enum RelativeDateTimeConditionRelativeComparison : string
{
    case BeforeNow = 'BeforeNow';
    case AfterNow = 'AfterNow';
}
