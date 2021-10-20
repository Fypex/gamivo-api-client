<?php

namespace Fypex\GamivoClient\Denormalizer\Offers;

use Fypex\GamivoClient\Models\OfferResponseModel;

class OfferDenormalizer
{

    private $result = [];

    public function denormalize($offer): OfferResponseModel
    {
        return new OfferResponseModel($offer);
    }

}
