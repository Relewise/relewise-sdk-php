<?php declare(strict_types=1);

namespace Relewise\Models;

use DateTime;

abstract class CategoryAdministrativeAction extends Trackable
{
    public string $typeDefinition = "Relewise.Client.DataTypes.CategoryAdministrativeAction, Relewise.Client";
    public FilterCollection $filters;
    public ?Language $language;
    public CategoryAdministrativeActionUpdateKind $kind;
    public ?Currency $currency;
    public static function hydrate(array $arr)
    {
        $type = $arr["\$type"];
        if ($type=="Relewise.Client.DataTypes.ContentCategoryAdministrativeAction, Relewise.Client")
        {
            return ContentCategoryAdministrativeAction::hydrate($arr);
        }
        if ($type=="Relewise.Client.DataTypes.ProductCategoryAdministrativeAction, Relewise.Client")
        {
            return ProductCategoryAdministrativeAction::hydrate($arr);
        }
    }
    public static function hydrateBase(mixed $result, array $arr)
    {
        $result = Trackable::hydrateBase($result, $arr);
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
            $result->kind = CategoryAdministrativeActionUpdateKind::from($arr["kind"]);
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
     * @param CategoryAdministrativeActionUpdateKind $kind new value.
     */
    function setKind(CategoryAdministrativeActionUpdateKind $kind)
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
