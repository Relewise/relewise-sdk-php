<?php declare(strict_types=1);

namespace Relewise\Models;

use DateTime;

/**
 * Marks feed source for content.
 * This is actually an interface.
 */
abstract class IContentFeedSource
{
    
    public static function hydrate(array $arr)
    {
        $type = $arr["\$type"];
        if ($type=="Relewise.Client.DataTypes.Feed.Sources.ContentByOverlappingDataValuesWithContentSeedFeedSource, Relewise.Client")
        {
            return ContentByOverlappingDataValuesWithContentSeedFeedSource::hydrate($arr);
        }
        if ($type=="Relewise.Client.DataTypes.Feed.Sources.ContentByPopularityFeedSource, Relewise.Client")
        {
            return ContentByPopularityFeedSource::hydrate($arr);
        }
        if ($type=="Relewise.Client.DataTypes.Feed.Sources.ContentByProductPopularityOfProductIdFromContentDataFeedSource, Relewise.Client")
        {
            return ContentByProductPopularityOfProductIdFromContentDataFeedSource::hydrate($arr);
        }
        if ($type=="Relewise.Client.DataTypes.Feed.Sources.ContentsViewedAfterContentSeedFeedSource, Relewise.Client")
        {
            return ContentsViewedAfterContentSeedFeedSource::hydrate($arr);
        }
        if ($type=="Relewise.Client.DataTypes.Feed.Sources.ContentsViewedAfterProductSeedFeedSource, Relewise.Client")
        {
            return ContentsViewedAfterProductSeedFeedSource::hydrate($arr);
        }
    }
    
    public static function hydrateBase(mixed $result, array $arr)
    {
        return $result;
    }
}
