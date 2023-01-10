<?php declare(strict_types=1);

namespace Relewise\Models;

use DateTime;

// This is actually an interface.
abstract class ITriggerResult
{
    public static function hydrate(array $arr)
    {
        $type = $arr["\$type"];
        if ($type=="Relewise.Client.Responses.Triggers.Results.AbandonedCartTriggerResult, Relewise.Client")
        {
            return AbandonedCartTriggerResult::hydrate($arr);
        }
        if ($type=="Relewise.Client.Responses.Triggers.Results.ContentCategoryInterestTriggerResult, Relewise.Client")
        {
            return ContentCategoryInterestTriggerResult::hydrate($arr);
        }
        if ($type=="Relewise.Client.Responses.Triggers.Results.ProductCategoryInterestTriggerResult, Relewise.Client")
        {
            return ProductCategoryInterestTriggerResult::hydrate($arr);
        }
        if ($type=="Relewise.Client.Responses.Triggers.Results.ProductInterestTriggerResult, Relewise.Client")
        {
            return ProductInterestTriggerResult::hydrate($arr);
        }
        if ($type=="Relewise.Client.Responses.Triggers.Results.UserActivityTriggerResult, Relewise.Client")
        {
            return UserActivityTriggerResult::hydrate($arr);
        }
    }
    public static function hydrateBase(mixed $result, array $arr)
    {
        return $result;
    }
}
