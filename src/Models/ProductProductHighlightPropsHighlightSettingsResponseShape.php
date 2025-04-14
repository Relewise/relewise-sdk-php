<?php declare(strict_types=1);

namespace Relewise\Models;

/** Indicates how the highlight result should be shaped or presented. */
class ProductProductHighlightPropsHighlightSettingsResponseShape
{
    /** Whether to return match positions (offsets) within fields. */
    public ?ProductProductHighlightPropsHighlightSettingsOffsetSettings $offsets;
    /** Controls whether to return context-based text snippets; can include further snippet configuration. */
    public ?ProductProductHighlightPropsHighlightSettingsSnippetsSettings $snippets;
    
    public static function create() : ProductProductHighlightPropsHighlightSettingsResponseShape
    {
        $result = new ProductProductHighlightPropsHighlightSettingsResponseShape();
        return $result;
    }
    
    public static function hydrate(array $arr) : ProductProductHighlightPropsHighlightSettingsResponseShape
    {
        $result = new ProductProductHighlightPropsHighlightSettingsResponseShape();
        if (array_key_exists("offsets", $arr))
        {
            $result->offsets = ProductProductHighlightPropsHighlightSettingsOffsetSettings::hydrate($arr["offsets"]);
        }
        if (array_key_exists("snippets", $arr))
        {
            $result->snippets = ProductProductHighlightPropsHighlightSettingsSnippetsSettings::hydrate($arr["snippets"]);
        }
        return $result;
    }
    
    /** Whether to return match positions (offsets) within fields. */
    function setOffsets(?ProductProductHighlightPropsHighlightSettingsOffsetSettings $offsets)
    {
        $this->offsets = $offsets;
        return $this;
    }
    
    /** Controls whether to return context-based text snippets; can include further snippet configuration. */
    function setSnippets(?ProductProductHighlightPropsHighlightSettingsSnippetsSettings $snippets)
    {
        $this->snippets = $snippets;
        return $this;
    }
}
