<?php declare(strict_types=1);

namespace Relewise\Models;

/** Represents an engagement (e.g. favorite marking, sentiment feedback, etc.) performed by a User on a specific product. This is a trackable entity used when sending engagement events to Relewise. */
class ProductEngagement extends Trackable
{
    public string $typeDefinition = "Relewise.Client.DataTypes.ProductEngagement, Relewise.Client";
    /** The user associated with the engagement. Can represent an authenticated, temporary, or otherwise identified user. */
    public ?User $user;
    /** Identifies the product that the engagement concerns. The ProductId must be non-null and non-empty. */
    public ProductAndVariantId $id;
    /** The engagement data describing what kind of feedback or interaction has occurred (e.g. favorite flag, sentiment value). Must contain at least one piece of data. */
    public ProductEngagementData $engagement;
    
    /**
     * Creates a new ProductEngagement describing a user interaction with a product.
     * @param ?User $user The user performing or associated with the engagement. Cannot be null.
     * @param ProductAndVariantId $id The product identifier. Must have a non-empty
     * @param ProductEngagementData $engagement The engagement data (e.g. favorite or sentiment). Cannot be null and must contain data.
     */
    public static function create(?User $user, ProductAndVariantId $id, ProductEngagementData $engagement) : ProductEngagement
    {
        $result = new ProductEngagement();
        $result->user = $user;
        $result->id = $id;
        $result->engagement = $engagement;
        return $result;
    }
    
    public static function hydrate(array $arr) : ProductEngagement
    {
        $result = Trackable::hydrateBase(new ProductEngagement(), $arr);
        if (array_key_exists("user", $arr))
        {
            $result->user = User::hydrate($arr["user"]);
        }
        if (array_key_exists("id", $arr))
        {
            $result->id = ProductAndVariantId::hydrate($arr["id"]);
        }
        if (array_key_exists("engagement", $arr))
        {
            $result->engagement = ProductEngagementData::hydrate($arr["engagement"]);
        }
        return $result;
    }
    
    /** The user associated with the engagement. Can represent an authenticated, temporary, or otherwise identified user. */
    function setUser(?User $user)
    {
        $this->user = $user;
        return $this;
    }
    
    /** Identifies the product that the engagement concerns. The ProductId must be non-null and non-empty. */
    function setId(ProductAndVariantId $id)
    {
        $this->id = $id;
        return $this;
    }
    
    /** The engagement data describing what kind of feedback or interaction has occurred (e.g. favorite flag, sentiment value). Must contain at least one piece of data. */
    function setEngagement(ProductEngagementData $engagement)
    {
        $this->engagement = $engagement;
        return $this;
    }
}
