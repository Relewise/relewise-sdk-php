<?php declare(strict_types=1);

namespace Relewise\Models;

use DateTime;

abstract class SearchRule
{
    public string $typeDefinition = "Relewise.Client.DataTypes.Search.Configuration.SearchRules.SearchRule, Relewise.Client";
    public string $id;
    public ?ApplicableIndexes $indexes;
    public ?ApplicableLanguages $languages;
    public DateTime $created;
    public string $createdBy;
    public DateTime $modified;
    public string $modifiedBy;
    public ?DateTime $approved;
    public string $approvedBy;
    public bool $isApproved;
    public static function hydrate(array $arr)
    {
        $type = $arr["\$type"];
        if ($type=="Relewise.Client.DataTypes.Search.Configuration.SearchRules.DecompoundRule, Relewise.Client")
        {
            return DecompoundRule::hydrate($arr);
        }
        if ($type=="Relewise.Client.DataTypes.Search.Configuration.SearchRules.PredictionRule, Relewise.Client")
        {
            return PredictionRule::hydrate($arr);
        }
        if ($type=="Relewise.Client.DataTypes.Search.Configuration.SearchRules.RedirectRule, Relewise.Client")
        {
            return RedirectRule::hydrate($arr);
        }
        if ($type=="Relewise.Client.DataTypes.Search.Configuration.SearchRules.StemmingRule, Relewise.Client")
        {
            return StemmingRule::hydrate($arr);
        }
    }
    public static function hydrateBase(mixed $result, array $arr)
    {
        if (array_key_exists("id", $arr))
        {
            $result->id = $arr["id"];
        }
        if (array_key_exists("indexes", $arr))
        {
            $result->indexes = ApplicableIndexes::hydrate($arr["indexes"]);
        }
        if (array_key_exists("languages", $arr))
        {
            $result->languages = ApplicableLanguages::hydrate($arr["languages"]);
        }
        if (array_key_exists("created", $arr))
        {
            $result->created = $arr["created"];
        }
        if (array_key_exists("createdBy", $arr))
        {
            $result->createdBy = $arr["createdBy"];
        }
        if (array_key_exists("modified", $arr))
        {
            $result->modified = $arr["modified"];
        }
        if (array_key_exists("modifiedBy", $arr))
        {
            $result->modifiedBy = $arr["modifiedBy"];
        }
        if (array_key_exists("approved", $arr))
        {
            $result->approved = $arr["approved"];
        }
        if (array_key_exists("approvedBy", $arr))
        {
            $result->approvedBy = $arr["approvedBy"];
        }
        if (array_key_exists("isApproved", $arr))
        {
            $result->isApproved = $arr["isApproved"];
        }
        return $result;
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
