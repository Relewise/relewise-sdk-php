<?php declare(strict_types=1);

namespace Relewise\Models;

use DateTime;

class ProductResultDetails
{
    public string $typeDefinition = "Relewise.Client.DataTypes.ProductResultDetails, Relewise.Client";
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
            $result->createdUtc = new DateTime($arr["createdUtc"]);
        }
        if (array_key_exists("lastPurchasedUtc", $arr))
        {
            $result->lastPurchasedUtc = new DateTime($arr["lastPurchasedUtc"]);
        }
        if (array_key_exists("lastViewedUtc", $arr))
        {
            $result->lastViewedUtc = new DateTime($arr["lastViewedUtc"]);
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
    /**
     * Sets productId to a new value.
     * @param string $productId new value.
     */
    function setProductId(string $productId)
    {
        $this->productId = $productId;
        return $this;
    }
    /**
     * Sets displayName to a new value.
     * @param Multilingual $displayName new value.
     */
    function setDisplayName(Multilingual $displayName)
    {
        $this->displayName = $displayName;
        return $this;
    }
    /**
     * Sets variant to a new value.
     * @param VariantResult $variant new value.
     */
    function setVariant(VariantResult $variant)
    {
        $this->variant = $variant;
        return $this;
    }
    /**
     * Sets assortments to a new value.
     * @param int[] $assortments new value.
     */
    function setAssortments(int ... $assortments)
    {
        $this->assortments = $assortments;
        return $this;
    }
    /**
     * Sets assortments to a new value from an array.
     * @param int[] $assortments new value.
     */
    function setAssortmentsFromArray(array $assortments)
    {
        $this->assortments = $assortments;
        return $this;
    }
    /**
     * Adds a new element to assortments.
     * @param int $assortments new element.
     */
    function addToAssortments(int $assortments)
    {
        if (!isset($this->assortments))
        {
            $this->assortments = array();
        }
        array_push($this->assortments, $assortments);
        return $this;
    }
    /**
     * Sets the value of a specific key in data.
     * @param string $key index.
     * @param DataValue $value new value.
     */
    function addToData(string $key, DataValue $value)
    {
        if (!isset($this->data))
        {
            $this->data = array();
        }
        $this->data[$key] = $value;
        return $this;
    }
    /**
     * Sets data to a new value.
     * @param array<string, DataValue> $data associative array.
     */
    function setDataFromAssociativeArray(array $data)
    {
        $this->data = $data;
        return $this;
    }
    /**
     * Sets categoryPaths to a new value.
     * @param CategoryPathResultDetails[] $categoryPaths new value.
     */
    function setCategoryPaths(CategoryPathResultDetails ... $categoryPaths)
    {
        $this->categoryPaths = $categoryPaths;
        return $this;
    }
    /**
     * Sets categoryPaths to a new value from an array.
     * @param CategoryPathResultDetails[] $categoryPaths new value.
     */
    function setCategoryPathsFromArray(array $categoryPaths)
    {
        $this->categoryPaths = $categoryPaths;
        return $this;
    }
    /**
     * Adds a new element to categoryPaths.
     * @param CategoryPathResultDetails $categoryPaths new element.
     */
    function addToCategoryPaths(CategoryPathResultDetails $categoryPaths)
    {
        if (!isset($this->categoryPaths))
        {
            $this->categoryPaths = array();
        }
        array_push($this->categoryPaths, $categoryPaths);
        return $this;
    }
    /**
     * Sets purchasedByUser to a new value.
     * @param PurchasedByUserInfo $purchasedByUser new value.
     */
    function setPurchasedByUser(PurchasedByUserInfo $purchasedByUser)
    {
        $this->purchasedByUser = $purchasedByUser;
        return $this;
    }
    /**
     * Sets viewedByUser to a new value.
     * @param ViewedByUserInfo $viewedByUser new value.
     */
    function setViewedByUser(ViewedByUserInfo $viewedByUser)
    {
        $this->viewedByUser = $viewedByUser;
        return $this;
    }
    /**
     * Sets allVariants to a new value.
     * @param VariantResultDetails[] $allVariants new value.
     */
    function setAllVariants(VariantResultDetails ... $allVariants)
    {
        $this->allVariants = $allVariants;
        return $this;
    }
    /**
     * Sets allVariants to a new value from an array.
     * @param VariantResultDetails[] $allVariants new value.
     */
    function setAllVariantsFromArray(array $allVariants)
    {
        $this->allVariants = $allVariants;
        return $this;
    }
    /**
     * Adds a new element to allVariants.
     * @param VariantResultDetails $allVariants new element.
     */
    function addToAllVariants(VariantResultDetails $allVariants)
    {
        if (!isset($this->allVariants))
        {
            $this->allVariants = array();
        }
        array_push($this->allVariants, $allVariants);
        return $this;
    }
    /**
     * Sets createdUtc to a new value.
     * @param DateTime $createdUtc new value.
     */
    function setCreatedUtc(DateTime $createdUtc)
    {
        $this->createdUtc = $createdUtc;
        return $this;
    }
    /**
     * Sets lastPurchasedUtc to a new value.
     * @param ?DateTime $lastPurchasedUtc new value.
     */
    function setLastPurchasedUtc(?DateTime $lastPurchasedUtc)
    {
        $this->lastPurchasedUtc = $lastPurchasedUtc;
        return $this;
    }
    /**
     * Sets lastViewedUtc to a new value.
     * @param ?DateTime $lastViewedUtc new value.
     */
    function setLastViewedUtc(?DateTime $lastViewedUtc)
    {
        $this->lastViewedUtc = $lastViewedUtc;
        return $this;
    }
    /**
     * Sets containedInTotalNumberOfOrders to a new value.
     * @param int $containedInTotalNumberOfOrders new value.
     */
    function setContainedInTotalNumberOfOrders(int $containedInTotalNumberOfOrders)
    {
        $this->containedInTotalNumberOfOrders = $containedInTotalNumberOfOrders;
        return $this;
    }
    /**
     * Sets viewedTotalNumberOfTimes to a new value.
     * @param int $viewedTotalNumberOfTimes new value.
     */
    function setViewedTotalNumberOfTimes(int $viewedTotalNumberOfTimes)
    {
        $this->viewedTotalNumberOfTimes = $viewedTotalNumberOfTimes;
        return $this;
    }
    /**
     * Sets purchasedByDifferentNumberOfUsers to a new value.
     * @param int $purchasedByDifferentNumberOfUsers new value.
     */
    function setPurchasedByDifferentNumberOfUsers(int $purchasedByDifferentNumberOfUsers)
    {
        $this->purchasedByDifferentNumberOfUsers = $purchasedByDifferentNumberOfUsers;
        return $this;
    }
    /**
     * Sets viewedByDifferentNumberOfUsers to a new value.
     * @param int $viewedByDifferentNumberOfUsers new value.
     */
    function setViewedByDifferentNumberOfUsers(int $viewedByDifferentNumberOfUsers)
    {
        $this->viewedByDifferentNumberOfUsers = $viewedByDifferentNumberOfUsers;
        return $this;
    }
    /**
     * Sets disabled to a new value.
     * @param bool $disabled new value.
     */
    function setDisabled(bool $disabled)
    {
        $this->disabled = $disabled;
        return $this;
    }
    /**
     * Sets deleted to a new value.
     * @param bool $deleted new value.
     */
    function setDeleted(bool $deleted)
    {
        $this->deleted = $deleted;
        return $this;
    }
    /**
     * Sets listPrice to a new value.
     * @param MultiCurrency $listPrice new value.
     */
    function setListPrice(MultiCurrency $listPrice)
    {
        $this->listPrice = $listPrice;
        return $this;
    }
    /**
     * Sets salesPrice to a new value.
     * @param MultiCurrency $salesPrice new value.
     */
    function setSalesPrice(MultiCurrency $salesPrice)
    {
        $this->salesPrice = $salesPrice;
        return $this;
    }
    /**
     * Sets brand to a new value.
     * @param BrandResultDetails $brand new value.
     */
    function setBrand(BrandResultDetails $brand)
    {
        $this->brand = $brand;
        return $this;
    }
}
