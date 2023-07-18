<?php declare(strict_types=1);

namespace Relewise;

use Relewise\Infrastructure\HttpClient\Response;
use Relewise\Models\BatchedTrackingRequest;
use Relewise\Models\TrackBrandAdministrativeActionRequest;
use Relewise\Models\TrackBrandUpdateRequest;
use Relewise\Models\TrackBrandViewRequest;
use Relewise\Models\TrackCartRequest;
use Relewise\Models\TrackContentAdministrativeActionRequest;
use Relewise\Models\TrackContentCategoryAdministrativeActionRequest;
use Relewise\Models\TrackContentCategoryUpdateRequest;
use Relewise\Models\TrackContentCategoryViewRequest;
use Relewise\Models\TrackContentUpdateRequest;
use Relewise\Models\TrackContentViewRequest;
use Relewise\Models\TrackingRequest;
use Relewise\Models\TrackOrderRequest;
use Relewise\Models\TrackProductAdministrativeActionRequest;
use Relewise\Models\TrackProductCategoryAdministrativeActionRequest;
use Relewise\Models\TrackProductCategoryUpdateRequest;
use Relewise\Models\TrackProductCategoryViewRequest;
use Relewise\Models\TrackProductUpdateRequest;
use Relewise\Models\TrackProductViewRequest;
use Relewise\Models\TrackSearchTermRequest;
use Relewise\Models\TrackUserUpdateRequest;

class Tracker extends RelewiseClient
{
    public function __construct(private string $datasetId, private string $apiKey, private int $timeout = 5)
    {
        parent::__construct($datasetId, $apiKey, $timeout);
    }
    public function batchedTracking(BatchedTrackingRequest $trackingRequest)
    {
        return $this->requestAndValidate("BatchedTrackingRequest", $trackingRequest);
    }
    public function trackBrandAdministrativeAction(TrackBrandAdministrativeActionRequest $trackingRequest)
    {
        return $this->requestAndValidate("TrackBrandAdministrativeActionRequest", $trackingRequest);
    }
    public function trackBrandUpdate(TrackBrandUpdateRequest $trackingRequest)
    {
        return $this->requestAndValidate("TrackBrandUpdateRequest", $trackingRequest);
    }
    public function trackBrandView(TrackBrandViewRequest $trackingRequest)
    {
        return $this->requestAndValidate("TrackBrandViewRequest", $trackingRequest);
    }
    public function trackCart(TrackCartRequest $trackingRequest)
    {
        return $this->requestAndValidate("TrackCartRequest", $trackingRequest);
    }
    public function trackContentAdministrativeAction(TrackContentAdministrativeActionRequest $trackingRequest)
    {
        return $this->requestAndValidate("TrackContentAdministrativeActionRequest", $trackingRequest);
    }
    public function trackContentCategoryAdministrativeAction(TrackContentCategoryAdministrativeActionRequest $trackingRequest)
    {
        return $this->requestAndValidate("TrackContentCategoryAdministrativeActionRequest", $trackingRequest);
    }
    public function trackContentCategoryUpdate(TrackContentCategoryUpdateRequest $trackingRequest)
    {
        return $this->requestAndValidate("TrackContentCategoryUpdateRequest", $trackingRequest);
    }
    public function trackContentCategoryView(TrackContentCategoryViewRequest $trackingRequest)
    {
        return $this->requestAndValidate("TrackContentCategoryViewRequest", $trackingRequest);
    }
    public function trackContentUpdate(TrackContentUpdateRequest $trackingRequest)
    {
        return $this->requestAndValidate("TrackContentUpdateRequest", $trackingRequest);
    }
    public function trackContentView(TrackContentViewRequest $trackingRequest)
    {
        return $this->requestAndValidate("TrackContentViewRequest", $trackingRequest);
    }
    public function tracking(TrackingRequest $trackingRequest)
    {
        return $this->requestAndValidate("TrackingRequest", $trackingRequest);
    }
    public function trackOrder(TrackOrderRequest $trackingRequest)
    {
        return $this->requestAndValidate("TrackOrderRequest", $trackingRequest);
    }
    public function trackProductAdministrativeAction(TrackProductAdministrativeActionRequest $trackingRequest)
    {
        return $this->requestAndValidate("TrackProductAdministrativeActionRequest", $trackingRequest);
    }
    public function trackProductCategoryAdministrativeAction(TrackProductCategoryAdministrativeActionRequest $trackingRequest)
    {
        return $this->requestAndValidate("TrackProductCategoryAdministrativeActionRequest", $trackingRequest);
    }
    public function trackProductCategoryUpdate(TrackProductCategoryUpdateRequest $trackingRequest)
    {
        return $this->requestAndValidate("TrackProductCategoryUpdateRequest", $trackingRequest);
    }
    public function trackProductCategoryView(TrackProductCategoryViewRequest $trackingRequest)
    {
        return $this->requestAndValidate("TrackProductCategoryViewRequest", $trackingRequest);
    }
    public function trackProductUpdate(TrackProductUpdateRequest $trackingRequest)
    {
        return $this->requestAndValidate("TrackProductUpdateRequest", $trackingRequest);
    }
    public function trackProductView(TrackProductViewRequest $trackingRequest)
    {
        return $this->requestAndValidate("TrackProductViewRequest", $trackingRequest);
    }
    public function trackSearchTerm(TrackSearchTermRequest $trackingRequest)
    {
        return $this->requestAndValidate("TrackSearchTermRequest", $trackingRequest);
    }
    public function trackUserUpdate(TrackUserUpdateRequest $trackingRequest)
    {
        return $this->requestAndValidate("TrackUserUpdateRequest", $trackingRequest);
    }
}
