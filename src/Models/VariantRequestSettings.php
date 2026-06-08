<?php declare(strict_types=1);

namespace Relewise\Models;

/** Request-level controls for how many variants may be returned per product and how those variants should be ordered. */
abstract class VariantRequestSettings
{
    public string $typeDefinition = "";
    /** The maximum number of variants that may be returned for a single product. A value of 0 means product-only output. */
    public ?int $maxVariantsPerProduct;
    /** The preferred sorting strategy for variants when more than one variant per product is allowed. When omitted, the effective sorting is chosen by the engine. */
    public ?VariantSorting $sorting;
    
    
    public static function hydrate(array $arr)
    {
        $type = $arr["\$type"];
        if ($type=="Relewise.Client.Requests.Search.Settings.VariantSearchRequestSettings, Relewise.Client")
        {
            return VariantSearchRequestSettings::hydrate($arr);
        }
        if ($type=="Relewise.Client.Requests.Recommendations.VariantRecommendationRequestSettings, Relewise.Client")
        {
            return VariantRecommendationRequestSettings::hydrate($arr);
        }
    }
    
    public static function hydrateBase(mixed $result, array $arr)
    {
        if (array_key_exists("maxVariantsPerProduct", $arr))
        {
            $result->maxVariantsPerProduct = $arr["maxVariantsPerProduct"];
        }
        if (array_key_exists("sorting", $arr))
        {
            $result->sorting = VariantSorting::from($arr["sorting"]);
        }
        return $result;
    }
    
    /** The maximum number of variants that may be returned for a single product. A value of 0 means product-only output. */
    function setMaxVariantsPerProduct(?int $maxVariantsPerProduct)
    {
        $this->maxVariantsPerProduct = $maxVariantsPerProduct;
        return $this;
    }
    
    /** The preferred sorting strategy for variants when more than one variant per product is allowed. When omitted, the effective sorting is chosen by the engine. */
    function setSorting(?VariantSorting $sorting)
    {
        $this->sorting = $sorting;
        return $this;
    }
}
