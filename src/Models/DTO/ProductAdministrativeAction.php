<?php declare(strict_types=1);

namespace Relewise\Models\DTO;

use DateTime;

class ProductAdministrativeAction extends Trackable
{
    public string $typeDefinition = "Relewise.Client.DataTypes.ProductAdministrativeAction, Relewise.Client";
    public FilterCollection $filters;
    public Language $language;
    public ProductAdministrativeActionUpdateKind $productUpdateKind;
    public ProductAdministrativeActionUpdateKind $variantUpdateKind;
    public Currency $currency;
    public static function create(Language $language, Currency $currency, ProductAdministrativeActionUpdateKind $productUpdateKind) : ProductAdministrativeAction
    {
        $result = new ProductAdministrativeAction();
        $result->language = $language;
        $result->currency = $currency;
        $result->productUpdateKind = $productUpdateKind;
        return $result;
    }
    public static function hydrate(array $arr) : ProductAdministrativeAction
    {
        $result = Trackable::hydrateBase(new ProductAdministrativeAction(), $arr);
        if (array_key_exists("filters", $arr))
        {
            $result->filters = FilterCollection::hydrate($arr["filters"]);
        }
        if (array_key_exists("language", $arr))
        {
            $result->language = Language::hydrate($arr["language"]);
        }
        if (array_key_exists("productUpdateKind", $arr))
        {
            $result->productUpdateKind = ProductAdministrativeActionUpdateKind::from($arr["productUpdateKind"]);
        }
        if (array_key_exists("variantUpdateKind", $arr))
        {
            $result->variantUpdateKind = ProductAdministrativeActionUpdateKind::from($arr["variantUpdateKind"]);
        }
        if (array_key_exists("currency", $arr))
        {
            $result->currency = Currency::hydrate($arr["currency"]);
        }
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
    function withProductUpdateKind(ProductAdministrativeActionUpdateKind $productUpdateKind)
    {
        $this->productUpdateKind = $productUpdateKind;
        return $this;
    }
    function withVariantUpdateKind(ProductAdministrativeActionUpdateKind $variantUpdateKind)
    {
        $this->variantUpdateKind = $variantUpdateKind;
        return $this;
    }
    function withCurrency(Currency $currency)
    {
        $this->currency = $currency;
        return $this;
    }
}
