<?php declare(strict_types=1);

namespace Sharemat\Sdk;

use GuzzleHttp\Psr7\Utils;
use Psr\Http\Message\StreamInterface;
use Sharemat\Sdk\Resources\Account\Organization;
use Sharemat\Sdk\Resources\Account\Site;
use Sharemat\Sdk\Resources\Account\Region;
use Sharemat\Sdk\Resources\Fleet\Equipment;
use Sharemat\Sdk\Resources\Fleet\ConstructionSite;
use Sharemat\Sdk\Resources\Fleet\ConstructionSiteEquipment;
use Sharemat\Sdk\Resources\Fleet\Intervention;
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
     * Get a collection result from the specified endpoint.
     *
     * @param string $path api endpoint
     * @return mixed array
     */
    public function getCollection($path)
    {
        $request = $this->client->createRequest('GET', $path);
        $response = $this->client->sendRequest($request);

        return json_decode($response->getBody()->getContents(), TRUE);
    }

    /**
     * Get a resource entity from the specified endpoint.
     *
     * @param string $path api endpoint
     * @return mixed array
     */
    public function getResource($path)
    {
        $request = $this->client->createRequest('GET', $path);
        $response = $this->client->sendRequest($request);

        return json_decode($response->getBody()->getContents(), TRUE);
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
        $request = $this->client->createRequest('POST', $path)
                                ->withHeader('Content-Type', 'application/json')
                                ->withBody($this->createStream($array));
        $response = $this->client->sendRequest($request);

        return json_decode($response->getBody()->getContents(), TRUE);
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
        $request = $this->client->createRequest('PUT', $path)
                                ->withHeader('Content-Type', 'application/json')
                                ->withBody($this->createStream($array));
        $response = $this->client->sendRequest($request);

        return json_decode($response->getBody()->getContents(), TRUE);
    }

    /**
     * Send a delete request to remove the specified resource.
     *
     * @param string $path api endpoint
     * @return mixed
     */
    public function deleteResource($path)
    {
        $request = $this->client->createRequest('DELETE', $path);
        $response = $this->client->sendRequest($request);

        return json_decode($response->getBody()->getContents(), TRUE);
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
