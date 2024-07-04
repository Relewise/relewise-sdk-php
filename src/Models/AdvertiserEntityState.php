<?php declare(strict_types=1);

namespace Relewise\Models;

use DateTime;

enum AdvertiserEntityState : string
{
    case Active = 'Active';
    case Inactive = 'Inactive';
    case Archived = 'Archived';
}
