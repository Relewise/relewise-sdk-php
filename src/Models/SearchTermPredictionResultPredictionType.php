<?php declare(strict_types=1);

namespace Relewise\Models;

use DateTime;

/** @deprecated No longer in use */
enum SearchTermPredictionResultPredictionType : string
{
    case Match = 'Match';
    case WordContinuation = 'WordContinuation';
    case Word = 'Word';
    case WordSequence = 'WordSequence';
}
