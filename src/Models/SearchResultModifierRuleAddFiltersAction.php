<?php declare(strict_types=1);

namespace Relewise\Models;

class SearchResultModifierRuleAddFiltersAction extends SearchResultModifierRuleRuleAction
{
    public string $typeDefinition = "Relewise.Client.DataTypes.Search.Rules.SearchResultModifierRule+AddFiltersAction, Relewise.Client";
    public FilterCollection $filters;
    public static function create(FilterCollection $filters) : SearchResultModifierRuleAddFiltersAction
    {
        $result = new SearchResultModifierRuleAddFiltersAction();
        $result->filters = $filters;
        return $result;
    }
    public static function hydrate(array $arr) : SearchResultModifierRuleAddFiltersAction
    {
        $result = SearchResultModifierRuleRuleAction::hydrateBase(new SearchResultModifierRuleAddFiltersAction(), $arr);
        if (array_key_exists("filters", $arr))
        {
            $result->filters = FilterCollection::hydrate($arr["filters"]);
        }
        return $result;
    }
    
    function setFilters(FilterCollection $filters)
    {
        $this->filters = $filters;
        return $this;
    }
}
