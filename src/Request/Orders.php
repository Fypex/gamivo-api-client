<?php

namespace Fypex\GamivoClient\Request;

use Fypex\GamivoClient\Credentials\GamivoCredentials;
use Fypex\GamivoClient\Denormalizer\Offers\OfferDenormalizer;
use Fypex\GamivoClient\Denormalizer\Offers\OfferPriceDenormalizer;
use Fypex\GamivoClient\Denormalizer\Offers\OffersDenormalizer;
use Fypex\GamivoClient\Denormalizer\Offers\PutOffersExternalDenormalizer;
use Fypex\GamivoClient\Denormalizer\Orders\OrderDenormalizer;
use Fypex\GamivoClient\Denormalizer\Orders\OrderKeysDenormalizer;
use Fypex\GamivoClient\Exception\GeneralException;
use Fypex\GamivoClient\Filters\OffersFilter;
use Fypex\GamivoClient\GamivoClient;
use Fypex\GamivoClient\Models\CreateOrderModel;
use Fypex\GamivoClient\Models\OfferPriceResponseModel;
use Fypex\GamivoClient\Models\OfferResponseModel;
use Fypex\GamivoClient\Models\OrderKeyModel;
use Fypex\GamivoClient\Models\OrderResponseModel;
use Fypex\GamivoClient\Models\Price;
use Fypex\GamivoClient\Models\PutOfferExternalModel;
use Fypex\GamivoClient\Request\links\OffersLinks;
use Fypex\GamivoClient\Request\links\OrdersLinks;
use Http\Client\HttpClient;
use Psr\Http\Client\ClientExceptionInterface;

class Orders extends GamivoClient
{
    private $links;
    public function __construct(GamivoCredentials $credentials, ?HttpClient $client = null)
    {
        parent::__construct($credentials, $client);
        $this->links = new OrdersLinks();
    }

    /**
     * @param string $order_id
     * @return OrderKeyModel[]
     * @throws GeneralException
     * @throws ClientExceptionInterface
     */
    public function retrieveOrderKeys(string $order_id): array
    {

        $request = $this->messageFactory->createRequest(
            'GET',
            $this->links->retrieveOrderKeys($order_id),
            $this->getHeaders('application/json', true),
        );

        $response = $this->client->sendRequest($request);
        $data = $this->handleResponse($response);

        return OrderKeysDenormalizer::denormalize($data);

    }

    public function retrieveOrder(string $order_id): OrderResponseModel
    {

        $request = $this->messageFactory->createRequest(
            'GET',
            $this->links->retrieveOrder($order_id),
            $this->getHeaders('application/json', true),
        );

        $response = $this->client->sendRequest($request);
        $data = $this->handleResponse($response);

        return OrderDenormalizer::denormalize($data);
    }

    public function retrieveOrderByExternalId(string $externalId): OrderResponseModel
    {

        $request = $this->messageFactory->createRequest(
            'GET',
            $this->links->retrieveOrderByExternalId($externalId),
            $this->getHeaders('application/json', true),
        );

        $response = $this->client->sendRequest($request);
        $data = $this->handleResponse($response);

        return OrderDenormalizer::denormalize($data);
    }


    public function createOrder(CreateOrderModel $order): OrderResponseModel
    {

        $body = [
            "offer_id" => $order->getOfferId(),
            "quantity" => $order->getQuantity(),
            "max_price" => $order->getMaxPrice(),
            "external_id" => $order->getExternalId()
        ];

        $request = $this->messageFactory->createRequest(
            'POST',
            $this->links->createOrder(),
            $this->getHeaders('application/json', true),
            json_encode($body)
        );

        $response = $this->client->sendRequest($request);

        $data = $this->handleResponse($response);


        return OrderDenormalizer::denormalize($data);

    }




}
