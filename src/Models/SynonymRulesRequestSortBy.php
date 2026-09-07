<?php declare(strict_types=1);

namespace Relewise\Models;

use DateTime;

/** Defines the fields by which synonym rules can be sorted. */
enum SynonymRulesRequestSortBy : string
{
    case Created = 'Created';
    case CreatedBy = 'CreatedBy';
    case Modified = 'Modified';
    case ModifiedBy = 'ModifiedBy';
    case Approved = 'Approved';
    case ApprovedBy = 'ApprovedBy';
    case Type = 'Type';
    case Predictable = 'Predictable';
}
