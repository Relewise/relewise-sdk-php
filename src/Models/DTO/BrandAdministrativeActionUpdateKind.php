<?php declare(strict_types=1);

namespace Relewise\Models\DTO;

use DateTime;

enum BrandAdministrativeActionUpdateKind : string
{
    case Disable = 'Disable';
    case Enable = 'Enable';
    case Delete = 'Delete';
}
