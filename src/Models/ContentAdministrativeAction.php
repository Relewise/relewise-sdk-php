<?php declare(strict_types=1);

namespace Relewise\Models;

use DateTime;

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
     * @param ContentAdministrativeActionUpdateKind $kind new value.
     */
    function setKind(ContentAdministrativeActionUpdateKind $kind)
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
