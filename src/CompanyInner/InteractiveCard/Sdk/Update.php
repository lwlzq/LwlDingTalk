<?php

// This file is auto-generated, don't edit it. Thanks.
namespace Liuweiliang\LwlDingTalk\CompanyInner\InteractiveCard\Sdk;

use AlibabaCloud\SDK\Dingtalk\Vim_1_0\Dingtalk;
use \Exception;
use AlibabaCloud\Tea\Exception\TeaError;
use AlibabaCloud\Tea\Utils\Utils;

use Darabonba\OpenApi\Models\Config;
use AlibabaCloud\SDK\Dingtalk\Vim_1_0\Models\UpdateRobotInteractiveCardHeaders;
use AlibabaCloud\SDK\Dingtalk\Vim_1_0\Models\UpdateRobotInteractiveCardRequest\updateOptions;
use AlibabaCloud\SDK\Dingtalk\Vim_1_0\Models\UpdateRobotInteractiveCardRequest;
use AlibabaCloud\Tea\Utils\Utils\RuntimeOptions;

/**
 * @projectName ding_talk
 * @className Update
 *
 * @createdBy 刘伟亮
 * @createDate 2024/1/15 13:39:01
 * @createVersion 1.0.0
 * @createDescription 更新互动卡片
 */
class Update
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
     * @apiurl https://open.dingtalk.com/document/orgapp/send-interactive-dynamic-cards-1#h2-pjm-mnx-g7r
     * @functionName main
     * @param array|null $args
     * @param string|null $token
     *
     * @createdBy 刘伟亮
     * @createDate 2024/1/15 13:39:06
     * @createVersion
     * @createDescription
     *
     * @updatedBy
     * @updateDate 2024/1/15 13:39:06
     * @updateVersion
     * @updateDescription
     *
     * @return array
     *
     */
    public static function main (?array $args = null, ?string $token = ''):array
    {
        $client = self::createClient ();
        $updateRobotInteractiveCardHeaders = new UpdateRobotInteractiveCardHeaders([]);
        $updateRobotInteractiveCardHeaders->xAcsDingtalkAccessToken = $token;
        $updateOptions = new updateOptions([
            "updateCardDataByKey" => $args['updateCardDataByKey'] ?? false,
            "updatePrivateDataByKey" => $args['updatePrivateDataByKey'] ?? false,
        ]);
        $updateRobotInteractiveCardRequest = new UpdateRobotInteractiveCardRequest([
            "cardBizId" => $args['cardBizId'] ?? "cardXXXX01",
            "cardData" => $args['cardData'] ?? "根据具体的cardTemplateId参考文档格式",
            "userIdPrivateDataMap" => $args['userIdPrivateDataMap'] ?? "{\"userId0001\":{\"xxxx\":\"xxxx\"}}",
            "unionIdPrivateDataMap" => $args['unionIdPrivateDataMap'] ?? "{\"unionId0001\":{\"xxxx\":\"xxxx\"}}",
            "updateOptions" => $updateOptions,
        ]);
        try {
            $result = $client->updateRobotInteractiveCardWithOptions ($updateRobotInteractiveCardRequest, $updateRobotInteractiveCardHeaders, new RuntimeOptions([]));
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
