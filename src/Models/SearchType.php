<?php declare(strict_types=1);

namespace Relewise\Models;

use DateTime;

enum SearchType : string
{
    case Product = 'Product';
    case ProductCategory = 'ProductCategory';
    case Content = 'Content';
}
