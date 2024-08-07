<?php declare(strict_types=1);

namespace Relewise\Models;

use DateTime;

enum CampaignsRequestSortBy : string
{
    case Created = 'Created';
    case Modified = 'Modified';
    case Name = 'Name';
}
