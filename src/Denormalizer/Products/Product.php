<?php

namespace Fypex\GamivoClient\Denormalizer\Products;

use Fypex\GamivoClient\Models\ProductResponseModel;

class Product
{

    public function denormalize($data): ProductResponseModel
    {
        return new ProductResponseModel($data);
    }

}
