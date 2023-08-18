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
     * @param string[] $selected new value.
     */
    function setSelectedFromArray(array $selected)
    {
        $this->selected = $selected;
        return $this;
    }
    function addToSelected(string $selected)
    {
        if (!isset($this->selected))
        {
            $this->selected = array();
        }
        array_push($this->selected, $selected);
        return $this;
    }
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
    function addToAvailable(CategoryNameAndIdResultAvailableFacetValue $available)
    {
        if (!isset($this->available))
        {
            $this->available = array();
        }
        array_push($this->available, $available);
        return $this;
    }
    function setField(FacetingField $field)
    {
        $this->field = $field;
        return $this;
    }
}
