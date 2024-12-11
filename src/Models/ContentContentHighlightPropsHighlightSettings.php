<?php declare(strict_types=1);

namespace Relewise\Models;

/** Encapsulates how search highlighting is to work. */
class ContentContentHighlightPropsHighlightSettings
{
    /** If highlighting is enabled for search query. */
    public bool $enabled;
    /** The limits, f.e. how many result hits to process, how many 'snippets' to produce per-field/per-entry. */
    public ContentContentHighlightPropsHighlightSettingsLimits $limit;
    /** The properties to include in highlight. */
    public ContentHighlightProps $highlightable;
    /** The way highlights to be returned. Should it be indices of matches, or matched text with a few words around? */
    public ContentContentHighlightPropsHighlightSettingsResponseShape $shape;
    
    public static function create() : ContentContentHighlightPropsHighlightSettings
    {
        $result = new ContentContentHighlightPropsHighlightSettings();
        return $result;
    }
    
    public static function hydrate(array $arr) : ContentContentHighlightPropsHighlightSettings
    {
        $result = new ContentContentHighlightPropsHighlightSettings();
        if (array_key_exists("enabled", $arr))
        {
            $result->enabled = $arr["enabled"];
        }
        if (array_key_exists("limit", $arr))
        {
            $result->limit = ContentContentHighlightPropsHighlightSettingsLimits::hydrate($arr["limit"]);
        }
        if (array_key_exists("highlightable", $arr))
        {
            $result->highlightable = ContentHighlightProps::hydrate($arr["highlightable"]);
        }
        if (array_key_exists("shape", $arr))
        {
            $result->shape = ContentContentHighlightPropsHighlightSettingsResponseShape::hydrate($arr["shape"]);
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
    function setLimit(ContentContentHighlightPropsHighlightSettingsLimits $limit)
    {
        $this->limit = $limit;
        return $this;
    }
    
    /** The properties to include in highlight. */
    function setHighlightable(ContentHighlightProps $highlightable)
    {
        $this->highlightable = $highlightable;
        return $this;
    }
    
    /** The way highlights to be returned. Should it be indices of matches, or matched text with a few words around? */
    function setShape(ContentContentHighlightPropsHighlightSettingsResponseShape $shape)
    {
        $this->shape = $shape;
        return $this;
    }
}
