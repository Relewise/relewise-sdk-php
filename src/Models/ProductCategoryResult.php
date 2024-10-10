<?php declare(strict_types=1);

namespace Relewise\Models;

class ProductCategoryResult extends CategoryResult
{
    public string $typeDefinition = "Relewise.Client.DataTypes.ProductCategoryResult, Relewise.Client";
    
    public static function create(string $categoryId, int $rank) : ProductCategoryResult
    {
        $result = new ProductCategoryResult();
        $result->categoryId = $categoryId;
        $result->rank = $rank;
        return $result;
    }
    
    public static function hydrate(array $arr) : ProductCategoryResult
    {
        $result = CategoryResult::hydrateBase(new ProductCategoryResult(), $arr);
        return $result;
    }
    
    function setCategoryId(string $categoryId)
    {
        $this->categoryId = $categoryId;
        return $this;
    }
    
    function setDisplayName(string $displayName)
    {
        $this->displayName = $displayName;
        return $this;
    }
    
    function setRank(int $rank)
    {
        $this->rank = $rank;
        return $this;
    }
    
    function setViewedByUser(ViewedByUserInfo $viewedByUser)
    {
        $this->viewedByUser = $viewedByUser;
        return $this;
    }
    
    function setPaths(CategoryPathResult ... $paths)
    {
        $this->paths = $paths;
        return $this;
    }
    
    /** @param CategoryPathResult[] $paths new value. */
    function setPathsFromArray(array $paths)
    {
        $this->paths = $paths;
        return $this;
    }
    
    function addToPaths(CategoryPathResult $paths)
    {
        if (!isset($this->paths))
        {
            $this->paths = array();
        }
        array_push($this->paths, $paths);
        return $this;
    }
    
    function setAssortments(int ... $assortments)
    {
        $this->assortments = $assortments;
        return $this;
    }
    
    /** @param int[] $assortments new value. */
    function setAssortmentsFromArray(array $assortments)
    {
        $this->assortments = $assortments;
        return $this;
    }
    
    function addToAssortments(int $assortments)
    {
        if (!isset($this->assortments))
        {
            $this->assortments = array();
        }
        array_push($this->assortments, $assortments);
        return $this;
    }
    
    function addToData(string $key, DataValue $value)
    {
        if (!isset($this->data))
        {
            $this->data = array();
        }
        $this->data[$key] = $value;
        return $this;
    }
    
    /** @param array<string, DataValue> $data associative array. */
    function setDataFromAssociativeArray(array $data)
    {
        $this->data = $data;
        return $this;
    }
}
