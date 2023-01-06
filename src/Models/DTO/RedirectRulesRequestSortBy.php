<?php declare(strict_types=1);

namespace Relewise\Models\DTO;

use DateTime;

enum RedirectRulesRequestSortBy : string
{
    case Created = 'Created';
    case Modified = 'Modified';
}
