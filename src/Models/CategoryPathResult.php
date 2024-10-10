<?php declare(strict_types=1);

namespace Relewise\Models;

class CategoryPathResult
{
    public array $pathFromRoot;
    public int $rank;
    public static function create(CategoryNameAndIdResult ... $pathFromRoot) : CategoryPathResult
    {
        $result = new CategoryPathResult();
        $result->pathFromRoot = $pathFromRoot;
        return $result;
    }
    
    public static function hydrate(array $arr) : CategoryPathResult
    {
        $result = new CategoryPathResult();
        if (array_key_exists("pathFromRoot", $arr))
        {
            $result->pathFromRoot = array();
            foreach($arr["pathFromRoot"] as &$value)
            {
                array_push($result->pathFromRoot, CategoryNameAndIdResult::hydrate($value));
            }
        }
        if (array_key_exists("rank", $arr))
        {
            $result->rank = $arr["rank"];
        }
        return $result;
    }
    
    function setPathFromRoot(CategoryNameAndIdResult ... $pathFromRoot)
    {
        $this->pathFromRoot = $pathFromRoot;
        return $this;
    }
    
    /** @param CategoryNameAndIdResult[] $pathFromRoot new value. */
    function setPathFromRootFromArray(array $pathFromRoot)
    {
        $this->pathFromRoot = $pathFromRoot;
        return $this;
    }
    
    function addToPathFromRoot(CategoryNameAndIdResult $pathFromRoot)
    {
        if (!isset($this->pathFromRoot))
        {
            $this->pathFromRoot = array();
        }
        array_push($this->pathFromRoot, $pathFromRoot);
        return $this;
    }
    
    function setRank(int $rank)
    {
        $this->rank = $rank;
        return $this;
    }
}
