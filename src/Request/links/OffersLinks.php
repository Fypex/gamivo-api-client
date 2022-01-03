<?php

namespace Fypex\GamivoClient\Request\links;

use Fypex\GamivoClient\Filters\OffersFilter;
use Fypex\GamivoClient\Gamivo;
use Fypex\GamivoClient\Models\Price;

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

    public function getOfferByExternalId(string $id): string
    {
        return Gamivo::DEFAULT_URL.'/api/public/v1/offers/by-external-id/'.$id;
    }

    public function changeOfferStatus($offer_id): string
    {
        return Gamivo::DEFAULT_URL.'/api/public/v1/offers/'.$offer_id.'/change-status';
    }

    public function calculateCustomerPrice(
        $offer_id,
        Price $seller_price,
        Price $seller_tier_one_price,
        Price $seller_tier_two_price
    ): string
    {

        $params = [
            'seller_price' => $seller_price->getPrice(),
        ];

        if ($seller_tier_one_price->getPrice() > 0){
            $params['seller_tier_one_price'] = $seller_tier_one_price->getPrice();
        }
        if ($seller_tier_two_price->getPrice() > 0){
            $params['seller_tier_two_price'] = $seller_tier_two_price->getPrice();
        }

        return Gamivo::DEFAULT_URL.'/api/public/v1/offers/calculate-customer-price/'.$offer_id.'?'.http_build_query($params);
    }

    public function editOffer($offer_id): string
    {
        return Gamivo::DEFAULT_URL.'/api/public/v1/offers/'.$offer_id;
    }

    public function createOffer(): string
    {
        return Gamivo::DEFAULT_URL.'/api/public/v1/offers';
    }

    public function setExternalId(): string
    {
        return Gamivo::DEFAULT_URL.'/api/public/v1/offers/by-external-id';
    }

}
