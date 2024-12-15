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

    public function track123($apikey): Client
    {
        $this->client = new Track123($apikey);
        return $this;
    }

    public function registerTrackNo(string $trackNo): array
    {
        return $this->client->registerTrackNo($trackNo);
    }

    public function getTrackInfo(string $trackNo): array
    {
        return $this->response($this->client->getTrackInfo($trackNo));
    }

    public function response(array $response): array
    {
        return $this->client->response($response);
    }
}
