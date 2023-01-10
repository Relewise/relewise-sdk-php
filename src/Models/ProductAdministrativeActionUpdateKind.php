<?php declare(strict_types=1);

namespace Relewise\Models;

use DateTime;

enum ProductAdministrativeActionUpdateKind : string
{
    case None = 'None';
    case DisableInRecommendations = 'DisableInRecommendations';
    case Disable = 'Disable';
    case EnableInRecommendations = 'EnableInRecommendations';
    case Enable = 'Enable';
    case PermanentlyDelete = 'PermanentlyDelete';
    case Delete = 'Delete';
}
