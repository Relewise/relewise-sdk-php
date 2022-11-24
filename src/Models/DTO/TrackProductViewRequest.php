<?php
declare(strict_types=1);

namespace Relewise\Models\DTO;


class TrackProductViewRequest
{
    public ProductView|null $productView = null;

    public string|null $type = null;

    public array|null $custom = null;

}
