<?php

namespace Fypex\GamivoClient\Request\links;

use Fypex\GamivoClient\Filters\ProductsFilter;
use Fypex\GamivoClient\Gamivo;

class ProductsLinks
{

    public function getProducts(?ProductsFilter $filter = null): string
    {
        $params = '';
        if ($filter !== null){
            $params = "?offset=".$filter->getOffset()."&limit=".$filter->getLimit();
        }

        return Gamivo::DEFAULT_URL.'/api/public/v1/products'.$params;
    }

    public function getProductBySlug(string $slug): string
    {
        return Gamivo::DEFAULT_URL.'/api/public/v1/products/by-slug/'.$slug;
    }

    public function getProductById(int $id): string
    {
        return Gamivo::DEFAULT_URL.'/api/public/v1/products/'.$id;
    }

    public function getTopSelling(): string
    {
        return Gamivo::DEFAULT_URL.'/api/public/v1/products/top-selling';
    }

}
