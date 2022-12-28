<?php declare(strict_types=1);

namespace Relewise;

use Relewise\Infrastructure\HttpClient\Response;
use Relewise\Models\DTO\ContentCategorySearchRequest;
use Relewise\Models\DTO\ContentSearchRequest;
use Relewise\Models\DTO\PaginatedSearchRequest;
use Relewise\Models\DTO\ProductCategorySearchRequest;
use Relewise\Models\DTO\ProductSearchRequest;
use Relewise\Models\DTO\SearchRequestCollection;
use Relewise\Models\DTO\SearchTermPredictionRequest;
use Relewise\Models\DTO\ProductSearchRequest;
use Relewise\Models\DTO\ContentSearchRequest;
use Relewise\Models\DTO\ProductCategorySearchRequest;
use Relewise\Models\DTO\ContentCategorySearchRequest;
use Relewise\Models\DTO\SearchTermPredictionRequest;

class Searcher extends RelewiseClient
{
    public function ContentCategorySearchRequest(ContentCategorySearchRequest $contentCategorySearchRequest) : Response
    {
        return $this->Request("ContentCategorySearchRequest", $contentCategorySearchRequest);
    }
    public function ContentSearchRequest(ContentSearchRequest $contentSearchRequest) : Response
    {
        return $this->Request("ContentSearchRequest", $contentSearchRequest);
    }
    public function PaginatedSearchRequest(PaginatedSearchRequest $paginatedSearchRequest) : Response
    {
        return $this->Request("PaginatedSearchRequest", $paginatedSearchRequest);
    }
    public function ProductCategorySearchRequest(ProductCategorySearchRequest $productCategorySearchRequest) : Response
    {
        return $this->Request("ProductCategorySearchRequest", $productCategorySearchRequest);
    }
    public function ProductSearchRequest(ProductSearchRequest $productSearchRequest) : Response
    {
        return $this->Request("ProductSearchRequest", $productSearchRequest);
    }
    public function SearchRequestCollection(SearchRequestCollection $searchRequestCollection) : Response
    {
        return $this->Request("SearchRequestCollection", $searchRequestCollection);
    }
    public function SearchTermPredictionRequest(SearchTermPredictionRequest $searchTermPredictionRequest) : Response
    {
        return $this->Request("SearchTermPredictionRequest", $searchTermPredictionRequest);
    }
    public function Search(ProductSearchRequest $request) : Response
    {
        return $this->Request("ProductSearchRequest", $request);
    }
    public function Search(ContentSearchRequest $request) : Response
    {
        return $this->Request("ContentSearchRequest", $request);
    }
    public function Search(ProductCategorySearchRequest $request) : Response
    {
        return $this->Request("ProductCategorySearchRequest", $request);
    }
    public function Search(ContentCategorySearchRequest $request) : Response
    {
        return $this->Request("ContentCategorySearchRequest", $request);
    }
    public function Predict(SearchTermPredictionRequest $request) : Response
    {
        return $this->Request("SearchTermPredictionRequest", $request);
    }
}
