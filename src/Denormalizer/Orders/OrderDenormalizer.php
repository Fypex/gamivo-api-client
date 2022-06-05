<?php


namespace Fypex\GamivoClient\Denormalizer\Orders;


use Fypex\GamivoClient\Models\OrderResponseModel;
use Fypex\GamivoClient\Models\ProductOfferResponseModel;

class OrderDenormalizer
{

    /**
     * @param array $data
     * @return OrderResponseModel
     */
    public static function denormalize(array $data): OrderResponseModel
    {
        return new OrderResponseModel($data['id'], $data['total'], $data['status'], $data['external_id']);
    }

}
