<?php declare(strict_types=1);

namespace Relewise\Models\DTO;

use DateTime;

class ProductInterestTriggerResult
{
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
    function withUser(UserResultDetails $user)
    {
        $this->user = $user;
        return $this;
    }
    function withProducts(ProductInterestTriggerResultProductAndVariant ... $products)
    {
        $this->products = $products;
        return $this;
    }
}