<?php declare(strict_types=1);

namespace Relewise\Models\DTO;

use DateTime;

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
    function withPathFromRoot(CategoryNameAndIdResult ... $pathFromRoot)
    {
        $this->pathFromRoot = $pathFromRoot;
        return $this;
    }
    function withRank(int $rank)
    {
        $this->rank = $rank;
        return $this;
    }
}