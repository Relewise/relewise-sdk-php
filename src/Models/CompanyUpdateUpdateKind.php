<?php declare(strict_types=1);

namespace Relewise\Models;

use DateTime;

enum CompanyUpdateUpdateKind : string
{
    /** Creates the company if it does not exist, otherwise non-destructively updates the existing company without affecting relations, other data tracked for the company etc. */
    case UpdateAndAppend = 'UpdateAndAppend';
    /** Creates the company if it does not exist, otherwise replaces values for all provided non-null properties and data-keys. */
    case ReplaceProvidedProperties = 'ReplaceProvidedProperties';
    /** Creates the company if it does not exist, otherwise replaces all properties for that company, clearing existing data, Data-keys etc. without affecting existing relations */
    case ClearAndReplace = 'ClearAndReplace';
}
