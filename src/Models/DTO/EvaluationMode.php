<?php declare(strict_types=1);

namespace Relewise\Models\DTO;

use DateTime;

enum EvaluationMode : string
{
    case Any = 'Any';
    case All = 'All';
}
