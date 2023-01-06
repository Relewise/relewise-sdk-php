<?php declare(strict_types=1);

namespace Relewise\Models\DTO;

use DateTime;

enum PromotionPosition : string
{
    case Top = 'Top';
    case Bottom = 'Bottom';
}
