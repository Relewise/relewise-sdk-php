<?php declare(strict_types=1);

namespace Relewise\Models\DTO;

use DateTime;

enum ConditionTarget : string
{
    case Input = 'Input';
    case Output = 'Output';
}
