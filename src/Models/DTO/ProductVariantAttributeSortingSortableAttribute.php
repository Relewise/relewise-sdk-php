<?php declare(strict_types=1);

namespace Relewise\Models\DTO;

use DateTime;

enum ProductVariantAttributeSortingSortableAttribute : string
{
    case Id = 'Id';
    case DisplayName = 'DisplayName';
    case ListPrice = 'ListPrice';
    case SalesPrice = 'SalesPrice';
}
