<?php declare(strict_types=1);

namespace Relewise\Models;

abstract class ProductSearchResultConstraint
{
    public string $typeDefinition = "";
    
    
    public static function hydrate(array $arr)
    {
        $type = $arr["\$type"];
        if ($type=="Relewise.Client.Requests.Search.Settings.ResultMustHaveVariantConstraint, Relewise.Client")
        {
            return ResultMustHaveVariantConstraint::hydrate($arr);
        }
    }
    
    public static function hydrateBase(mixed $result, array $arr)
    {
        return $result;
    }
}
