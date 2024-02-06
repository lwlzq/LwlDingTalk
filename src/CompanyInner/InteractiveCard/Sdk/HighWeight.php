<?php

// This file is auto-generated, don't edit it. Thanks.
namespace Liuweiliang\LwlDingTalk\CompanyInner\InteractiveCard\Sdk;

use AlibabaCloud\SDK\Dingtalk\Vim_1_0\Dingtalk;
use \Exception;
use AlibabaCloud\Tea\Exception\TeaError;
use AlibabaCloud\Tea\Utils\Utils;
use Darabonba\OpenApi\Models\Config;
use AlibabaCloud\SDK\Dingtalk\Vim_1_0\Models\SendInteractiveCardHeaders;
use AlibabaCloud\SDK\Dingtalk\Vim_1_0\Models\SendInteractiveCardRequest\cardOptions;
use AlibabaCloud\SDK\Dingtalk\Vim_1_0\Models\PrivateDataValue;
use AlibabaCloud\SDK\Dingtalk\Vim_1_0\Models\SendInteractiveCardRequest\cardData;
use AlibabaCloud\SDK\Dingtalk\Vim_1_0\Models\SendInteractiveCardRequest;
use AlibabaCloud\Tea\Utils\Utils\RuntimeOptions;

/**
 * @projectName ding_talk
 * @className HighWeight
 *
 * @createdBy 刘伟亮
 * @createDate 2024/1/15 13:44:00
 * @createVersion 1.0
 * @createDescription 高级
 */
class HighWeight
{

    public static function createClient()
    {
        $config = new Config([]);
        $config->protocol = "https";
        $config->regionId = "central";
        return new Dingtalk($config);
    }

    /**
     * @projectName ding_talk
     * @apiurl https://open.dingtalk.com/document/orgapp/send-interactive-dynamic-cards-1#h2-pjm-mnx-g7r
     * @functionName main
     * @param $args
     * @param string|null $token
     *
     * @createdBy 刘伟亮
     * @createDate 2024/1/15 13:34:11
     * @createVersion 1.0
     * @createDescription
     *
     * @updatedBy
     * @updateDate 2024/1/15 13:34:11
     * @updateVersion
     * @updateDescription
     *
     * @return array
     *
     */
    public static function main($args, ?string $token = null): array
    {
        $client = self::createClient();
        $sendInteractiveCardHeaders = new SendInteractiveCardHeaders([]);
        $sendInteractiveCardHeaders->xAcsDingtalkAccessToken = $token;
        $cardOptions = new cardOptions([
            "supportForward" => $args['supportForward'] ?? true,
        ]);
        $atOpenIds = $args['atOpenIds'] ?? ["key" => "{123456:\"钉三多\"}"];
        $privateDataValueKeyCardMediaIdParamMap = $args['privateDataValueKeyCardMediaIdParamMap'] ?? ["key" => "test"];
        $privateDataValueKeyCardParamMap = $args['privateDataValueKeyCardParamMap'] ?? ["key" => "test"];
        $privateDataValueKey = new PrivateDataValue([
            "cardParamMap" => $privateDataValueKeyCardParamMap,
            "cardMediaIdParamMap" => $privateDataValueKeyCardMediaIdParamMap,
        ]);
        $privateData = [
            "privateDataValueKey" => $privateDataValueKey,
        ];
        $cardDataCardMediaIdParamMap = $args['cardDataCardMediaIdParamMap'] ?? ["key" => "test"];

        $cardDataCardParamMap = $args['cardDataCardParamMap'] ?? ["key" => "test"];

        $cardData = new cardData([
            "cardParamMap" => $cardDataCardParamMap,
            "cardMediaIdParamMap" => $cardDataCardMediaIdParamMap,
        ]);
        $sendInteractiveCardRequest = new SendInteractiveCardRequest([
            "cardTemplateId" => $args['cardTemplateId'] ?? "card",
            "openConversationId" => $args['openConversationId'] ?? "cid",
            "receiverUserIdList" => $args['receiverUserIdList'],
            "outTrackId" => $args['outTrackId'] ?? "trackId",
            "robotCode" => $args['robotCode'] ?? "robot",
            "conversationType" => $args['conversationType'] ?? 1,
            "callbackRouteKey" => $args['callbackRouteKey'] ?? "eafsingjdlsxxx",
            "cardData" => $cardData,
            "privateData" => $privateData,
            "chatBotId" => $args['chatBotId'] ?? "123",
            "userIdType" => $args['userIdType'] ?? 1,
            "atOpenIds" => $atOpenIds,
            "cardOptions" => $cardOptions,
            "pullStrategy" => $args['pullStrategy'] ?? false,
        ]);
        try {
            $result = $client->sendInteractiveCardWithOptions($sendInteractiveCardRequest, $sendInteractiveCardHeaders, new RuntimeOptions([]));
        } catch(Exception $err) {
            if(!($err instanceof TeaError)) {
                $err = new TeaError([], $err->getMessage(), $err->getCode(), $err);
            }
            if(!Utils::empty_($err->code) && !Utils::empty_($err->message)) {
                // err 中含有 code 和 message 属性，可帮助开发定位问题
            }
            return [null, null, $err->getMessage()];
        }
        return [$result->body->toMap(), '', ''];
    }
}
