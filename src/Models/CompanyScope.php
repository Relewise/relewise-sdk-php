<?php declare(strict_types=1);

namespace Relewise\Models;

use DateTime;

/** Specifies what company/companies should be targeted. */
enum CompanyScope : string
{
    /** The immediate Company found at Company. */
    case ImmediateCompany = 'ImmediateCompany';
    /** The Parent of the immediate Company. */
    case ParentCompany = 'ParentCompany';
    /** Either the immediate Company or its Parent. */
    case ImmediateOrParentCompany = 'ImmediateOrParentCompany';
}
