<?php declare(strict_types=1);

namespace Relewise\Models;

use DateTime;

enum PredictionRuleSuppressionConditionKind : string
{
    case Contains = 'Contains';
}
