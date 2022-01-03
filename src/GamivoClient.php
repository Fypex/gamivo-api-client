<?php

namespace Fypex\GamivoClient;

use Fypex\GamivoClient\Credentials\GamivoCredentials;
use Fypex\GamivoClient\Exception\GeneralException;
use Fypex\GamivoClient\Models\ErrorModel;
use Fypex\GamivoClient\Request\Accounts;
use Fypex\GamivoClient\Request\Offers;
use Fypex\GamivoClient\Request\ProductOffers;
use Fypex\GamivoClient\Request\Products;
use Http\Client\HttpClient;
use Http\Client\Curl\Client as CurlClient;
use Http\Message\MessageFactory\DiactorosMessageFactory;
use Psr\Http\Message\ResponseInterface;

class GamivoClient
{

    protected $client;
    protected $credentials;
    protected $messageFactory;

    public function __construct(GamivoCredentials $credentials, ?HttpClient $client = null)
    {
        $this->client = $client ?: new CurlClient(null,null,[
            CURLOPT_SSL_VERIFYHOST => false,
            CURLOPT_SSL_VERIFYPEER => false,
        ]);
        $this->credentials = $credentials;
        $this->messageFactory = new DiactorosMessageFactory();
    }

    public function accounts(): Accounts
    {
        return new Accounts($this->credentials, $this->client);
    }

    public function offers(): Offers
    {
        return new Offers($this->credentials, $this->client);
    }

    public function products(): Products
    {
        return new Products($this->credentials, $this->client);
    }

    public function productOffers(): ProductOffers
    {
        return new ProductOffers($this->credentials, $this->client);
    }

    protected function getAuthorizationToken(): string
    {
        return $this->credentials->getBearer();
    }

    protected function isJsonResponse(ResponseInterface $response): bool
    {
        $header = $response->getHeader('Content-Type')[0] ?? null;
        [$type,] = explode(';', $header);

        return $type === 'application/json';
    }

    protected function getHeaders($contentType = 'application/json', $authorized = true): array
    {
        $headers = [
            'Content-Type' => $contentType,
            'Accept' => '*/*',
        ];

        if ($authorized) {
            $headers['Authorization'] = 'Bearer '. $this->getAuthorizationToken();
        }
        return $headers;
    }

    protected function handleResponse(ResponseInterface $response)
    {
        if (!$this->isJsonResponse($response)) {
            throw new GeneralException('Response is not "application/json" type');
        }
        $data = json_decode((string)$response->getBody(), true);
        if ($response->getStatusCode() !== 200) {
            throw new GeneralException($data['message'], $response->getStatusCode());
        }

        return $data;
    }

}
