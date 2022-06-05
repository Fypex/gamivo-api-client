<?php

namespace Fypex\GamivoClient\Denormalizer\Orders;

use Fypex\GamivoClient\Models\OrderKeyModel;

class OrderKeysDenormalizer
{
    /**
     * @param array $data
     * @return array<OrderKeyModel>
     */
    public static function denormalize(array $data): array
    {

        $result = [];

        foreach ($data as $key){

            $result[] = OrderKeyModel::key($key['type'], $key['key'], $key['extension'] ?? null);

        }

        return $result;

    }

}
