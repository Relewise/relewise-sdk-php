<?php declare(strict_types=1);

namespace Relewise\Models;

class ProductProductHighlightPropsHighlightSettingsResponseShape
{
    /** If highlights should be presented as offsets/indices within inspected data values. */
    public bool $includeOffsets;
    
    public static function create() : ProductProductHighlightPropsHighlightSettingsResponseShape
    {
        $result = new ProductProductHighlightPropsHighlightSettingsResponseShape();
        return $result;
    }
    
    public static function hydrate(array $arr) : ProductProductHighlightPropsHighlightSettingsResponseShape
    {
        $result = new ProductProductHighlightPropsHighlightSettingsResponseShape();
        if (array_key_exists("includeOffsets", $arr))
        {
            $result->includeOffsets = $arr["includeOffsets"];
        }
        return $result;
    }
    
    /** If highlights should be presented as offsets/indices within inspected data values. */
    function setIncludeOffsets(bool $includeOffsets)
    {
        $this->includeOffsets = $includeOffsets;
        return $this;
    }
}
