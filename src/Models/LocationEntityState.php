<?php declare(strict_types=1);

namespace Relewise\Models;

use DateTime;

enum LocationEntityState : string
{
    case Active = 'Active';
    case Inactive = 'Inactive';
    case Archived = 'Archived';
}
