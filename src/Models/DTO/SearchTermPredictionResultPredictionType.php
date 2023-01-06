<?php declare(strict_types=1);

namespace Relewise\Models\DTO;

use DateTime;

enum SearchTermPredictionResultPredictionType : string
{
    case Match = 'Match';
    case WordContinuation = 'WordContinuation';
    case Word = 'Word';
    case WordSequence = 'WordSequence';
}
