<?php declare(strict_types=1);

namespace Relewise\Models;

class CategoryHierarchyFacetResultCategoryNode
{
    public CategoryResult $category;
    
    public int $hits;
    
    public ?string $parentId;
    
    public ?array $children;
    
    public bool $selected;
    
    public static function create(CategoryResult $category, int $hits, ?string $parentId, ?array $children, bool $selected) : CategoryHierarchyFacetResultCategoryNode
    {
        $result = new CategoryHierarchyFacetResultCategoryNode();
        $result->category = $category;
        $result->hits = $hits;
        $result->parentId = $parentId;
        $result->children = $children;
        $result->selected = $selected;
        return $result;
    }
    
    public static function hydrate(array $arr) : CategoryHierarchyFacetResultCategoryNode
    {
        $result = new CategoryHierarchyFacetResultCategoryNode();
        if (array_key_exists("category", $arr))
        {
            $result->category = CategoryResult::hydrate($arr["category"]);
        }
        if (array_key_exists("hits", $arr))
        {
            $result->hits = $arr["hits"];
        }
        if (array_key_exists("parentId", $arr))
        {
            $result->parentId = $arr["parentId"];
        }
        if (array_key_exists("children", $arr))
        {
            $result->children = array();
            foreach($arr["children"] as &$value)
            {
                array_push($result->children, CategoryHierarchyFacetResultCategoryNode::hydrate($value));
            }
        }
        if (array_key_exists("selected", $arr))
        {
            $result->selected = $arr["selected"];
        }
        return $result;
    }
    
    function setCategory(CategoryResult $category)
    {
        $this->category = $category;
        return $this;
    }
    
    function setHits(int $hits)
    {
        $this->hits = $hits;
        return $this;
    }
    
    function setParentId(?string $parentId)
    {
        $this->parentId = $parentId;
        return $this;
    }
    
    function setChildren(CategoryHierarchyFacetResultCategoryNode ... $children)
    {
        $this->children = $children;
        return $this;
    }
    
    /** @param ?CategoryHierarchyFacetResultCategoryNode[] $children new value. */
    function setChildrenFromArray(array $children)
    {
        $this->children = $children;
        return $this;
    }
    
    function addToChildren(CategoryHierarchyFacetResultCategoryNode $children)
    {
        if (!isset($this->children))
        {
            $this->children = array();
        }
        array_push($this->children, $children);
        return $this;
    }
    
    function setSelected(bool $selected)
    {
        $this->selected = $selected;
        return $this;
    }
}
