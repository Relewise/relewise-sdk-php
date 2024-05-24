<?php declare(strict_types=1);

namespace Relewise\Models;

use DateTime;

/** a RelevanceModifier that can change the relevance of a Product depending on whether the users company or parent company have purchased this product within some timespan. */
class ProductRecentlyPurchasedByUserCompanyRelevanceModifier extends RelevanceModifier
{
    public string $typeDefinition = "Relewise.Client.Requests.RelevanceModifiers.ProductRecentlyPurchasedByUserCompanyRelevanceModifier, Relewise.Client";
    /** The start of the time period in which a product will be considered relevant to the user if purchased previously by their company. */
    public ?DateTime $sinceUtc;
    /** The weight that the Product will be multiplied with if it has been purchased in the past by the users company (since SinceUtc). */
    public float $ifPurchasedByCompanyMultiplyWeightBy;
    /** The weight that the Product will be multiplied with if it has been purchased in the past by the users parent company (since SinceUtc). */
    public float $elseIfPurchasedByParentCompanyMultiplyWeightBy;
    /** The weight that the Product will be multiplied with if it has not been purchased in the past by the users parent company (since SinceUtc). */
    public float $elseIfNotPurchasedByEitherCompanyMultiplyWeightBy;
    /** The minutes since in which a product will be considered relevant to the user if bought previously by them. */
    public ?int $sinceMinutesAgo;
    public static function create(float $ifPurchasedByCompanyMultiplyWeightBy = 1, float $elseIfPurchasedByParentCompanyMultiplyWeightBy = 1, float $elseIfNotPurchasedByEitherCompanyMultiplyWeightBy = 1) : ProductRecentlyPurchasedByUserCompanyRelevanceModifier
    {
        $result = new ProductRecentlyPurchasedByUserCompanyRelevanceModifier();
        $result->ifPurchasedByCompanyMultiplyWeightBy = $ifPurchasedByCompanyMultiplyWeightBy;
        $result->elseIfPurchasedByParentCompanyMultiplyWeightBy = $elseIfPurchasedByParentCompanyMultiplyWeightBy;
        $result->elseIfNotPurchasedByEitherCompanyMultiplyWeightBy = $elseIfNotPurchasedByEitherCompanyMultiplyWeightBy;
        return $result;
    }
    public static function hydrate(array $arr) : ProductRecentlyPurchasedByUserCompanyRelevanceModifier
    {
        $result = RelevanceModifier::hydrateBase(new ProductRecentlyPurchasedByUserCompanyRelevanceModifier(), $arr);
        if (array_key_exists("sinceUtc", $arr))
        {
            $result->sinceUtc = new DateTime($arr["sinceUtc"]);
        }
        if (array_key_exists("ifPurchasedByCompanyMultiplyWeightBy", $arr))
        {
            $result->ifPurchasedByCompanyMultiplyWeightBy = $arr["ifPurchasedByCompanyMultiplyWeightBy"];
        }
        if (array_key_exists("elseIfPurchasedByParentCompanyMultiplyWeightBy", $arr))
        {
            $result->elseIfPurchasedByParentCompanyMultiplyWeightBy = $arr["elseIfPurchasedByParentCompanyMultiplyWeightBy"];
        }
        if (array_key_exists("elseIfNotPurchasedByEitherCompanyMultiplyWeightBy", $arr))
        {
            $result->elseIfNotPurchasedByEitherCompanyMultiplyWeightBy = $arr["elseIfNotPurchasedByEitherCompanyMultiplyWeightBy"];
        }
        if (array_key_exists("sinceMinutesAgo", $arr))
        {
            $result->sinceMinutesAgo = $arr["sinceMinutesAgo"];
        }
        return $result;
    }
    /** The start of the time period in which a product will be considered relevant to the user if purchased previously by their company. */
    function setSinceUtc(?DateTime $sinceUtc)
    {
        $this->sinceUtc = $sinceUtc;
        return $this;
    }
    /** The weight that the Product will be multiplied with if it has been purchased in the past by the users company (since SinceUtc). */
    function setIfPurchasedByCompanyMultiplyWeightBy(float $ifPurchasedByCompanyMultiplyWeightBy)
    {
        $this->ifPurchasedByCompanyMultiplyWeightBy = $ifPurchasedByCompanyMultiplyWeightBy;
        return $this;
    }
    /** The weight that the Product will be multiplied with if it has been purchased in the past by the users parent company (since SinceUtc). */
    function setElseIfPurchasedByParentCompanyMultiplyWeightBy(float $elseIfPurchasedByParentCompanyMultiplyWeightBy)
    {
        $this->elseIfPurchasedByParentCompanyMultiplyWeightBy = $elseIfPurchasedByParentCompanyMultiplyWeightBy;
        return $this;
    }
    /** The weight that the Product will be multiplied with if it has not been purchased in the past by the users parent company (since SinceUtc). */
    function setElseIfNotPurchasedByEitherCompanyMultiplyWeightBy(float $elseIfNotPurchasedByEitherCompanyMultiplyWeightBy)
    {
        $this->elseIfNotPurchasedByEitherCompanyMultiplyWeightBy = $elseIfNotPurchasedByEitherCompanyMultiplyWeightBy;
        return $this;
    }
    /** The minutes since in which a product will be considered relevant to the user if bought previously by them. */
    function setSinceMinutesAgo(?int $sinceMinutesAgo)
    {
        $this->sinceMinutesAgo = $sinceMinutesAgo;
        return $this;
    }
    function setFilters(FilterCollection $filters)
    {
        $this->filters = $filters;
        return $this;
    }
}
