<?php declare(strict_types=1);

namespace Sharemat\Sdk;

use GuzzleHttp\Psr7\Utils;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\StreamInterface;
use Sharemat\Sdk\Resources\Account\Organization;
use Sharemat\Sdk\Resources\Account\Site;
use Sharemat\Sdk\Resources\Account\Region;
use Sharemat\Sdk\Resources\Fleet\Equipment;
use Sharemat\Sdk\Resources\Fleet\ConstructionSite;
use Sharemat\Sdk\Resources\Fleet\ConstructionSiteEquipment;
use Sharemat\Sdk\Resources\Fleet\Intervention;
use Sharemat\Sdk\Exception\EndpointException;
use Symfony\Component\HttpClient\HttpClient;
use Symfony\Component\HttpClient\Psr18Client;

class Api
{
    /**
     * @var Psr18Client
     */
    public $client;
    private $hostname;
    private $accessToken;

    public function __construct($hostname, $accessToken)
    {

        $this->hostname = $hostname;
        $this->accessToken = $accessToken;

        $httpClient = HttpClient::create([
            'base_uri' => $this->hostname,
            'auth_bearer' => $this->accessToken
        ]);
        $client = new Psr18Client($httpClient);

        $this->client = $client;
    }

    public function hasCats($bool = TRUE)
    {
        return $bool;
    }

    public function createStream(array $array): StreamInterface
    {
        return Utils::streamFor(json_encode($array));
    }

    /************************************************************************
     ** Common properties
     ************************************************************************/

    /**
     * @param string     $method
     * @param string     $path
     * @param array|null $headers
     * @param array|null $body
     *
     * @return ResponseInterface
     * @throws \Psr\Http\Client\ClientExceptionInterface
     */
    protected function sendRequest(
        string $method,
        string $path,
        array $headers = null,
        array $body = null
    ): ResponseInterface {
        $request = $this->client->createRequest($method, $path);

        if ($headers) {
            foreach ($headers as $headerName => $headerValue) {
                $request = $request->withHeader($headerName, $headerValue);
            }
        }

        if ($body) {
            $request = $request->withBody($this->createStream($body));
        }

        return $this->client->sendRequest($request);
    }

    /**
     * @param ResponseInterface $response
     * @param bool              $assoc
     *
     * @return array
     * @throws EndpointException
     */
    private function decodeResponseBody(ResponseInterface $response, bool $assoc = true): array
    {
        $data = json_decode($response->getBody()->getContents(), $assoc);

        if (!$data) {
            return [
                'error' => sprintf(
                    "An error occured on distant api: \n %s",
                    strtok((string)$response->getBody(), "\n")
                )
            ];
        }

        return $data;
    }

    /**
     * Get a collection result from the specified endpoint.
     *
     * @param string $path api endpoint
     * @return mixed array
     */
    public function getCollection($path)
    {
        return $this->decodeResponseBody($this->sendRequest('GET', $path));
    }

    /**
     * Get a resource entity from the specified endpoint.
     *
     * @param string $path api endpoint
     * @return mixed array
     */
    public function getResource($path)
    {
        return $this->decodeResponseBody($this->sendRequest('GET', $path));
    }

    /**
     * Send a post request to create a resource on the specified collection.
     *
     * @param string $path api endpoint
     * @param mixed $array array
     * @return mixed
     */
    public function createResource($path, $array)
    {
        return $this->decodeResponseBody($this->sendRequest('POST', $path, ['Content-Type' => 'application/json'], $array));
    }

    /**
     * Send a put request to update the specified resource.
     *
     * @param string $path api endpoint
     * @param mixed $array array
     * @return mixed
     */
    public function updateResource($path, $array)
    {
        return $this->decodeResponseBody($this->sendRequest('PUT', $path, ['Content-Type' => 'application/json'], $array));
    }

    /**
     * Send a delete request to remove the specified resource.
     *
     * @param string $path api endpoint
     * @return mixed
     */
    public function deleteResource($path)
    {
        return $this->decodeResponseBody($this->sendRequest('DELETE', $path));
    }

    /************************************************************************
     ** Relations - Account
     ************************************************************************/

    /**
     * Return an instance of the Organization class.
     *
     * @return Organization
     */
    public function organization()
    {
        return new Organization($this->hostname, $this->accessToken);
    }

    /**
     * Return an instance of the Region class.
     *
     * @return Region
     */
    public function region()
    {
        return new Region($this->hostname, $this->accessToken);
    }

    /**
     * Return an instance of the Site class.
     *
     * @return Site
     */
    public function site()
    {
        return new Site($this->hostname, $this->accessToken);
    }

    /************************************************************************
     ** Relations - Fleet
     ************************************************************************/

    /**
     * Return an instance of the ConstructionSite class.
     *
     * @return ConstructionSite
     */
    public function constructionSite()
    {
        return new ConstructionSite($this->hostname, $this->accessToken);
    }

    /**
     * Return an instance of the ConstructionSiteEquipment class.
     *
     * @return ConstructionSiteEquipment
     */
    public function constructionSiteEquipment()
    {
        return new ConstructionSiteEquipment($this->hostname, $this->accessToken);
    }

    /**
     * Return an instance of the Equipment class.
     *
     * @return Equipment
     */
    public function equipment()
    {
        return new Equipment($this->hostname, $this->accessToken);
    }

    /**
     * Return an instance of the Intervention class.
     *
     * @return Intervention
     */
    public function intervention()
    {
        return new Intervention($this->hostname, $this->accessToken);
    }
}
