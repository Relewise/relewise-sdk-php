<?php declare(strict_types=1);

namespace Relewise\Models;

class CategoryIndexConfiguration
{
    /** Default configuration entry used when no specific category scope is specified. This serves as the fallback configuration for category indexing operations. */
    public CategoryIndexConfigurationEntry $unspecified;
    /** Scope-specific configuration entries mapped by CategoryScope enum values. Allows different indexing configurations for different category relationship scopes (e.g., ImmediateParent, ImmediateParentOrItsParent, Ancestor). When null, only the Unspecified configuration will be used. */
    public ?array $byScope;
    
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
    
    /** Default configuration entry used when no specific category scope is specified. This serves as the fallback configuration for category indexing operations. */
    function setUnspecified(CategoryIndexConfigurationEntry $unspecified)
    {
        $this->unspecified = $unspecified;
        return $this;
    }
    
    /** Scope-specific configuration entries mapped by CategoryScope enum values. Allows different indexing configurations for different category relationship scopes (e.g., ImmediateParent, ImmediateParentOrItsParent, Ancestor). When null, only the Unspecified configuration will be used. */
    function addToByScope(CategoryScope $key, CategoryIndexConfigurationEntry $value)
    {
        if (!isset($this->byScope))
        {
            $this->byScope = array();
        }
        $this->byScope[$key] = $value;
        return $this;
    }
    
    /**
     * Scope-specific configuration entries mapped by CategoryScope enum values. Allows different indexing configurations for different category relationship scopes (e.g., ImmediateParent, ImmediateParentOrItsParent, Ancestor). When null, only the Unspecified configuration will be used.
     * @param ?array<CategoryScope, CategoryIndexConfigurationEntry> $byScope associative array.
     */
    function setByScopeFromAssociativeArray(array $byScope)
    {
        $this->byScope = $byScope;
        return $this;
    }
}
