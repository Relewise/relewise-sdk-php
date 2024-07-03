<?php declare(strict_types=1);

namespace Relewise\Models;

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
    function setKind(CategoryAdministrativeActionUpdateKind $kind)
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
