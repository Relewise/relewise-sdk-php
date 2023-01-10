<?php declare(strict_types=1);

namespace Relewise\Models;

use DateTime;

enum ContentAttributeSortingSortableAttribute : string
{
    case Id = 'Id';
    case DisplayName = 'DisplayName';
}
