<?php declare(strict_types=1);

namespace Relewise\Models;

use DateTime;
use JsonSerializable;

class ProductChangeTriggerResultProductChangeResultDetails implements JsonSerializable
{
    public DateTime $changeTimeUtc;
    
    public DataValue $oldValue;
    
    public DataValue $newValue;
    
    public ProductResultDetails $product;
    
    public static function create(DateTime $changeTimeUtc, DataValue $oldValue, DataValue $newValue, ProductResultDetails $product) : ProductChangeTriggerResultProductChangeResultDetails
    {
        $result = new ProductChangeTriggerResultProductChangeResultDetails();
        $result->changeTimeUtc = $changeTimeUtc;
        $result->oldValue = $oldValue;
        $result->newValue = $newValue;
        $result->product = $product;
        return $result;
    }
    
    public static function hydrate(array $arr) : ProductChangeTriggerResultProductChangeResultDetails
    {
        $result = new ProductChangeTriggerResultProductChangeResultDetails();
        if (array_key_exists("changeTimeUtc", $arr))
        {
            $result->changeTimeUtc = new DateTime($arr["changeTimeUtc"]);
        }
        if (array_key_exists("oldValue", $arr))
        {
            $result->oldValue = DataValue::hydrate($arr["oldValue"]);
        }
        if (array_key_exists("newValue", $arr))
        {
            $result->newValue = DataValue::hydrate($arr["newValue"]);
        }
        if (array_key_exists("product", $arr))
        {
            $result->product = ProductResultDetails::hydrate($arr["product"]);
        }
        return $result;
    }
    
    function setChangeTimeUtc(DateTime $changeTimeUtc)
    {
        $this->changeTimeUtc = $changeTimeUtc;
        return $this;
    }
    
    function setOldValue(DataValue $oldValue)
    {
        $this->oldValue = $oldValue;
        return $this;
    }
    
    function setNewValue(DataValue $newValue)
    {
        $this->newValue = $newValue;
        return $this;
    }
    
    function setProduct(ProductResultDetails $product)
    {
        $this->product = $product;
        return $this;
    }
    
    public function jsonSerialize(): mixed
    {
        $result = array();
        if (isset($this->changeTimeUtc))
        {
            $result["changeTimeUtc"] = $this->changeTimeUtc->format(DATE_ATOM);
        }
        if (isset($this->oldValue))
        {
            $result["oldValue"] = $this->oldValue;
        }
        if (isset($this->newValue))
        {
            $result["newValue"] = $this->newValue;
        }
        if (isset($this->product))
        {
            $result["product"] = $this->product;
        }
        return $result;
    }
}
