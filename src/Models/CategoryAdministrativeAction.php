<?php declare(strict_types=1);

namespace Relewise\Models;

abstract class CategoryAdministrativeAction extends Trackable
{
    public string $typeDefinition = "";
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
