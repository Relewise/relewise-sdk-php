<?php declare(strict_types=1);

namespace Relewise\Models;

/** Shapes 'highlighting' result, allows to present data in various shapes. Offsets hosts 'highlighted' data key, with indices matches associated. Snippets hosts 'highlighted' data key, with a few words around matched text. */
class HighlightResult
{
    /** Represents matches as offsets should Shape.IncludeOffsets be requested by client. */
    public ?HighlightResultOffset $offsets;
    /** Represents matches as offsets should Shape.IncludeTextSnippets be requested by client. */
    public ?HighlightResultSnippet $snippets;
    
    public static function create() : HighlightResult
    {
        $result = new HighlightResult();
        return $result;
    }
    
    public static function hydrate(array $arr) : HighlightResult
    {
        $result = new HighlightResult();
        if (array_key_exists("offsets", $arr))
        {
            $result->offsets = HighlightResultOffset::hydrate($arr["offsets"]);
        }
        if (array_key_exists("snippets", $arr))
        {
            $result->snippets = HighlightResultSnippet::hydrate($arr["snippets"]);
        }
        return $result;
    }
    
    /** Represents matches as offsets should Shape.IncludeOffsets be requested by client. */
    function setOffsets(?HighlightResultOffset $offsets)
    {
        $this->offsets = $offsets;
        return $this;
    }
    
    /** Represents matches as offsets should Shape.IncludeTextSnippets be requested by client. */
    function setSnippets(?HighlightResultSnippet $snippets)
    {
        $this->snippets = $snippets;
        return $this;
    }
}
