<?php declare(strict_types=1);

namespace Relewise\Models\DTO;

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
    function withCategorySelectionStrategy(CategorySelectionStrategy $categorySelectionStrategy)
    {
        $this->categorySelectionStrategy = $categorySelectionStrategy;
        return $this;
    }
    function withSelected(string ... $selected)
    {
        $this->selected = $selected;
        return $this;
    }
    function withAvailable(CategoryNameAndIdResultAvailableFacetValue ... $available)
    {
        $this->available = $available;
        return $this;
    }
    function withField(FacetingField $field)
    {
        $this->field = $field;
        return $this;
    }
}
