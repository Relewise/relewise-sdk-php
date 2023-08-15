<?php declare(strict_types=1);

namespace Relewise\Models;

use DateTime;

class ProductCategoryAdministrativeAction extends CategoryAdministrativeAction
{
    public string $typeDefinition = "Relewise.Client.DataTypes.ProductCategoryAdministrativeAction, Relewise.Client";
    public static function create(?Language $language, ?Currency $currency, CategoryAdministrativeActionUpdateKind $kind) : ProductCategoryAdministrativeAction
    {
        $result = new ProductCategoryAdministrativeAction();
        $result->language = $language;
        $result->currency = $currency;
        $result->kind = $kind;
        return $result;
    }
    public static function hydrate(array $arr) : ProductCategoryAdministrativeAction
    {
        $result = CategoryAdministrativeAction::hydrateBase(new ProductCategoryAdministrativeAction(), $arr);
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
