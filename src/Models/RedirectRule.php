<?php declare(strict_types=1);

namespace Relewise\Models;

use DateTime;

class RedirectRule extends SearchRule
{
    public string $typeDefinition = "Relewise.Client.DataTypes.Search.Configuration.SearchRules.RedirectRule, Relewise.Client";
    public SearchTermCondition $condition;
    public ?string $destination;
    public ?array $data;
    public static function create(string $id, ?ApplicableIndexes $indexes, ?ApplicableLanguages $languages, bool $isApproved, SearchTermCondition $condition, ?string $destination, ?array $data = Null) : RedirectRule
    {
        $result = new RedirectRule();
        $result->id = $id;
        $result->indexes = $indexes;
        $result->languages = $languages;
        $result->isApproved = $isApproved;
        $result->condition = $condition;
        $result->destination = $destination;
        $result->data = $data;
        return $result;
    }
    public static function hydrate(array $arr) : RedirectRule
    {
        $result = SearchRule::hydrateBase(new RedirectRule(), $arr);
        if (array_key_exists("condition", $arr))
        {
            $result->condition = SearchTermCondition::hydrate($arr["condition"]);
        }
        if (array_key_exists("destination", $arr))
        {
            $result->destination = $arr["destination"];
        }
        if (array_key_exists("data", $arr))
        {
            $result->data = array();
            foreach($arr["data"] as $key => $value)
            {
                $result->data[$key] = $value;
            }
        }
        return $result;
    }
    function setCondition(SearchTermCondition $condition)
    {
        $this->condition = $condition;
        return $this;
    }
    function setDestination(?string $destination)
    {
        $this->destination = $destination;
        return $this;
    }
    function addToData(string $key, string $value)
    {
        if (!isset($this->data))
        {
            $this->data = array();
        }
        $this->data[$key] = $value;
        return $this;
    }
    /** @param ?array<string, string> $data associative array. */
    function setDataFromAssociativeArray(array $data)
    {
        $this->data = $data;
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
