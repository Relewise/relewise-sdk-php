<?php declare(strict_types=1);

namespace Relewise\Models;

use DateTime;

enum ChangeType : string
{
    case Changed = 'Changed';
    case Decreased = 'Decreased';
    case Increased = 'Increased';
}
