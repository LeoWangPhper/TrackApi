<?php
namespace Dahua\TrackApi\Api\Status;

/**
 * ${PARAM_DOC}
 * @return ${TYPE_HINT}
 * ${THROWS_DOC}
 * @author Leo.Wang@php
 */
class Track123StatusDescription
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
            'IN_TRANSIT_01' => [
                'en' => "Parcel is on it's way.",
                'zh' => '包裹正在运送途中'
            ],
            'IN_TRANSIT_02' => [
                'en' => 'Parcels have arrived at the sorting center.',
                'zh' => '包裹已抵达分拣中心。'
            ]
            ,'IN_TRANSIT_03' => [
                'en' => 'Parcel customs clearance completed.',
                'zh' => '包裹清关完成。'
            ]
            ,'IN_TRANSIT_04' => [
                'en' => 'Dispatching, the package has been encapsulated and will be sent to the airport soon.',
                'zh' => '发货中，包裹已封装好，即将送往机场。'
            ]
            ,'IN_TRANSIT_05' => [
                'en' => 'The package has been handed over to the airline and is being sent to the destination country.',
                'zh' => '包裹已移交给航空公司并正在发往目的地国家。'
            ]
            ,'IN_TRANSIT_06' => [
                'en' => 'Landed, the package has arrived in the destination country.',
                'zh' => '落地，包裹已抵达目的地国家。'
            ]
            ,'IN_TRANSIT_07' => [
                'en' => 'The parcel has arrived at the local post office or courier outlet and delivery will be arranged soon.',
                'zh' => '包裹已抵达当地邮局或快递网点，很快就会安排派送。'
            ]
            ,'IN_TRANSIT_08' => [
                'en' => 'The package is on the plane and the plane has departed.',
                'zh' => '包裹已在飞机上，飞机已起飞。'
            ]
            ,'WAITING_DELIVERY_01' => [
                'en' => 'The parcel is out for delivery.',
                'zh' => '包裹已发出以供派送。'
            ]
            ,'WAITING_DELIVERY_02' => [
                'en' => 'The parcel has arrived at the collection point for receipts to pick up.',
                'zh' => '包裹已到达收件点以供领取收据。'
            ]
            ,'WAITING_DELIVERY_03' => [
                'en' => 'The recipient requests a delayed delivery or the courier leaves a note after a failed delivery waiting for a second delivery.',
                'zh' => '收件人要求延迟派送，或者快递员在派送失败后留下纸条等待第二次派送。'
            ]
            ,'DELIVERED_01' => [
                'en' => 'Parcel delivered successfully.',
                'zh' => '包裹已成功投递。'
            ]
            ,'DELIVERED_02' => [
                'en' => 'Successful pick-up by the recipient at the collection point.',
                'zh' => '收件人在收集点成功取件。'
            ]
            ,'DELIVERED_03' => [
                'en' => 'Parcel delivered and signed by the customer.',
                'zh' => '包裹已由客户送达并签名。'
            ]
            ,'DELIVERED_04' => [
                'en' => 'Parcel delivered to property owners, doormen, family members, or neighbors',
                'zh' => '包裹送达业主、门卫、家人或邻居'
            ]
            ,'DELIVERY_FAILED_01' => [
                'en' => 'Delivery failed due to address related issues.',
                'zh' => '由于地址相关问题，配送失败。'
            ]
            ,'DELIVERY_FAILED_02' => [
                'en' => 'Delivery failed due to the recipient was not at home.',
                'zh' => '由于收件人不在家，导致派送失败。'
            ]
            ,'DELIVERY_FAILED_03' => [
                'en' => 'Delivery failed due to the recipient can not being reached.',
                'zh' => '由于无法联系收件人，导致递送失败。'
            ]
            ,'DELIVERY_FAILED_04' => [
                'en' => 'Delivery failed due to other reasons.',
                'zh' => '由于其他原因导致配送失败。'
            ]
            ,'ABNORMAL_01' => [
                'en' => 'Parcel unclaimed.',
                'zh' => '包裹无人认领。'
            ]
            ,'ABNORMAL_02' => [
                'en' => 'Parcels detained by customs.',
                'zh' => '包裹被海关扣留。'
            ]
            ,'ABNORMAL_03' => [
                'en' => 'The package is damaged, lost, or discarded.',
                'zh' => '包裹损坏、丢失或被丢弃。'
            ]
            ,'ABNORMAL_04' => [
                'en' => 'The order is canceled.',
                'zh' => '订单已取消。'
            ]
            ,'ABNORMAL_05' => [
                'en' => 'The recipient refuses to accept the parcel.',
                'zh' => '收件人拒绝接受包裹。'
            ]
            ,'ABNORMAL_06' => [
                'en' => 'The return package has been successfully received by the sender.',
                'zh' => '退回的包裹已成功被寄件人收到。'
            ]
            ,'ABNORMAL_07' => [
                'en' => 'The package is on its way to the sender.',
                'zh' => '包裹正在运送给寄件人。'
            ]
            ,'ABNORMAL_08' => [
                'en' => 'Other exceptions.',
                'zh' => '其他例外情况。'
            ]
            ,'INFO_RECEIVED_01' => [
                'en' => 'The carrier has received a request from the shipper and is preparing to pick up the package.',
                'zh' => '承运人已收到托运人的请求，正在准备提取包裹。'
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
