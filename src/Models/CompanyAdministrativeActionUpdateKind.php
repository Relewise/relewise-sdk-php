<?php declare(strict_types=1);

namespace Relewise\Models;

use DateTime;

enum CompanyAdministrativeActionUpdateKind : string
{
    /** Marks the company as disabled */
    case Disable = 'Disable';
    /** Marks the company as enabled */
    case Enable = 'Enable';
    /** Permanently deletes the company, including all previously tracked information for it, as well as any relations - This operation cannot be undone. */
    case Delete = 'Delete';
}
