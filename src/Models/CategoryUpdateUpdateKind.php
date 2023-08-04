<?php declare(strict_types=1);

namespace Relewise\Models;

use DateTime;

enum CategoryUpdateUpdateKind : string
{
    /** Creates the category if it does not exist, otherwise non-destructively updates the existing category without affecting relations, other data tracked for the category etc. */
    case UpdateAndAppend = 'UpdateAndAppend';
    /** Creates the category if it does not exist, otherwise replaces values for all provided non-null properties. */
    case ReplaceProvidedProperties = 'ReplaceProvidedProperties';
    /** Creates the category if it does not exist, otherwise replaces all properties for that piece of category, clearing existing data like known categories, Data-keys etc. without affecting existing relations (e.g. other category viewed relations, purchased product after viewing category etc.) */
    case ClearAndReplace = 'ClearAndReplace';
}
