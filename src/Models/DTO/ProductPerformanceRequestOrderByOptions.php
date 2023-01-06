<?php declare(strict_types=1);

namespace Relewise\Models\DTO;

use DateTime;

enum ProductPerformanceRequestOrderByOptions : string
{
    case Created = 'Created';
    case Views = 'Views';
    case Sales = 'Sales';
    case CartsOpened = 'CartsOpened';
    case RankByView = 'RankByView';
    case RankBySales = 'RankBySales';
}
