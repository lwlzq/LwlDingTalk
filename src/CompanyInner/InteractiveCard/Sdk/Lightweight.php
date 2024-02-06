<?php

// This file is auto-generated, don't edit it. Thanks.
namespace Liuweiliang\LwlDingTalk\CompanyInner\InteractiveCard\Sdk;

use AlibabaCloud\SDK\Dingtalk\Vim_1_0\Dingtalk;
use \Exception;
use AlibabaCloud\Tea\Exception\TeaError;
use AlibabaCloud\Tea\Utils\Utils;

use Darabonba\OpenApi\Models\Config;
use AlibabaCloud\SDK\Dingtalk\Vim_1_0\Models\SendTemplateInteractiveCardHeaders;
use AlibabaCloud\SDK\Dingtalk\Vim_1_0\Models\SendTemplateInteractiveCardRequest\sendOptions;
use AlibabaCloud\SDK\Dingtalk\Vim_1_0\Models\SendTemplateInteractiveCardRequest;
use AlibabaCloud\Tea\Utils\Utils\RuntimeOptions;

/**
 * @projectName ding_talk
 * @className Lightweight
 *
 * @createdBy 刘伟亮
 * @createDate 2024/1/15 13:43:28
 * @createVersion 1.0.0
 * @createDescription 轻量级
 */

class Lightweight
{

    /**
     * @projectName ding_talk
     * @functionName createClient
     *
     * @createdBy 刘伟亮
     * @createDate 2024/1/15 11:05:53
     * @createVersion
     * @createDescription
     *
     * @updatedBy
     * @updateDate 2024/1/15 11:05:53
     * @updateVersion
     * @updateDescription
     *
     * @return Dingtalk
     *
     */
    public static function createClient ()
    {
        $config = new Config([]);
        $config->protocol = "https";
        $config->regionId = "central";
        return new Dingtalk($config);
    }

    /**
     * @projectName ding_talk
     * @apiurl https://open.dingtalk.com/document/orgapp/send-lightweight-interactive-cards#h2-qnk-2zr-crh
     * @functionName main
     * @param array|null $args
     * @param array|null $config
     * @param string|null $token
     *
     * @createdBy 刘伟亮
     * @createDate 2024/1/15 11:09:43
     * @createVersion 1.0.0
     * @createDescription 发送轻量级卡片
     *
     * @updatedBy
     * @updateDate 2024/1/15 11:09:43
     * @updateVersion
     * @updateDescription
     *
     * @return array
     *
     */
    public static function main (?array $args = null, array $config = null, ?string $token = null):array
    {
        $client = self::createClient ();
        $sendTemplateInteractiveCardHeaders = new SendTemplateInteractiveCardHeaders([]);
        $sendTemplateInteractiveCardHeaders->xAcsDingtalkAccessToken = $token;
//     $args =    [
//            "atUserListJson" => "[{\"nickName\":\"张三\",\"userId\":\"userId0001\"},{\"nickName\":\"李四\",\"unionId\":\"unionId001\"}]",
//            "atAll" => false,
//            "receiverListJson" => "[{\"userId\":\"userId0001\"},{\"unionId\":\"unionId001\"}]",
//            "cardPropertyJson" => "{}"
//        ]
        $sendOptions = new sendOptions($args);

//        [
//            "cardTemplateId" => "TuWenCard01",
//            "singleChatReceiver" => "以userId为例：{\"userId\":\"userId0001\"}；以unionId为例{\"unionId\":\"unionId001\"}",
//            "outTrackId" => "cardXXXX01",
//            "robotCode" => "xxxxxx",
//            "callbackUrl" => "https://xxxx.com/xxx/",
//            "cardData" => "根据具体的cardTemplateId参考文档格式",
//            "sendOptions" => $sendOptions
//        ]

        $sendTemplateInteractiveCardRequest = new SendTemplateInteractiveCardRequest($config);
        try {
            $result = $client->sendTemplateInteractiveCardWithOptions ($sendTemplateInteractiveCardRequest, $sendTemplateInteractiveCardHeaders, new RuntimeOptions([]));
        } catch (Exception $err) {
            if (!($err instanceof TeaError)) {
                $err = new TeaError([], $err->getMessage (), $err->getCode (), $err);
            }
            if (!Utils::empty_ ($err->code) && !Utils::empty_ ($err->message)) {
                // err 中含有 code 和 message 属性，可帮助开发定位问题
            }
            return [null, null, $err->getMessage ()];
        }
        return [$result->body->toMap (), '', ''];
    }
}
