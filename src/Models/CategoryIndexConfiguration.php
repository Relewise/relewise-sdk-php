<?php declare(strict_types=1);

namespace Relewise\Models;

class CategoryIndexConfiguration
{
    public CategoryIndexConfigurationEntry $unspecified;
    public static function create() : CategoryIndexConfiguration
    {
        $result = new CategoryIndexConfiguration();
        return $result;
    }
    
    public static function hydrate(array $arr) : CategoryIndexConfiguration
    {
        $result = new CategoryIndexConfiguration();
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
