<?php declare(strict_types=1);

namespace Relewise\Models\DTO;

use DateTime;

enum SuppressionConditionKind : string
{
    case Contains = 'Contains';
}
