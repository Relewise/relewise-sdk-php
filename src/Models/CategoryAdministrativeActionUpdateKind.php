<?php declare(strict_types=1);

namespace Relewise\Models;

use DateTime;

enum CategoryAdministrativeActionUpdateKind : string
{
    /** Marks the category as disabled, meaning it will not show up in any search or recommendation results until actively enabled again (useful if you want to disable a category, which you plan to re-enable at a later point, maintaining all relation-data for the category) */
    case Disable = 'Disable';
    /** Marks the category as enabled, meaning it may be included in search and recommendation results - if the category is already enabled, this has no effect. */
    case Enable = 'Enable';
    /** Permanently deletes the category, including all previously tracked information for it, as well as any relations - This operation cannot be undone. */
    case Delete = 'Delete';
}
