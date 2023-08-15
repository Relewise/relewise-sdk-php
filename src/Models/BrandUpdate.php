<?php declare(strict_types=1);

namespace Relewise\Models;

use DateTime;

class BrandUpdate extends Trackable
{
    public string $typeDefinition = "Relewise.Client.DataTypes.BrandUpdate, Relewise.Client";
    public Brand $brand;
    public BrandUpdateUpdateKind $kind;
    public static function create(Brand $brand, BrandUpdateUpdateKind $kind = BrandUpdateUpdateKind::UpdateAndAppend) : BrandUpdate
    {
        $result = new BrandUpdate();
        $result->brand = $brand;
        $result->kind = $kind;
        return $result;
    }
    public static function hydrate(array $arr) : BrandUpdate
    {
        $result = Trackable::hydrateBase(new BrandUpdate(), $arr);
        if (array_key_exists("brand", $arr))
        {
            $result->brand = Brand::hydrate($arr["brand"]);
        }
        if (array_key_exists("kind", $arr))
        {
            $result->kind = BrandUpdateUpdateKind::from($arr["kind"]);
        }
        return $result;
    }
    /**
     * Sets brand to a new value.
     * @param Brand $brand new value.
     */
    function setBrand(Brand $brand)
    {
        $this->brand = $brand;
        return $this;
    }
    /**
     * Sets kind to a new value.
     * @param BrandUpdateUpdateKind $kind new value.
     */
    function setKind(BrandUpdateUpdateKind $kind)
    {
        $this->kind = $kind;
        return $this;
    }
}
