<?php declare(strict_types=1);

namespace Relewise\Models;

use DateTime;
use JsonSerializable;

class ProductRecentlyPurchasedByUserFilter extends Filter implements JsonSerializable
{
    public string $typeDefinition = "Relewise.Client.Requests.Filters.ProductRecentlyPurchasedByUserFilter, Relewise.Client";
    
    public ?DateTime $sinceUtc;
    
    public ?int $sinceMinutesAgo;
    
    public static function create(DateTime $sinceUtc, bool $negated = false) : ProductRecentlyPurchasedByUserFilter
    {
        $result = new ProductRecentlyPurchasedByUserFilter();
        $result->sinceUtc = $sinceUtc;
        $result->negated = $negated;
        return $result;
    }
    
    public static function hydrate(array $arr) : ProductRecentlyPurchasedByUserFilter
    {
        $result = Filter::hydrateBase(new ProductRecentlyPurchasedByUserFilter(), $arr);
        if (array_key_exists("sinceUtc", $arr))
        {
            $result->sinceUtc = new DateTime($arr["sinceUtc"]);
        }
        if (array_key_exists("sinceMinutesAgo", $arr))
        {
            $result->sinceMinutesAgo = $arr["sinceMinutesAgo"];
        }
        return $result;
    }
    
    function setSinceUtc(?DateTime $sinceUtc)
    {
        $this->sinceUtc = $sinceUtc;
        return $this;
    }
    
    function setSinceMinutesAgo(?int $sinceMinutesAgo)
    {
        $this->sinceMinutesAgo = $sinceMinutesAgo;
        return $this;
    }
    
    function setNegated(bool $negated)
    {
        $this->negated = $negated;
        return $this;
    }
    
    function setSettings(?FilterSettings $settings)
    {
        $this->settings = $settings;
        return $this;
    }
    
    public function jsonSerialize(): mixed
    {
        $result = array();
        $result["typeDefinition"] = $this->typeDefinition;
        if (isset($this->sinceUtc))
        {
            $result["sinceUtc"] = $this->sinceUtc->format(DATE_ATOM);
        }
        if (isset($this->sinceMinutesAgo))
        {
            $result["sinceMinutesAgo"] = $this->sinceMinutesAgo;
        }
        if (isset($this->negated))
        {
            $result["negated"] = $this->negated;
        }
        if (isset($this->settings))
        {
            $result["settings"] = $this->settings;
        }
        return $result;
    }
}
