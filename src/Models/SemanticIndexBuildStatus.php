<?php declare(strict_types=1);

namespace Relewise\Models;

use DateTime;

enum SemanticIndexBuildStatus : string
{
    case Disabled = 'Disabled';
    case Skipped = 'Skipped';
    case Built = 'Built';
    case Capped = 'Capped';
    case Failed = 'Failed';
}
