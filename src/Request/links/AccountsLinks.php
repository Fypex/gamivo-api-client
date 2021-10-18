<?php

namespace Fypex\GamivoClient\Request\links;

use Fypex\GamivoClient\Gamivo;
use Fypex\GamivoClient\Models\Price;

class AccountsLinks
{

    public function getData(): string
    {
        return Gamivo::DEFAULT_URL.'/api/public/v1/accounts/data';
    }

    public function calculateFinalPrice(Price $price): string
    {
        return Gamivo::DEFAULT_URL.'/api/public/v1/accounts/calculate-final-price/'.$price->getPrice();
    }

    public function calculateBasePrice(Price $price): string
    {
        return Gamivo::DEFAULT_URL.'/api/public/v1/accounts/calculate-base-price/'.$price->getPrice();
    }

}
