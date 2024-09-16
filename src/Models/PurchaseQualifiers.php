<?php declare(strict_types=1);

namespace Relewise\Models;

/** Determines what qualifies a purchase as recently purchased */
class PurchaseQualifiers
{
    public string $typeDefinition = "Relewise.Client.DataTypes.Search.Facets.Queries.PurchaseQualifiers, Relewise.Client";
    /** How fresh recent purchase must be to count as hit? */
    public int $sinceMinutesAgo;
    /** Should hit be count if user recently purchased product? */
    public bool $byUser;
    /** Should hit be count if user company recently had a product purchase tracked? */
    public bool $byUserCompany;
    /** Should hit be count if user parent company recently had a product purchase tracked? */
    public bool $byUserParentCompany;
    public static function create(int $sinceMinutesAgo, bool $byUser, bool $byUserCompany, bool $byUserParentCompany) : PurchaseQualifiers
    {
        $result = new PurchaseQualifiers();
        $result->sinceMinutesAgo = $sinceMinutesAgo;
        $result->byUser = $byUser;
        $result->byUserCompany = $byUserCompany;
        $result->byUserParentCompany = $byUserParentCompany;
        return $result;
    }
    public static function hydrate(array $arr) : PurchaseQualifiers
    {
        $result = new PurchaseQualifiers();
        if (array_key_exists("sinceMinutesAgo", $arr))
        {
            $result->sinceMinutesAgo = $arr["sinceMinutesAgo"];
        }
        if (array_key_exists("byUser", $arr))
        {
            $result->byUser = $arr["byUser"];
        }
        if (array_key_exists("byUserCompany", $arr))
        {
            $result->byUserCompany = $arr["byUserCompany"];
        }
        if (array_key_exists("byUserParentCompany", $arr))
        {
            $result->byUserParentCompany = $arr["byUserParentCompany"];
        }
        return $result;
    }
    /** How fresh recent purchase must be to count as hit? */
    function setSinceMinutesAgo(int $sinceMinutesAgo)
    {
        $this->sinceMinutesAgo = $sinceMinutesAgo;
        return $this;
    }
    /** Should hit be count if user recently purchased product? */
    function setByUser(bool $byUser)
    {
        $this->byUser = $byUser;
        return $this;
    }
    /** Should hit be count if user company recently had a product purchase tracked? */
    function setByUserCompany(bool $byUserCompany)
    {
        $this->byUserCompany = $byUserCompany;
        return $this;
    }
    /** Should hit be count if user parent company recently had a product purchase tracked? */
    function setByUserParentCompany(bool $byUserParentCompany)
    {
        $this->byUserParentCompany = $byUserParentCompany;
        return $this;
    }
}
