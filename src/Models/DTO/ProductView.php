<?php
declare(strict_types=1);

namespace Relewise\Models\DTO;

use Relewise\Models\DTO\User;
use Relewise\Models\DTO\Product;
use Relewise\Models\DTO\ProductVariant;

class ProductView
{
    public User|null $user = null;

    public Product|null $product = null;

    public ProductVariant|null $variant = null;

    public string|null $type = null;

    public array|null $custom = null;

}
