<?php

namespace Fypex\GamivoClient\Request;

use Fypex\GamivoClient\Credentials\GamivoCredentials;
use Fypex\GamivoClient\Denormalizer\Accounts\AccountsGetData;
use Fypex\GamivoClient\Denormalizer\Products\Product;
use Fypex\GamivoClient\Denormalizer\Products\Products as ProductsDenormalizer;
use Fypex\GamivoClient\Exception\GeneralException;
use Fypex\GamivoClient\Filters\ProductsFilter;
use Fypex\GamivoClient\GamivoClient;
use Fypex\GamivoClient\Models\ProductResponseModel;
use Fypex\GamivoClient\Request\links\AccountsLinks;
use Fypex\GamivoClient\Request\links\ProductsLinks;
use Http\Client\HttpClient;

class Products extends GamivoClient
{

    private $links;

    public function __construct(GamivoCredentials $credentials, ?HttpClient $client = null)
    {

        parent::__construct($credentials, $client);
        $this->links = new ProductsLinks();

    }

    /**
     * @return array<ProductResponseModel>
     */
    public function getTopSelling(): array
    {
        $request = $this->messageFactory->createRequest(
            'GET',
            $this->links->getTopSelling(),
            $this->getHeaders('application/json', true)
        );

        $response = $this->client->sendRequest($request);
        $data = $this->handleResponse($response);
        return (new ProductsDenormalizer())->denormalize($data);
    }

    public function getProductById(int $id): ProductResponseModel
    {
        $request = $this->messageFactory->createRequest(
            'GET',
            $this->links->getProductById($id),
            $this->getHeaders('application/json', true)
        );

        $response = $this->client->sendRequest($request);
        $data = $this->handleResponse($response);
        return (new Product())->denormalize($data);
    }

    public function getProductBySlug(string $slug): ProductResponseModel
    {

        $request = $this->messageFactory->createRequest(
            'GET',
            $this->links->getProductBySlug($slug),
            $this->getHeaders('application/json', true)
        );

        $response = $this->client->sendRequest($request);
        $data = $this->handleResponse($response);
        return (new Product())->denormalize($data);

    }
    /**
     * @return array<ProductResponseModel>
     */
    public function getProducts(?ProductsFilter $filter = null): array
    {

        $request = $this->messageFactory->createRequest(
            'GET',
            $this->links->getProducts($filter),
            $this->getHeaders('application/json', true)
        );

        $response = $this->client->sendRequest($request);
        $data = $this->handleResponse($response);
        return (new ProductsDenormalizer())->denormalize($data);

    }

}

