<?php declare(strict_types=1);

namespace Relewise\Models\Internal;

use Relewise\Models;

/** Hydrator helper for this interface. */
class ITriggerResultHydrator
{
    
    public static function hydrate(array $arr)
    {
        $type = $arr["\$type"];
        if ($type=="Relewise.Client.Responses.Triggers.Results.AbandonedCartTriggerResult, Relewise.Client")
        {
            return Models\AbandonedCartTriggerResult::hydrate($arr);
        }
        if ($type=="Relewise.Client.Responses.Triggers.Results.AbandonedSearchTriggerResult, Relewise.Client")
        {
            return Models\AbandonedSearchTriggerResult::hydrate($arr);
        }
        if ($type=="Relewise.Client.Responses.Triggers.Results.ContentCategoryInterestTriggerResult, Relewise.Client")
        {
            return Models\ContentCategoryInterestTriggerResult::hydrate($arr);
        }
        if ($type=="Relewise.Client.Responses.Triggers.Results.ProductCategoryInterestTriggerResult, Relewise.Client")
        {
            return Models\ProductCategoryInterestTriggerResult::hydrate($arr);
        }
        if ($type=="Relewise.Client.Responses.Triggers.Results.ProductChangeTriggerResult, Relewise.Client")
        {
            return Models\ProductChangeTriggerResult::hydrate($arr);
        }
        if ($type=="Relewise.Client.Responses.Triggers.Results.ProductInterestTriggerResult, Relewise.Client")
        {
            return Models\ProductInterestTriggerResult::hydrate($arr);
        }
        if ($type=="Relewise.Client.Responses.Triggers.Results.UserActivityTriggerResult, Relewise.Client")
        {
            return Models\UserActivityTriggerResult::hydrate($arr);
        }
        if ($type=="Relewise.Client.Responses.Triggers.Results.VariantChangeTriggerResult, Relewise.Client")
        {
            return Models\VariantChangeTriggerResult::hydrate($arr);
        }
    }
    
    public static function hydrateBase(mixed $result, array $arr)
    {
        return $result;
    }
}
