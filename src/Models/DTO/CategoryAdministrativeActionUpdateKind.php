<?php declare(strict_types=1);

namespace Relewise\Models\DTO;

use DateTime;

enum CategoryAdministrativeActionUpdateKind : string
{
    case Disable = 'Disable';
    case Enable = 'Enable';
    case Delete = 'Delete';
}
