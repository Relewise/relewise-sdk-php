<?php
namespace Relewise;

use Relewise\Infrastructure\HttpClient\Response;
use Relewise\Models\DTO\User;

class Tracker extends RelewiseClient
{
    public function trackProductView(User $user, string $productId, string|null $variantId = null): Response
    {
        $productView = array(
            "\$type" => "Relewise.Client.DataTypes.ProductView, Relewise.Client",
            "product" => array("id" => $productId), 
            "user" => (array) $user
        );

        return $this->doRequest(array(
            "\$type" => "Relewise.Client.Requests.Tracking.TrackProductViewRequest, Relewise.Client",
            "productView" => $productView)
        );
    }
}
