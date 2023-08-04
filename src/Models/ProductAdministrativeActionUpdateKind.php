<?php declare(strict_types=1);

namespace Relewise\Models;

use DateTime;

enum ProductAdministrativeActionUpdateKind : string
{
    /** Will make no changes. This is only useful if you want to update a product, but not its variants or the other way around. */
    case None = 'None';
    /** Marks the product and/or variant as disabled, meaning it will not show up in any search or recommendation results until actively enabled again (useful if you want to disable products/variant which you plan to re-enable at a later point, maintaining all relation-data for the product/variant) */
    case DisableInRecommendations = 'DisableInRecommendations';
    /** Marks the product and/or variant as disabled, meaning it will not show up in any search or recommendation results until actively enabled again (useful if you want to disable products/variant which you plan to re-enable at a later point, maintaining all relation-data for the product/variant) */
    case Disable = 'Disable';
    /** Marks the product/variant as enabled, meaning it may be included in search and recommendation results - if the product/variant is already enabled, this has no effect. */
    case EnableInRecommendations = 'EnableInRecommendations';
    /** Marks the product/variant as enabled, meaning it may be included in search and recommendation results - if the product/variant is already enabled, this has no effect. */
    case Enable = 'Enable';
    /** Permanently deletes the product/variant, including all previously tracked information for it, as well as any relations - this operation cannot be undone. */
    case PermanentlyDelete = 'PermanentlyDelete';
    /** Permanently deletes the product/variant, including all previously tracked information for it, as well as any relations - this operation cannot be undone. */
    case Delete = 'Delete';
}
