<?php declare(strict_types=1);

namespace Relewise\Models;

class CategoryHierarchyFacet extends CategoryPathValueFacet
{
    public string $typeDefinition = "Relewise.Client.DataTypes.Search.Facets.Queries.CategoryHierarchyFacet, Relewise.Client";
    
    public CategorySelectionStrategy $categorySelectionStrategy;
    public ?SelectedCategoryPropertiesSettings $selectedPropertiesSettings;
    
    public static function create(CategorySelectionStrategy $categorySelectionStrategy, CategoryPath ... $selectedCategoryPath) : CategoryHierarchyFacet
    {
        $result = new CategoryHierarchyFacet();
        $result->categorySelectionStrategy = $categorySelectionStrategy;
        $result->selected = $selectedCategoryPath;
        return $result;
    }
    
    public static function hydrate(array $arr) : CategoryHierarchyFacet
    {
        $result = CategoryPathValueFacet::hydrateBase(new CategoryHierarchyFacet(), $arr);
        if (array_key_exists("categorySelectionStrategy", $arr))
        {
            $result->categorySelectionStrategy = CategorySelectionStrategy::from($arr["categorySelectionStrategy"]);
        }
        if (array_key_exists("selectedPropertiesSettings", $arr))
        {
            $result->selectedPropertiesSettings = SelectedCategoryPropertiesSettings::hydrate($arr["selectedPropertiesSettings"]);
        }
        return $result;
    }
    
    function setCategorySelectionStrategy(CategorySelectionStrategy $categorySelectionStrategy)
    {
        $this->categorySelectionStrategy = $categorySelectionStrategy;
        return $this;
    }
    
    function setSelectedPropertiesSettings(?SelectedCategoryPropertiesSettings $selectedPropertiesSettings)
    {
        $this->selectedPropertiesSettings = $selectedPropertiesSettings;
        return $this;
    }
    
    function setSelected(CategoryPath ... $selected)
    {
        $this->selected = $selected;
        return $this;
    }
    
    /** @param ?CategoryPath[] $selected new value. */
    function setSelectedFromArray(array $selected)
    {
        $this->selected = $selected;
        return $this;
    }
    
    function addToSelected(CategoryPath $selected)
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
