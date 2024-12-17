<?php
/**
 * @return
 * @author Leo.Wang@php
 */

namespace Dahua\TrackApi\Api\Factory;

use Dahua\TrackApi\Api\Response\Track718Response;
use Dahua\TrackApi\Api\TrackInterface;

class Track718 implements TrackInterface
{
    private string $api_key = '';

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
                'trackNum' => $trackNo
            ];
        }

        $client = new \GuzzleHttp\Client();
        $response = $client->request('POST', 'https://apigetway.track718.net/v2/tracks', [
            'headers' => [
                'Content-Type'=>'application/json',
                'accept'=>'application/json',
                'Track718-API-Key' => $this->api_key
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
            $body[] = [
                'trackNum' => $trackNo
            ];
        }

        $client = new \GuzzleHttp\Client();
        $response = $client->request('POST', 'https://apigetway.track718.net/v2/tracking/query', [
            'headers' => [
                'Content-Type'=>'application/json',
                'accept'=>'application/json',
                'Track718-API-Key' => $this->api_key
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
        return (new Track718Response())->response($response);
    }

    public function webhook(string $api_key, array $data, &$returnData): array
    {
        ## 验证合法性
        if(empty($data['verify']) || empty($data['verify']['timestamp']) || empty($data['verify']['sign'])){
            throw  new \Exception('verify is required');
        }

        $sign = hash('sha256', $api_key.$data['verify']['timestamp']);
        if($sign != $data['verify']['sign']){
            throw  new \Exception('signature error');
        }

        return $data['list'];
    }
}
