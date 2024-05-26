<?php

namespace App\Http\Controllers;

use App\Services\SpApiService;

class AmazonProductController extends Controller
{
    public function __construct(protected SpApiService $spApiService)
    {
    }

    public function getProductByEAN($ean)
    {
        // https://developer-docs.amazon.com/sp-api/docs/marketplace-ids
        $marketplaceId = 'A1C3SOZRARQ6R3'; // Poland marketplace ID
        $itemCondition = 'New';

        try {
            // Get product details by EAN
            $catalogApi = $this->spApiService->getCatalogApi();
            $productResponse = $catalogApi->searchCatalogItems([
                'marketplaceIds' => $marketplaceId,
                'identifiers' => $ean,
                'identifierType' => 'EAN'
            ]);

            if (empty($productResponse['items'])) {
                return response()->json(['error' => 'Product not found'], 404);
            }

            $asin = $productResponse['items'][0]['asin'];

            // Get offers
            $pricingApi = $this->spApiService->getProductPricingApi();
            $offersResponse = $pricingApi->getListingOffers(
                $asin,
                $marketplaceId,
                $itemCondition
            );

            return response()->json([
                'product' => $productResponse['items'][0],
                'offers' => $offersResponse
            ]);
        } catch (\Exception $e) {
            return response()->json(['error' => $e->getMessage() ?? "Something went wrong"], 500);
        }
    }
}
