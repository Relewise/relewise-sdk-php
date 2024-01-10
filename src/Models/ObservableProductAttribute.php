<?php declare(strict_types=1);

namespace Relewise\Models;

use DateTime;

enum ObservableProductAttribute : string
{
    case ListPrice = 'ListPrice';
    case SalesPrice = 'SalesPrice';
}
