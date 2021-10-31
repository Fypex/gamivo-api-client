<?php

namespace Fypex\GamivoClient\Denormalizer\Offers;

use Fypex\GamivoClient\Models\OfferPriceResponseModel;

class OfferPriceDenormalizer
{

    public function denormalize($offer): OfferPriceResponseModel
    {
        return new OfferPriceResponseModel($offer);
    }
}
