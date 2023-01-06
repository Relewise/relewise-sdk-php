<?php declare(strict_types=1);

namespace Relewise\Models\DTO;

use DateTime;

class ProductCategoryResultDetails extends ProductCategoryResultDetailsCategoryResultDetails
{
    public string $typeDefinition = "Relewise.Client.DataTypes.ProductCategoryResultDetails, Relewise.Client";
    public int $purchasedFromByDifferentNumberOfUsers;
    public PurchasedByUserInfo $purchasedByUser;
    public static function create(string $categoryId) : ProductCategoryResultDetails
    {
        $result = new ProductCategoryResultDetails();
        $result->categoryId = $categoryId;
        return $result;
    }
    public static function hydrate(array $arr) : ProductCategoryResultDetails
    {
        $result = ProductCategoryResultDetailsCategoryResultDetails::hydrateBase(new ProductCategoryResultDetails(), $arr);
        if (array_key_exists("purchasedFromByDifferentNumberOfUsers", $arr))
        {
            $result->purchasedFromByDifferentNumberOfUsers = $arr["purchasedFromByDifferentNumberOfUsers"];
        }
        if (array_key_exists("purchasedByUser", $arr))
        {
            $result->purchasedByUser = PurchasedByUserInfo::hydrate($arr["purchasedByUser"]);
        }
        return $result;
    }
    function withPurchasedFromByDifferentNumberOfUsers(int $purchasedFromByDifferentNumberOfUsers)
    {
        $this->purchasedFromByDifferentNumberOfUsers = $purchasedFromByDifferentNumberOfUsers;
        return $this;
    }
    function withPurchasedByUser(PurchasedByUserInfo $purchasedByUser)
    {
        $this->purchasedByUser = $purchasedByUser;
        return $this;
    }
    function withCategoryId(string $categoryId)
    {
        $this->categoryId = $categoryId;
        return $this;
    }
    function withDisplayName(Multilingual $displayName)
    {
        $this->displayName = $displayName;
        return $this;
    }
    function withAssortments(int ... $assortments)
    {
        $this->assortments = $assortments;
        return $this;
    }
    function withData(string $key, DataValue $value)
    {
        if (!isset($this->data))
        {
            $this->data = array();
        }
        $this->data[$key] = $value;
        return $this;
    }
    function withViewedByUser(ViewedByUserInfo $viewedByUser)
    {
        $this->viewedByUser = $viewedByUser;
        return $this;
    }
    function withCreatedUtc(DateTime $createdUtc)
    {
        $this->createdUtc = $createdUtc;
        return $this;
    }
    function withLastViewedUtc(?DateTime $lastViewedUtc)
    {
        $this->lastViewedUtc = $lastViewedUtc;
        return $this;
    }
    function withViewedTotalNumberOfTimes(int $viewedTotalNumberOfTimes)
    {
        $this->viewedTotalNumberOfTimes = $viewedTotalNumberOfTimes;
        return $this;
    }
    function withViewedByDifferentNumberOfUsers(int $viewedByDifferentNumberOfUsers)
    {
        $this->viewedByDifferentNumberOfUsers = $viewedByDifferentNumberOfUsers;
        return $this;
    }
    function withDisabled(bool $disabled)
    {
        $this->disabled = $disabled;
        return $this;
    }
    function withChildCategories(ProductCategoryResultDetails ... $childCategories)
    {
        $this->childCategories = $childCategories;
        return $this;
    }
    function withParentCategories(ProductCategoryResultDetails ... $parentCategories)
    {
        $this->parentCategories = $parentCategories;
        return $this;
    }
}
