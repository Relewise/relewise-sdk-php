<?php declare(strict_types=1);

namespace Relewise\Models\DTO;

use DateTime;

enum SynonymType : string
{
    case OneWay = 'OneWay';
    case Multidirectional = 'Multidirectional';
}
