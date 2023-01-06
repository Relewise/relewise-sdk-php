<?php declare(strict_types=1);

namespace Relewise\Models\DTO;

use DateTime;

class ProductResultDetails
{
    public string $productId;
    public Multilingual $displayName;
    public VariantResult $variant;
    public array $assortments;
    public array $data;
    public array $categoryPaths;
    public PurchasedByUserInfo $purchasedByUser;
    public ViewedByUserInfo $viewedByUser;
    public array $allVariants;
    public DateTime $createdUtc;
    public ?DateTime $lastPurchasedUtc;
    public ?DateTime $lastViewedUtc;
    public int $containedInTotalNumberOfOrders;
    public int $viewedTotalNumberOfTimes;
    public int $purchasedByDifferentNumberOfUsers;
    public int $viewedByDifferentNumberOfUsers;
    public bool $disabled;
    public bool $deleted;
    public MultiCurrency $listPrice;
    public MultiCurrency $salesPrice;
    public BrandResultDetails $brand;
    public static function create(string $productId) : ProductResultDetails
    {
        $result = new ProductResultDetails();
        $result->productId = $productId;
        return $result;
    }
    public static function hydrate(array $arr) : ProductResultDetails
    {
        $result = new ProductResultDetails();
        if (array_key_exists("productId", $arr))
        {
            $result->productId = $arr["productId"];
        }
        if (array_key_exists("displayName", $arr))
        {
            $result->displayName = Multilingual::hydrate($arr["displayName"]);
        }
        if (array_key_exists("variant", $arr))
        {
            $result->variant = VariantResult::hydrate($arr["variant"]);
        }
        if (array_key_exists("assortments", $arr))
        {
            $result->assortments = array();
            foreach($arr["assortments"] as &$value)
            {
                array_push($result->assortments, $value);
            }
        }
        if (array_key_exists("data", $arr))
        {
            $result->data = array();
            foreach($arr["data"] as $key => $value)
            {
                $result->data[$key] = DataValue::hydrate($value);
            }
        }
        if (array_key_exists("categoryPaths", $arr))
        {
            $result->categoryPaths = array();
            foreach($arr["categoryPaths"] as &$value)
            {
                array_push($result->categoryPaths, CategoryPathResultDetails::hydrate($value));
            }
        }
        if (array_key_exists("purchasedByUser", $arr))
        {
            $result->purchasedByUser = PurchasedByUserInfo::hydrate($arr["purchasedByUser"]);
        }
        if (array_key_exists("viewedByUser", $arr))
        {
            $result->viewedByUser = ViewedByUserInfo::hydrate($arr["viewedByUser"]);
        }
        if (array_key_exists("allVariants", $arr))
        {
            $result->allVariants = array();
            foreach($arr["allVariants"] as &$value)
            {
                array_push($result->allVariants, VariantResultDetails::hydrate($value));
            }
        }
        if (array_key_exists("createdUtc", $arr))
        {
            $result->createdUtc = $arr["createdUtc"];
        }
        if (array_key_exists("lastPurchasedUtc", $arr))
        {
            $result->lastPurchasedUtc = $arr["lastPurchasedUtc"];
        }
        if (array_key_exists("lastViewedUtc", $arr))
        {
            $result->lastViewedUtc = $arr["lastViewedUtc"];
        }
        if (array_key_exists("containedInTotalNumberOfOrders", $arr))
        {
            $result->containedInTotalNumberOfOrders = $arr["containedInTotalNumberOfOrders"];
        }
        if (array_key_exists("viewedTotalNumberOfTimes", $arr))
        {
            $result->viewedTotalNumberOfTimes = $arr["viewedTotalNumberOfTimes"];
        }
        if (array_key_exists("purchasedByDifferentNumberOfUsers", $arr))
        {
            $result->purchasedByDifferentNumberOfUsers = $arr["purchasedByDifferentNumberOfUsers"];
        }
        if (array_key_exists("viewedByDifferentNumberOfUsers", $arr))
        {
            $result->viewedByDifferentNumberOfUsers = $arr["viewedByDifferentNumberOfUsers"];
        }
        if (array_key_exists("disabled", $arr))
        {
            $result->disabled = $arr["disabled"];
        }
        if (array_key_exists("deleted", $arr))
        {
            $result->deleted = $arr["deleted"];
        }
        if (array_key_exists("listPrice", $arr))
        {
            $result->listPrice = MultiCurrency::hydrate($arr["listPrice"]);
        }
        if (array_key_exists("salesPrice", $arr))
        {
            $result->salesPrice = MultiCurrency::hydrate($arr["salesPrice"]);
        }
        if (array_key_exists("brand", $arr))
        {
            $result->brand = BrandResultDetails::hydrate($arr["brand"]);
        }
        return $result;
    }
    function withProductId(string $productId)
    {
        $this->productId = $productId;
        return $this;
    }
    function withDisplayName(Multilingual $displayName)
    {
        $this->displayName = $displayName;
        return $this;
    }
    function withVariant(VariantResult $variant)
    {
        $this->variant = $variant;
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
    function withCategoryPaths(CategoryPathResultDetails ... $categoryPaths)
    {
        $this->categoryPaths = $categoryPaths;
        return $this;
    }
    function withPurchasedByUser(PurchasedByUserInfo $purchasedByUser)
    {
        $this->purchasedByUser = $purchasedByUser;
        return $this;
    }
    function withViewedByUser(ViewedByUserInfo $viewedByUser)
    {
        $this->viewedByUser = $viewedByUser;
        return $this;
    }
    function withAllVariants(VariantResultDetails ... $allVariants)
    {
        $this->allVariants = $allVariants;
        return $this;
    }
    function withCreatedUtc(DateTime $createdUtc)
    {
        $this->createdUtc = $createdUtc;
        return $this;
    }
    function withLastPurchasedUtc(?DateTime $lastPurchasedUtc)
    {
        $this->lastPurchasedUtc = $lastPurchasedUtc;
        return $this;
    }
    function withLastViewedUtc(?DateTime $lastViewedUtc)
    {
        $this->lastViewedUtc = $lastViewedUtc;
        return $this;
    }
    function withContainedInTotalNumberOfOrders(int $containedInTotalNumberOfOrders)
    {
        $this->containedInTotalNumberOfOrders = $containedInTotalNumberOfOrders;
        return $this;
    }
    function withViewedTotalNumberOfTimes(int $viewedTotalNumberOfTimes)
    {
        $this->viewedTotalNumberOfTimes = $viewedTotalNumberOfTimes;
        return $this;
    }
    function withPurchasedByDifferentNumberOfUsers(int $purchasedByDifferentNumberOfUsers)
    {
        $this->purchasedByDifferentNumberOfUsers = $purchasedByDifferentNumberOfUsers;
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
    function withDeleted(bool $deleted)
    {
        $this->deleted = $deleted;
        return $this;
    }
    function withListPrice(MultiCurrency $listPrice)
    {
        $this->listPrice = $listPrice;
        return $this;
    }
    function withSalesPrice(MultiCurrency $salesPrice)
    {
        $this->salesPrice = $salesPrice;
        return $this;
    }
    function withBrand(BrandResultDetails $brand)
    {
        $this->brand = $brand;
        return $this;
    }
}
