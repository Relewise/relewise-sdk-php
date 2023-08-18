<?php declare(strict_types=1);

namespace Relewise\Models;

use DateTime;

class ProductInterestTriggerResult
{
    public string $typeDefinition = "Relewise.Client.Responses.Triggers.Results.ProductInterestTriggerResult, Relewise.Client";
    public UserResultDetails $user;
    public array $products;
    public static function create() : ProductInterestTriggerResult
    {
        $result = new ProductInterestTriggerResult();
        return $result;
    }
    public static function hydrate(array $arr) : ProductInterestTriggerResult
    {
        $result = new ProductInterestTriggerResult();
        if (array_key_exists("user", $arr))
        {
            $result->user = UserResultDetails::hydrate($arr["user"]);
        }
        if (array_key_exists("products", $arr))
        {
            $result->products = array();
            foreach($arr["products"] as &$value)
            {
                array_push($result->products, ProductInterestTriggerResultProductAndVariant::hydrate($value));
            }
        }
        return $result;
    }
    function setUser(UserResultDetails $user)
    {
        $this->user = $user;
        return $this;
    }
    function setProducts(ProductInterestTriggerResultProductAndVariant ... $products)
    {
        $this->products = $products;
        return $this;
    }
    /**
     * Sets products to a new value from an array.
     * @param ProductInterestTriggerResultProductAndVariant[] $products new value.
     */
    function setProductsFromArray(array $products)
    {
        $this->products = $products;
        return $this;
    }
    /**
     * Adds a new element to products.
     * @param ProductInterestTriggerResultProductAndVariant $products new element.
     */
    function addToProducts(ProductInterestTriggerResultProductAndVariant $products)
    {
        if (!isset($this->products))
        {
            $this->products = array();
        }
        array_push($this->products, $products);
        return $this;
    }
}
