<?php declare(strict_types=1);

namespace Relewise\Models;

use DateTime;

class Content
{
    public string $typeDefinition = "Relewise.Client.DataTypes.Content, Relewise.Client";
    public string $id;
    public ?Multilingual $displayName;
    public ?array $categoryPaths;
    public ?array $assortments;
    public ?array $data;
    public static function create(string $id) : Content
    {
        $result = new Content();
        $result->id = $id;
        return $result;
    }
    public static function hydrate(array $arr) : Content
    {
        $result = new Content();
        if (array_key_exists("id", $arr))
        {
            $result->id = $arr["id"];
        }
        if (array_key_exists("displayName", $arr))
        {
            $result->displayName = Multilingual::hydrate($arr["displayName"]);
        }
        if (array_key_exists("categoryPaths", $arr))
        {
            $result->categoryPaths = array();
            foreach($arr["categoryPaths"] as &$value)
            {
                array_push($result->categoryPaths, CategoryPath::hydrate($value));
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
    function setId(string $id)
    {
        $this->id = $id;
        return $this;
    }
    function setDisplayName(?Multilingual $displayName)
    {
        $this->displayName = $displayName;
        return $this;
    }
    function setCategoryPaths(CategoryPath ... $categoryPaths)
    {
        $this->categoryPaths = $categoryPaths;
        return $this;
    }
    /**
     * Sets categoryPaths to a new value from an array.
     * @param ?CategoryPath[] $categoryPaths new value.
     */
    function setCategoryPathsFromArray(array $categoryPaths)
    {
        $this->categoryPaths = $categoryPaths;
        return $this;
    }
    /**
     * Adds a new element to categoryPaths.
     * @param CategoryPath $categoryPaths new element.
     */
    function addToCategoryPaths(CategoryPath $categoryPaths)
    {
        if (!isset($this->categoryPaths))
        {
            $this->categoryPaths = array();
        }
        array_push($this->categoryPaths, $categoryPaths);
        return $this;
    }
    function setAssortments(int ... $assortments)
    {
        $this->assortments = $assortments;
        return $this;
    }
    /**
     * Sets assortments to a new value from an array.
     * @param ?int[] $assortments new value.
     */
    function setAssortmentsFromArray(array $assortments)
    {
        $this->assortments = $assortments;
        return $this;
    }
    /**
     * Adds a new element to assortments.
     * @param int $assortments new element.
     */
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
    /**
     * Sets data to a new value.
     * @param ?array<string, DataValue> $data associative array.
     */
    function setDataFromAssociativeArray(array $data)
    {
        $this->data = $data;
        return $this;
    }
}
