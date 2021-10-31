<?php

namespace Fypex\GamivoClient\Denormalizer\Offers;

use Fypex\GamivoClient\Models\OfferPriceResponseModel;

class OfferPriceDenormalizer
{

    public function denormalize($data): OfferPriceResponseModel
    {
        return new OfferPriceResponseModel($data);
    }
}
