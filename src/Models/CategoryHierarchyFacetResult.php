<?php declare(strict_types=1);

namespace Relewise\Models;

class CategoryHierarchyFacetResult extends FacetResult
{
    public string $typeDefinition = "Relewise.Client.DataTypes.Search.Facets.Result.CategoryHierarchyFacetResult, Relewise.Client";
    public CategorySelectionStrategy $categorySelectionStrategy;
    public array $nodes;
    
    public static function create(CategorySelectionStrategy $categorySelectionStrategy, CategoryHierarchyFacetResultCategoryNode ... $nodes) : CategoryHierarchyFacetResult
    {
        $result = new CategoryHierarchyFacetResult();
        $result->categorySelectionStrategy = $categorySelectionStrategy;
        $result->nodes = $nodes;
        return $result;
    }
    
    public static function hydrate(array $arr) : CategoryHierarchyFacetResult
    {
        $result = FacetResult::hydrateBase(new CategoryHierarchyFacetResult(), $arr);
        if (array_key_exists("categorySelectionStrategy", $arr))
        {
            $result->categorySelectionStrategy = CategorySelectionStrategy::from($arr["categorySelectionStrategy"]);
        }
        if (array_key_exists("nodes", $arr))
        {
            $result->nodes = array();
            foreach($arr["nodes"] as &$value)
            {
                array_push($result->nodes, CategoryHierarchyFacetResultCategoryNode::hydrate($value));
            }
        }
        return $result;
    }
    
    function setCategorySelectionStrategy(CategorySelectionStrategy $categorySelectionStrategy)
    {
        $this->categorySelectionStrategy = $categorySelectionStrategy;
        return $this;
    }
    
    function setNodes(CategoryHierarchyFacetResultCategoryNode ... $nodes)
    {
        $this->nodes = $nodes;
        return $this;
    }
    
    /** @param CategoryHierarchyFacetResultCategoryNode[] $nodes new value. */
    function setNodesFromArray(array $nodes)
    {
        $this->nodes = $nodes;
        return $this;
    }
    
    function addToNodes(CategoryHierarchyFacetResultCategoryNode $nodes)
    {
        if (!isset($this->nodes))
        {
            $this->nodes = array();
        }
        array_push($this->nodes, $nodes);
        return $this;
    }
    
    function setField(FacetingField $field)
    {
        $this->field = $field;
        return $this;
    }
}
