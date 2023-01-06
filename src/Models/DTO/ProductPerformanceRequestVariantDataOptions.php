<?php declare(strict_types=1);

namespace Relewise\Models\DTO;

use DateTime;

enum ProductPerformanceRequestVariantDataOptions : string
{
    case FromVariant = 'FromVariant';
    case FromProduct = 'FromProduct';
    case FromProductDividedByVariants = 'FromProductDividedByVariants';
}
