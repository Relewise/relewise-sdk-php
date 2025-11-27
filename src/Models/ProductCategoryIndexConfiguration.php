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
        if (array_key_exists("byScope", $arr))
        {
            $result->byScope = array();
            foreach($arr["byScope"] as $key => $value)
            {
                $result->byScope[CategoryScope::from($key)] = CategoryIndexConfigurationEntry::hydrate($value);
            }
        }
        return $result;
    }
    
    function setUnspecified(CategoryIndexConfigurationEntry $unspecified)
    {
        $this->unspecified = $unspecified;
        return $this;
    }
    
    function addToByScope(CategoryScope $key, CategoryIndexConfigurationEntry $value)
    {
        if (!isset($this->byScope))
        {
            $this->byScope = array();
        }
        $this->byScope[$key] = $value;
        return $this;
    }
    
    /** @param ?array<CategoryScope, CategoryIndexConfigurationEntry> $byScope associative array. */
    function setByScopeFromAssociativeArray(array $byScope)
    {
        $this->byScope = $byScope;
        return $this;
    }
}
