<?php declare(strict_types=1);

namespace Relewise\Models;

/** Performs facetting based on if product is known to be purchased recently (within !: SinceMinutesAgo), applicable only for product searches. Requires <b>at least one</b> level of selection, whether !:ByUser, or !:ByUserCompany, or !:ByUserParentCompany. */
class RecentlyPurchasedFacet extends boolValueFacet
{
    public string $typeDefinition = "Relewise.Client.DataTypes.Search.Facets.Queries.RecentlyPurchasedFacet, Relewise.Client";
    
    public PurchaseQualifiers $purchaseQualifiers;
    
    public static function create(PurchaseQualifiers $purchaseQualifiers, bool ... $selected = Null) : RecentlyPurchasedFacet
    {
        $result = new RecentlyPurchasedFacet();
        $result->purchaseQualifiers = $purchaseQualifiers;
        $result->selected = $selected;
        return $result;
    }
    
    public static function hydrate(array $arr) : RecentlyPurchasedFacet
    {
        $result = boolValueFacet::hydrateBase(new RecentlyPurchasedFacet(), $arr);
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
    
    /** @param ?bool[] $selected new value. */
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
    
    function setField(FacetingField $field)
    {
        $this->field = $field;
        return $this;
    }
    
    function setSettings(?FacetSettings $settings)
    {
        $this->settings = $settings;
        return $this;
    }
}
