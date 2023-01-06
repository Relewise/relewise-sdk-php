<?php declare(strict_types=1);

namespace Relewise\Models\DTO;

use DateTime;

class CategoryFacet extends stringValueFacet
{
    public string $typeDefinition = "Relewise.Client.DataTypes.Search.Facets.Queries.CategoryFacet, Relewise.Client";
    public CategorySelectionStrategy $categorySelectionStrategy;
    public static function create(CategorySelectionStrategy $categorySelectionStrategy) : CategoryFacet
    {
        $result = new CategoryFacet();
        $result->categorySelectionStrategy = $categorySelectionStrategy;
        return $result;
    }
    public static function hydrate(array $arr) : CategoryFacet
    {
        $result = stringValueFacet::hydrateBase(new CategoryFacet(), $arr);
        if (array_key_exists("categorySelectionStrategy", $arr))
        {
            $result->categorySelectionStrategy = CategorySelectionStrategy::from($arr["categorySelectionStrategy"]);
        }
        return $result;
    }
    function setCategorySelectionStrategy(CategorySelectionStrategy $categorySelectionStrategy)
    {
        $this->categorySelectionStrategy = $categorySelectionStrategy;
        return $this;
    }
    function setSelected(string ... $selected)
    {
        $this->selected = $selected;
        return $this;
    }
    function setField(FacetingField $field)
    {
        $this->field = $field;
        return $this;
    }
    function setSettings(?FacetSettings $settings)
    {
        $this->settings = $settings;
        return $this;
    }
}
