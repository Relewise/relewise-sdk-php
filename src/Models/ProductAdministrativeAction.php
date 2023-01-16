<?php declare(strict_types=1);

namespace Relewise\Models;

use DateTime;

class ProductAdministrativeAction extends Trackable
{
    public string $typeDefinition = "Relewise.Client.DataTypes.ProductAdministrativeAction, Relewise.Client";
    public FilterCollection $filters;
    public ?Language $language;
    public ProductAdministrativeActionUpdateKind $productUpdateKind;
    public ProductAdministrativeActionUpdateKind $variantUpdateKind;
    public ?Currency $currency;
    public static function create(?Language $language, ?Currency $currency, ProductAdministrativeActionUpdateKind $productUpdateKind) : ProductAdministrativeAction
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
    function setProductUpdateKind(ProductAdministrativeActionUpdateKind $productUpdateKind)
    {
        $this->productUpdateKind = $productUpdateKind;
        return $this;
    }
    function setVariantUpdateKind(ProductAdministrativeActionUpdateKind $variantUpdateKind)
    {
        $this->variantUpdateKind = $variantUpdateKind;
        return $this;
    }
    function setCurrency(?Currency $currency)
    {
        $this->currency = $currency;
        return $this;
    }
}
