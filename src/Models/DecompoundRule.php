<?php declare(strict_types=1);

namespace Relewise\Models;

use DateTime;
use JsonSerializable;

class DecompoundRule extends SearchRule implements JsonSerializable
{
    public string $typeDefinition = "Relewise.Client.DataTypes.Search.Rules.DecompoundRule, Relewise.Client";
    
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
    
    function setWord(string $word)
    {
        $this->word = $word;
        return $this;
    }
    
    function setHead(?string $head)
    {
        $this->head = $head;
        return $this;
    }
    
    function setModifiers(string ... $modifiers)
    {
        $this->modifiers = $modifiers;
        return $this;
    }
    
    /** @param ?string[] $modifiers new value. */
    function setModifiersFromArray(array $modifiers)
    {
        $this->modifiers = $modifiers;
        return $this;
    }
    
    function addToModifiers(string $modifiers)
    {
        if (!isset($this->modifiers))
        {
            $this->modifiers = array();
        }
        array_push($this->modifiers, $modifiers);
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
    
    public function jsonSerialize(): mixed
    {
        $result = array();
        $result["typeDefinition"] = $this->typeDefinition;
        if (isset($this->word))
        {
            $result["word"] = $this->word;
        }
        if (isset($this->head))
        {
            $result["head"] = $this->head;
        }
        if (isset($this->modifiers))
        {
            $result["modifiers"] = $this->modifiers;
        }
        if (isset($this->id))
        {
            $result["id"] = $this->id;
        }
        if (isset($this->indexes))
        {
            $result["indexes"] = $this->indexes;
        }
        if (isset($this->languages))
        {
            $result["languages"] = $this->languages;
        }
        if (isset($this->created))
        {
            $result["created"] = $this->created->format(DATE_ATOM);
        }
        if (isset($this->createdBy))
        {
            $result["createdBy"] = $this->createdBy;
        }
        if (isset($this->modified))
        {
            $result["modified"] = $this->modified->format(DATE_ATOM);
        }
        if (isset($this->modifiedBy))
        {
            $result["modifiedBy"] = $this->modifiedBy;
        }
        if (isset($this->approved))
        {
            $result["approved"] = $this->approved->format(DATE_ATOM);
        }
        if (isset($this->approvedBy))
        {
            $result["approvedBy"] = $this->approvedBy;
        }
        if (isset($this->isApproved))
        {
            $result["isApproved"] = $this->isApproved;
        }
        return $result;
    }
}
