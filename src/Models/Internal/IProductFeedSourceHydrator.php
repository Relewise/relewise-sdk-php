<?php declare(strict_types=1);

namespace Relewise\Models\Internal;

use Relewise\Models;

/**
 * Marks feed source for products.
 * Hydrator helper for this interface.
 */
class IProductFeedSourceHydrator
{
    
    public static function hydrate(array $arr)
    {
        $type = $arr["\$type"];
        if ($type=="Relewise.Client.DataTypes.Feed.Sources.ProductByProductIdFromContentDataFeedSource, Relewise.Client")
        {
            return Models\ProductByProductIdFromContentDataFeedSource::hydrate($arr);
        }
        if ($type=="Relewise.Client.DataTypes.Feed.Sources.ProductByPurchasePopularityFeedSource, Relewise.Client")
        {
            return Models\ProductByPurchasePopularityFeedSource::hydrate($arr);
        }
        if ($type=="Relewise.Client.DataTypes.Feed.Sources.ProductByViewPopularityFeedSource, Relewise.Client")
        {
            return Models\ProductByViewPopularityFeedSource::hydrate($arr);
        }
        if ($type=="Relewise.Client.DataTypes.Feed.Sources.ProductsPurchasedWithProductSeedFeedSource, Relewise.Client")
        {
            return Models\ProductsPurchasedWithProductSeedFeedSource::hydrate($arr);
        }
        if ($type=="Relewise.Client.DataTypes.Feed.Sources.ProductsViewedAfterContentSeedFeedSource, Relewise.Client")
        {
            return Models\ProductsViewedAfterContentSeedFeedSource::hydrate($arr);
        }
        if ($type=="Relewise.Client.DataTypes.Feed.Sources.ProductsViewedAfterProductSeedFeedSource, Relewise.Client")
        {
            return Models\ProductsViewedAfterProductSeedFeedSource::hydrate($arr);
        }
    }
    
    public static function hydrateBase(mixed $result, array $arr)
    {
        return $result;
    }
}
