<?php declare(strict_types=1);

namespace Relewise\Models;

use DateTime;

enum DataValueDataValueTypes : string
{
    case String = 'String';
    case Double = 'Double';
    case Boolean = 'Boolean';
    case Multilingual = 'Multilingual';
    /** Only used for receiving monetary data in the requested currency from the server, for example in search and recommendation results. Sending a DataValue of this type from client to server is not supported. Use MultiCurrency with a MultiCurrency value instead, even when supplying only one currency. */
    case Money = 'Money';
    case MultiCurrency = 'MultiCurrency';
    case StringList = 'StringList';
    case DoubleList = 'DoubleList';
    case BooleanList = 'BooleanList';
    case MultilingualCollection = 'MultilingualCollection';
    case Object = 'Object';
    case ObjectList = 'ObjectList';
}
