<?php declare(strict_types=1);

namespace Relewise\Models;

use DateTime;

enum FacetingField : string
{
    case Category = 'Category';
    case Assortment = 'Assortment';
    case ListPrice = 'ListPrice';
    case SalesPrice = 'SalesPrice';
    case Brand = 'Brand';
    case Data = 'Data';
    case VariantSpecification = 'VariantSpecification';
    case User = 'User';
}
