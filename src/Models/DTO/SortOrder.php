<?php declare(strict_types=1);

namespace Relewise\Models\DTO;

use DateTime;

enum SortOrder : string
{
    case Ascending = 'Ascending';
    case Descending = 'Descending';
}
