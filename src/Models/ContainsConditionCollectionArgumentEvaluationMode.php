<?php declare(strict_types=1);

namespace Relewise\Models;

use DateTime;

enum ContainsConditionCollectionArgumentEvaluationMode : string
{
    case All = 'All';
    case Any = 'Any';
}
