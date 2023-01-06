<?php declare(strict_types=1);

namespace Relewise\Models\DTO;

use DateTime;

class StemmingRule extends SearchRule
{
    public string $typeDefinition = "Relewise.Client.DataTypes.Search.Configuration.SearchRules.StemmingRule, Relewise.Client";
    public array $words;
    public ?string $stem;
    public static function create(string $id, ?ApplicableIndexes $indexes, ?ApplicableLanguages $languages, bool $isApproved, array $words, ?string $stem) : StemmingRule
    {
        $result = new StemmingRule();
        $result->id = $id;
        $result->indexes = $indexes;
        $result->languages = $languages;
        $result->isApproved = $isApproved;
        $result->words = $words;
        $result->stem = $stem;
        return $result;
    }
    public static function hydrate(array $arr) : StemmingRule
    {
        $result = SearchRule::hydrateBase(new StemmingRule(), $arr);
        if (array_key_exists("words", $arr))
        {
            $result->words = array();
            foreach($arr["words"] as &$value)
            {
                array_push($result->words, $value);
            }
        }
        if (array_key_exists("stem", $arr))
        {
            $result->stem = $arr["stem"];
        }
        return $result;
    }
    function withWords(string ... $words)
    {
        $this->words = $words;
        return $this;
    }
    function withStem(?string $stem)
    {
        $this->stem = $stem;
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
