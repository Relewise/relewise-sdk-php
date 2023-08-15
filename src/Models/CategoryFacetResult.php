<?php declare(strict_types=1);

namespace Relewise\Models;

use DateTime;

class CategoryFacetResult extends stringCategoryNameAndIdResultValueFacetResult
{
    public string $typeDefinition = "Relewise.Client.DataTypes.Search.Facets.Result.CategoryFacetResult, Relewise.Client";
    public CategorySelectionStrategy $categorySelectionStrategy;
    public static function create(CategorySelectionStrategy $categorySelectionStrategy, array $selected, CategoryNameAndIdResultAvailableFacetValue ... $available) : CategoryFacetResult
    {
        $result = new CategoryFacetResult();
        $result->categorySelectionStrategy = $categorySelectionStrategy;
        $result->selected = $selected;
        $result->available = $available;
        return $result;
    }
    public static function hydrate(array $arr) : CategoryFacetResult
    {
        $result = stringCategoryNameAndIdResultValueFacetResult::hydrateBase(new CategoryFacetResult(), $arr);
        if (array_key_exists("categorySelectionStrategy", $arr))
        {
            $result->categorySelectionStrategy = CategorySelectionStrategy::from($arr["categorySelectionStrategy"]);
        }
        return $result;
    }
    /**
     * Sets categorySelectionStrategy to a new value.
     * @param CategorySelectionStrategy $categorySelectionStrategy new value.
     */
    function setCategorySelectionStrategy(CategorySelectionStrategy $categorySelectionStrategy)
    {
        $this->categorySelectionStrategy = $categorySelectionStrategy;
        return $this;
    }
    /**
     * Sets selected to a new value.
     * @param string[] $selected new value.
     */
    function setSelected(string ... $selected)
    {
        $this->selected = $selected;
        return $this;
    }
    /**
     * Sets selected to a new value from an array.
     * @param string[] $selected new value.
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
    /**
     * Sets available to a new value.
     * @param CategoryNameAndIdResultAvailableFacetValue[] $available new value.
     */
    function setAvailable(CategoryNameAndIdResultAvailableFacetValue ... $available)
    {
        $this->available = $available;
        return $this;
    }
    /**
     * Sets available to a new value from an array.
     * @param CategoryNameAndIdResultAvailableFacetValue[] $available new value.
     */
    function setAvailableFromArray(array $available)
    {
        $this->available = $available;
        return $this;
    }
    /**
     * Adds a new element to available.
     * @param CategoryNameAndIdResultAvailableFacetValue $available new element.
     */
    function addToAvailable(CategoryNameAndIdResultAvailableFacetValue $available)
    {
        if (!isset($this->available))
        {
            $this->available = array();
        }
        array_push($this->available, $available);
        return $this;
    }
    /**
     * Sets field to a new value.
     * @param FacetingField $field new value.
     */
    function setField(FacetingField $field)
    {
        $this->field = $field;
        return $this;
    }
}
