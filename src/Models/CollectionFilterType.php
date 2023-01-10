<?php declare(strict_types=1);

namespace Relewise\Models;

use DateTime;

enum CollectionFilterType : string
{
    case Or = 'Or';
    case And = 'And';
}
