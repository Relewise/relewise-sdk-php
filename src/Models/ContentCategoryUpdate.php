<?php declare(strict_types=1);

namespace Relewise\Models;

use DateTime;

class ContentCategoryUpdate extends CategoryUpdate
{
    public string $typeDefinition = "Relewise.Client.DataTypes.ContentCategoryUpdate, Relewise.Client";
    public ContentCategory $category;
    public static function create(ContentCategory $category, CategoryUpdateUpdateKind $kind = CategoryUpdateUpdateKind::UpdateAndAppend) : ContentCategoryUpdate
    {
        $result = new ContentCategoryUpdate();
        $result->category = $category;
        $result->kind = $kind;
        return $result;
    }
    public static function hydrate(array $arr) : ContentCategoryUpdate
    {
        $result = CategoryUpdate::hydrateBase(new ContentCategoryUpdate(), $arr);
        if (array_key_exists("category", $arr))
        {
            $result->category = ContentCategory::hydrate($arr["category"]);
        }
        return $result;
    }
    /**
     * Sets category to a new value.
     * @param ContentCategory $category new value.
     */
    function setCategory(ContentCategory $category)
    {
        $this->category = $category;
        return $this;
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
