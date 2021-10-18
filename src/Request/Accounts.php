<?php

namespace Fypex\GamivoClient\Request;
use Fypex\GamivoClient\Credentials\GamivoCredentials;
use Fypex\GamivoClient\Denormalizer\Accounts\AccountsCalculatePrice;
use Fypex\GamivoClient\Denormalizer\Accounts\AccountsGetData;
use Fypex\GamivoClient\Gamivo;
use Fypex\GamivoClient\GamivoClient;
use Fypex\GamivoClient\Models\AccountDataResponseModel;
use Fypex\GamivoClient\Models\AccountPriceFactorResponseModel;
use Fypex\GamivoClient\Models\Price;
use Fypex\GamivoClient\Request\links\AccountsLinks;
use Http\Client\HttpClient;

class Accounts extends GamivoClient
{

    private $links;

    public function __construct(GamivoCredentials $credentials, ?HttpClient $client = null)
    {
        parent::__construct($credentials, $client);

        $this->links = new AccountsLinks();

    }

    public function getData(): AccountDataResponseModel
    {

        $request = $this->messageFactory->createRequest(
            'GET',
            $this->links->getData(),
            $this->getHeaders('application/json', true)
        );

        $response = $this->client->sendRequest($request);
        $data = $this->handleResponse($response);
        return (new AccountsGetData())->denormalize($data);

    }

    public function calculateFinalPrice(Price $price): AccountPriceFactorResponseModel
    {

        $request = $this->messageFactory->createRequest(
            'GET',
            $this->links->calculateFinalPrice($price),
            $this->getHeaders('application/json', true)
        );

        $response = $this->client->sendRequest($request);
        $data = $this->handleResponse($response);
        return (new AccountsCalculatePrice())->denormalize($data);

    }

    public function calculateBasePrice(Price $price): AccountPriceFactorResponseModel
    {

        $request = $this->messageFactory->createRequest(
            'GET',
            $this->links->calculateBasePrice($price),
            $this->getHeaders('application/json', true)
        );

        $response = $this->client->sendRequest($request);
        $data = $this->handleResponse($response);
        return (new AccountsCalculatePrice())->denormalize($data);

    }

}
