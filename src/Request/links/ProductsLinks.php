<?php

namespace Fypex\GamivoClient\Request\links;

use Fypex\GamivoClient\Gamivo;

class ProductsLinks
{

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
