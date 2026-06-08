<?php declare(strict_types=1);

namespace Relewise\Models;

/** Explains why the selected Variant was returned for a product search result. */
class VariantResolutionInfo
{
    /** Describes the selection path that caused the variant to be returned. */
    public VariantResolutionSource $source;
    
    public static function create() : VariantResolutionInfo
    {
        $result = new VariantResolutionInfo();
        return $result;
    }
    
    public static function hydrate(array $arr) : VariantResolutionInfo
    {
        $result = new VariantResolutionInfo();
        if (array_key_exists("source", $arr))
        {
            $result->source = VariantResolutionSource::from($arr["source"]);
        }
        return $result;
    }
    
    /** Describes the selection path that caused the variant to be returned. */
    function setSource(VariantResolutionSource $source)
    {
        $this->source = $source;
        return $this;
    }
}
