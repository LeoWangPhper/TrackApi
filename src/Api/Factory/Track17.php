<?php
/**
 * @return
 * @author Leo.Wang@php
 */

namespace Dahua\TrackApi\Api\Factory;

use Dahua\TrackApi\Api\Response\Track17Response;
use Dahua\TrackApi\Api\TrackInterface;
use GuzzleHttp\Exception\BadResponseException;
use GuzzleHttp\Exception\ClientException;
use GuzzleHttp\Exception\RequestException;

class Track17 implements TrackInterface
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
                'number' => $trackNo
            ];
        }

        try {
            $client = new \GuzzleHttp\Client();
            $response = $client->request('POST', 'https://api.17track.net/track/v2.2/register', [
                'headers' => [
                    'Content-Type' => 'application/json',
                    'accept' => 'application/json',
                    '17token' => $this->api_key
                ],
                'body' => json_encode($body, JSON_UNESCAPED_UNICODE)
            ]);
        }catch(ClientException $e){
            if ($e->getResponse() && $e->getResponse()->getStatusCode() === 401) {
                throw new \Exception($e->getResponse()->getBody()->getContents());
            } else {
                throw new \Exception($e->getMessage());
            }
        }catch(RequestException $e){
            throw new \Exception($e->getMessage());
        }

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
                'number' => $trackNo
            ];
        }

        try {
            $client = new \GuzzleHttp\Client();
            $response = $client->request('POST', 'https://api.17track.net/track/v2.2/gettrackinfo', [
                'headers' => [
                    'Content-Type' => 'application/json',
                    'accept' => 'application/json',
                    '17token' => $this->api_key
                ],
                'body' => json_encode($body, JSON_UNESCAPED_UNICODE)
            ]);
        }catch(ClientException $e) {
            if ($e->getResponse() && $e->getResponse()->getStatusCode() === 401) {
                throw new \Exception($e->getResponse()->getBody()->getContents());
            } else {
                throw new \Exception($e->getMessage());
            }
        }catch (RequestException $e){
            throw new \Exception($e->getMessage());
        }catch(BadResponseException $e){
            throw new \Exception($e->getMessage());
        }catch (\InvalidArgumentException $e) {
            throw new \Exception($e->getMessage());
        }

        if($response->getStatusCode() != '200'){
            throw  new \Exception('Request failed');
        }

        return json_decode($response->getBody(), true);
    }

    public function response(array $response): array
    {
        return (new Track17Response())->response($response);
    }

    public function webhook(array $data): array
    {
        ## 验证合法性
        if(empty($data['verify']) || empty($data['verify']['timestamp']) || empty($data['verify']['signature'])){
            throw  new \Exception('verify is required');
        }

        $sign = hash('sha256', $this->api_key.$data['verify']['timestamp']);
        if($sign != $data['verify']['signature']){
            throw  new \Exception('signature error');
        }

        return $data['data'];
    }
}
