<?php declare(strict_types=1);

namespace Relewise\Models;

use DateTime;

enum CampaignEntityState : string
{
    case Proposed = 'Proposed';
    case Approved = 'Approved';
    case Archived = 'Archived';
}
