<?php declare(strict_types=1);

namespace Relewise;

use Relewise\Infrastructure\HttpClient\Response;

class Tracker extends RelewiseClient
{
    // public function track(ProductView $productView): void
    // {
    //     $this->client->post(
    //         $this->createRequestUrl($this->serverUrl, $this->datasetId, $this->apiVersion, "TrackProductViewRequest"), 
    //         json_encode(get_object_vars($productView)),
    //         array("Authorization" => $this->apiKey, "Content-Type" => "application/json")
    //     );
    // }

    public function trackProductView(string $productId): Response
    {
        $productView = array("product" => array("id" => $productId), "\$type" => "Relewise.Client.DataTypes.ProductView, Relewise.Client");

        return $this->post(array("productView" => $productView, "\$type" => "Relewise.Client.Requests.Tracking.TrackProductViewRequest, Relewise.Client"));
    }
}