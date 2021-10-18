<?php

namespace Fypex\GamivoClient\Denormalizer\Accounts;

use Fypex\GamivoClient\Models\AccountPriceFactorResponseModel;

class AccountsCalculatePrice
{

    public function denormalize($data): AccountPriceFactorResponseModel
    {
        return new AccountPriceFactorResponseModel($data);
    }

}
