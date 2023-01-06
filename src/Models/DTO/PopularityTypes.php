<?php declare(strict_types=1);

namespace Relewise\Models\DTO;

use DateTime;

enum PopularityTypes : string
{
    case MostPurchased = 'MostPurchased';
    case MostViewed = 'MostViewed';
}
