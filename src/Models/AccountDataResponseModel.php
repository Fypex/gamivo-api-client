<?php

namespace Fypex\GamivoClient\Models;

class AccountDataResponseModel
{

    private $balance_solvent;
    private $balance_insolvent;
    private $api_price_factor;

    public function __construct($data)
    {
        $this->balance_solvent = $data['balance_solvent'];
        $this->balance_insolvent = $data['balance_insolvent'];
        $this->api_price_factor = $data['api_price_factor'];
    }

    public function getBalanceSolvent(): BalanceModel
    {
        return new BalanceModel($this->balance_solvent);
    }

    public function getBalanceInsolvent(): BalanceModel
    {
        return new BalanceModel($this->balance_insolvent);
    }

    public function getApiPriceFactor(): int
    {
        return $this->api_price_factor;
    }

}
