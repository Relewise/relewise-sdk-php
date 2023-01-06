<?php declare(strict_types=1);

namespace Relewise\Models\DTO;

use DateTime;

class BrandView extends Trackable
{
    public string $typeDefinition = "Relewise.Client.DataTypes.BrandView, Relewise.Client";
    public ?User $user;
    public Brand $brand;
    public static function create(?User $user, Brand $brand) : BrandView
    {
        $result = new BrandView();
        $result->user = $user;
        $result->brand = $brand;
        return $result;
    }
    public static function hydrate(array $arr) : BrandView
    {
        $result = Trackable::hydrateBase(new BrandView(), $arr);
        if (array_key_exists("user", $arr))
        {
            $result->user = User::hydrate($arr["user"]);
        }
        if (array_key_exists("brand", $arr))
        {
            $result->brand = Brand::hydrate($arr["brand"]);
        }
        return $result;
    }
    function withUser(?User $user)
    {
        $this->user = $user;
        return $this;
    }
    function withBrand(Brand $brand)
    {
        $this->brand = $brand;
        return $this;
    }
}
