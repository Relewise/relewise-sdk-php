<?php declare(strict_types=1);

namespace Relewise\Models;

use DateTime;
use JsonSerializable;

class StemmingRule extends SearchRule implements JsonSerializable
{
    public string $typeDefinition = "Relewise.Client.DataTypes.Search.Rules.StemmingRule, Relewise.Client";
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
    
    function setWords(string ... $words)
    {
        $this->words = $words;
        return $this;
    }
    
    /** @param string[] $words new value. */
    function setWordsFromArray(array $words)
    {
        $this->words = $words;
        return $this;
    }
    
    function addToWords(string $words)
    {
        if (!isset($this->words))
        {
            $this->words = array();
        }
        array_push($this->words, $words);
        return $this;
    }
    
    function setStem(?string $stem)
    {
        $this->stem = $stem;
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
        if (isset($this->words))
        {
            $result["words"] = $this->words;
        }
        if (isset($this->stem))
        {
            $result["stem"] = $this->stem;
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
