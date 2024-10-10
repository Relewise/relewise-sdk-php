<?php declare(strict_types=1);

namespace Relewise\Models;

/** Used to instruct the search engine that results which does not have any variants, must not be returned. */
class ResultMustHaveVariantConstraint extends ProductSearchResultConstraint
{
    public string $typeDefinition = "Relewise.Client.Requests.Search.Settings.ResultMustHaveVariantConstraint, Relewise.Client";
    
    /** Used to instruct the search engine that products which does not have any variants, will be returned anyway. */
    public bool $exceptWhenProductHasNoVariants;
    
    public static function create() : ResultMustHaveVariantConstraint
    {
        $result = new ResultMustHaveVariantConstraint();
        return $result;
    }
    
    public static function hydrate(array $arr) : ResultMustHaveVariantConstraint
    {
        $result = ProductSearchResultConstraint::hydrateBase(new ResultMustHaveVariantConstraint(), $arr);
        if (array_key_exists("exceptWhenProductHasNoVariants", $arr))
        {
            $result->exceptWhenProductHasNoVariants = $arr["exceptWhenProductHasNoVariants"];
        }
        return $result;
    }
    
    /** Used to instruct the search engine that products which does not have any variants, will be returned anyway. */
    function setExceptWhenProductHasNoVariants(bool $exceptWhenProductHasNoVariants)
    {
        $this->exceptWhenProductHasNoVariants = $exceptWhenProductHasNoVariants;
        return $this;
    }
}
