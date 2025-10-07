<?php declare(strict_types=1);

namespace Relewise;

use Relewise\Infrastructure\HttpClient\Response;
use Relewise\Models\ProductSearchRequest;
use Relewise\Models\ContentSearchRequest;
use Relewise\Models\ProductCategorySearchRequest;
use Relewise\Models\ContentCategorySearchRequest;
use Relewise\Models\SearchTermPredictionRequest;
use Relewise\Models\SearchRequestCollection;
use Relewise\Models\ProductSearchResponse;
use Relewise\Models\ContentSearchResponse;
use Relewise\Models\ProductCategorySearchResponse;
use Relewise\Models\ContentCategorySearchResponse;
use Relewise\Models\SearchTermPredictionResponse;
use Relewise\Models\SearchResponseCollection;

class Searcher extends RelewiseClient
{
    public function __construct(private string $datasetId, private string $apiKey, private int $timeout = 5)
    {
        parent::__construct($datasetId, $apiKey, $timeout);
    }
    
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
        if (!isset($request->requests) || count($request->requests) === 0)
        {
            return Null;
        }
        $aggregatedResponse = Null;
        foreach ($this->createBatches($request->requests) as $chunk)
        {
            $chunkedRequest = clone $request;
            $chunkedRequest->requests = $chunk;
            $chunkResponse = $this->requestAndValidate("SearchRequestCollection", $chunkedRequest);
            if ($chunkResponse == Null)
            {
                continue;
            }
            $hydratedChunkResponse = SearchResponseCollection::hydrate($chunkResponse);
            if ($aggregatedResponse == Null)
            {
                $aggregatedResponse = $hydratedChunkResponse;
            }
            else
            {
                if (isset($hydratedChunkResponse->responses))
                {
                    if (!isset($aggregatedResponse->responses))
                    {
                        $aggregatedResponse->responses = array();
                    }
                    $aggregatedResponse->responses = array_merge(
                        $aggregatedResponse->responses,
                        $hydratedChunkResponse->responses
                    );
                }
            }
        }
        return $aggregatedResponse;
    }
}
