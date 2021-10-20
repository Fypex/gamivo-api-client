<?php

namespace Fypex\GamivoClient\Denormalizer\Offers;

use Fypex\GamivoClient\Models\OfferResponseModel;

class OffersDenormalizer
{

    private $result = [];
    /**
     * @return array<OfferResponseModel>
     */
    public function denormalize($offers): array
    {

        foreach ($offers as $id => $offer){
            $this->result[$id] = new OfferResponseModel($offer);
        }

        return $this->result;

    }

}
