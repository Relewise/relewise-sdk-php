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
    public function BatchedTrackingRequest(BatchedTrackingRequest $batchedTrackingRequest) : Response
    {
        return $this->Request("BatchedTrackingRequest", $batchedTrackingRequest);
    }
    public function TrackBrandAdministrativeActionRequest(TrackBrandAdministrativeActionRequest $trackBrandAdministrativeActionRequest) : Response
    {
        return $this->Request("TrackBrandAdministrativeActionRequest", $trackBrandAdministrativeActionRequest);
    }
    public function TrackBrandUpdateRequest(TrackBrandUpdateRequest $trackBrandUpdateRequest) : Response
    {
        return $this->Request("TrackBrandUpdateRequest", $trackBrandUpdateRequest);
    }
    public function TrackBrandViewRequest(TrackBrandViewRequest $trackBrandViewRequest) : Response
    {
        return $this->Request("TrackBrandViewRequest", $trackBrandViewRequest);
    }
    public function TrackCartRequest(TrackCartRequest $trackCartRequest) : Response
    {
        return $this->Request("TrackCartRequest", $trackCartRequest);
    }
    public function TrackContentAdministrativeActionRequest(TrackContentAdministrativeActionRequest $trackContentAdministrativeActionRequest) : Response
    {
        return $this->Request("TrackContentAdministrativeActionRequest", $trackContentAdministrativeActionRequest);
    }
    public function TrackContentCategoryAdministrativeActionRequest(TrackContentCategoryAdministrativeActionRequest $trackContentCategoryAdministrativeActionRequest) : Response
    {
        return $this->Request("TrackContentCategoryAdministrativeActionRequest", $trackContentCategoryAdministrativeActionRequest);
    }
    public function TrackContentCategoryUpdateRequest(TrackContentCategoryUpdateRequest $trackContentCategoryUpdateRequest) : Response
    {
        return $this->Request("TrackContentCategoryUpdateRequest", $trackContentCategoryUpdateRequest);
    }
    public function TrackContentCategoryViewRequest(TrackContentCategoryViewRequest $trackContentCategoryViewRequest) : Response
    {
        return $this->Request("TrackContentCategoryViewRequest", $trackContentCategoryViewRequest);
    }
    public function TrackContentUpdateRequest(TrackContentUpdateRequest $trackContentUpdateRequest) : Response
    {
        return $this->Request("TrackContentUpdateRequest", $trackContentUpdateRequest);
    }
    public function TrackContentViewRequest(TrackContentViewRequest $trackContentViewRequest) : Response
    {
        return $this->Request("TrackContentViewRequest", $trackContentViewRequest);
    }
    public function TrackOrderRequest(TrackOrderRequest $trackOrderRequest) : Response
    {
        return $this->Request("TrackOrderRequest", $trackOrderRequest);
    }
    public function TrackProductAdministrativeActionRequest(TrackProductAdministrativeActionRequest $trackProductAdministrativeActionRequest) : Response
    {
        return $this->Request("TrackProductAdministrativeActionRequest", $trackProductAdministrativeActionRequest);
    }
    public function TrackProductCategoryAdministrativeActionRequest(TrackProductCategoryAdministrativeActionRequest $trackProductCategoryAdministrativeActionRequest) : Response
    {
        return $this->Request("TrackProductCategoryAdministrativeActionRequest", $trackProductCategoryAdministrativeActionRequest);
    }
    public function TrackProductCategoryUpdateRequest(TrackProductCategoryUpdateRequest $trackProductCategoryUpdateRequest) : Response
    {
        return $this->Request("TrackProductCategoryUpdateRequest", $trackProductCategoryUpdateRequest);
    }
    public function TrackProductCategoryViewRequest(TrackProductCategoryViewRequest $trackProductCategoryViewRequest) : Response
    {
        return $this->Request("TrackProductCategoryViewRequest", $trackProductCategoryViewRequest);
    }
    public function TrackProductUpdateRequest(TrackProductUpdateRequest $trackProductUpdateRequest) : Response
    {
        return $this->Request("TrackProductUpdateRequest", $trackProductUpdateRequest);
    }
    public function TrackProductViewRequest(TrackProductViewRequest $trackProductViewRequest) : Response
    {
        return $this->Request("TrackProductViewRequest", $trackProductViewRequest);
    }
    public function TrackSearchTermRequest(TrackSearchTermRequest $trackSearchTermRequest) : Response
    {
        return $this->Request("TrackSearchTermRequest", $trackSearchTermRequest);
    }
    public function TrackUserUpdateRequest(TrackUserUpdateRequest $trackUserUpdateRequest) : Response
    {
        return $this->Request("TrackUserUpdateRequest", $trackUserUpdateRequest);
    }
}
