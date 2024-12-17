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

        $trackNos = array_filter(array_unique(explode(',', $trackNo)));

        if(count($trackNos) > 1){
            throw  new \Exception('trackNo must be one');
        }

        $body = [];

        foreach($trackNos as $trackNo){
            $body[] = [
                'trackNo' => $trackNo
            ];
        }

        $client = new \GuzzleHttp\Client();
        $response = $client->request('POST', 'https://api.track123.com/gateway/open-api/tk/v2/track/import', [
            'headers' => [
                'Content-Type'=>'application/json',
                'accept'=>'application/json',
                'Track123-Api-Secret' => $this->api_key
            ],
            'body' => json_encode($body, JSON_UNESCAPED_UNICODE)
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

        $trackNos = array_filter(array_unique(explode(',', $trackNo)));

        if(count($trackNos) > 1){
            throw  new \Exception('trackNo must be one');
        }

        $body = [];

        foreach($trackNos as $trackNo){
            $body['trackNos'][] = $trackNo;
        }

        $client = new \GuzzleHttp\Client();
        $response = $client->request('POST', 'https://api.track123.com/gateway/open-api/tk/v2/track/query', [
            'headers' => [
                'Content-Type'=>'application/json',
                'accept'=>'application/json',
                'Track123-Api-Secret' => $this->api_key
            ],
            'body' => json_encode($body, JSON_UNESCAPED_UNICODE)
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

    public function webhook(string $api_key, array $data): array
    {
        ## 验证合法性
        if(empty($data['verify']) || empty($data['verify']['timestamp']) || empty($data['verify']['signature'])){
            throw  new \Exception('verify is required');
        }

        $sign = hash('sha256', $api_key.$data['verify']['timestamp']);
        if($sign != $data['verify']['signature']){
            throw  new \Exception('signature error');
        }

        return $data['data'];
    }
}
