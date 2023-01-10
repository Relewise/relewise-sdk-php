<?php declare(strict_types=1);

namespace Relewise\Models;

use DateTime;

enum BrandUpdateUpdateKind : string
{
    case None = 'None';
    case UpdateAndAppend = 'UpdateAndAppend';
    case ReplaceProvidedProperties = 'ReplaceProvidedProperties';
    case ClearAndReplace = 'ClearAndReplace';
}
