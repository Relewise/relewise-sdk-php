<?php declare(strict_types=1);

namespace Relewise\Models\DTO;

use DateTime;

enum SignificantDataValueSignificantDataValueComparer : string
{
    case Equals = 'Equals';
    case NumericPercentDifference = 'NumericPercentDifference';
    case StringSimilarity = 'StringSimilarity';
    case KeyExists = 'KeyExists';
}
