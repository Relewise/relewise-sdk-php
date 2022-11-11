<?php declare(strict_types=1);

namespace Relewise;

use Relewise\Infrastructure\HttpClient\Response;
// use Relewise\Models\DTO\Product;
// use Relewise\Models\DTO\ProductVariant;
// use Relewise\Models\DTO\ProductView;
use Relewise\Models\DTO\User;

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

    public function trackProductView(User $user, string $productId, string|null $variantId = null): Response
    {
        // $productView = new ProductView();
        
        // $product = new Product();
        // $product->id = $productId;

        // if (!is_null($variantId)) {
        //     $variant = new ProductVariant();
        //     $variant->id = $variantId;
        //     $productView->variant = $variant;
        // }

        // $productView->user = $user;
        // $productView->product = $product;
        // $productView->type = "Relewise.Client.DataTypes.ProductView, Relewise.Client";

        $productView = array("product" => array("id" => $productId), "user" => (array) $user, "\$type" => "Relewise.Client.DataTypes.ProductView, Relewise.Client");

        return $this->doRequest(array("productView" => $productView, "\$type" => "Relewise.Client.Requests.Tracking.TrackProductViewRequest, Relewise.Client"));
    }
}