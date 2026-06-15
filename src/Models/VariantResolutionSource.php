<?php declare(strict_types=1);

namespace Relewise\Models;

use DateTime;

/** Describes why a product result contains a selected variant. */
enum VariantResolutionSource : string
{
    /** The variant was selected as the default or most relevant variant for a product match. This means a product was selected first, then the engine resolved this variant based on one or more of: - Promoted/default variant via Product.Variant.PromoteByDataKey - Popularity: purchases/views - Variant relevance modifiers - Variant-aware sorting - Exploded variants */
    case Default = 'Default';
    /** The product match qualified the result, but this variant matched part of the search term. The variant is not strong enough to be returned independently, but it is still selected over the default variant */
    case PartialMatchByTerm = 'PartialMatchByTerm';
    /** The search term matched the variant strongly enough that the variant candidate itself drove the result */
    case MatchByTerm = 'MatchByTerm';
}
