<?php declare(strict_types=1);

namespace Relewise;

use Relewise\Infrastructure\HttpClient\Response;
use Relewise\Models\ProductPerformanceRequest;
use Relewise\Models\ProductPerformanceResponse;

class Analyzer extends RelewiseClient
{
    public function __construct(private string $datasetId, private string $apiKey, private int $timeout = 120)
    {
        parent::__construct($datasetId, $apiKey, $timeout);
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
