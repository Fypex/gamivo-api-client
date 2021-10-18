<?php

namespace Fypex\GamivoClient\Request\links;

use Fypex\GamivoClient\Gamivo;

class ProductOffersLinks
{

    public function getProductOffers(int $product_id): string
    {
        return Gamivo::DEFAULT_URL.'/api/public/v1/products/'.$product_id.'/offers';
    }

}
