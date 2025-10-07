<?php declare(strict_types=1);

namespace Relewise;

use Relewise\Infrastructure\HttpClient\Response;
use Relewise\Models\PurchasedWithProductRequest;
use Relewise\Models\PurchasedWithMultipleProductsRequest;
use Relewise\Models\PurchasedWithCurrentCartRequest;
use Relewise\Models\ProductsViewedAfterViewingProductRequest;
use Relewise\Models\ProductsViewedAfterViewingContentRequest;
use Relewise\Models\SimilarProductsRequest;
use Relewise\Models\PopularProductsRequest;
use Relewise\Models\RecentlyViewedProductsRequest;
use Relewise\Models\PersonalProductRecommendationRequest;
use Relewise\Models\SearchTermBasedProductRecommendationRequest;
use Relewise\Models\PopularSearchTermsRecommendationRequest;
use Relewise\Models\SortProductsRequest;
use Relewise\Models\SortVariantsRequest;
use Relewise\Models\CustomProductRecommendationRequest;
use Relewise\Models\ContentsViewedAfterViewingContentRequest;
use Relewise\Models\PersonalContentRecommendationRequest;
use Relewise\Models\ContentsViewedAfterViewingMultipleContentsRequest;
use Relewise\Models\ContentsViewedAfterViewingProductRequest;
use Relewise\Models\ContentsViewedAfterViewingMultipleProductsRequest;
use Relewise\Models\PopularContentsRequest;
use Relewise\Models\PopularContentCategoriesRecommendationRequest;
use Relewise\Models\PersonalContentCategoryRecommendationRequest;
use Relewise\Models\PopularProductCategoriesRecommendationRequest;
use Relewise\Models\PersonalProductCategoryRecommendationRequest;
use Relewise\Models\PopularBrandsRecommendationRequest;
use Relewise\Models\PersonalBrandRecommendationRequest;
use Relewise\Models\BrandRecommendationRequest;
use Relewise\Models\ProductRecommendationRequestCollection;
use Relewise\Models\ContentRecommendationRequestCollection;
use Relewise\Models\ProductRecommendationRequest;
use Relewise\Models\ContentRecommendationRequest;
use Relewise\Models\ContentCategoryRecommendationRequest;
use Relewise\Models\ProductCategoryRecommendationRequest;
use Relewise\Models\ProductRecommendationResponse;
use Relewise\Models\SearchTermRecommendationResponse;
use Relewise\Models\ContentRecommendationResponse;
use Relewise\Models\ContentCategoryRecommendationResponse;
use Relewise\Models\ProductCategoryRecommendationResponse;
use Relewise\Models\BrandRecommendationResponse;
use Relewise\Models\ProductRecommendationResponseCollection;
use Relewise\Models\ContentRecommendationResponseCollection;

class Recommender extends RelewiseClient
{
    public function __construct(private string $datasetId, private string $apiKey, private int $timeout = 5)
    {
        parent::__construct($datasetId, $apiKey, $timeout);
    }
    
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
    
    public function brandRecommendation(BrandRecommendationRequest $request) : ?BrandRecommendationResponse
    {
        $response = $this->requestAndValidate("BrandRecommendationRequest", $request);
        if ($response == Null)
        {
            return Null;
        }
        return BrandRecommendationResponse::hydrate($response);
    }
    
    public function batchproductRecommendation(ProductRecommendationRequestCollection $request)
    {
        if (!isset($request->requests) || count($request->requests) === 0)
        {
            return;
        }
        $chunks = $this->createBatches($request->requests);
        foreach ($chunks as $chunk)
        {
            $chunkedRequest = clone $request;
            $chunkedRequest->requests = $chunk;
            $this->requestAndValidate("ProductRecommendationRequestCollection", $chunkedRequest);
        }
        return;
    }

    public function batchcontentRecommendation(ContentRecommendationRequestCollection $request)
    {
        if (!isset($request->requests) || count($request->requests) === 0)
        {
            return;
        }
        $chunks = $this->createBatches($request->requests);
        foreach ($chunks as $chunk)
        {
            $chunkedRequest = clone $request;
            $chunkedRequest->requests = $chunk;
            $this->requestAndValidate("ContentRecommendationRequestCollection", $chunkedRequest);
        }
        return;
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
