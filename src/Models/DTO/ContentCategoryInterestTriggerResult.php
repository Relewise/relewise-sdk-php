<?php declare(strict_types=1);

namespace Relewise\Models\DTO;

use DateTime;

class ContentCategoryInterestTriggerResult
{
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
    function withUser(UserResultDetails $user)
    {
        $this->user = $user;
        return $this;
    }
    function withCategories(ContentCategoryInterestTriggerResultCategory ... $categories)
    {
        $this->categories = $categories;
        return $this;
    }
}
