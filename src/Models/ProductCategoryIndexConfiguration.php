<?php declare(strict_types=1);

namespace Relewise\Models;

use DateTime;

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
        return $result;
    }
    function setUnspecified(CategoryIndexConfigurationEntry $unspecified)
    {
        $this->unspecified = $unspecified;
        return $this;
    }
}
