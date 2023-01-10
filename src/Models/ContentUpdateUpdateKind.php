<?php declare(strict_types=1);

namespace Relewise\Models;

use DateTime;

enum ContentUpdateUpdateKind : string
{
    case UpdateAndAppend = 'UpdateAndAppend';
    case ReplaceProvidedProperties = 'ReplaceProvidedProperties';
    case ClearAndReplace = 'ClearAndReplace';
}
