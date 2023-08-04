<?php declare(strict_types=1);

namespace Relewise\Models;

use DateTime;

enum ContentUpdateUpdateKind : string
{
    /** Creates the content if it does not exist, otherwise non-destructively updates the existing content without affecting relations, other data tracked for the content etc. */
    case UpdateAndAppend = 'UpdateAndAppend';
    /** Creates the content if it does not exist, otherwise replaces values for all provided non-null properties. */
    case ReplaceProvidedProperties = 'ReplaceProvidedProperties';
    /** Creates the content if it does not exist, otherwise replaces all properties for that piece of content, clearing existing data like known categories, Data-keys etc. without affecting existing relations (e.g. other content viewed relations, purchased product after viewing content etc.) */
    case ClearAndReplace = 'ClearAndReplace';
}
