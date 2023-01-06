<?php declare(strict_types=1);

namespace Relewise\Models\DTO;

use DateTime;

enum CategorySelectionStrategy : string
{
    case ImmediateParent = 'ImmediateParent';
    case Ancestors = 'Ancestors';
}
