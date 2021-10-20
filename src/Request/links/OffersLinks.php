<?php

namespace Fypex\GamivoClient\Request\links;

use Fypex\GamivoClient\Filters\OffersFilter;
use Fypex\GamivoClient\Gamivo;

class OffersLinks
{

    public function getOffers(?OffersFilter $filter = null): string
    {
        $params = '';
        if ($filter !== null){
            $params = "?offset=".$filter->getOffset()."&limit=".$filter->getLimit();
        }

        return Gamivo::DEFAULT_URL.'/api/public/v1/offers'.$params;
    }

    public function getOfferById(int $id): string
    {
        return Gamivo::DEFAULT_URL.'/api/public/v1/offers/'.$id;
    }

    public function changeOfferStatus($offer_id): string
    {
        return Gamivo::DEFAULT_URL.'/api/public/v1/offers/'.$offer_id.'/change-status';
    }

    public function editOffer($offer_id): string
    {
        return Gamivo::DEFAULT_URL.'/api/public/v1/offers/'.$offer_id;
    }

    public function createOffer(): string
    {
        return Gamivo::DEFAULT_URL.'/api/public/v1/offers';
    }

}
