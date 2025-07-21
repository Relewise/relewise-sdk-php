<?php declare(strict_types=1);

namespace Relewise\Models;

use DateTime;

enum FacetEvaluationMode : string
{
    case And = 'And';
    case Or = 'Or';
}
