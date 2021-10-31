<?php

namespace Fypex\GamivoClient\Request;

use Fypex\GamivoClient\Credentials\GamivoCredentials;
use Fypex\GamivoClient\Denormalizer\Offers\OfferDenormalizer;
use Fypex\GamivoClient\Denormalizer\Offers\OfferPriceDenormalizer;
use Fypex\GamivoClient\Denormalizer\Offers\OffersDenormalizer;
use Fypex\GamivoClient\Exception\GeneralException;
use Fypex\GamivoClient\Filters\OffersFilter;
use Fypex\GamivoClient\GamivoClient;
use Fypex\GamivoClient\Models\OfferPriceResponseModel;
use Fypex\GamivoClient\Models\OfferResponseModel;
use Fypex\GamivoClient\Models\Price;
use Fypex\GamivoClient\Request\links\OffersLinks;
use Http\Client\HttpClient;

class Offers extends GamivoClient
{
    private $links;
    public function __construct(GamivoCredentials $credentials, ?HttpClient $client = null)
    {
        parent::__construct($credentials, $client);
        $this->links = new OffersLinks();
    }


    /**
     * @return array<OfferResponseModel>
     */
    public function getOffers(?OffersFilter $filter = null): array
    {
        $request = $this->messageFactory->createRequest(
            'GET',
            $this->links->getOffers($filter),
            $this->getHeaders('application/json', true)
        );

        $response = $this->client->sendRequest($request);
        $data = $this->handleResponse($response);
        return (new OffersDenormalizer())->denormalize($data);
    }

    public function getOfferById(int $id): OfferResponseModel
    {
        $request = $this->messageFactory->createRequest(
            'GET',
            $this->links->getOfferById($id),
            $this->getHeaders('application/json', true)
        );

        $response = $this->client->sendRequest($request);
        $data = $this->handleResponse($response);
        return (new OfferDenormalizer())->denormalize($data);
    }

    public function changeOfferStatus(int $offer_id, bool $status): bool
    {

        $body = [
            'status' => (int)$status
        ];

        $request = $this->messageFactory->createRequest(
            'PUT',
            $this->links->changeOfferStatus($offer_id),
            $this->getHeaders('application/json', true),
            json_encode($body)
        );

        $response = $this->client->sendRequest($request);
        return $this->handleResponse($response);

    }

    public function editOffer(
        int $offer_id,
        Price $price,
        Price $tier_one_seller_price,
        Price $tier_two_seller_price,
        bool $status = false,
        int $keys = 0,
        $wholesale_mode = 0
    ): int
    {

        if ($wholesale_mode < 0 || $wholesale_mode > 2){
            return 'wholesale mode must from 0 to 2';
        }

        $body = [
            'seller_price' => $price->getPrice(),
            'tier_one_seller_price' => $tier_one_seller_price->getPrice(),
            'tier_two_seller_price' => $tier_two_seller_price->getPrice(),
            'wholesale_mode' => $wholesale_mode,
            'status' => (int)$status,
            'keys' => $keys
        ];


        $request = $this->messageFactory->createRequest(
            'PUT',
            $this->links->editOffer($offer_id),
            $this->getHeaders('application/json', true),
            json_encode($body)
        );

        $response = $this->client->sendRequest($request);
        return $this->handleResponse($response);

    }


    public function createOffer(
        $product_id,
        Price $tier_one_seller_price,
        Price $tier_two_seller_price,
        $wholesale_mode,
        bool $status,
        int $keys
    ): array
    {

        if ($wholesale_mode < 0 || $wholesale_mode > 2){
            throw new GeneralException('wholesale mode must from 0 to 2');
        }

        $body = [
            'product' => $product_id,
            'tier_one_seller_price' => $tier_one_seller_price->getPrice(),
            'tier_two_seller_price' => $tier_two_seller_price->getPrice(),
            'wholesale_mode' => $wholesale_mode,
            'status' => $status,
            'keys' => $keys
        ];

        $request = $this->messageFactory->createRequest(
            'POST',
            $this->links->createOffer(),
            $this->getHeaders('application/json', true),
            $body
        );

        $response = $this->client->sendRequest($request);
        return $this->handleResponse($response);

    }

    public function calculateCustomerPrice(
        $offer_id,
        Price $seller_price,
        Price $seller_tier_one_price,
        Price $seller_tier_two_price
    ): OfferPriceResponseModel
    {

        if ($seller_price->getPrice() == 0){
            throw new GeneralException('The seller_price parameter must be greater than 0');
        }

        $link = $this->links->calculateCustomerPrice(
            $offer_id,
            $seller_price,
            $seller_tier_one_price,
            $seller_tier_two_price
        );

        $request = $this->messageFactory->createRequest(
            'GET',
            $link,
            $this->getHeaders('application/json', true),
        );

        $response = $this->client->sendRequest($request);
        $data =  $this->handleResponse($response);

        return (new OfferPriceDenormalizer())->denormalize($data);

    }


}
