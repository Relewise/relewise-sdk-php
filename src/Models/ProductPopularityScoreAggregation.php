<?php declare(strict_types=1);

namespace Relewise\Models;

use DateTime;

/** Aggregation strategy for product popularity scores referenced by content data. */
enum ProductPopularityScoreAggregation : string
{
    /** Uses the highest matched product popularity score. */
    case Max = 'Max';
    /** Uses the average of matched product popularity scores. */
    case Average = 'Average';
}
