<?php
namespace Dahua\TrackApi\Api\Status;

/**
 * ${PARAM_DOC}
 * @return ${TYPE_HINT}
 * ${THROWS_DOC}
 * @author Leo.Wang@php
 */
class Track718StatusDescription
{
    /***
     * @param string $status
     * @param $enStatus
     * @param $zhStatus
     * @return string[]
     * @author Leo.Wang@php
     */
    public static function statusDescription(string $status, &$enStatus, &$zhStatus): void
    {
        $statusDescription = [
            '0' => [
                'en' => 'NotFound',
                'zh' => '查询不到：包裹目前查询不到'
            ],
            '1' => [
                'en' => 'InvalidNumber',
                'zh' => '无效的单号'
            ],
            '10' => [
                'en' => 'NotOnline',
                'zh' => '暂未上线：物流商收到下单信息，等待上门取件'
            ],
            '8' => [
                'en' => 'InTransit',
                'zh' => '运输途中：包裹正在转运中'
            ],
            '14' => [
                'en' => 'CustomsProcessing',
                'zh' => '清关中'
            ],
            '15' => [
                'en' => 'CustomsReleased',
                'zh' => '清关完成'
            ],
            '11' => [
                'en' => 'FirstOnline',
                'zh' => '已上网：物流商已从发件人处取回包裹'
            ],
            '12' => [
                'en' => 'HasTransit',
                'zh' => '已交航：包裹已经交给航司、封发或离港'
            ],
            '13' => [
                'en' => 'ArrivesDestination',
                'zh' => '到达目的国：包裹已经到达目的国家，正经海关检验或者转运中'
            ],
            '20' => [
                'en' => 'Undelivered',
                'zh' => '投递失败：包裹投递失败'
            ],
            '21' => [
                'en' => 'NoRecipients',
                'zh' => '找不到收件人'
            ],
            '22' => [
                'en' => 'IncorrectAddress',
                'zh' => '地址有误'
            ],
            '23' => [
                'en' => 'RejectPackage',
                'zh' => '拒收包裹'
            ],
            '24' => [
                'en' => 'SafetyReasons',
                'zh' => '安全原因'
            ],
            '30' => [
                'en' => 'PickUp',
                'zh' => '到达待取：包裹正在派送或已到达当地'
            ],
            '31' => [
                'en' => 'OnDelivery',
                'zh' => '派送途中'
            ],
            '40' => [
                'en' => 'Delivered',
                'zh' => '签收成功：包裹已成功派送'
            ]
            ,'50' => [
                'en' => 'Alert',
                'zh' => '可能异常：包裹发生异常，可能清关失败、损坏或者丢失'
            ]
            ,'51' => [
                'en' => 'TransitTooLong',
                'zh' => '运输过久：运输途中超过2个月'
            ]
            ,'52' => [
                'en' => 'LostPackage',
                'zh' => '包裹丢失'
            ]
            ,'53' => [
                'en' => 'PackageDamage',
                'zh' => '包裹损坏'
            ]
            ,'54' => [
                'en' => 'TrackNumberCancelled',
                'zh' => '物流单被取消'
            ]
            ,'55' => [
                'en' => 'TransportationDelay',
                'zh' => '运输延迟'
            ]
            ,'56' => [
                'en' => 'MayBeRejected',
                'zh' => '可能被拒收'
            ]
            ,'57' => [
                'en' => 'PossibleSafetyReasons',
                'zh' => '可能安全原因'
            ]
            ,'58' => [
                'en' => 'PossibleAddressError',
                'zh' => '可能地址有误'
            ]
            ,'59' => [
                'en' => 'PossibleNoRecipients',
                'zh' => '可能没人签收'
            ]
            ,'60' => [
                'en' => 'DeliveredTimeout',
                'zh' => '签收超时 (常用物流商 > 物流异常天数设置)'
            ]
            ,'61' => [
                'en' => 'UpdateAbnormal',
                'zh' => '查询不到：包裹目前查询不到'
            ]
            ,'62' => [
                'en' => 'WaitingTax',
                'zh' => '等待交税'
            ]
            ,'65' => [
                'en' => 'Returned',
                'zh' => '包裹退回：包裹退回寄件人'
            ]
            ,'66' => [
                'en' => 'ReturnedAndSigned',
                'zh' => '退回已签收'
            ]
            ,'67' => [
                'en' => 'ReturningProcessing',
                'zh' => '退回处理中'
            ]
        ];

        $res = !empty($statusDescription[$status]) ? $statusDescription[$status] : [
            'en' => 'Unknown',
            'zh' => '未知状态'
        ];

        $enStatus = $res['en'];
        $zhStatus = $res['zh'];
    }
}
