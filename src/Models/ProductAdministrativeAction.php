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
    public static function create(?Language $language, ?Currency $currency, FilterCollection $filters, ProductAdministrativeActionUpdateKind $productUpdateKind) : ProductAdministrativeAction
    {
        $result = new ProductAdministrativeAction();
        $result->language = $language;
        $result->currency = $currency;
        $result->filters = $filters;
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
     * Sets productUpdateKind to a new value.
     * @param ProductAdministrativeActionUpdateKind $productUpdateKind new value.
     */
    function setProductUpdateKind(ProductAdministrativeActionUpdateKind $productUpdateKind)
    {
        $this->productUpdateKind = $productUpdateKind;
        return $this;
    }
    /**
     * Sets variantUpdateKind to a new value.
     * @param ProductAdministrativeActionUpdateKind $variantUpdateKind new value.
     */
    function setVariantUpdateKind(ProductAdministrativeActionUpdateKind $variantUpdateKind)
    {
        $this->variantUpdateKind = $variantUpdateKind;
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
