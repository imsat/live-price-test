<?php

namespace App\Services;

use Psr\Http\Message\RequestInterface;
use Saloon\Http\PendingRequest;
use SellingPartnerApi\SellingPartnerApi;

class SpApiService
{
    private $connrctor;

    public function __construct()
    {
        $this->connrctor = SellingPartnerApi::make(
            clientId: config('services.sp_api.client_id'),
            clientSecret: config('services.sp_api.client_secret'),
            refreshToken: config('services.sp_api.refresh_token'),
            endpoint: config('services.sp_api.endpoint'),  // Or Endpoint::EU, Endpoint::FE, Endpoint::NA_SANDBOX, etc.
        )->seller();
    }

    public function debug()
    {
        $this->connrctor->debugRequest(
            function (PendingRequest $pendingRequest, RequestInterface $psrRequest) {
                dd($pendingRequest->headers()->all(), $psrRequest);
            }
        );
    }

    public function getCatalogApi()
    {
        return $this->connrctor->catalogItems();
    }

    public function getProductPricingApi()
    {
        return $this->connrctor->productPricingV0();
    }
}
