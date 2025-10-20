<?php declare(strict_types=1);

namespace Relewise\Models;

use DateTime;

/** Supported entity types for feed composition. */
enum FeedCompositionEntityType : string
{
    case Product = 'Product';
    case Content = 'Content';
}
