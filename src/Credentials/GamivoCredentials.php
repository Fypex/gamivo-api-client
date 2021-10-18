<?php

namespace Fypex\GamivoClient\Credentials;

class GamivoCredentials
{
    private $bearer;

    public function __construct(string $bearer)
    {
        $this->bearer = $bearer;
    }

    public function getBearer(): string
    {
        return $this->bearer;
    }
}
