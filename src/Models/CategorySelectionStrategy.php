<?php declare(strict_types=1);

namespace Relewise\Models;

use DateTime;

/** Defines how entities are to be selected by given paths. <para>Should ImmediateParent, or Ancestors selection be applied?</para> */
enum CategorySelectionStrategy : string
{
    /** Returns entities that are in the exact path that has been selected. */
    case ImmediateParent = 'ImmediateParent';
    /** Returns entities that are anywhere in the path that has been selected. */
    case Ancestors = 'Ancestors';
    /** Locates entities in the last selected category in the path and any of its descendants/children. <para>Only supported for CategoryHierarchyFacet, not supported for plain CategoryFacet.</para> */
    case Descendants = 'Descendants';
}
