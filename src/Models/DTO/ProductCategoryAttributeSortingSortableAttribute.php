<?php declare(strict_types=1);

namespace Relewise\Models\DTO;

use DateTime;

enum ProductCategoryAttributeSortingSortableAttribute : string
{
    case Id = 'Id';
    case DisplayName = 'DisplayName';
}
