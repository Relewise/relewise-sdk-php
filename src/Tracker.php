<?php declare(strict_types=1);

namespace Relewise;

use Relewise\Infrastructure\HttpClient\Response;
use Relewise\Models\DTO\BatchedTrackingRequest;
use Relewise\Models\DTO\TrackBrandAdministrativeActionRequest;
use Relewise\Models\DTO\TrackBrandUpdateRequest;
use Relewise\Models\DTO\TrackBrandViewRequest;
use Relewise\Models\DTO\TrackCartRequest;
use Relewise\Models\DTO\TrackContentAdministrativeActionRequest;
use Relewise\Models\DTO\TrackContentCategoryAdministrativeActionRequest;
use Relewise\Models\DTO\TrackContentCategoryUpdateRequest;
use Relewise\Models\DTO\TrackContentCategoryViewRequest;
use Relewise\Models\DTO\TrackContentUpdateRequest;
use Relewise\Models\DTO\TrackContentViewRequest;
use Relewise\Models\DTO\TrackingRequest;
use Relewise\Models\DTO\TrackOrderRequest;
use Relewise\Models\DTO\TrackProductAdministrativeActionRequest;
use Relewise\Models\DTO\TrackProductCategoryAdministrativeActionRequest;
use Relewise\Models\DTO\TrackProductCategoryUpdateRequest;
use Relewise\Models\DTO\TrackProductCategoryViewRequest;
use Relewise\Models\DTO\TrackProductUpdateRequest;
use Relewise\Models\DTO\TrackProductViewRequest;
use Relewise\Models\DTO\TrackSearchTermRequest;
use Relewise\Models\DTO\TrackUserUpdateRequest;

class Tracker extends RelewiseClient
{
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
