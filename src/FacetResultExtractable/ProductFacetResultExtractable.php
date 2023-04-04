<?php declare(strict_types=1);

namespace Relewise\FacetResultExtractable;

use Relewise\Models\FacetingField;
use Relewise\Models\CategorySelectionStrategy;
use Relewise\Models\CategoryFacetResult;
use Relewise\Models\AssortmentSelectionStrategy;
use Relewise\Models\ProductAssortmentFacetResult;
use Relewise\Models\BrandFacetResult;
use Relewise\Models\PriceSelectionStrategy;
use Relewise\Models\PriceRangeFacetResult;
use Relewise\Models\PriceRangesFacetResult;
use Relewise\Models\DataSelectionStrategy;
use Relewise\Models\ProductDataDoubleRangeFacetResult;
use Relewise\Models\ProductDataDoubleRangesFacetResult;
use Relewise\Models\VariantSpecificationFacetResult;
use Relewise\Models\ProductDataStringValueFacetResult;
use Relewise\Models\stringProductDataValueFacetResult;
use Relewise\Models\ProductDataBooleanValueFacetResult;
use Relewise\Models\boolProductDataValueFacetResult;
use Relewise\Models\ProductDataDoubleValueFacetResult;
use Relewise\Models\floatProductDataValueFacetResult;
use Relewise\Models\ProductDataObjectFacetResult;

abstract class ProductFacetResultExtractable
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

    public function assortment(AssortmentSelectionStrategy $selectionStrategy) : ?ProductAssortmentFacetResult
    {
        foreach ($this->items as $value)
        {
            if ($value instanceof ProductAssortmentFacetResult && $value->field == FacetingField::Assortment && $value->assortmentSelectionStrategy == $selectionStrategy)
            {
                return $value;
            }
        }
        return Null;
    }

    public function brand() : ?BrandFacetResult
    {
        foreach ($this->items as $value)
        {
            if ($value instanceof BrandFacetResult && $value->field == FacetingField::Brand)
            {
                return $value;
            }
        }
        return Null;
    }

    public function listPriceRange(PriceSelectionStrategy $selectionStrategy) : ?PriceRangeFacetResult
    {
        foreach ($this->items as $value)
        {
            if ($value instanceof PriceRangeFacetResult && $value->field == FacetingField::ListPrice && $value->priceSelectionStrategy == $selectionStrategy)
            {
                return $value;
            }
        }
        return Null;
    }

    public function salesPriceRange(PriceSelectionStrategy $selectionStrategy) : ?PriceRangeFacetResult
    {
        foreach ($this->items as $value)
        {
            if ($value instanceof PriceRangeFacetResult && $value->field == FacetingField::SalesPrice && $value->priceSelectionStrategy == $selectionStrategy)
            {
                return $value;
            }
        }
        return Null;
    }

    public function listPriceRanges(PriceSelectionStrategy $selectionStrategy) : ?PriceRangesFacetResult
    {
        foreach ($this->items as $value)
        {
            if ($value instanceof PriceRangesFacetResult && $value->field == FacetingField::ListPrice && $value->priceSelectionStrategy == $selectionStrategy)
            {
                return $value;
            }
        }
        return Null;
    }

    public function listPriceRangesWithExpandedRangeSize(PriceSelectionStrategy $selectionStrategy, ?float $expandedRangeSize) : ?PriceRangesFacetResult
    {
        foreach ($this->items as $value)
        {
            if ($value instanceof PriceRangesFacetResult && $value->field == FacetingField::ListPrice && $value->priceSelectionStrategy == $selectionStrategy && $value->expandedRangeSize == $expandedRangeSize)
            {
                return $value;
            }
        }
        return Null;
    }

    public function salesPriceRanges(PriceSelectionStrategy $selectionStrategy) : ?PriceRangesFacetResult
    {
        foreach ($this->items as $value)
        {
            if ($value instanceof PriceRangesFacetResult && $value->field == FacetingField::SalesPrice && $value->priceSelectionStrategy == $selectionStrategy)
            {
                return $value;
            }
        }
        return Null;
    }

    public function salesPriceRangesWithExpandedRangeSize(PriceSelectionStrategy $selectionStrategy, ?float $expandedRangeSize) : ?PriceRangesFacetResult
    {
        foreach ($this->items as $value)
        {
            if ($value instanceof PriceRangesFacetResult && $value->field == FacetingField::SalesPrice && $value->priceSelectionStrategy == $selectionStrategy && $value->expandedRangeSize == $expandedRangeSize)
            {
                return $value;
            }
        }
        return Null;
    }

    public function dataDoubleRange(DataSelectionStrategy $selectionStrategy, string $key) : ?ProductDataDoubleRangeFacetResult
    {
        foreach ($this->items as $value)
        {
            if ($value instanceof ProductDataDoubleRangeFacetResult && $value->field == FacetingField::Data && $value->dataSelectionStrategy == $selectionStrategy && $value->key == $key)
            {
                return $value;
            }
        }
        return Null;
    }

    public function dataDoubleRanges(DataSelectionStrategy $selectionStrategy, string $key) : ?ProductDataDoubleRangesFacetResult
    {
        foreach ($this->items as $value)
        {
            if ($value instanceof ProductDataDoubleRangesFacetResult && $value->field == FacetingField::Data && $value->dataSelectionStrategy == $selectionStrategy && $value->key == $key)
            {
                return $value;
            }
        }
        return Null;
    }

    public function variantSpecification(string $key) : ?VariantSpecificationFacetResult
    {
        foreach ($this->items as $value)
        {
            if ($value instanceof VariantSpecificationFacetResult && $value->field == FacetingField::VariantSpecification && $value->key == $key)
            {
                return $value;
            }
        }
        return Null;
    }

    public function dataString(DataSelectionStrategy $selectionStrategy, string $key) : ?ProductDataStringValueFacetResult
    {
        foreach ($this->items as $value)
        {
            if ($value instanceof stringProductDataValueFacetResult && $value->field == FacetingField::Data && $value->dataSelectionStrategy == $selectionStrategy && $value->key == $key)
            {
                return $value;
            }
        }
        return Null;
    }

    public function dataBoolean(DataSelectionStrategy $selectionStrategy, string $key) : ?ProductDataBooleanValueFacetResult
    {
        foreach ($this->items as $value)
        {
            if ($value instanceof boolProductDataValueFacetResult && $value->field == FacetingField::Data && $value->dataSelectionStrategy == $selectionStrategy && $value->key == $key)
            {
                return $value;
            }
        }
        return Null;
    }

    public function dataDouble(DataSelectionStrategy $selectionStrategy, string $key) : ?ProductDataDoubleValueFacetResult
    {
        foreach ($this->items as $value)
        {
            if ($value instanceof floatProductDataValueFacetResult && $value->field == FacetingField::Data && $value->dataSelectionStrategy == $selectionStrategy && $value->key == $key)
            {
                return $value;
            }
        }
        return Null;
    }

    public function dataObject(DataSelectionStrategy $selectionStrategy, string $key) : ?ProductDataObjectFacetResult
    {
        foreach ($this->items as $value)
        {
            if ($value instanceof ProductDataObjectFacetResult && $value->field == FacetingField::Data && $value->dataSelectionStrategy == $selectionStrategy && $value->key == $key)
            {
                return $value;
            }
        }
        return Null;
    }
}