<?php declare(strict_types=1);

namespace Relewise;

use Relewise\Infrastructure\HttpClient\Response;
use Relewise\Models\ProductPerformanceRequest;
use Relewise\Models\ProductPerformanceResponse;

class Analyzer extends RelewiseClient
{
    protected const OAUTH_DEFAULT_TIMEOUT = 120;
    public function __construct(private string $datasetId, private string $apiKey, private int $timeout = 120, ?OAuthTokenProvider $oauthTokenProvider = null)
    {
        parent::__construct($datasetId, $apiKey, $timeout, $oauthTokenProvider);
    }
    
    public function productPerformance(ProductPerformanceRequest $request) : ?ProductPerformanceResponse
    {
        $response = $this->requestAndValidate("ProductPerformanceRequest", $request);
        if ($response == Null)
        {
            return Null;
        }
        return ProductPerformanceResponse::hydrate($response);
    }
}
