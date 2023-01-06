<?php declare(strict_types=1);

namespace Relewise\Models\DTO;

use DateTime;

class ProductCategoryAdministrativeAction extends CategoryAdministrativeAction
{
    public string $typeDefinition = "Relewise.Client.DataTypes.ProductCategoryAdministrativeAction, Relewise.Client";
    public static function create() : ProductCategoryAdministrativeAction
    {
        $result = new ProductCategoryAdministrativeAction();
        return $result;
    }
    public static function hydrate(array $arr) : ProductCategoryAdministrativeAction
    {
        $result = CategoryAdministrativeAction::hydrateBase(new ProductCategoryAdministrativeAction(), $arr);
        return $result;
    }
    function withFilters(FilterCollection $filters)
    {
        $this->filters = $filters;
        return $this;
    }
    function withLanguage(Language $language)
    {
        $this->language = $language;
        return $this;
    }
    function withKind(CategoryAdministrativeActionUpdateKind $kind)
    {
        $this->kind = $kind;
        return $this;
    }
    function withCurrency(Currency $currency)
    {
        $this->currency = $currency;
        return $this;
    }
}
