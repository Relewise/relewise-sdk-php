<?php declare(strict_types=1);

namespace Relewise\Models;

use DateTime;

class CategoryFacet extends stringValueFacet
{
    public string $typeDefinition = "Relewise.Client.DataTypes.Search.Facets.Queries.CategoryFacet, Relewise.Client";
    public CategorySelectionStrategy $categorySelectionStrategy;
    public static function create(CategorySelectionStrategy $categorySelectionStrategy, string ... $selectedIds) : CategoryFacet
    {
        $result = new CategoryFacet();
        $result->categorySelectionStrategy = $categorySelectionStrategy;
        $result->selected = $selectedIds;
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
    /**
     * Sets selected to a new value from an array.
     * @param ?string[] $selected new value.
     */
    function setSelectedFromArray(array $selected)
    {
        $this->selected = $selected;
        return $this;
    }
    /**
     * Adds a new element to selected.
     * @param string $selected new element.
     */
    function addToSelected(string $selected)
    {
        if (!isset($this->selected))
        {
            $this->selected = array();
        }
        array_push($this->selected, $selected);
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
