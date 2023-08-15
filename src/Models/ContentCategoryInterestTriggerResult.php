<?php declare(strict_types=1);

namespace Relewise\Models;

use DateTime;

class ContentCategoryInterestTriggerResult
{
    public string $typeDefinition = "Relewise.Client.Responses.Triggers.Results.ContentCategoryInterestTriggerResult, Relewise.Client";
    public UserResultDetails $user;
    public array $categories;
    public static function create() : ContentCategoryInterestTriggerResult
    {
        $result = new ContentCategoryInterestTriggerResult();
        return $result;
    }
    public static function hydrate(array $arr) : ContentCategoryInterestTriggerResult
    {
        $result = new ContentCategoryInterestTriggerResult();
        if (array_key_exists("user", $arr))
        {
            $result->user = UserResultDetails::hydrate($arr["user"]);
        }
        if (array_key_exists("categories", $arr))
        {
            $result->categories = array();
            foreach($arr["categories"] as &$value)
            {
                array_push($result->categories, ContentCategoryInterestTriggerResultCategory::hydrate($value));
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
     * @param ContentCategoryInterestTriggerResultCategory[] $categories new value.
     */
    function setCategories(ContentCategoryInterestTriggerResultCategory ... $categories)
    {
        $this->categories = $categories;
        return $this;
    }
    /**
     * Sets categories to a new value from an array.
     * @param ContentCategoryInterestTriggerResultCategory[] $categories new value.
     */
    function setCategoriesFromArray(array $categories)
    {
        $this->categories = $categories;
        return $this;
    }
    /**
     * Adds a new element to categories.
     * @param ContentCategoryInterestTriggerResultCategory $categories new element.
     */
    function addToCategories(ContentCategoryInterestTriggerResultCategory $categories)
    {
        if (!isset($this->categories))
        {
            $this->categories = array();
        }
        array_push($this->categories, $categories);
        return $this;
    }
}
