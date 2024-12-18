<?php
namespace Dahua\TrackApi\Api\Status;

/**
 * ${PARAM_DOC}
 * @return ${TYPE_HINT}
 * ${THROWS_DOC}
 * @author Leo.Wang@php
 */
class Track17StatusDescription
{
    /***
     * @param string $sub_status
     * @param $statusEnDes
     * @param $statusZhDes
     * @return string[]
     * @author Leo.Wang@php
     */
    public static function statusDescription(string $sub_status, &$statusEnDes, &$statusZhDes): void
    {
        $statusDescription = [
            'NotFound_Other' => [
                'en' => "NotFound_Other",
                'zh' => '运输商没有返回信息。'
            ]
            ,'NotFound_InvalidCode' => [
                'en' => 'NotFound_InvalidCode',
                'zh' => '物流单号无效，无法进行查询。'
            ]
            ,'InfoReceived' => [
                'en' => 'InfoReceived',
                'zh' => '收到信息，暂无细分含义与主状态一致。'
            ]
            ,'InTransit_PickedUp' => [
                'en' => 'InTransit_PickedUp',
                'zh' => '已揽收，运输商已从发件人处取回包裹。'
            ]
            ,'InTransit_Other' => [
                'en' => 'InTransit_Other',
                'zh' => '其它情况，暂无细分除当前已知子状态之外的情况。'
            ]
            ,'InTransit_Departure' => [
                'en' => 'InTransit_Departure',
                'zh' => '已离港，货物离开起运地（国家/地区）港口。'
            ]
            ,'InTransit_Arrival' => [
                'en' => 'InTransit_Arrival',
                'zh' => '已到港，货物到达目的地（国家/地区）港口。'
            ]
            ,'Expired_Other' => [
                'en' => 'Expired_Other',
                'zh' => '运输过久，暂无细分含义与主状态一致。'
            ]
            ,'AvailableForPickup_Other' => [
                'en' => 'AvailableForPickup_Other',
                'zh' => '到达待取，暂无细分含义与主状态一致。'
            ]
            ,'OutForDelivery_Other' => [
                'en' => 'OutForDelivery_Other',
                'zh' => '派送途中，暂无细分含义与主状态一致。'
            ]
            ,'DeliveryFailure_Other' => [
                'en' => 'DeliveryFailure_Other',
                'zh' => '其它情况，暂无细分除当前已知子状态之外的情况。'
            ]
            ,'DeliveryFailure_NoBody' => [
                'en' => 'DeliveryFailure_NoBody',
                'zh' => '找不到收件人，派送中的包裹暂时无法联系上收件人，导致投递失败。'
            ]
            ,'DeliveryFailure_Security' => [
                'en' => 'DeliveryFailure_Security',
                'zh' => '安全原因，派送中发现的包裹安全、清关、费用问题，导致投递失败。'
            ]
            ,'DeliveryFailure_Rejected' => [
                'en' => 'DeliveryFailure_Rejected',
                'zh' => '拒收，收件人因某些原因拒绝接收包裹，导致投递失败。'
            ]
            ,'DeliveryFailure_InvalidAddress' => [
                'en' => 'DeliveryFailure_InvalidAddress',
                'zh' => '地址错误，由于收件人地址不正确，导致投递失败。'
            ]
            ,'Delivered_Other' => [
                'en' => 'Delivered_Other',
                'zh' => '成功签收，暂无细分含义与主状态一致。'
            ]
            ,'Exception_Other' => [
                'en' => 'Exception_Other',
                'zh' => '其它情况，暂无细分除当前已知子状态之外的情况。'
            ]
            ,'Exception_Returning' => [
                'en' => 'Exception_Returning',
                'zh' => '退件中，包裹正在送回寄件人的途中。'
            ]
            ,'Exception_Returned' => [
                'en' => 'Exception_Returned',
                'zh' => '退件签收，寄件人已成功收到退件。'
            ]
            ,'Exception_NoBody' => [
                'en' => 'Exception_NoBody',
                'zh' => '找不到收件人，在派送之前发现的收件人信息异常。'
            ]
            ,'Exception_Security' => [
                'en' => 'Exception_Security',
                'zh' => '安全原因，在派送之前发现异常，包含安全、清关、费用问题。'
            ]
            ,'Exception_Damage' => [
                'en' => 'Exception_Damage',
                'zh' => '损坏，在承运过程中发现货物损坏了。'
            ]
            ,'Exception_Rejected' => [
                'en' => 'Exception_Rejected',
                'zh' => '拒收，在派送之前接收到有收件人拒收情况。'
            ]
            ,'Exception_Delayed' => [
                'en' => 'Exception_Delayed',
                'zh' => '延误，因各种情况导致的可能超出原定的运输周期。'
            ]
            ,'Exception_Lost' => [
                'en' => 'Exception_Lost',
                'zh' => '丢失，因各种情况导致的货物丢失。'
            ]
            ,'Exception_Destroyed' => [
                'en' => 'Exception_Destroyed',
                'zh' => '销毁，因各种情况无法完成交付的货物并进行销毁。'
            ]
            ,'Exception_Cancel' => [
                'en' => 'Exception_Cancel',
                'zh' => '取消，因为各种情况物流订单被取消了。'
            ]

        ];

        $res = !empty($statusDescription[$sub_status]) ? $statusDescription[$sub_status] : [
            'en' => 'Unknown',
            'zh' => '未知状态'
        ];

        $statusEnDes = $res['en'];
        $statusZhDes = $res['zh'];
    }
}
