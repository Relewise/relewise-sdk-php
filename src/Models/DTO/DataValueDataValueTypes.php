<?php declare(strict_types=1);

namespace Relewise\Models\DTO;

use DateTime;

enum DataValueDataValueTypes : string
{
    case String = 'String';
    case Double = 'Double';
    case Boolean = 'Boolean';
    case Multilingual = 'Multilingual';
    case Money = 'Money';
    case MultiCurrency = 'MultiCurrency';
    case StringList = 'StringList';
    case DoubleList = 'DoubleList';
    case BooleanList = 'BooleanList';
    case MultilingualCollection = 'MultilingualCollection';
    case Object = 'Object';
    case ObjectList = 'ObjectList';
}
