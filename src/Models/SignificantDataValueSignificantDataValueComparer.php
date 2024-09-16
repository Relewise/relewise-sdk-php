<?php declare(strict_types=1);

namespace Relewise\Models;

use DateTime;

enum SignificantDataValueSignificantDataValueComparer : string
{
    case Equals = 'Equals';
    case NumericPercentDifference = 'NumericPercentDifference';
    case StringSimilarity = 'StringSimilarity';
    case KeyExists = 'KeyExists';
    case CollectionOverlap = 'CollectionOverlap';
}
