<?php declare(strict_types=1);

namespace Relewise\Models;

use DateTime;

enum BrandUpdateUpdateKind : string
{
    /** Will make no changes. This kind is only useful if you want to implicitly create a brand via a ProductUpdate, but don't want to save any provided details about the brand apart from its id. */
    case None = 'None';
    /** Creates the brand if it does not exist, otherwise non-destructively updates the existing brand without affecting relations, other data tracked for the brand etc. */
    case UpdateAndAppend = 'UpdateAndAppend';
    /** Creates the brand if it does not exist, otherwise replaces values for all provided non-null properties. */
    case ReplaceProvidedProperties = 'ReplaceProvidedProperties';
    /** Creates the brand if it does not exist, otherwise replaces all properties for that piece of brand, clearing existing data like known categories, Data-keys etc. without affecting existing relations (e.g. other brand viewed relations, purchased product after viewing brand etc.) */
    case ClearAndReplace = 'ClearAndReplace';
}
