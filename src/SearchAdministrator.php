<?php declare(strict_types=1);

namespace Relewise;

use Relewise\Infrastructure\HttpClient\Response;
use Relewise\Models\DTO\DeleteSearchIndexRequest;
use Relewise\Models\DTO\SaveSearchIndexRequest;
use Relewise\Models\DTO\SearchIndexRequest;
use Relewise\Models\DTO\SearchIndexesRequest;
use Relewise\Models\DTO\SynonymsRequest;
use Relewise\Models\DTO\SaveSynonymsRequest;
use Relewise\Models\DTO\DeleteSynonymsRequest;
use Relewise\Models\DTO\RedirectRulesRequest;
use Relewise\Models\DTO\SaveRedirectRulesRequest;
use Relewise\Models\DTO\DeleteRedirectRulesRequest;
use Relewise\Models\DTO\DecompoundRulesRequest;
use Relewise\Models\DTO\SaveDecompoundRulesRequest;
use Relewise\Models\DTO\DeleteDecompoundRulesRequest;
use Relewise\Models\DTO\StemmingRulesRequest;
use Relewise\Models\DTO\SaveStemmingRulesRequest;
use Relewise\Models\DTO\DeleteStemmingRulesRequest;
use Relewise\Models\DTO\SearchIndexResponse;
use Relewise\Models\DTO\SearchIndexCollectionResponse;
use Relewise\Models\DTO\SynonymsResponse;
use Relewise\Models\DTO\DeleteSynonymsResponse;
use Relewise\Models\DTO\RedirectRulesResponse;
use Relewise\Models\DTO\SaveRedirectRulesResponse;
use Relewise\Models\DTO\DeleteSearchRulesResponse;
use Relewise\Models\DTO\DecompoundRulesResponse;
use Relewise\Models\DTO\SaveDecompoundRulesResponse;
use Relewise\Models\DTO\StemmingRulesResponse;
use Relewise\Models\DTO\SaveStemmingRulesResponse;

class SearchAdministrator extends RelewiseClient
{
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
}
