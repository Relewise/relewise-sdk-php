<?php declare(strict_types=1);

namespace Relewise\Models;

use DateTime;

enum ProductUpdateUpdateKind : string
{
    /** Will make no changes. This kind is only useful if you want to update a product, but not its variants, or the other way around. */
    case None = 'None';
    /** Creates the product and/or variant if it does not exist, otherwise non-destructively updates the existing product/variant without affecting relations, other data tracked for the product etc. */
    case UpdateAndAppend = 'UpdateAndAppend';
    /** Creates the product and/or variant if it does not exist, otherwise replaces values for all provided non-null properties. */
    case ReplaceProvidedProperties = 'ReplaceProvidedProperties';
    /** Creates the product and/or variant if it does not exist, otherwise replaces existing product/variant information for the product, clearing other data like known categories, Data-keys etc. without affecting existing relations (e.g. order-relations, product views etc.) */
    case ClearAndReplace = 'ClearAndReplace';
}
