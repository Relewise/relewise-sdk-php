<?php declare(strict_types=1);

namespace Relewise\Models;

/** Encapsulates how search highlighting is to work. */
class ProductProductHighlightPropsHighlightSettings
{
    /** If highlighting is enabled for search query. */
    public bool $enabled;
    /** The limits, f.e. how many result hits to process, how many 'snippets' to produce per-field/per-entry. */
    public ProductProductHighlightPropsHighlightSettingsLimits $limit;
    /** The properties to include in highlight. */
    public ProductHighlightProps $highlightable;
    /** The way highlights to be returned. Should it be indices of matches, or matched text with a few words around? */
    public ProductProductHighlightPropsHighlightSettingsResponseShape $shape;
    
    public static function create() : ProductProductHighlightPropsHighlightSettings
    {
        $result = new ProductProductHighlightPropsHighlightSettings();
        return $result;
    }
    
    public static function hydrate(array $arr) : ProductProductHighlightPropsHighlightSettings
    {
        $result = new ProductProductHighlightPropsHighlightSettings();
        if (array_key_exists("enabled", $arr))
        {
            $result->enabled = $arr["enabled"];
        }
        if (array_key_exists("limit", $arr))
        {
            $result->limit = ProductProductHighlightPropsHighlightSettingsLimits::hydrate($arr["limit"]);
        }
        if (array_key_exists("highlightable", $arr))
        {
            $result->highlightable = ProductHighlightProps::hydrate($arr["highlightable"]);
        }
        if (array_key_exists("shape", $arr))
        {
            $result->shape = ProductProductHighlightPropsHighlightSettingsResponseShape::hydrate($arr["shape"]);
        }
        return $result;
    }
    
    /** If highlighting is enabled for search query. */
    function setEnabled(bool $enabled)
    {
        $this->enabled = $enabled;
        return $this;
    }
    
    /** The limits, f.e. how many result hits to process, how many 'snippets' to produce per-field/per-entry. */
    function setLimit(ProductProductHighlightPropsHighlightSettingsLimits $limit)
    {
        $this->limit = $limit;
        return $this;
    }
    
    /** The properties to include in highlight. */
    function setHighlightable(ProductHighlightProps $highlightable)
    {
        $this->highlightable = $highlightable;
        return $this;
    }
    
    /** The way highlights to be returned. Should it be indices of matches, or matched text with a few words around? */
    function setShape(ProductProductHighlightPropsHighlightSettingsResponseShape $shape)
    {
        $this->shape = $shape;
        return $this;
    }
}
