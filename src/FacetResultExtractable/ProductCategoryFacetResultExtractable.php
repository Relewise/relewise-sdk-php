<?php declare(strict_types=1);

namespace Relewise\FacetResultExtractable;

use Relewise\Models\FacetingField;
use Relewise\Models\ProductCategoryAssortmentFacetResult;
use Relewise\Models\ProductCategoryDataDoubleRangeFacetResult;
use Relewise\Models\ProductCategoryDataDoubleRangesFacetResult;
use Relewise\Models\ProductCategoryDataStringValueFacetResult;
use Relewise\Models\stringProductCategoryDataValueFacetResult;
use Relewise\Models\ProductCategoryDataBooleanValueFacetResult;
use Relewise\Models\boolProductCategoryDataValueFacetResult;
use Relewise\Models\ProductCategoryDataDoubleValueFacetResult;
use Relewise\Models\floatProductCategoryDataValueFacetResult;
use Relewise\Models\ProductCategoryDataObjectFacetResult;

abstract class ProductCategoryFacetResultExtractable
{
    public array $items;

    public function assortment() : ?ProductCategoryAssortmentFacetResult
    {
        foreach ($this->items as $value)
        {
            if ($value instanceof ProductCategoryAssortmentFacetResult && $value->field == FacetingField::Assortment)
            {
                return $value;
            }
        }
        return Null;
    }

    public function dataDoubleRange(string $key) : ?ProductCategoryDataDoubleRangeFacetResult
    {
        foreach ($this->items as $value)
        {
            if ($value instanceof ProductCategoryDataDoubleRangeFacetResult && $value->field == FacetingField::Data && $value->key == $key)
            {
                return $value;
            }
        }
        return Null;
    }

    public function dataDoubleRanges(string $key) : ?ProductCategoryDataDoubleRangesFacetResult
    {
        foreach ($this->items as $value)
        {
            if ($value instanceof ProductCategoryDataDoubleRangesFacetResult && $value->field == FacetingField::Data && $value->key == $key)
            {
                return $value;
            }
        }
        return Null;
    }

    public function dataString(string $key) : ?ProductCategoryDataStringValueFacetResult
    {
        foreach ($this->items as $value)
        {
            if ($value instanceof stringProductCategoryDataValueFacetResult && $value->field == FacetingField::Data && $value->key == $key)
            {
                return $value;
            }
        }
        return Null;
    }

    public function dataBoolean(string $key) : ?ProductCategoryDataBooleanValueFacetResult
    {
        foreach ($this->items as $value)
        {
            if ($value instanceof boolProductCategoryDataValueFacetResult && $value->field == FacetingField::Data && $value->key == $key)
            {
                return $value;
            }
        }
        return Null;
    }

    public function dataDouble(string $key) : ?ProductCategoryDataDoubleValueFacetResult
    {
        foreach ($this->items as $value)
        {
            if ($value instanceof floatProductCategoryDataValueFacetResult && $value->field == FacetingField::Data && $value->key == $key)
            {
                return $value;
            }
        }
        return Null;
    }

    public function dataObject(string $key) : ?ProductCategoryDataObjectFacetResult
    {
        foreach ($this->items as $value)
        {
            if ($value instanceof ProductCategoryDataObjectFacetResult && $value->field == FacetingField::Data && $value->key == $key)
            {
                return $value;
            }
        }
        return Null;
    }
}