<?php declare(strict_types=1);

namespace Relewise\Models\DTO;

use DateTime;

class ContentCategoryAdministrativeAction extends CategoryAdministrativeAction
{
    public string $typeDefinition = "Relewise.Client.DataTypes.ContentCategoryAdministrativeAction, Relewise.Client";
    public static function create() : ContentCategoryAdministrativeAction
    {
        $result = new ContentCategoryAdministrativeAction();
        return $result;
    }
    public static function hydrate(array $arr) : ContentCategoryAdministrativeAction
    {
        $result = CategoryAdministrativeAction::hydrateBase(new ContentCategoryAdministrativeAction(), $arr);
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
