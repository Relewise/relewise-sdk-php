<?php declare(strict_types=1);

namespace Relewise\Models;

use DateTime;

/**
 * Marks feed source for products.
 * This is actually an interface.
 */
abstract class IProductFeedSource
{
    
    public static function hydrate(array $arr)
    {
        $type = $arr["\$type"];
        if ($type=="Relewise.Client.DataTypes.Feed.Sources.ProductByProductIdFromContentDataFeedSource, Relewise.Client")
        {
            return ProductByProductIdFromContentDataFeedSource::hydrate($arr);
        }
        if ($type=="Relewise.Client.DataTypes.Feed.Sources.ProductByPurchasePopularityFeedSource, Relewise.Client")
        {
            return ProductByPurchasePopularityFeedSource::hydrate($arr);
        }
        if ($type=="Relewise.Client.DataTypes.Feed.Sources.ProductByViewPopularityFeedSource, Relewise.Client")
        {
            return ProductByViewPopularityFeedSource::hydrate($arr);
        }
        if ($type=="Relewise.Client.DataTypes.Feed.Sources.ProductsPurchasedWithProductSeedFeedSource, Relewise.Client")
        {
            return ProductsPurchasedWithProductSeedFeedSource::hydrate($arr);
        }
        if ($type=="Relewise.Client.DataTypes.Feed.Sources.ProductsViewedAfterContentSeedFeedSource, Relewise.Client")
        {
            return ProductsViewedAfterContentSeedFeedSource::hydrate($arr);
        }
        if ($type=="Relewise.Client.DataTypes.Feed.Sources.ProductsViewedAfterProductSeedFeedSource, Relewise.Client")
        {
            return ProductsViewedAfterProductSeedFeedSource::hydrate($arr);
        }
    }
    
    public static function hydrateBase(mixed $result, array $arr)
    {
        return $result;
    }
}
