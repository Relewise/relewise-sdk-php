<?php declare(strict_types=1);

namespace Relewise\Models\DTO;

use DateTime;

class PredictionRule extends SearchRule
{
    public string $typeDefinition = "Relewise.Client.DataTypes.Search.Configuration.SearchRules.PredictionRule, Relewise.Client";
    public SearchTermCondition $condition;
    public PredictionRulePromotion $promote;
    public PredictionRuleSuppression $suppress;
    public static function create(string $id, ?ApplicableIndexes $indexes, ?ApplicableLanguages $languages, bool $isApproved, SearchTermCondition $condition) : PredictionRule
    {
        $result = new PredictionRule();
        $result->id = $id;
        $result->indexes = $indexes;
        $result->languages = $languages;
        $result->isApproved = $isApproved;
        $result->condition = $condition;
        return $result;
    }
    public static function hydrate(array $arr) : PredictionRule
    {
        $result = SearchRule::hydrateBase(new PredictionRule(), $arr);
        if (array_key_exists("condition", $arr))
        {
            $result->condition = SearchTermCondition::hydrate($arr["condition"]);
        }
        if (array_key_exists("promote", $arr))
        {
            $result->promote = PredictionRulePromotion::hydrate($arr["promote"]);
        }
        if (array_key_exists("suppress", $arr))
        {
            $result->suppress = PredictionRuleSuppression::hydrate($arr["suppress"]);
        }
        return $result;
    }
    function withCondition(SearchTermCondition $condition)
    {
        $this->condition = $condition;
        return $this;
    }
    function withPromote(PredictionRulePromotion $promote)
    {
        $this->promote = $promote;
        return $this;
    }
    function withSuppress(PredictionRuleSuppression $suppress)
    {
        $this->suppress = $suppress;
        return $this;
    }
    function withId(string $id)
    {
        $this->id = $id;
        return $this;
    }
    function withIndexes(?ApplicableIndexes $indexes)
    {
        $this->indexes = $indexes;
        return $this;
    }
    function withLanguages(?ApplicableLanguages $languages)
    {
        $this->languages = $languages;
        return $this;
    }
    function withCreated(DateTime $created)
    {
        $this->created = $created;
        return $this;
    }
    function withCreatedBy(string $createdBy)
    {
        $this->createdBy = $createdBy;
        return $this;
    }
    function withModified(DateTime $modified)
    {
        $this->modified = $modified;
        return $this;
    }
    function withModifiedBy(string $modifiedBy)
    {
        $this->modifiedBy = $modifiedBy;
        return $this;
    }
    function withApproved(?DateTime $approved)
    {
        $this->approved = $approved;
        return $this;
    }
    function withApprovedBy(string $approvedBy)
    {
        $this->approvedBy = $approvedBy;
        return $this;
    }
    function withIsApproved(bool $isApproved)
    {
        $this->isApproved = $isApproved;
        return $this;
    }
}
