<?php declare(strict_types=1);

namespace Relewise\Models;

use DateTime;

enum SuppressionConditionKind : string
{
    case Contains = 'Contains';
}
