<?php declare(strict_types=1);

namespace Relewise\Models;

/** Used for specifying that this kind of promotion is allowed at a specific Location as well as for specific advertisers */
class DisplayAdPromotionSpecification extends PromotionSpecification
{
    public string $typeDefinition = "Relewise.Client.DataTypes.RetailMedia.DisplayAdPromotion+Specification, Relewise.Client";
    /** The DisplayAdTemplate Ids that are valid to promote */
    public ?array $promotableDisplayAdTemplateIds;
    /** The DisplayAdTemplates found via filters that are valid to promote */
    public ?FilterCollection $promotableDisplayAdTemplateFilters;
    
    public static function create(?array $promotableDisplayAdTemplateIds, ?FilterCollection $promotableDisplayAdTemplateFilters) : DisplayAdPromotionSpecification
    {
        $result = new DisplayAdPromotionSpecification();
        $result->promotableDisplayAdTemplateIds = $promotableDisplayAdTemplateIds;
        $result->promotableDisplayAdTemplateFilters = $promotableDisplayAdTemplateFilters;
        return $result;
    }
    
    public static function hydrate(array $arr) : DisplayAdPromotionSpecification
    {
        $result = PromotionSpecification::hydrateBase(new DisplayAdPromotionSpecification(), $arr);
        if (array_key_exists("promotableDisplayAdTemplateIds", $arr))
        {
            $result->promotableDisplayAdTemplateIds = array();
            foreach($arr["promotableDisplayAdTemplateIds"] as &$value)
            {
                array_push($result->promotableDisplayAdTemplateIds, $value);
            }
        }
        if (array_key_exists("promotableDisplayAdTemplateFilters", $arr))
        {
            $result->promotableDisplayAdTemplateFilters = FilterCollection::hydrate($arr["promotableDisplayAdTemplateFilters"]);
        }
        return $result;
    }
    
    /** The DisplayAdTemplate Ids that are valid to promote */
    function setPromotableDisplayAdTemplateIds(string ... $promotableDisplayAdTemplateIds)
    {
        $this->promotableDisplayAdTemplateIds = $promotableDisplayAdTemplateIds;
        return $this;
    }
    
    /**
     * The DisplayAdTemplate Ids that are valid to promote
     * @param ?string[] $promotableDisplayAdTemplateIds new value.
     */
    function setPromotableDisplayAdTemplateIdsFromArray(array $promotableDisplayAdTemplateIds)
    {
        $this->promotableDisplayAdTemplateIds = $promotableDisplayAdTemplateIds;
        return $this;
    }
    
    /** The DisplayAdTemplate Ids that are valid to promote */
    function addToPromotableDisplayAdTemplateIds(string $promotableDisplayAdTemplateIds)
    {
        if (!isset($this->promotableDisplayAdTemplateIds))
        {
            $this->promotableDisplayAdTemplateIds = array();
        }
        array_push($this->promotableDisplayAdTemplateIds, $promotableDisplayAdTemplateIds);
        return $this;
    }
    
    /** The DisplayAdTemplates found via filters that are valid to promote */
    function setPromotableDisplayAdTemplateFilters(?FilterCollection $promotableDisplayAdTemplateFilters)
    {
        $this->promotableDisplayAdTemplateFilters = $promotableDisplayAdTemplateFilters;
        return $this;
    }
}
