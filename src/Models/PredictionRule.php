<?php declare(strict_types=1);

namespace Relewise\Models;

use DateTime;

class PredictionRule extends SearchRule
{
    public string $typeDefinition = "Relewise.Client.DataTypes.Search.Rules.PredictionRule, Relewise.Client";
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
    function setCondition(SearchTermCondition $condition)
    {
        $this->condition = $condition;
        return $this;
    }
    function setPromote(PredictionRulePromotion $promote)
    {
        $this->promote = $promote;
        return $this;
    }
    function setSuppress(PredictionRuleSuppression $suppress)
    {
        $this->suppress = $suppress;
        return $this;
    }
    function setId(string $id)
    {
        $this->id = $id;
        return $this;
    }
    function setIndexes(?ApplicableIndexes $indexes)
    {
        $this->indexes = $indexes;
        return $this;
    }
    function setLanguages(?ApplicableLanguages $languages)
    {
        $this->languages = $languages;
        return $this;
    }
    function setCreated(DateTime $created)
    {
        $this->created = $created;
        return $this;
    }
    function setCreatedBy(string $createdBy)
    {
        $this->createdBy = $createdBy;
        return $this;
    }
    function setModified(DateTime $modified)
    {
        $this->modified = $modified;
        return $this;
    }
    function setModifiedBy(string $modifiedBy)
    {
        $this->modifiedBy = $modifiedBy;
        return $this;
    }
    function setApproved(?DateTime $approved)
    {
        $this->approved = $approved;
        return $this;
    }
    function setApprovedBy(string $approvedBy)
    {
        $this->approvedBy = $approvedBy;
        return $this;
    }
    function setIsApproved(bool $isApproved)
    {
        $this->isApproved = $isApproved;
        return $this;
    }
}
