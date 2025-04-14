<?php declare(strict_types=1);

namespace Relewise\Models;

use DateTime;

/** @deprecated Replaced by PredictionConfiguration */
enum PredictionSourceType : string
{
    case Disabled = 'Disabled';
    case IndividualWords = 'IndividualWords';
    case PartialWordSequences = 'PartialWordSequences';
    case CompleteWordSequence = 'CompleteWordSequence';
}
