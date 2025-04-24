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
    /** How many words to include prior matched highlight? */
    public ?int $maxWordsBeforeMatch;
    /** How many words to include after matched highlight? If MaxSentencesToIncludeAfterMatch is specified, both limitation shall be applied. Use-case: include 25 words (avg. sentence length), but not further than one sentence. For more broader contexts, few sentences can be desirable. */
    public ?int $maxWordsAfterMatch;
    /** How many sentences to include prior matched highlight? If no value provided, the MaxWordsBeforeMatch will be solely used. */
    public ?int $maxSentencesToIncludeBeforeMatch;
    /** How many sentences to include after matched highlight? If no value provided, the MaxWordsAfterMatch will be solely used. */
    public ?int $maxSentencesToIncludeAfterMatch;
    
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
        if (array_key_exists("maxWordsBeforeMatch", $arr))
        {
            $result->maxWordsBeforeMatch = $arr["maxWordsBeforeMatch"];
        }
        if (array_key_exists("maxWordsAfterMatch", $arr))
        {
            $result->maxWordsAfterMatch = $arr["maxWordsAfterMatch"];
        }
        if (array_key_exists("maxSentencesToIncludeBeforeMatch", $arr))
        {
            $result->maxSentencesToIncludeBeforeMatch = $arr["maxSentencesToIncludeBeforeMatch"];
        }
        if (array_key_exists("maxSentencesToIncludeAfterMatch", $arr))
        {
            $result->maxSentencesToIncludeAfterMatch = $arr["maxSentencesToIncludeAfterMatch"];
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
    
    /** How many words to include prior matched highlight? */
    function setMaxWordsBeforeMatch(?int $maxWordsBeforeMatch)
    {
        $this->maxWordsBeforeMatch = $maxWordsBeforeMatch;
        return $this;
    }
    
    /** How many words to include after matched highlight? If MaxSentencesToIncludeAfterMatch is specified, both limitation shall be applied. Use-case: include 25 words (avg. sentence length), but not further than one sentence. For more broader contexts, few sentences can be desirable. */
    function setMaxWordsAfterMatch(?int $maxWordsAfterMatch)
    {
        $this->maxWordsAfterMatch = $maxWordsAfterMatch;
        return $this;
    }
    
    /** How many sentences to include prior matched highlight? If no value provided, the MaxWordsBeforeMatch will be solely used. */
    function setMaxSentencesToIncludeBeforeMatch(?int $maxSentencesToIncludeBeforeMatch)
    {
        $this->maxSentencesToIncludeBeforeMatch = $maxSentencesToIncludeBeforeMatch;
        return $this;
    }
    
    /** How many sentences to include after matched highlight? If no value provided, the MaxWordsAfterMatch will be solely used. */
    function setMaxSentencesToIncludeAfterMatch(?int $maxSentencesToIncludeAfterMatch)
    {
        $this->maxSentencesToIncludeAfterMatch = $maxSentencesToIncludeAfterMatch;
        return $this;
    }
}
