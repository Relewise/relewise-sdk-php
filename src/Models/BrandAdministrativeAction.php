<?php declare(strict_types=1);

namespace Relewise\Models;

use DateTime;

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
    /**
     * Sets filters to a new value.
     * @param FilterCollection $filters new value.
     */
    function setFilters(FilterCollection $filters)
    {
        $this->filters = $filters;
        return $this;
    }
    /**
     * Sets language to a new value.
     * @param ?Language $language new value.
     */
    function setLanguage(?Language $language)
    {
        $this->language = $language;
        return $this;
    }
    /**
     * Sets kind to a new value.
     * @param BrandAdministrativeActionUpdateKind $kind new value.
     */
    function setKind(BrandAdministrativeActionUpdateKind $kind)
    {
        $this->kind = $kind;
        return $this;
    }
    /**
     * Sets currency to a new value.
     * @param ?Currency $currency new value.
     */
    function setCurrency(?Currency $currency)
    {
        $this->currency = $currency;
        return $this;
    }
}
