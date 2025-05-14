<?php declare(strict_types=1);

namespace Relewise\Models;

use DateTime;
use JsonSerializable;

class GlobalRetailMediaConfiguration implements JsonSerializable
{
    public DateTime $modified;
    public ?string $modifiedBy;
    public ?ScoreThresholds $thresholds;
    
    public static function create() : GlobalRetailMediaConfiguration
    {
        $result = new GlobalRetailMediaConfiguration();
        return $result;
    }
    
    public static function hydrate(array $arr) : GlobalRetailMediaConfiguration
    {
        $result = new GlobalRetailMediaConfiguration();
        if (array_key_exists("modified", $arr))
        {
            $result->modified = new DateTime($arr["modified"]);
        }
        if (array_key_exists("modifiedBy", $arr))
        {
            $result->modifiedBy = $arr["modifiedBy"];
        }
        if (array_key_exists("thresholds", $arr))
        {
            $result->thresholds = ScoreThresholds::hydrate($arr["thresholds"]);
        }
        return $result;
    }
    
    function setModified(DateTime $modified)
    {
        $this->modified = $modified;
        return $this;
    }
    
    function setModifiedBy(?string $modifiedBy)
    {
        $this->modifiedBy = $modifiedBy;
        return $this;
    }
    
    function setThresholds(?ScoreThresholds $thresholds)
    {
        $this->thresholds = $thresholds;
        return $this;
    }
    
    public function jsonSerialize(): mixed
    {
        $result = array();
        if (isset($this->modified))
        {
            $result["modified"] = $this->modified->format(DATE_ATOM);
        }
        if (isset($this->modifiedBy))
        {
            $result["modifiedBy"] = $this->modifiedBy;
        }
        if (isset($this->thresholds))
        {
            $result["thresholds"] = $this->thresholds;
        }
        return $result;
    }
}
