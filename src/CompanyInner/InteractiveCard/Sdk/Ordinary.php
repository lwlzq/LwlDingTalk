<?php

// This file is auto-generated, don't edit it. Thanks.
namespace Liuweiliang\LwlDingTalk\CompanyInner\InteractiveCard\Sdk;

use AlibabaCloud\SDK\Dingtalk\Vim_1_0\Dingtalk;
use \Exception;
use AlibabaCloud\Tea\Exception\TeaError;
use AlibabaCloud\Tea\Utils\Utils;

use Darabonba\OpenApi\Models\Config;
use AlibabaCloud\SDK\Dingtalk\Vim_1_0\Models\SendRobotInteractiveCardHeaders;
use AlibabaCloud\SDK\Dingtalk\Vim_1_0\Models\SendRobotInteractiveCardRequest\sendOptions;
use AlibabaCloud\SDK\Dingtalk\Vim_1_0\Models\SendRobotInteractiveCardRequest;
use AlibabaCloud\Tea\Utils\Utils\RuntimeOptions;

/**
 * @projectName ding_talk
 * @className Ordinary
 *
 * @createdBy 刘伟亮
 * @createDate 2024/1/15 13:43:04
 * @createVersion 1.0
 * @createDescription 普通
 */
class Ordinary
{

    /**
     * 使用 Token 初始化账号Client
     * @return Dingtalk Client
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
     * @apiurl https://open.dingtalk.com/document/orgapp/robots-send-interactive-cards#h2-ged-e7b-tij
     * @functionName main
     * @param array|null $args
     * @param array|null $config
     * @param string|null $token
     *
     * @createdBy 刘伟亮
     * @createDate 2024/1/15 11:17:33
     * @createVersion
     * @createDescription
     *
     * @updatedBy
     * @updateDate 2024/1/15 11:17:33
     * @updateVersion
     * @updateDescription
     *
     * @return array
     *
     */
    public static function main (?array $args = null, array $config = null, ?string $token = null):array
    {
        $client = self::createClient ();
        $sendRobotInteractiveCardHeaders = new SendRobotInteractiveCardHeaders([]);
        $sendRobotInteractiveCardHeaders->xAcsDingtalkAccessToken = $token;
//        [
//            "atUserListJson" => "[{\"nickName\":\"张三\",\"userId\":\"userId0001\"},{\"nickName\":\"李四\",\"unionId\":\"unionId001\"}]",
//            "atAll" => false,
//            "receiverListJson" => "[{\"userId\":\"userId0001\"},{\"unionId\":\"unionId001\"}]",
//            "cardPropertyJson" => "{}"
//        ]
        $sendOptions = new sendOptions($args);
//        [
//            "cardTemplateId" => "xxxxxxxx",
//            "openConversationId" => "cidXXXX",
//            "singleChatReceiver" => "以userId为例：{\"userId\":\"userId0001\"}；以unionId为例{\"unionId\":\"unionId001\"}",
//            "cardBizId" => "cardXXXX01",
//            "robotCode" => "xxxxxx",
//            "callbackUrl" => "https://***",
//            "cardData" => "{   \"config\": {     \"autoLayout\": true,     \"enableForward\": true   },   \"header\": {     \"title\": {       \"type\": \"text\",       \"text\": \"钉钉卡片\"     },     \"logo\": \"@lALPDfJ6V_FPDmvNAfTNAfQ\"   },   \"contents\": [     {       \"type\": \"text\",       \"text\": \"钉钉正在为各行各业提供专业解决方案，沉淀钉钉1900万企业组织核心业务场景，提供专属钉钉、教育、医疗、新零售等多行业多维度的解决方案。\",       \"id\": \"text_1658220665485\" } ]}",
//            "userIdPrivateDataMap" => "{\"userId0001\":{\"xxxx\":\"xxxx\"}}",
//            "unionIdPrivateDataMap" => "{\"unionId0001\":{\"xxxx\":\"xxxx\"}}",
//            "sendOptions" => $sendOptions,
//            "pullStrategy" => false
//        ]
        $sendRobotInteractiveCardRequest = new SendRobotInteractiveCardRequest($config);
        try {
            $result = $client->sendRobotInteractiveCardWithOptions ($sendRobotInteractiveCardRequest, $sendRobotInteractiveCardHeaders, new RuntimeOptions([]));
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
