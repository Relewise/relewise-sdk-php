<?php declare(strict_types=1);

namespace Relewise\Models;

use DateTime;

enum UserUpdateUpdateKind : string
{
    /** Will make no changes. This is reserved for future functionality regarding updating of indirectly user-related data */
    case None = 'None';
    /** Creates the user if it does not exist, otherwise non-destructively updates the existing user without affecting relations, other data tracked for the user etc. */
    case UpdateAndAppend = 'UpdateAndAppend';
    /** Creates the user if it does not exist, otherwise replaces values for all provided non-null properties. */
    case ReplaceProvidedProperties = 'ReplaceProvidedProperties';
    /** Creates the user if it does not exist, otherwise replaces all existing information for the user, clearing other data like classifications, cart contents etc.) */
    case ClearAndReplace = 'ClearAndReplace';
}
