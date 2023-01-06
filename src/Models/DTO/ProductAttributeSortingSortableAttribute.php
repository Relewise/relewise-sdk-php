<?php declare(strict_types=1);

namespace Relewise\Models\DTO;

use DateTime;

enum ProductAttributeSortingSortableAttribute : string
{
    case Id = 'Id';
    case DisplayName = 'DisplayName';
    case BrandId = 'BrandId';
    case BrandName = 'BrandName';
    case ListPrice = 'ListPrice';
    case SalesPrice = 'SalesPrice';
}
