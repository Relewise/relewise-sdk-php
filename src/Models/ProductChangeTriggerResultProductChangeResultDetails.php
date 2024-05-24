<?php declare(strict_types=1);

namespace Relewise\Models;

use DateTime;

class ProductChangeTriggerResultProductChangeResultDetails
{
    public string $typeDefinition = "Relewise.Client.Responses.Triggers.Results.ProductChangeTriggerResult+ProductChangeResultDetails, Relewise.Client";
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
}
