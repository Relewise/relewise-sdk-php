<?php declare(strict_types=1);

namespace Relewise\Models;

use DateTime;

class ProductCategoryInterestTriggerResult
{
    public string $typeDefinition = "Relewise.Client.Responses.Triggers.Results.ProductCategoryInterestTriggerResult, Relewise.Client";
    public UserResultDetails $user;
    public array $categories;
    public static function create() : ProductCategoryInterestTriggerResult
    {
        $result = new ProductCategoryInterestTriggerResult();
        return $result;
    }
    public static function hydrate(array $arr) : ProductCategoryInterestTriggerResult
    {
        $result = new ProductCategoryInterestTriggerResult();
        if (array_key_exists("user", $arr))
        {
            $result->user = UserResultDetails::hydrate($arr["user"]);
        }
        if (array_key_exists("categories", $arr))
        {
            $result->categories = array();
            foreach($arr["categories"] as &$value)
            {
                array_push($result->categories, ProductCategoryInterestTriggerResultCategory::hydrate($value));
            }
        }
        return $result;
    }
    /**
     * Sets user to a new value.
     * @param UserResultDetails $user new value.
     */
    function setUser(UserResultDetails $user)
    {
        $this->user = $user;
        return $this;
    }
    /**
     * Sets categories to a new value.
     * @param ProductCategoryInterestTriggerResultCategory[] $categories new value.
     */
    function setCategories(ProductCategoryInterestTriggerResultCategory ... $categories)
    {
        $this->categories = $categories;
        return $this;
    }
    /**
     * Sets categories to a new value from an array.
     * @param ProductCategoryInterestTriggerResultCategory[] $categories new value.
     */
    function setCategoriesFromArray(array $categories)
    {
        $this->categories = $categories;
        return $this;
    }
    /**
     * Adds a new element to categories.
     * @param ProductCategoryInterestTriggerResultCategory $categories new element.
     */
    function addToCategories(ProductCategoryInterestTriggerResultCategory $categories)
    {
        if (!isset($this->categories))
        {
            $this->categories = array();
        }
        array_push($this->categories, $categories);
        return $this;
    }
}
