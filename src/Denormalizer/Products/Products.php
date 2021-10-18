<?php

namespace Fypex\GamivoClient\Denormalizer\Products;

use Fypex\GamivoClient\Models\ProductResponseModel;

class Products
{

    private $result = [];
    /**
     * @return array<ProductResponseModel>
     */
    public function denormalize($products): array
    {

        foreach ($products as $product){
            array_push($this->result, new ProductResponseModel($product));
        }

        return $this->result;
    }

}
