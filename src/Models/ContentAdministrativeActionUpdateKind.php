<?php declare(strict_types=1);

namespace Relewise\Models;

use DateTime;

enum ContentAdministrativeActionUpdateKind : string
{
    /** Marks the content as disabled, meaning it will not show up in any search or recommendation results until actively enabled again (useful if you want to disable content which you plan to re-enable at a later point, maintaining all relation-data for the content) */
    case DisableInRecommendations = 'DisableInRecommendations';
    /** Marks the content as disabled, meaning it will not show up in any search or recommendation results until actively enabled again (useful if you want to disable content which you plan to re-enable at a later point, maintaining all relation-data for the content) */
    case Disable = 'Disable';
    /** Marks the content as enabled, meaning it may be included in search and recommendation results - if the content is already enabled, this has no effect. */
    case EnableInRecommendations = 'EnableInRecommendations';
    /** Marks the content as enabled, meaning it may be included in search and recommendation results - if the content is already enabled, this has no effect. */
    case Enable = 'Enable';
    /** Permanently deletes the content, including all previously tracked information for it, as well as any relations - This operation cannot be undone. */
    case PermanentlyDelete = 'PermanentlyDelete';
    /** Permanently deletes the content, including all previously tracked information for it, as well as any relations - This operation cannot be undone. */
    case Delete = 'Delete';
}
