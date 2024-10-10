<?php declare(strict_types=1);

namespace Relewise\Models;

class ContentAdministrativeAction extends Trackable
{
    public string $typeDefinition = "Relewise.Client.DataTypes.ContentAdministrativeAction, Relewise.Client";
    public FilterCollection $filters;
    public ?Language $language;
    public ContentAdministrativeActionUpdateKind $kind;
    public ?Currency $currency;
    public static function create(?Language $language, ?Currency $currency, FilterCollection $filters, ContentAdministrativeActionUpdateKind $kind) : ContentAdministrativeAction
    {
        $result = new ContentAdministrativeAction();
        $result->language = $language;
        $result->currency = $currency;
        $result->filters = $filters;
        $result->kind = $kind;
        return $result;
    }
    
    public static function hydrate(array $arr) : ContentAdministrativeAction
    {
        $result = Trackable::hydrateBase(new ContentAdministrativeAction(), $arr);
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
            $result->kind = ContentAdministrativeActionUpdateKind::from($arr["kind"]);
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
    
    function setKind(ContentAdministrativeActionUpdateKind $kind)
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
