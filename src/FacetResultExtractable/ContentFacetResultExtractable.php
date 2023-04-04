<?php declare(strict_types=1);

namespace Relewise\FacetResultExtractable;

use Relewise\Models\FacetingField;
use Relewise\Models\CategorySelectionStrategy;
use Relewise\Models\CategoryFacetResult;
use Relewise\Models\ContentAssortmentFacetResult;
use Relewise\Models\ContentDataDoubleRangeFacetResult;
use Relewise\Models\ContentDataDoubleRangesFacetResult;
use Relewise\Models\ContentDataStringValueFacetResult;
use Relewise\Models\stringContentDataValueFacetResult;
use Relewise\Models\ContentDataBooleanValueFacetResult;
use Relewise\Models\boolContentDataValueFacetResult;
use Relewise\Models\ContentDataDoubleValueFacetResult;
use Relewise\Models\floatContentDataValueFacetResult;
use Relewise\Models\ContentDataObjectFacetResult;

abstract class ContentFacetResultExtractable
{
    public array $items;

    public function category(CategorySelectionStrategy $selectionStrategy) : ?CategoryFacetResult
    {
        foreach ($this->items as $value)
        {
            if ($value instanceof CategoryFacetResult && $value->field == FacetingField::Category && $value->categorySelectionStrategy == $selectionStrategy)
            {
                return $value;
            }
        }
        return Null;
    }

    public function assortment() : ?ContentAssortmentFacetResult
    {
        foreach ($this->items as $value)
        {
            if ($value instanceof ContentAssortmentFacetResult && $value->field == FacetingField::Assortment)
            {
                return $value;
            }
        }
        return Null;
    }

    public function dataDoubleRange(string $key) : ?ContentDataDoubleRangeFacetResult
    {
        foreach ($this->items as $value)
        {
            if ($value instanceof ContentDataDoubleRangeFacetResult && $value->field == FacetingField::Data && $value->key == $key)
            {
                return $value;
            }
        }
        return Null;
    }

    public function dataDoubleRanges(string $key) : ?ContentDataDoubleRangesFacetResult
    {
        foreach ($this->items as $value)
        {
            if ($value instanceof ContentDataDoubleRangesFacetResult && $value->field == FacetingField::Data && $value->key == $key)
            {
                return $value;
            }
        }
        return Null;
    }

    public function dataString(string $key) : ?ContentDataStringValueFacetResult
    {
        foreach ($this->items as $value)
        {
            if ($value instanceof stringContentDataValueFacetResult && $value->field == FacetingField::Data && $value->key == $key)
            {
                return $value;
            }
        }
        return Null;
    }

    public function dataBoolean(string $key) : ?ContentDataBooleanValueFacetResult
    {
        foreach ($this->items as $value)
        {
            if ($value instanceof boolContentDataValueFacetResult && $value->field == FacetingField::Data && $value->key == $key)
            {
                return $value;
            }
        }
        return Null;
    }

    public function dataDouble(string $key) : ?ContentDataDoubleValueFacetResult
    {
        foreach ($this->items as $value)
        {
            if ($value instanceof floatContentDataValueFacetResult && $value->field == FacetingField::Data && $value->key == $key)
            {
                return $value;
            }
        }
        return Null;
    }

    public function dataObject(string $key) : ?ContentDataObjectFacetResult
    {
        foreach ($this->items as $value)
        {
            if ($value instanceof ContentDataObjectFacetResult && $value->field == FacetingField::Data && $value->key == $key)
            {
                return $value;
            }
        }
        return Null;
    }
}