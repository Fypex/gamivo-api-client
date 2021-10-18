<?php

namespace Fypex\GamivoClient\Denormalizer\Accounts;

use Fypex\GamivoClient\Models\AccountDataResponseModel;

class AccountsGetData
{
    public function denormalize($data): AccountDataResponseModel
    {
        return new AccountDataResponseModel($data);
    }
}
