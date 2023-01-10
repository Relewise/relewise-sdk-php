<?php declare(strict_types=1);

namespace Relewise\Models;

use DateTime;

enum ConditionTarget : string
{
    case Input = 'Input';
    case Output = 'Output';
}
