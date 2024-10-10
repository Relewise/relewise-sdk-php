<?php declare(strict_types=1);

namespace Relewise\Models;

class SearchRuleFilters
{
    public ?string $term;
    public ?bool $approved;
    public ?string $id;
    public static function create(?string $term, ?bool $approved) : SearchRuleFilters
    {
        $result = new SearchRuleFilters();
        $result->term = $term;
        $result->approved = $approved;
        return $result;
    }
    
    public static function hydrate(array $arr) : SearchRuleFilters
    {
        $result = new SearchRuleFilters();
        if (array_key_exists("term", $arr))
        {
            $result->term = $arr["term"];
        }
        if (array_key_exists("approved", $arr))
        {
            $result->approved = $arr["approved"];
        }
        if (array_key_exists("id", $arr))
        {
            $result->id = $arr["id"];
        }
        return $result;
    }
    
    function setTerm(?string $term)
    {
        $this->term = $term;
        return $this;
    }
    
    function setApproved(?bool $approved)
    {
        $this->approved = $approved;
        return $this;
    }
    
    function setId(?string $id)
    {
        $this->id = $id;
        return $this;
    }
}
