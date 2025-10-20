<?php declare(strict_types=1);

namespace Relewise\Models;

use DateTime;

enum DisplayAdEntityState : string
{
    case Active = 'Active';
    case Inactive = 'Inactive';
    case Archived = 'Archived';
}
