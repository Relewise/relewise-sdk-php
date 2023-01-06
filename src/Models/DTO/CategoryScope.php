<?php declare(strict_types=1);

namespace Relewise\Models\DTO;

use DateTime;

enum CategoryScope : string
{
    case ImmediateParent = 'ImmediateParent';
    case ImmediateParentOrItsParent = 'ImmediateParentOrItsParent';
    case Ancestor = 'Ancestor';
}
