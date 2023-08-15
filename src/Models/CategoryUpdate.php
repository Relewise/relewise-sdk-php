<?php declare(strict_types=1);

namespace Relewise\Models;

use DateTime;

abstract class CategoryUpdate extends Trackable
{
    public string $typeDefinition = "Relewise.Client.DataTypes.CategoryUpdate, Relewise.Client";
    public CategoryUpdateUpdateKind $kind;
    public static function hydrate(array $arr)
    {
        $type = $arr["\$type"];
        if ($type=="Relewise.Client.DataTypes.ContentCategoryUpdate, Relewise.Client")
        {
            return ContentCategoryUpdate::hydrate($arr);
        }
        if ($type=="Relewise.Client.DataTypes.ProductCategoryUpdate, Relewise.Client")
        {
            return ProductCategoryUpdate::hydrate($arr);
        }
    }
    public static function hydrateBase(mixed $result, array $arr)
    {
        $result = Trackable::hydrateBase($result, $arr);
        if (array_key_exists("kind", $arr))
        {
            $result->kind = CategoryUpdateUpdateKind::from($arr["kind"]);
        }
        return $result;
    }
    /**
     * Sets kind to a new value.
     * @param CategoryUpdateUpdateKind $kind new value.
     */
    function setKind(CategoryUpdateUpdateKind $kind)
    {
        $this->kind = $kind;
        return $this;
    }
}
