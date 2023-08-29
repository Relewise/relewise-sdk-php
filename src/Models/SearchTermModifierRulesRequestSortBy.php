<?php declare(strict_types=1);

namespace Relewise\Models;

use DateTime;

enum SearchTermModifierRulesRequestSortBy : string
{
    case Created = 'Created';
    case Modified = 'Modified';
}
