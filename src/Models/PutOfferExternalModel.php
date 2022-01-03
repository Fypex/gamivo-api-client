<?php

namespace Fypex\GamivoClient\Models;

class PutOfferExternalModel
{

    private $offer_id;
    private $external_id;

    public function __construct($data)
    {

        $this->offer_id = $data['offer_id'];
        $this->external_id = $data['external_id'];

    }

    public function getOfferId()
    {
        return $this->offer_id;
    }

    public function getExternalId()
    {
        return $this->external_id;
    }

}
