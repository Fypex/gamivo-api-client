<?php

namespace Fypex\GamivoClient\Models;

class AccountPriceFactorResponseModel
{

    private $base_price;
    private $final_price;
    private $api_price_factor;

    public function __construct($data)
    {

        $this->base_price = $data['base_price'];
        $this->final_price = $data['final_price'];
        $this->api_price_factor = $data['api_price_factor'];

    }

    public function getBasePrice(): float
    {
        return $this->base_price;
    }

    public function getFinalPrice(): float
    {
        return $this->final_price;
    }

    public function getApiPriceFactor(): float
    {
        return $this->api_price_factor;
    }



}
