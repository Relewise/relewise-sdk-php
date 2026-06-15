<?php declare(strict_types=1);

namespace Relewise\Models;

use DateTime;

/** Controls how variants should be ordered when more than one variant per product can participate in the result. */
enum VariantSorting : string
{
    /** Keep variants grouped under their product so the product-level order remains dominant. */
    case GroupedByProduct = 'GroupedByProduct';
    /** Allow variants to be ordered by variant-level relevance instead of staying grouped strictly by product. */
    case ByRelevance = 'ByRelevance';
}
