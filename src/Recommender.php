<?php declare(strict_types=1);

namespace Relewise;

use Relewise\Infrastructure\HttpClient\Response;
use Relewise\Models\DTO\PurchasedWithProductRequest;
use Relewise\Models\DTO\PurchasedWithMultipleProductsRequest;
use Relewise\Models\DTO\PurchasedWithCurrentCartRequest;
use Relewise\Models\DTO\ProductsViewedAfterViewingProductRequest;
use Relewise\Models\DTO\ProductsViewedAfterViewingContentRequest;
use Relewise\Models\DTO\SimilarProductsRequest;
use Relewise\Models\DTO\PopularProductsRequest;
use Relewise\Models\DTO\RecentlyViewedProductsRequest;
use Relewise\Models\DTO\PersonalProductRecommendationRequest;
use Relewise\Models\DTO\SearchTermBasedProductRecommendationRequest;
use Relewise\Models\DTO\PopularSearchTermsRecommendationRequest;
use Relewise\Models\DTO\SortProductsRequest;
use Relewise\Models\DTO\SortVariantsRequest;
use Relewise\Models\DTO\CustomProductRecommendationRequest;
use Relewise\Models\DTO\ContentsViewedAfterViewingContentRequest;
use Relewise\Models\DTO\PersonalContentRecommendationRequest;
use Relewise\Models\DTO\ContentsViewedAfterViewingMultipleContentsRequest;
use Relewise\Models\DTO\ContentsViewedAfterViewingProductRequest;
use Relewise\Models\DTO\ContentsViewedAfterViewingMultipleProductsRequest;
use Relewise\Models\DTO\PopularContentsRequest;
use Relewise\Models\DTO\PopularContentCategoriesRecommendationRequest;
use Relewise\Models\DTO\PersonalContentCategoryRecommendationRequest;
use Relewise\Models\DTO\PopularProductCategoriesRecommendationRequest;
use Relewise\Models\DTO\PersonalProductCategoryRecommendationRequest;
use Relewise\Models\DTO\PopularBrandsRecommendationRequest;
use Relewise\Models\DTO\PersonalBrandRecommendationRequest;
use Relewise\Models\DTO\ProductRecommendationRequestCollection;
use Relewise\Models\DTO\ContentRecommendationRequestCollection;
use Relewise\Models\DTO\ProductRecommendationRequest;
use Relewise\Models\DTO\ContentRecommendationRequest;
use Relewise\Models\DTO\ContentCategoryRecommendationRequest;
use Relewise\Models\DTO\ProductCategoryRecommendationRequest;
use Relewise\Models\DTO\ProductRecommendationResponse;
use Relewise\Models\DTO\SearchTermRecommendationResponse;
use Relewise\Models\DTO\ContentRecommendationResponse;
use Relewise\Models\DTO\ContentCategoryRecommendationResponse;
use Relewise\Models\DTO\ProductCategoryRecommendationResponse;
use Relewise\Models\DTO\BrandRecommendationResponse;
use Relewise\Models\DTO\ProductRecommendationResponseCollection;
use Relewise\Models\DTO\ContentRecommendationResponseCollection;

class Recommender extends RelewiseClient
{
    public function purchasedWithProduct(PurchasedWithProductRequest $request) : ?ProductRecommendationResponse
    {
        $response = $this->requestAndValidate("PurchasedWithProductRequest", $request);
        if ($response == Null)
        {
            return Null;
        }
        return ProductRecommendationResponse::hydrate($response);
    }
    public function purchasedWithMultipleProducts(PurchasedWithMultipleProductsRequest $request) : ?ProductRecommendationResponse
    {
        $response = $this->requestAndValidate("PurchasedWithMultipleProductsRequest", $request);
        if ($response == Null)
        {
            return Null;
        }
        return ProductRecommendationResponse::hydrate($response);
    }
    public function purchasedWithCurrentCart(PurchasedWithCurrentCartRequest $request) : ?ProductRecommendationResponse
    {
        $response = $this->requestAndValidate("PurchasedWithCurrentCartRequest", $request);
        if ($response == Null)
        {
            return Null;
        }
        return ProductRecommendationResponse::hydrate($response);
    }
    public function productsViewedAfterViewingProduct(ProductsViewedAfterViewingProductRequest $request) : ?ProductRecommendationResponse
    {
        $response = $this->requestAndValidate("ProductsViewedAfterViewingProductRequest", $request);
        if ($response == Null)
        {
            return Null;
        }
        return ProductRecommendationResponse::hydrate($response);
    }
    public function productsViewedAfterViewingContent(ProductsViewedAfterViewingContentRequest $request) : ?ProductRecommendationResponse
    {
        $response = $this->requestAndValidate("ProductsViewedAfterViewingContentRequest", $request);
        if ($response == Null)
        {
            return Null;
        }
        return ProductRecommendationResponse::hydrate($response);
    }
    public function similarProducts(SimilarProductsRequest $request) : ?ProductRecommendationResponse
    {
        $response = $this->requestAndValidate("SimilarProductsRequest", $request);
        if ($response == Null)
        {
            return Null;
        }
        return ProductRecommendationResponse::hydrate($response);
    }
    public function popularProducts(PopularProductsRequest $request) : ?ProductRecommendationResponse
    {
        $response = $this->requestAndValidate("PopularProductsRequest", $request);
        if ($response == Null)
        {
            return Null;
        }
        return ProductRecommendationResponse::hydrate($response);
    }
    public function recentlyViewedProducts(RecentlyViewedProductsRequest $productsRequest) : ?ProductRecommendationResponse
    {
        $response = $this->requestAndValidate("RecentlyViewedProductsRequest", $productsRequest);
        if ($response == Null)
        {
            return Null;
        }
        return ProductRecommendationResponse::hydrate($response);
    }
    public function personalProductRecommendation(PersonalProductRecommendationRequest $request) : ?ProductRecommendationResponse
    {
        $response = $this->requestAndValidate("PersonalProductRecommendationRequest", $request);
        if ($response == Null)
        {
            return Null;
        }
        return ProductRecommendationResponse::hydrate($response);
    }
    public function searchTermBasedProductRecommendation(SearchTermBasedProductRecommendationRequest $request) : ?ProductRecommendationResponse
    {
        $response = $this->requestAndValidate("SearchTermBasedProductRecommendationRequest", $request);
        if ($response == Null)
        {
            return Null;
        }
        return ProductRecommendationResponse::hydrate($response);
    }
    public function popularSearchTermsRecommendation(PopularSearchTermsRecommendationRequest $request) : ?SearchTermRecommendationResponse
    {
        $response = $this->requestAndValidate("PopularSearchTermsRecommendationRequest", $request);
        if ($response == Null)
        {
            return Null;
        }
        return SearchTermRecommendationResponse::hydrate($response);
    }
    public function sortProducts(SortProductsRequest $request) : ?ProductRecommendationResponse
    {
        $response = $this->requestAndValidate("SortProductsRequest", $request);
        if ($response == Null)
        {
            return Null;
        }
        return ProductRecommendationResponse::hydrate($response);
    }
    public function sortVariants(SortVariantsRequest $request) : ?ProductRecommendationResponse
    {
        $response = $this->requestAndValidate("SortVariantsRequest", $request);
        if ($response == Null)
        {
            return Null;
        }
        return ProductRecommendationResponse::hydrate($response);
    }
    public function customProductRecommendation(CustomProductRecommendationRequest $request) : ?ProductRecommendationResponse
    {
        $response = $this->requestAndValidate("CustomProductRecommendationRequest", $request);
        if ($response == Null)
        {
            return Null;
        }
        return ProductRecommendationResponse::hydrate($response);
    }
    public function contentsViewedAfterViewingContent(ContentsViewedAfterViewingContentRequest $request) : ?ContentRecommendationResponse
    {
        $response = $this->requestAndValidate("ContentsViewedAfterViewingContentRequest", $request);
        if ($response == Null)
        {
            return Null;
        }
        return ContentRecommendationResponse::hydrate($response);
    }
    public function personalContentRecommendation(PersonalContentRecommendationRequest $request) : ?ContentRecommendationResponse
    {
        $response = $this->requestAndValidate("PersonalContentRecommendationRequest", $request);
        if ($response == Null)
        {
            return Null;
        }
        return ContentRecommendationResponse::hydrate($response);
    }
    public function contentsViewedAfterViewingMultipleContents(ContentsViewedAfterViewingMultipleContentsRequest $request) : ?ContentRecommendationResponse
    {
        $response = $this->requestAndValidate("ContentsViewedAfterViewingMultipleContentsRequest", $request);
        if ($response == Null)
        {
            return Null;
        }
        return ContentRecommendationResponse::hydrate($response);
    }
    public function contentsViewedAfterViewingProduct(ContentsViewedAfterViewingProductRequest $request) : ?ContentRecommendationResponse
    {
        $response = $this->requestAndValidate("ContentsViewedAfterViewingProductRequest", $request);
        if ($response == Null)
        {
            return Null;
        }
        return ContentRecommendationResponse::hydrate($response);
    }
    public function contentsViewedAfterViewingMultipleProducts(ContentsViewedAfterViewingMultipleProductsRequest $request) : ?ContentRecommendationResponse
    {
        $response = $this->requestAndValidate("ContentsViewedAfterViewingMultipleProductsRequest", $request);
        if ($response == Null)
        {
            return Null;
        }
        return ContentRecommendationResponse::hydrate($response);
    }
    public function popularContents(PopularContentsRequest $request) : ?ContentRecommendationResponse
    {
        $response = $this->requestAndValidate("PopularContentsRequest", $request);
        if ($response == Null)
        {
            return Null;
        }
        return ContentRecommendationResponse::hydrate($response);
    }
    public function popularContentCategoriesRecommendation(PopularContentCategoriesRecommendationRequest $request) : ?ContentCategoryRecommendationResponse
    {
        $response = $this->requestAndValidate("PopularContentCategoriesRecommendationRequest", $request);
        if ($response == Null)
        {
            return Null;
        }
        return ContentCategoryRecommendationResponse::hydrate($response);
    }
    public function personalContentCategoryRecommendation(PersonalContentCategoryRecommendationRequest $request) : ?ContentCategoryRecommendationResponse
    {
        $response = $this->requestAndValidate("PersonalContentCategoryRecommendationRequest", $request);
        if ($response == Null)
        {
            return Null;
        }
        return ContentCategoryRecommendationResponse::hydrate($response);
    }
    public function popularProductCategoriesRecommendation(PopularProductCategoriesRecommendationRequest $request) : ?ProductCategoryRecommendationResponse
    {
        $response = $this->requestAndValidate("PopularProductCategoriesRecommendationRequest", $request);
        if ($response == Null)
        {
            return Null;
        }
        return ProductCategoryRecommendationResponse::hydrate($response);
    }
    public function personalProductCategoryRecommendation(PersonalProductCategoryRecommendationRequest $request) : ?ProductCategoryRecommendationResponse
    {
        $response = $this->requestAndValidate("PersonalProductCategoryRecommendationRequest", $request);
        if ($response == Null)
        {
            return Null;
        }
        return ProductCategoryRecommendationResponse::hydrate($response);
    }
    public function popularBrandsRecommendation(PopularBrandsRecommendationRequest $request) : ?BrandRecommendationResponse
    {
        $response = $this->requestAndValidate("PopularBrandsRecommendationRequest", $request);
        if ($response == Null)
        {
            return Null;
        }
        return BrandRecommendationResponse::hydrate($response);
    }
    public function personalBrandRecommendation(PersonalBrandRecommendationRequest $request) : ?BrandRecommendationResponse
    {
        $response = $this->requestAndValidate("PersonalBrandRecommendationRequest", $request);
        if ($response == Null)
        {
            return Null;
        }
        return BrandRecommendationResponse::hydrate($response);
    }
    public function batchproductRecommendation(ProductRecommendationRequestCollection $request) : ?ProductRecommendationResponseCollection
    {
        $response = $this->requestAndValidate("ProductRecommendationRequestCollection", $request);
        if ($response == Null)
        {
            return Null;
        }
        return ProductRecommendationResponseCollection::hydrate($response);
    }
    public function batchcontentRecommendation(ContentRecommendationRequestCollection $request) : ?ContentRecommendationResponseCollection
    {
        $response = $this->requestAndValidate("ContentRecommendationRequestCollection", $request);
        if ($response == Null)
        {
            return Null;
        }
        return ContentRecommendationResponseCollection::hydrate($response);
    }
    public function productRecommendation(ProductRecommendationRequest $request) : ?ProductRecommendationResponse
    {
        $response = $this->requestAndValidate("ProductRecommendationRequest", $request);
        if ($response == Null)
        {
            return Null;
        }
        return ProductRecommendationResponse::hydrate($response);
    }
    public function contentRecommendation(ContentRecommendationRequest $request) : ?ContentRecommendationResponse
    {
        $response = $this->requestAndValidate("ContentRecommendationRequest", $request);
        if ($response == Null)
        {
            return Null;
        }
        return ContentRecommendationResponse::hydrate($response);
    }
    public function contentCategoryRecommendation(ContentCategoryRecommendationRequest $request) : ?ContentCategoryRecommendationResponse
    {
        $response = $this->requestAndValidate("ContentCategoryRecommendationRequest", $request);
        if ($response == Null)
        {
            return Null;
        }
        return ContentCategoryRecommendationResponse::hydrate($response);
    }
    public function productCategoryRecommendation(ProductCategoryRecommendationRequest $request) : ?ProductCategoryRecommendationResponse
    {
        $response = $this->requestAndValidate("ProductCategoryRecommendationRequest", $request);
        if ($response == Null)
        {
            return Null;
        }
        return ProductCategoryRecommendationResponse::hydrate($response);
    }
}