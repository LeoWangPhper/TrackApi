<?php
/**
 * @return
 * @author Leo.Wang@php
 */

namespace Dahua\TrackApi\Api;

use Dahua\TrackApi\Api\Factory\Track123;
use Dahua\TrackApi\Api\Factory\Track17;
use Dahua\TrackApi\Api\Factory\Track718;

class Client
{
    private object $client;

    /**
     * @throws \Exception
     */
    public function track123($apikey): Client
    {
        $this->client = new Track123($apikey);
        return $this;
    }

    public function track17($apikey): Client
    {
        $this->client = new Track17($apikey);
        return $this;
    }

    public function track718($apikey): Client
    {
        $this->client = new Track718($apikey);
        return $this;
    }

    public function registerTrackNo(string $trackNo): array
    {
        return $this->response($this->client->registerTrackNo($trackNo));
    }

    public function getTrackInfo(string $trackNo): array
    {
        return $this->response($this->client->getTrackInfo($trackNo));
    }

    public function webhook(array $data): array
    {
        return $this->client->webhook($data);
    }

    public function response(array $response): array
    {
        return $this->client->response($response);
    }
}
