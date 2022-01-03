<?php

namespace Fypex\GamivoClient\Denormalizer\Offers;

use Fypex\GamivoClient\Models\PutOfferExternalModel;

class PutOffersExternalDenormalizer
{

    public function denormalize($response): PutOfferExternalModel
    {
        return new PutOfferExternalModel($response);
    }

}
