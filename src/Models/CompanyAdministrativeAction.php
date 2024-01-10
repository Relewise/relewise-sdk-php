<?php declare(strict_types=1);

namespace Relewise\Models;

use DateTime;

class CompanyAdministrativeAction extends Trackable
{
    public string $typeDefinition = "Relewise.Client.DataTypes.CompanyAdministrativeAction, Relewise.Client";
    public FilterCollection $filters;
    public ?Language $language;
    public CompanyAdministrativeActionUpdateKind $kind;
    public ?Currency $currency;
    public static function create(?Language $language, ?Currency $currency, FilterCollection $filters, CompanyAdministrativeActionUpdateKind $kind) : CompanyAdministrativeAction
    {
        $result = new CompanyAdministrativeAction();
        $result->language = $language;
        $result->currency = $currency;
        $result->filters = $filters;
        $result->kind = $kind;
        return $result;
    }
    public static function hydrate(array $arr) : CompanyAdministrativeAction
    {
        $result = Trackable::hydrateBase(new CompanyAdministrativeAction(), $arr);
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
            $result->kind = CompanyAdministrativeActionUpdateKind::from($arr["kind"]);
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
    function setKind(CompanyAdministrativeActionUpdateKind $kind)
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
