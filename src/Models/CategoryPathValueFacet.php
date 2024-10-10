<?php declare(strict_types=1);

namespace Relewise\Models;

abstract class CategoryPathValueFacet extends Facet
{
    public string $typeDefinition = "";
    
    public ?array $selected;
    
    public static function hydrate(array $arr)
    {
        $type = $arr["\$type"];
        if ($type=="Relewise.Client.DataTypes.Search.Facets.Queries.CategoryHierarchyFacet, Relewise.Client")
        {
            return CategoryHierarchyFacet::hydrate($arr);
        }
    }
    
    public static function hydrateBase(mixed $result, array $arr)
    {
        $result = Facet::hydrateBase($result, $arr);
        if (array_key_exists("selected", $arr))
        {
            $result->selected = array();
            foreach($arr["selected"] as &$value)
            {
                array_push($result->selected, CategoryPath::hydrate($value));
            }
        }
        return $result;
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
