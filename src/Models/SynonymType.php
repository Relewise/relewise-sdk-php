<?php declare(strict_types=1);

namespace Relewise\Models;

use DateTime;

enum SynonymType : string
{
    case OneWay = 'OneWay';
    case Multidirectional = 'Multidirectional';
}
