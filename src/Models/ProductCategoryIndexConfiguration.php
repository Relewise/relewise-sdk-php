<?php declare(strict_types=1);

namespace Relewise\Models;

class ProductCategoryIndexConfiguration extends CategoryIndexConfiguration
{
    public string $typeDefinition = "Relewise.Client.DataTypes.Search.Configuration.ProductCategoryIndexConfiguration, Relewise.Client";
    public static function create() : ProductCategoryIndexConfiguration
    {
        $result = new ProductCategoryIndexConfiguration();
        return $result;
    }
    
    public static function hydrate(array $arr) : ProductCategoryIndexConfiguration
    {
        $result = new ProductCategoryIndexConfiguration();
        if (array_key_exists("unspecified", $arr))
        {
            $result->unspecified = CategoryIndexConfigurationEntry::hydrate($arr["unspecified"]);
        }
        return $result;
    }
    
    function setUnspecified(CategoryIndexConfigurationEntry $unspecified)
    {
        $this->unspecified = $unspecified;
        return $this;
    }
}
