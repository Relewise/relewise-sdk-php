<?php declare(strict_types=1);

namespace Relewise\Models;

use DateTime;

enum BrandAdministrativeActionUpdateKind : string
{
    case Disable = 'Disable';
    case Enable = 'Enable';
    case Delete = 'Delete';
}
