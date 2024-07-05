<?php declare(strict_types=1);

namespace Relewise\Models;

use DateTime;

enum CampaignStatusWithHistoryStatusName : string
{
    case Active = 'Active';
    case Inactive = 'Inactive';
    case ScheduleCompleted = 'ScheduleCompleted';
    case BudgetReached = 'BudgetReached';
}
