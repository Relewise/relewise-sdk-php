<?php declare(strict_types=1);

namespace Relewise\Models;

use DateTime;

enum ProductEngagementDataSentimentKind : string
{
    case Neutral = 'Neutral';
    case Like = 'Like';
    case Dislike = 'Dislike';
}
