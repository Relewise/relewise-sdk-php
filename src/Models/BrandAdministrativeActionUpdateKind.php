<?php declare(strict_types=1);

namespace Relewise\Models;

use DateTime;

enum BrandAdministrativeActionUpdateKind : string
{
    /** Marks the brand as disabled, meaning it will not show up in any search or recommendation results until actively enabled again (useful if you want to disable a brand, that you plan to re-enable at a later point, maintaining all relation-data for the brand) */
    case Disable = 'Disable';
    /** Marks the brand as enabled, meaning it may be included in any search or recommendation results - if the brand is already enabled, this has no effect. */
    case Enable = 'Enable';
    /** Permanently deletes the brand, including all previously tracked information for it, as well as any relations. This operation cannot be undone. */
    case Delete = 'Delete';
}
