<?php declare(strict_types=1);

namespace Relewise;

use Relewise\Infrastructure\HttpClient\Response;
use Relewise\Models\DTO\ProductSearchRequest;
use Relewise\Models\DTO\ContentSearchRequest;
use Relewise\Models\DTO\ProductCategorySearchRequest;
use Relewise\Models\DTO\ContentCategorySearchRequest;
use Relewise\Models\DTO\SearchTermPredictionRequest;
use Relewise\Models\DTO\SearchRequestCollection;
use Relewise\Models\DTO\ProductSearchResponse;
use Relewise\Models\DTO\ContentSearchResponse;
use Relewise\Models\DTO\ProductCategorySearchResponse;
use Relewise\Models\DTO\ContentCategorySearchResponse;
use Relewise\Models\DTO\SearchTermPredictionResponse;
use Relewise\Models\DTO\SearchResponseCollection;

class Searcher extends RelewiseClient
{
    public function productSearch(ProductSearchRequest $request) : ?ProductSearchResponse
    {
        $response = $this->requestAndValidate("ProductSearchRequest", $request);
        if ($response == Null)
        {
            return Null;
        }
        return ProductSearchResponse::hydrate($response);
    }
    public function contentSearch(ContentSearchRequest $request) : ?ContentSearchResponse
    {
        $response = $this->requestAndValidate("ContentSearchRequest", $request);
        if ($response == Null)
        {
            return Null;
        }
        return ContentSearchResponse::hydrate($response);
    }
    public function productCategorySearch(ProductCategorySearchRequest $request) : ?ProductCategorySearchResponse
    {
        $response = $this->requestAndValidate("ProductCategorySearchRequest", $request);
        if ($response == Null)
        {
            return Null;
        }
        return ProductCategorySearchResponse::hydrate($response);
    }
    public function contentCategorySearch(ContentCategorySearchRequest $request) : ?ContentCategorySearchResponse
    {
        $response = $this->requestAndValidate("ContentCategorySearchRequest", $request);
        if ($response == Null)
        {
            return Null;
        }
        return ContentCategorySearchResponse::hydrate($response);
    }
    public function searchTermPrediction(SearchTermPredictionRequest $request) : ?SearchTermPredictionResponse
    {
        $response = $this->requestAndValidate("SearchTermPredictionRequest", $request);
        if ($response == Null)
        {
            return Null;
        }
        return SearchTermPredictionResponse::hydrate($response);
    }
    public function batchsearch(SearchRequestCollection $request) : ?SearchResponseCollection
    {
        $response = $this->requestAndValidate("SearchRequestCollection", $request);
        if ($response == Null)
        {
            return Null;
        }
        return SearchResponseCollection::hydrate($response);
    }
}
