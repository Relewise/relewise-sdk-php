<?php declare(strict_types=1);

namespace Relewise\Models;

use DateTime;

enum ObservableVariantAttribute : string
{
    case ListPrice = 'ListPrice';
    case SalesPrice = 'SalesPrice';
}
