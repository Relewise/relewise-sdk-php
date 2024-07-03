<?php declare(strict_types=1);

namespace Relewise\Models;

abstract class SearchTermModifierRuleRuleAction
{
    public string $typeDefinition = "";
    public static function hydrate(array $arr)
    {
        $type = $arr["\$type"];
        if ($type=="Relewise.Client.DataTypes.Search.Rules.SearchTermModifierRule+AppendToTermAction, Relewise.Client")
        {
            return SearchTermModifierRuleAppendToTermAction::hydrate($arr);
        }
        if ($type=="Relewise.Client.DataTypes.Search.Rules.SearchTermModifierRule+RemoveFromTermAction, Relewise.Client")
        {
            return SearchTermModifierRuleRemoveFromTermAction::hydrate($arr);
        }
        if ($type=="Relewise.Client.DataTypes.Search.Rules.SearchTermModifierRule+ReplaceTermAction, Relewise.Client")
        {
            return SearchTermModifierRuleReplaceTermAction::hydrate($arr);
        }
        if ($type=="Relewise.Client.DataTypes.Search.Rules.SearchTermModifierRule+ReplaceWordsInTermAction, Relewise.Client")
        {
            return SearchTermModifierRuleReplaceWordsInTermAction::hydrate($arr);
        }
    }
    public static function hydrateBase(mixed $result, array $arr)
    {
        return $result;
    }
}
