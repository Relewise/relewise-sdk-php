<?php declare(strict_types=1);

namespace Relewise\Models;

use DateTime;

enum SearchTermCriteriaSearchTermPolicy : string
{
    case MustHaveSearchTerm = 'MustHaveSearchTerm';
    case MustNotHaveSearchTerm = 'MustNotHaveSearchTerm';
}
