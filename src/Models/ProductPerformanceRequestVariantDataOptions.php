<?php declare(strict_types=1);

namespace Relewise\Models;

use DateTime;

enum ProductPerformanceRequestVariantDataOptions : string
{
    case FromVariant = 'FromVariant';
    case FromProduct = 'FromProduct';
    case FromProductDividedByVariants = 'FromProductDividedByVariants';
}
