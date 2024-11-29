<?php declare(strict_types=1);

namespace Relewise\Models;

/** Shapes 'highlighting' result, allows to present data in various shapes. Offsets hosts 'highlighted' data key, with indices matches associated. */
class HighlightResult
{
    /** Represents matches as offsets should IncludeOffsets be requested by client. */
    public ?HighlightResultOffset $offsets;
    
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
        return $result;
    }
    
    /** Represents matches as offsets should IncludeOffsets be requested by client. */
    function setOffsets(?HighlightResultOffset $offsets)
    {
        $this->offsets = $offsets;
        return $this;
    }
}
