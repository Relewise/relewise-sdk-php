<?php declare(strict_types=1);

namespace Relewise\Models;

use DateTime;

enum PredictionRulePromotionPosition : string
{
    case Top = 'Top';
    case Bottom = 'Bottom';
}
