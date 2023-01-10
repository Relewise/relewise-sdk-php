<?php declare(strict_types=1);

namespace Relewise\Models;

use DateTime;

enum EntityType : string
{
    case Product = 'Product';
    case Variant = 'Variant';
    case ProductCategory = 'ProductCategory';
    case Brand = 'Brand';
    case Content = 'Content';
    case ContentCategory = 'ContentCategory';
}
