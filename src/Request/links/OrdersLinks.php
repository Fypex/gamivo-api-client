<?php


namespace Fypex\GamivoClient\Request\links;


use Fypex\GamivoClient\Gamivo;

class OrdersLinks
{

    // Creates new order for submitted product
    public function createOrder(): string
    {
        return Gamivo::DEFAULT_URL.'/api/public/v1/orders';
    }

    //Retrieve order keys
    public function retrieveOrderKeys(string $order_id): string
    {
        return Gamivo::DEFAULT_URL.'/api/public/v1/orders/'.$order_id.'/keys';
    }


    //Retrieve order data
    public function retrieveOrder(string $order_id): string
    {
        return Gamivo::DEFAULT_URL.'/api/public/v1/orders/'.$order_id;
    }

    //Retrieve Order by external Id
    public function retrieveOrderByExternalId(string $external_id): string
    {
        return Gamivo::DEFAULT_URL.'/api/public/v1/orders/by-external-id/'.$external_id;
    }

}
