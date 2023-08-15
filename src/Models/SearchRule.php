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
            $result->created = new DateTime($arr["created"]);
        }
        if (array_key_exists("createdBy", $arr))
        {
            $result->createdBy = $arr["createdBy"];
        }
        if (array_key_exists("modified", $arr))
        {
            $result->modified = new DateTime($arr["modified"]);
        }
        if (array_key_exists("modifiedBy", $arr))
        {
            $result->modifiedBy = $arr["modifiedBy"];
        }
        if (array_key_exists("approved", $arr))
        {
            $result->approved = new DateTime($arr["approved"]);
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
    /**
     * Sets id to a new value.
     * @param string $id new value.
     */
    function setId(string $id)
    {
        $this->id = $id;
        return $this;
    }
    /**
     * Sets indexes to a new value.
     * @param ?ApplicableIndexes $indexes new value.
     */
    function setIndexes(?ApplicableIndexes $indexes)
    {
        $this->indexes = $indexes;
        return $this;
    }
    /**
     * Sets languages to a new value.
     * @param ?ApplicableLanguages $languages new value.
     */
    function setLanguages(?ApplicableLanguages $languages)
    {
        $this->languages = $languages;
        return $this;
    }
    /**
     * Sets created to a new value.
     * @param DateTime $created new value.
     */
    function setCreated(DateTime $created)
    {
        $this->created = $created;
        return $this;
    }
    /**
     * Sets createdBy to a new value.
     * @param string $createdBy new value.
     */
    function setCreatedBy(string $createdBy)
    {
        $this->createdBy = $createdBy;
        return $this;
    }
    /**
     * Sets modified to a new value.
     * @param DateTime $modified new value.
     */
    function setModified(DateTime $modified)
    {
        $this->modified = $modified;
        return $this;
    }
    /**
     * Sets modifiedBy to a new value.
     * @param string $modifiedBy new value.
     */
    function setModifiedBy(string $modifiedBy)
    {
        $this->modifiedBy = $modifiedBy;
        return $this;
    }
    /**
     * Sets approved to a new value.
     * @param ?DateTime $approved new value.
     */
    function setApproved(?DateTime $approved)
    {
        $this->approved = $approved;
        return $this;
    }
    /**
     * Sets approvedBy to a new value.
     * @param string $approvedBy new value.
     */
    function setApprovedBy(string $approvedBy)
    {
        $this->approvedBy = $approvedBy;
        return $this;
    }
    /**
     * Sets isApproved to a new value.
     * @param bool $isApproved new value.
     */
    function setIsApproved(bool $isApproved)
    {
        $this->isApproved = $isApproved;
        return $this;
    }
}
