<?php

namespace Fypex\GamivoClient\Models;

class BalanceModel
{
    private $available;
    private $pending;


    public function __construct(array $balance)
    {
        $this->available = $balance['available'];
        $this->pending = $balance['pending'];
    }

    public function getAvailable(){
        return $this->available;
    }

    public function getPending(){
        return $this->pending;
    }

}
