<?php declare(strict_types=1);

namespace Relewise\Models\DTO;

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
    function withCategory(ContentCategory $category)
    {
        $this->category = $category;
        return $this;
    }
    function withKind(CategoryUpdateUpdateKind $kind)
    {
        $this->kind = $kind;
        return $this;
    }
    function withCustom(string $key, string $value)
    {
        if (!isset($this->custom))
        {
            $this->custom = array();
        }
        $this->custom[$key] = $value;
        return $this;
    }
}
