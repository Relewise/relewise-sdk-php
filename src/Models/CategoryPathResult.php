<?php declare(strict_types=1);

namespace Relewise\Models;

use DateTime;

class CategoryPathResult
{
    public string $typeDefinition = "Relewise.Client.DataTypes.CategoryPathResult, Relewise.Client";
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
    /**
     * Sets pathFromRoot to a new value from an array.
     * @param CategoryNameAndIdResult[] $pathFromRoot new value.
     */
    function setPathFromRootFromArray(array $pathFromRoot)
    {
        $this->pathFromRoot = $pathFromRoot;
        return $this;
    }
    /**
     * Adds a new element to pathFromRoot.
     * @param CategoryNameAndIdResult $pathFromRoot new element.
     */
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
