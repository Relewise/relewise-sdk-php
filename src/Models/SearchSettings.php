<?php declare(strict_types=1);

namespace Relewise\Models;

use DateTime;

abstract class SearchSettings
{
    public string $typeDefinition = "Relewise.Client.Requests.Search.Settings.SearchSettings, Relewise.Client";
    public static function hydrate(array $arr)
    {
        $type = $arr["\$type"];
        if ($type=="Relewise.Client.Requests.Search.Settings.ContentCategorySearchSettings, Relewise.Client")
        {
            return ContentCategorySearchSettings::hydrate($arr);
        }
        if ($type=="Relewise.Client.Requests.Search.Settings.ContentSearchSettings, Relewise.Client")
        {
            return ContentSearchSettings::hydrate($arr);
        }
        if ($type=="Relewise.Client.Requests.Search.Settings.ProductCategorySearchSettings, Relewise.Client")
        {
            return ProductCategorySearchSettings::hydrate($arr);
        }
        if ($type=="Relewise.Client.Requests.Search.Settings.ProductSearchSettings, Relewise.Client")
        {
            return ProductSearchSettings::hydrate($arr);
        }
        if ($type=="Relewise.Client.Requests.Search.Settings.SearchTermPredictionSettings, Relewise.Client")
        {
            return SearchTermPredictionSettings::hydrate($arr);
        }
    }
    public static function hydrateBase(mixed $result, array $arr)
    {
        return $result;
    }
}
