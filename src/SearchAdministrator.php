<?php declare(strict_types=1);

namespace Relewise;

use Relewise\Infrastructure\HttpClient\Response;
use Relewise\Models\DeleteSearchIndexRequest;
use Relewise\Models\SaveSearchIndexRequest;
use Relewise\Models\SearchIndexRequest;
use Relewise\Models\SearchIndexesRequest;
use Relewise\Models\SynonymsRequest;
use Relewise\Models\SaveSynonymsRequest;
use Relewise\Models\DeleteSynonymsRequest;
use Relewise\Models\RedirectRulesRequest;
use Relewise\Models\SaveRedirectRulesRequest;
use Relewise\Models\DeleteRedirectRulesRequest;
use Relewise\Models\DecompoundRulesRequest;
use Relewise\Models\SaveDecompoundRulesRequest;
use Relewise\Models\DeleteDecompoundRulesRequest;
use Relewise\Models\StemmingRulesRequest;
use Relewise\Models\SaveStemmingRulesRequest;
use Relewise\Models\DeleteStemmingRulesRequest;
use Relewise\Models\SearchTermModifierRulesRequest;
use Relewise\Models\SaveSearchTermModifierRulesRequest;
use Relewise\Models\DeleteSearchTermModifierRulesRequest;
use Relewise\Models\SearchResultModifierRulesRequest;
use Relewise\Models\SaveSearchResultModifierRulesRequest;
use Relewise\Models\DeleteSearchResultModifierRulesRequest;
use Relewise\Models\SearchIndexResponse;
use Relewise\Models\SearchIndexCollectionResponse;
use Relewise\Models\SynonymsResponse;
use Relewise\Models\DeleteSynonymsResponse;
use Relewise\Models\RedirectRulesResponse;
use Relewise\Models\SaveRedirectRulesResponse;
use Relewise\Models\DeleteSearchRulesResponse;
use Relewise\Models\DecompoundRulesResponse;
use Relewise\Models\SaveDecompoundRulesResponse;
use Relewise\Models\StemmingRulesResponse;
use Relewise\Models\SaveStemmingRulesResponse;
use Relewise\Models\SearchTermModifierRulesResponse;
use Relewise\Models\SaveSearchTermModifierRulesResponse;
use Relewise\Models\SearchResultModifierRulesResponse;
use Relewise\Models\SaveSearchResultModifierRulesResponse;

class SearchAdministrator extends RelewiseClient
{
    public function __construct(private string $datasetId, private string $apiKey, private int $timeout = 30)
    {
        parent::__construct($datasetId, $apiKey, $timeout);
    }
    
    public function deleteSearchIndex(DeleteSearchIndexRequest $request)
    {
        return $this->requestAndValidate("DeleteSearchIndexRequest", $request);
    }
    
    public function saveSearchIndex(SaveSearchIndexRequest $request) : ?SearchIndexResponse
    {
        $response = $this->requestAndValidate("SaveSearchIndexRequest", $request);
        if ($response == Null)
        {
            return Null;
        }
        return SearchIndexResponse::hydrate($response);
    }
    
    public function searchIndex(SearchIndexRequest $request) : ?SearchIndexResponse
    {
        $response = $this->requestAndValidate("SearchIndexRequest", $request);
        if ($response == Null)
        {
            return Null;
        }
        return SearchIndexResponse::hydrate($response);
    }
    
    public function searchIndexes(SearchIndexesRequest $request) : ?SearchIndexCollectionResponse
    {
        $response = $this->requestAndValidate("SearchIndexesRequest", $request);
        if ($response == Null)
        {
            return Null;
        }
        return SearchIndexCollectionResponse::hydrate($response);
    }
    
    public function synonyms(SynonymsRequest $request) : ?SynonymsResponse
    {
        $response = $this->requestAndValidate("SynonymsRequest", $request);
        if ($response == Null)
        {
            return Null;
        }
        return SynonymsResponse::hydrate($response);
    }
    
    public function saveSynonyms(SaveSynonymsRequest $request) : ?SynonymsResponse
    {
        $response = $this->requestAndValidate("SaveSynonymsRequest", $request);
        if ($response == Null)
        {
            return Null;
        }
        return SynonymsResponse::hydrate($response);
    }
    
    public function deleteSynonyms(DeleteSynonymsRequest $request) : ?DeleteSynonymsResponse
    {
        $response = $this->requestAndValidate("DeleteSynonymsRequest", $request);
        if ($response == Null)
        {
            return Null;
        }
        return DeleteSynonymsResponse::hydrate($response);
    }
    
    public function redirectRules(RedirectRulesRequest $request) : ?RedirectRulesResponse
    {
        $response = $this->requestAndValidate("RedirectRulesRequest", $request);
        if ($response == Null)
        {
            return Null;
        }
        return RedirectRulesResponse::hydrate($response);
    }
    
    public function saveRedirectRules(SaveRedirectRulesRequest $request) : ?SaveRedirectRulesResponse
    {
        $response = $this->requestAndValidate("SaveRedirectRulesRequest", $request);
        if ($response == Null)
        {
            return Null;
        }
        return SaveRedirectRulesResponse::hydrate($response);
    }
    
    public function deleteRedirectRules(DeleteRedirectRulesRequest $request) : ?DeleteSearchRulesResponse
    {
        $response = $this->requestAndValidate("DeleteRedirectRulesRequest", $request);
        if ($response == Null)
        {
            return Null;
        }
        return DeleteSearchRulesResponse::hydrate($response);
    }
    
    public function decompoundRules(DecompoundRulesRequest $request) : ?DecompoundRulesResponse
    {
        $response = $this->requestAndValidate("DecompoundRulesRequest", $request);
        if ($response == Null)
        {
            return Null;
        }
        return DecompoundRulesResponse::hydrate($response);
    }
    
    public function saveDecompoundRules(SaveDecompoundRulesRequest $request) : ?SaveDecompoundRulesResponse
    {
        $response = $this->requestAndValidate("SaveDecompoundRulesRequest", $request);
        if ($response == Null)
        {
            return Null;
        }
        return SaveDecompoundRulesResponse::hydrate($response);
    }
    
    public function deleteDecompoundRules(DeleteDecompoundRulesRequest $request) : ?DeleteSearchRulesResponse
    {
        $response = $this->requestAndValidate("DeleteDecompoundRulesRequest", $request);
        if ($response == Null)
        {
            return Null;
        }
        return DeleteSearchRulesResponse::hydrate($response);
    }
    
    public function stemmingRules(StemmingRulesRequest $request) : ?StemmingRulesResponse
    {
        $response = $this->requestAndValidate("StemmingRulesRequest", $request);
        if ($response == Null)
        {
            return Null;
        }
        return StemmingRulesResponse::hydrate($response);
    }
    
    public function saveStemmingRules(SaveStemmingRulesRequest $request) : ?SaveStemmingRulesResponse
    {
        $response = $this->requestAndValidate("SaveStemmingRulesRequest", $request);
        if ($response == Null)
        {
            return Null;
        }
        return SaveStemmingRulesResponse::hydrate($response);
    }
    
    public function deleteStemmingRules(DeleteStemmingRulesRequest $request) : ?DeleteSearchRulesResponse
    {
        $response = $this->requestAndValidate("DeleteStemmingRulesRequest", $request);
        if ($response == Null)
        {
            return Null;
        }
        return DeleteSearchRulesResponse::hydrate($response);
    }
    
    public function searchTermModifierRules(SearchTermModifierRulesRequest $request) : ?SearchTermModifierRulesResponse
    {
        $response = $this->requestAndValidate("SearchTermModifierRulesRequest", $request);
        if ($response == Null)
        {
            return Null;
        }
        return SearchTermModifierRulesResponse::hydrate($response);
    }
    
    public function saveSearchTermModifierRules(SaveSearchTermModifierRulesRequest $request) : ?SaveSearchTermModifierRulesResponse
    {
        $response = $this->requestAndValidate("SaveSearchTermModifierRulesRequest", $request);
        if ($response == Null)
        {
            return Null;
        }
        return SaveSearchTermModifierRulesResponse::hydrate($response);
    }
    
    public function deleteSearchTermModifierRules(DeleteSearchTermModifierRulesRequest $request) : ?DeleteSearchRulesResponse
    {
        $response = $this->requestAndValidate("DeleteSearchTermModifierRulesRequest", $request);
        if ($response == Null)
        {
            return Null;
        }
        return DeleteSearchRulesResponse::hydrate($response);
    }
    
    public function searchResultModifierRules(SearchResultModifierRulesRequest $request) : ?SearchResultModifierRulesResponse
    {
        $response = $this->requestAndValidate("SearchResultModifierRulesRequest", $request);
        if ($response == Null)
        {
            return Null;
        }
        return SearchResultModifierRulesResponse::hydrate($response);
    }
    
    public function saveSearchResultModifierRules(SaveSearchResultModifierRulesRequest $request) : ?SaveSearchResultModifierRulesResponse
    {
        $response = $this->requestAndValidate("SaveSearchResultModifierRulesRequest", $request);
        if ($response == Null)
        {
            return Null;
        }
        return SaveSearchResultModifierRulesResponse::hydrate($response);
    }
    
    public function deleteSearchResultModifierRules(DeleteSearchResultModifierRulesRequest $request) : ?DeleteSearchRulesResponse
    {
        $response = $this->requestAndValidate("DeleteSearchResultModifierRulesRequest", $request);
        if ($response == Null)
        {
            return Null;
        }
        return DeleteSearchRulesResponse::hydrate($response);
    }
}
