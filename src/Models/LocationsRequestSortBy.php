<?php declare(strict_types=1);

namespace Relewise\Models;

use DateTime;

enum LocationsRequestSortBy : string
{
    case Created = 'Created';
    case Modified = 'Modified';
    case Name = 'Name';
}
