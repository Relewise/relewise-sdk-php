<?php declare(strict_types=1);

namespace Relewise\Models;

use DateTime;

enum SearchTermConditionConditionKind : string
{
    case Equals = 'Equals';
    case StartsWith = 'StartsWith';
    case EndsWith = 'EndsWith';
    case Contains = 'Contains';
}
