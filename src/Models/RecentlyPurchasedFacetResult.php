<?php declare(strict_types=1);

namespace Relewise\Models;

/** A result for RecentlyPurchasedFacet. */
class RecentlyPurchasedFacetResult extends boolboolValueFacetResult
{
    public string $typeDefinition = "Relewise.Client.DataTypes.Search.Facets.Result.RecentlyPurchasedFacetResult, Relewise.Client";
    
    public PurchaseQualifiers $purchaseQualifiers;
    public static function create(PurchaseQualifiers $purchaseQualifiers, array $selected, boolAvailableFacetValue ... $available) : RecentlyPurchasedFacetResult
    {
        $result = new RecentlyPurchasedFacetResult();
        $result->purchaseQualifiers = $purchaseQualifiers;
        $result->selected = $selected;
        $result->available = $available;
        return $result;
    }
    
    public static function hydrate(array $arr) : RecentlyPurchasedFacetResult
    {
        $result = boolboolValueFacetResult::hydrateBase(new RecentlyPurchasedFacetResult(), $arr);
        if (array_key_exists("purchaseQualifiers", $arr))
        {
            $result->purchaseQualifiers = $arr["purchaseQualifiers"];
        }
        return $result;
    }
    
    function setPurchaseQualifiers(PurchaseQualifiers $purchaseQualifiers)
    {
        $this->purchaseQualifiers = $purchaseQualifiers;
        return $this;
    }
    
    function setSelected(bool ... $selected)
    {
        $this->selected = $selected;
        return $this;
    }
    
    /** @param bool[] $selected new value. */
    function setSelectedFromArray(array $selected)
    {
        $this->selected = $selected;
        return $this;
    }
    
    function addToSelected(bool $selected)
    {
        if (!isset($this->selected))
        {
            $this->selected = array();
        }
        array_push($this->selected, $selected);
        return $this;
    }
    
    function setAvailable(boolAvailableFacetValue ... $available)
    {
        $this->available = $available;
        return $this;
    }
    
    /** @param boolAvailableFacetValue[] $available new value. */
    function setAvailableFromArray(array $available)
    {
        $this->available = $available;
        return $this;
    }
    
    function addToAvailable(boolAvailableFacetValue $available)
    {
        if (!isset($this->available))
        {
            $this->available = array();
        }
        array_push($this->available, $available);
        return $this;
    }
    
    function setField(FacetingField $field)
    {
        $this->field = $field;
        return $this;
    }
}
