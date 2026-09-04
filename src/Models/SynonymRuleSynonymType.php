<?php declare(strict_types=1);

namespace Relewise\Models;

use DateTime;

/** Defines the direction in which a synonym relation is applied. */
enum SynonymRuleSynonymType : string
{
    case OneWay = 'OneWay';
    case Multidirectional = 'Multidirectional';
}
