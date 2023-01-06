<?php declare(strict_types=1);

namespace Relewise\Models\DTO;

use DateTime;

enum PriceSelectionStrategy : string
{
    case Product = 'Product';
    case Variant = 'Variant';
    case VariantWithFallbackToProduct = 'VariantWithFallbackToProduct';
    case ProductWithFallbackToVariant = 'ProductWithFallbackToVariant';
}
