<?php
/**
 * @return
 * @author Leo.Wang@php
 */

namespace Dahua\TrackApi\Api\Factory;

use Dahua\TrackApi\Api\Response\Track123Response;
use Dahua\TrackApi\Api\TrackInterface;

class Track123 implements TrackInterface
{
    private string $api_key = '';

    /***
     * @Rate Limit
     * Maximum Requests: 5 requests per second per endpoint.
     */

    public function __construct($api_key)
    {
        if(empty($api_key)){
            throw  new \Exception('api_key is required');
        }
        $this->api_key = $api_key;
    }

    public function registerTrackNo(string $trackNo): array
    {
        if(empty($trackNo)){
            throw  new \Exception('trackNo is required');
        }

        $client = new \GuzzleHttp\Client();
        $response = $client->request('POST', 'https://api.track123.com/gateway/open-api/tk/v2/track/import', [
            'headers' => [
                'Content-Type'=>'application/json',
                'accept'=>'application/json',
                'Track123-Api-Secret' => $this->api_key
            ],
            'body' => json_encode([[
                'trackNo' => $trackNo
            ]], JSON_UNESCAPED_UNICODE)
        ]);

        if($response->getStatusCode() != '200'){
            throw  new \Exception('Request failed');
        }

        return json_decode($response->getBody(), true);
    }

    public function getTrackInfo(string $trackNo): array
    {
        if(empty($trackNo)){
            throw  new \Exception('trackNo is required');
        }

        $client = new \GuzzleHttp\Client();
        $response = $client->request('POST', 'https://api.track123.com/gateway/open-api/tk/v2/track/query', [
            'headers' => [
                'Content-Type'=>'application/json',
                'accept'=>'application/json',
                'Track123-Api-Secret' => $this->api_key
            ],
            'body' => json_encode([
                'trackNos' => [$trackNo]
            ], JSON_UNESCAPED_UNICODE)
        ]);

        if($response->getStatusCode() != '200'){
            throw  new \Exception('Request failed');
        }

        return json_decode($response->getBody(), true);
    }

    public function response(array $response): array
    {
        return (new Track123Response())->response($response);
    }
}
