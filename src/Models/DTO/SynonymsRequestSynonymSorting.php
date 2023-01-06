<?php declare(strict_types=1);

namespace Relewise\Models\DTO;

use DateTime;

enum SynonymsRequestSynonymSorting : string
{
    case Created = 'Created';
    case CreatedBy = 'CreatedBy';
    case Modified = 'Modified';
    case ModifiedBy = 'ModifiedBy';
    case Approved = 'Approved';
    case ApprovedBy = 'ApprovedBy';
    case Usages = 'Usages';
    case Type = 'Type';
    case Predictable = 'Predictable';
}
