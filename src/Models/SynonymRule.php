<?php declare(strict_types=1);

namespace Relewise\Models;

use DateTime;
use JsonSerializable;

/** Defines an index-time synonym relation managed through the Search Rules API. */
class SynonymRule extends SearchRule implements JsonSerializable
{
    public string $typeDefinition = "Relewise.Client.DataTypes.Search.Rules.SynonymRule, Relewise.Client";
    /** Gets or sets the direction in which the synonym relation is applied. */
    public SynonymRuleSynonymType $type;
    /** Gets or sets the source terms for a one-way synonym. */
    public ?array $from;
    /** Gets or sets the target terms, or every term in a multidirectional synonym. */
    public ?array $words;
    /** Gets or sets whether source terms may be exposed through search-term predictions. */
    public bool $allowInPredictions;
    
    public static function create() : SynonymRule
    {
        $result = new SynonymRule();
        return $result;
    }
    
    public static function hydrate(array $arr) : SynonymRule
    {
        $result = SearchRule::hydrateBase(new SynonymRule(), $arr);
        if (array_key_exists("type", $arr))
        {
            $result->type = SynonymRuleSynonymType::from($arr["type"]);
        }
        if (array_key_exists("from", $arr))
        {
            $result->from = array();
            foreach($arr["from"] as &$value)
            {
                array_push($result->from, $value);
            }
        }
        if (array_key_exists("words", $arr))
        {
            $result->words = array();
            foreach($arr["words"] as &$value)
            {
                array_push($result->words, $value);
            }
        }
        if (array_key_exists("allowInPredictions", $arr))
        {
            $result->allowInPredictions = $arr["allowInPredictions"];
        }
        return $result;
    }
    
    /** Gets or sets the direction in which the synonym relation is applied. */
    function setType(SynonymRuleSynonymType $type)
    {
        $this->type = $type;
        return $this;
    }
    
    /** Gets or sets the source terms for a one-way synonym. */
    function setFrom(string ... $from)
    {
        $this->from = $from;
        return $this;
    }
    
    /**
     * Gets or sets the source terms for a one-way synonym.
     * @param ?string[] $from new value.
     */
    function setFromFromArray(array $from)
    {
        $this->from = $from;
        return $this;
    }
    
    /** Gets or sets the source terms for a one-way synonym. */
    function addToFrom(string $from)
    {
        if (!isset($this->from))
        {
            $this->from = array();
        }
        array_push($this->from, $from);
        return $this;
    }
    
    /** Gets or sets the target terms, or every term in a multidirectional synonym. */
    function setWords(string ... $words)
    {
        $this->words = $words;
        return $this;
    }
    
    /**
     * Gets or sets the target terms, or every term in a multidirectional synonym.
     * @param ?string[] $words new value.
     */
    function setWordsFromArray(array $words)
    {
        $this->words = $words;
        return $this;
    }
    
    /** Gets or sets the target terms, or every term in a multidirectional synonym. */
    function addToWords(string $words)
    {
        if (!isset($this->words))
        {
            $this->words = array();
        }
        array_push($this->words, $words);
        return $this;
    }
    
    /** Gets or sets whether source terms may be exposed through search-term predictions. */
    function setAllowInPredictions(bool $allowInPredictions)
    {
        $this->allowInPredictions = $allowInPredictions;
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
        if (isset($this->type))
        {
            $result["type"] = $this->type;
        }
        if (isset($this->from))
        {
            $result["from"] = $this->from;
        }
        if (isset($this->words))
        {
            $result["words"] = $this->words;
        }
        if (isset($this->allowInPredictions))
        {
            $result["allowInPredictions"] = $this->allowInPredictions;
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
