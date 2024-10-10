<?php declare(strict_types=1);

namespace Relewise\Models;

class BrandAdministrativeAction extends Trackable
{
    public string $typeDefinition = "Relewise.Client.DataTypes.BrandAdministrativeAction, Relewise.Client";
    
    public FilterCollection $filters;
    public ?Language $language;
    public BrandAdministrativeActionUpdateKind $kind;
    public ?Currency $currency;
    public static function create(?Language $language, ?Currency $currency, FilterCollection $filters, BrandAdministrativeActionUpdateKind $kind) : BrandAdministrativeAction
    {
        $result = new BrandAdministrativeAction();
        $result->language = $language;
        $result->currency = $currency;
        $result->filters = $filters;
        $result->kind = $kind;
        return $result;
    }
    
    public static function hydrate(array $arr) : BrandAdministrativeAction
    {
        $result = Trackable::hydrateBase(new BrandAdministrativeAction(), $arr);
        if (array_key_exists("filters", $arr))
        {
            $result->filters = FilterCollection::hydrate($arr["filters"]);
        }
        if (array_key_exists("language", $arr))
        {
            $result->language = Language::hydrate($arr["language"]);
        }
        if (array_key_exists("kind", $arr))
        {
            $result->kind = BrandAdministrativeActionUpdateKind::from($arr["kind"]);
        }
        if (array_key_exists("currency", $arr))
        {
            $result->currency = Currency::hydrate($arr["currency"]);
        }
        return $result;
    }
    
    function setFilters(FilterCollection $filters)
    {
        $this->filters = $filters;
        return $this;
    }
    
    function setLanguage(?Language $language)
    {
        $this->language = $language;
        return $this;
    }
    
    function setKind(BrandAdministrativeActionUpdateKind $kind)
    {
        $this->kind = $kind;
        return $this;
    }
    
    function setCurrency(?Currency $currency)
    {
        $this->currency = $currency;
        return $this;
    }
}
