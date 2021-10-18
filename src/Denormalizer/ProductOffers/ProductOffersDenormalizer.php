<?php

namespace Fypex\GamivoClient\Denormalizer\ProductOffers;

use Fypex\GamivoClient\Models\ProductOfferResponseModel;

class ProductOffersDenormalizer
{

    private $result;

    /**
     * @return array<ProductOfferResponseModel>
     */
    public function denormalize($offers): array
    {

        foreach ($offers as $id => $offer){
            $this->result[$id] = new ProductOfferResponseModel($offer);
        }

        return $this->result;

    }

}
