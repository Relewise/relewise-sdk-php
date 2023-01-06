<?php declare(strict_types=1);

namespace Relewise\Models\DTO;

use DateTime;

abstract class CategoryResult
{
    public string $typeDefinition = "Relewise.Client.DataTypes.CategoryResult, Relewise.Client";
    public string $categoryId;
    public string $displayName;
    public int $rank;
    public ViewedByUserInfo $viewedByUser;
    public array $paths;
    public array $assortments;
    public array $data;
    public static function hydrate(array $arr)
    {
        $type = $arr["\$type"];
        if ($type=="Relewise.Client.DataTypes.ContentCategoryResult, Relewise.Client")
        {
            return ContentCategoryResult::hydrate($arr);
        }
        if ($type=="Relewise.Client.DataTypes.ProductCategoryResult, Relewise.Client")
        {
            return ProductCategoryResult::hydrate($arr);
        }
    }
    public static function hydrateBase(mixed $result, array $arr)
    {
        if (array_key_exists("categoryId", $arr))
        {
            $result->categoryId = $arr["categoryId"];
        }
        if (array_key_exists("displayName", $arr))
        {
            $result->displayName = $arr["displayName"];
        }
        if (array_key_exists("rank", $arr))
        {
            $result->rank = $arr["rank"];
        }
        if (array_key_exists("viewedByUser", $arr))
        {
            $result->viewedByUser = ViewedByUserInfo::hydrate($arr["viewedByUser"]);
        }
        if (array_key_exists("paths", $arr))
        {
            $result->paths = array();
            foreach($arr["paths"] as &$value)
            {
                array_push($result->paths, CategoryPathResult::hydrate($value));
            }
        }
        if (array_key_exists("assortments", $arr))
        {
            $result->assortments = array();
            foreach($arr["assortments"] as &$value)
            {
                array_push($result->assortments, $value);
            }
        }
        if (array_key_exists("data", $arr))
        {
            $result->data = array();
            foreach($arr["data"] as $key => $value)
            {
                $result->data[$key] = DataValue::hydrate($value);
            }
        }
        return $result;
    }
    function withCategoryId(string $categoryId)
    {
        $this->categoryId = $categoryId;
        return $this;
    }
    function withDisplayName(string $displayName)
    {
        $this->displayName = $displayName;
        return $this;
    }
    function withRank(int $rank)
    {
        $this->rank = $rank;
        return $this;
    }
    function withViewedByUser(ViewedByUserInfo $viewedByUser)
    {
        $this->viewedByUser = $viewedByUser;
        return $this;
    }
    function withPaths(CategoryPathResult ... $paths)
    {
        $this->paths = $paths;
        return $this;
    }
    function withAssortments(int ... $assortments)
    {
        $this->assortments = $assortments;
        return $this;
    }
    function withData(string $key, DataValue $value)
    {
        if (!isset($this->data))
        {
            $this->data = array();
        }
        $this->data[$key] = $value;
        return $this;
    }
}
