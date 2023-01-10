<?php declare(strict_types=1);

namespace Relewise\Models;

use DateTime;

enum StemmingRulesRequestSortBy : string
{
    case Created = 'Created';
    case Modified = 'Modified';
}
