<?php

namespace Fypex\GamivoClient\Models;

class Price
{

    private $price;

    public function __construct(float $price)
    {
        $this->price = $price;
    }

    public function getPrice(): float
    {
        return $this->price;
    }

}
