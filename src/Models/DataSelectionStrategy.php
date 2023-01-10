<?php declare(strict_types=1);

namespace Relewise\Models;

use DateTime;

enum DataSelectionStrategy : string
{
    case Product = 'Product';
    case Variant = 'Variant';
    case VariantWithFallbackToProduct = 'VariantWithFallbackToProduct';
    case ProductWithFallbackToVariant = 'ProductWithFallbackToVariant';
}
