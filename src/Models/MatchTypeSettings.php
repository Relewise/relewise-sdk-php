<?php declare(strict_types=1);

namespace Relewise\Models;

class MatchTypeSettings
{
    public bool $compound;
    public bool $exact;
    public bool $startsWith;
    public bool $endsWith;
    public bool $fuzzy;
    public static function create() : MatchTypeSettings
    {
        $result = new MatchTypeSettings();
        return $result;
    }
    public static function hydrate(array $arr) : MatchTypeSettings
    {
        $result = new MatchTypeSettings();
        if (array_key_exists("compound", $arr))
        {
            $result->compound = $arr["compound"];
        }
        if (array_key_exists("exact", $arr))
        {
            $result->exact = $arr["exact"];
        }
        if (array_key_exists("startsWith", $arr))
        {
            $result->startsWith = $arr["startsWith"];
        }
        if (array_key_exists("endsWith", $arr))
        {
            $result->endsWith = $arr["endsWith"];
        }
        if (array_key_exists("fuzzy", $arr))
        {
            $result->fuzzy = $arr["fuzzy"];
        }
        return $result;
    }
    
    function setCompound(bool $compound)
    {
        $this->compound = $compound;
        return $this;
    }
    
    function setExact(bool $exact)
    {
        $this->exact = $exact;
        return $this;
    }
    
    function setStartsWith(bool $startsWith)
    {
        $this->startsWith = $startsWith;
        return $this;
    }
    
    function setEndsWith(bool $endsWith)
    {
        $this->endsWith = $endsWith;
        return $this;
    }
    
    function setFuzzy(bool $fuzzy)
    {
        $this->fuzzy = $fuzzy;
        return $this;
    }
}
