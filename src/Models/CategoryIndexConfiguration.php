<?php declare(strict_types=1);

namespace Relewise\Models;

use DateTime;

class CategoryIndexConfiguration
{
    public string $typeDefinition = "Relewise.Client.DataTypes.Search.Configuration.CategoryIndexConfiguration, Relewise.Client";
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
    /**
     * Sets unspecified to a new value.
     * @param CategoryIndexConfigurationEntry $unspecified new value.
     */
    function setUnspecified(CategoryIndexConfigurationEntry $unspecified)
    {
        $this->unspecified = $unspecified;
        return $this;
    }
}
