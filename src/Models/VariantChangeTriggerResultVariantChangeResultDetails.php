<?php declare(strict_types=1);

namespace Relewise\Models;

use DateTime;
use JsonSerializable;

class VariantChangeTriggerResultVariantChangeResultDetails implements JsonSerializable
{
    public string $typeDefinition = "Relewise.Client.Responses.Triggers.Results.VariantChangeTriggerResult+VariantChangeResultDetails, Relewise.Client";
    public DateTime $changeTime;
    public DataValue $oldValue;
    public DataValue $newValue;
    public ProductResultDetails $product;
    public VariantResultDetails $variant;
    public static function create(DateTime $changeTime, DataValue $oldValue, DataValue $newValue, ProductResultDetails $product, VariantResultDetails $variant) : VariantChangeTriggerResultVariantChangeResultDetails
    {
        $result = new VariantChangeTriggerResultVariantChangeResultDetails();
        $result->changeTime = $changeTime;
        $result->oldValue = $oldValue;
        $result->newValue = $newValue;
        $result->product = $product;
        $result->variant = $variant;
        return $result;
    }
    public static function hydrate(array $arr) : VariantChangeTriggerResultVariantChangeResultDetails
    {
        $result = new VariantChangeTriggerResultVariantChangeResultDetails();
        if (array_key_exists("changeTime", $arr))
        {
            $result->changeTime = new DateTime($arr["changeTime"]);
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
        if (array_key_exists("variant", $arr))
        {
            $result->variant = VariantResultDetails::hydrate($arr["variant"]);
        }
        return $result;
    }
    function setChangeTime(DateTime $changeTime)
    {
        $this->changeTime = $changeTime;
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
    function setVariant(VariantResultDetails $variant)
    {
        $this->variant = $variant;
        return $this;
    }
    public function jsonSerialize(): mixed
    {
        $result = array();
        $result["typeDefinition"] = "Relewise.Client.Responses.Triggers.Results.VariantChangeTriggerResult+VariantChangeResultDetails, Relewise.Client";
        if (isset($this->changeTime))
        {
            $result["changeTime"] = $this->changeTime->format(DATE_ATOM);
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
        if (isset($this->variant))
        {
            $result["variant"] = $this->variant;
        }
        return $result;
    }
}
