<?php declare(strict_types=1);

namespace Relewise\Models\DTO;

use DateTime;

class DecompoundRule extends SearchRule
{
    public string $typeDefinition = "Relewise.Client.DataTypes.Search.Configuration.SearchRules.DecompoundRule, Relewise.Client";
    public string $word;
    public ?string $head;
    public ?array $modifiers;
    public static function create(string $id, ?ApplicableIndexes $indexes, ?ApplicableLanguages $languages, bool $isApproved, string $word, ?string $head, string ... $modifiers) : DecompoundRule
    {
        $result = new DecompoundRule();
        $result->id = $id;
        $result->indexes = $indexes;
        $result->languages = $languages;
        $result->isApproved = $isApproved;
        $result->word = $word;
        $result->head = $head;
        $result->modifiers = $modifiers;
        return $result;
    }
    public static function hydrate(array $arr) : DecompoundRule
    {
        $result = SearchRule::hydrateBase(new DecompoundRule(), $arr);
        if (array_key_exists("word", $arr))
        {
            $result->word = $arr["word"];
        }
        if (array_key_exists("head", $arr))
        {
            $result->head = $arr["head"];
        }
        if (array_key_exists("modifiers", $arr))
        {
            $result->modifiers = array();
            foreach($arr["modifiers"] as &$value)
            {
                array_push($result->modifiers, $value);
            }
        }
        return $result;
    }
    function withWord(string $word)
    {
        $this->word = $word;
        return $this;
    }
    function withHead(?string $head)
    {
        $this->head = $head;
        return $this;
    }
    function withModifiers(string ... $modifiers)
    {
        $this->modifiers = $modifiers;
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
