<?php

namespace Fypex\GamivoClient\Request;

use Fypex\GamivoClient\Credentials\GamivoCredentials;
use Fypex\GamivoClient\Denormalizer\ProductOffers\ProductOffersDenormalizer;
use Fypex\GamivoClient\Denormalizer\Products\Product;
use Fypex\GamivoClient\Exception\GeneralException;
use Fypex\GamivoClient\GamivoClient;
use Fypex\GamivoClient\Models\ProductOfferResponseModel;
use Fypex\GamivoClient\Models\ProductOffersResponseModel;
use Fypex\GamivoClient\Request\links\ProductOffersLinks;
use Fypex\GamivoClient\Request\links\ProductsLinks;
use Http\Client\HttpClient;
use Psr\Http\Client\ClientExceptionInterface;

class ProductOffers extends GamivoClient
{

    private $links;

    public function __construct(GamivoCredentials $credentials, ?HttpClient $client = null)
    {

        parent::__construct($credentials, $client);
        $this->links = new ProductOffersLinks();

    }

    /**
     * @param int $product_id
     * @return array<ProductOfferResponseModel>
     * @throws ClientExceptionInterface
     * @throws GeneralException
     */
    public function getProductOffers(int $product_id): array
    {

        $request = $this->messageFactory->createRequest(
            'GET',
            $this->links->getProductOffers($product_id),
            $this->getHeaders('application/json', true)
        );

        $response = $this->client->sendRequest($request);
        $data = $this->handleResponse($response);

        return (new ProductOffersDenormalizer())->denormalize($data);

    }


}
