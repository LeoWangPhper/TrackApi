<?php
namespace Dahua\TrackApi\Api;

/**
 * ${PARAM_DOC}
 * @return ${TYPE_HINT}
 * ${THROWS_DOC}
 * @author Leo.Wang@php
 */
interface TrackInterface
{
    /**
     * @param string $trackNo
     * @return array
     * @author Leo.Wang@php
     * 注册运单号到物流系统
     */
    public function registerTrackNo(string $trackNo): array;

    /**
     * @param string $trackNo
     * @return array
     * @author Leo.Wang@php
     * 查询物流信息
     */
    public function getTrackInfo(string $trackNo): array;

    /***
     * @param array $data
     * @param $returnData
     * @return bool
     * @author Leo.Wang@php
     * webhook
     */
    public function webhook(string $api_key, array $data, &$returnData): array;


    /***
     * @param array $response
     * @return array
     * @author Leo.Wang@php
     * 处理物流信息返回
     */
    public function response(array $response): array;
}
