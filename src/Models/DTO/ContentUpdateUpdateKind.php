<?php declare(strict_types=1);

namespace Relewise\Models\DTO;

use DateTime;

enum ContentUpdateUpdateKind : string
{
    case UpdateAndAppend = 'UpdateAndAppend';
    case ReplaceProvidedProperties = 'ReplaceProvidedProperties';
    case ClearAndReplace = 'ClearAndReplace';
}
