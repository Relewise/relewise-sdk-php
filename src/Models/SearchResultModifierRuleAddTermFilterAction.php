<?php declare(strict_types=1);

namespace Relewise\Models;

class SearchResultModifierRuleAddTermFilterAction extends SearchResultModifierRuleRuleAction
{
    public string $typeDefinition = "Relewise.Client.DataTypes.Search.Rules.SearchResultModifierRule+AddTermFilterAction, Relewise.Client";
    public string $term;
    
    public bool $negated;
    
    public static function create(string $term, bool $negated) : SearchResultModifierRuleAddTermFilterAction
    {
        $result = new SearchResultModifierRuleAddTermFilterAction();
        $result->term = $term;
        $result->negated = $negated;
        return $result;
    }
    
    public static function hydrate(array $arr) : SearchResultModifierRuleAddTermFilterAction
    {
        $result = SearchResultModifierRuleRuleAction::hydrateBase(new SearchResultModifierRuleAddTermFilterAction(), $arr);
        if (array_key_exists("term", $arr))
        {
            $result->term = $arr["term"];
        }
        if (array_key_exists("negated", $arr))
        {
            $result->negated = $arr["negated"];
        }
        return $result;
    }
    
    function setTerm(string $term)
    {
        $this->term = $term;
        return $this;
    }
    
    function setNegated(bool $negated)
    {
        $this->negated = $negated;
        return $this;
    }
}
