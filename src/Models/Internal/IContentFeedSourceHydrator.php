<?php declare(strict_types=1);

namespace Relewise\Models\Internal;

use Relewise\Models;

/**
 * Marks feed source for content.
 * Hydrator helper for this interface.
 */
class IContentFeedSourceHydrator
{
    
    public static function hydrate(array $arr)
    {
        $type = $arr["\$type"];
        if ($type=="Relewise.Client.DataTypes.Feed.Sources.ContentByOverlappingDataValuesWithContentSeedFeedSource, Relewise.Client")
        {
            return Models\ContentByOverlappingDataValuesWithContentSeedFeedSource::hydrate($arr);
        }
        if ($type=="Relewise.Client.DataTypes.Feed.Sources.ContentByPopularityFeedSource, Relewise.Client")
        {
            return Models\ContentByPopularityFeedSource::hydrate($arr);
        }
        if ($type=="Relewise.Client.DataTypes.Feed.Sources.ContentByProductPopularityOfProductIdFromContentDataFeedSource, Relewise.Client")
        {
            return Models\ContentByProductPopularityOfProductIdFromContentDataFeedSource::hydrate($arr);
        }
        if ($type=="Relewise.Client.DataTypes.Feed.Sources.ContentsViewedAfterContentSeedFeedSource, Relewise.Client")
        {
            return Models\ContentsViewedAfterContentSeedFeedSource::hydrate($arr);
        }
        if ($type=="Relewise.Client.DataTypes.Feed.Sources.ContentsViewedAfterProductSeedFeedSource, Relewise.Client")
        {
            return Models\ContentsViewedAfterProductSeedFeedSource::hydrate($arr);
        }
    }
    
    public static function hydrateBase(mixed $result, array $arr)
    {
        return $result;
    }
}
