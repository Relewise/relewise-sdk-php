<?php declare(strict_types=1);

namespace Relewise\Models\DTO;

use DateTime;

class ProductCategoryInterestTriggerResult
{
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
    function withUser(UserResultDetails $user)
    {
        $this->user = $user;
        return $this;
    }
    function withCategories(ProductCategoryInterestTriggerResultCategory ... $categories)
    {
        $this->categories = $categories;
        return $this;
    }
}
