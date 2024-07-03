<?php declare(strict_types=1);

namespace Relewise\Models;

abstract class SearchResultModifierRuleRuleAction
{
    public string $typeDefinition = "Relewise.Client.DataTypes.Search.Rules.SearchResultModifierRule+RuleAction, Relewise.Client";
    public static function hydrate(array $arr)
    {
        $type = $arr["\$type"];
        if ($type=="Relewise.Client.DataTypes.Search.Rules.SearchResultModifierRule+AddFiltersAction, Relewise.Client")
        {
            return SearchResultModifierRuleAddFiltersAction::hydrate($arr);
        }
        if ($type=="Relewise.Client.DataTypes.Search.Rules.SearchResultModifierRule+AddTermFilterAction, Relewise.Client")
        {
            return SearchResultModifierRuleAddTermFilterAction::hydrate($arr);
        }
    }
    public static function hydrateBase(mixed $result, array $arr)
    {
        return $result;
    }
}
