<?php declare(strict_types=1);

namespace Relewise\Models;

/** Limits for highlighting. */
class ContentContentHighlightPropsHighlightSettingsLimits
{
    /** How many entries from search result to process? */
    public ?int $maxEntryLimit;
    /** How many snippets to return per matched search result across all fields? */
    public ?int $maxSnippetsPerEntry;
    /** How many snippets to return per matched search result single field? */
    public ?int $maxSnippetsPerField;
    
    public static function create() : ContentContentHighlightPropsHighlightSettingsLimits
    {
        $result = new ContentContentHighlightPropsHighlightSettingsLimits();
        return $result;
    }
    
    public static function hydrate(array $arr) : ContentContentHighlightPropsHighlightSettingsLimits
    {
        $result = new ContentContentHighlightPropsHighlightSettingsLimits();
        if (array_key_exists("maxEntryLimit", $arr))
        {
            $result->maxEntryLimit = $arr["maxEntryLimit"];
        }
        if (array_key_exists("maxSnippetsPerEntry", $arr))
        {
            $result->maxSnippetsPerEntry = $arr["maxSnippetsPerEntry"];
        }
        if (array_key_exists("maxSnippetsPerField", $arr))
        {
            $result->maxSnippetsPerField = $arr["maxSnippetsPerField"];
        }
        return $result;
    }
    
    /** How many entries from search result to process? */
    function setMaxEntryLimit(?int $maxEntryLimit)
    {
        $this->maxEntryLimit = $maxEntryLimit;
        return $this;
    }
    
    /** How many snippets to return per matched search result across all fields? */
    function setMaxSnippetsPerEntry(?int $maxSnippetsPerEntry)
    {
        $this->maxSnippetsPerEntry = $maxSnippetsPerEntry;
        return $this;
    }
    
    /** How many snippets to return per matched search result single field? */
    function setMaxSnippetsPerField(?int $maxSnippetsPerField)
    {
        $this->maxSnippetsPerField = $maxSnippetsPerField;
        return $this;
    }
}
