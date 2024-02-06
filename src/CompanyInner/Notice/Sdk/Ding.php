<?php
declare(strict_types = 1);

namespace App\Support\GuPoDingTalk\DingTalk\Notice\Sdk;

use AlibabaCloud\SDK\Dingtalk\Vrobot_1_0\Dingtalk;
use \Exception;
use AlibabaCloud\Tea\Exception\TeaError;
use AlibabaCloud\Tea\Utils\Utils;

use Darabonba\OpenApi\Models\Config;
use AlibabaCloud\SDK\Dingtalk\Vrobot_1_0\Models\RobotSendDingHeaders;
use AlibabaCloud\SDK\Dingtalk\Vrobot_1_0\Models\RobotSendDingRequest;
use AlibabaCloud\Tea\Utils\Utils\RuntimeOptions;

/**
 * @projectName ding_talk
 * @className Ding
 *
 * @createdBy 刘伟亮
 * @createDate 2024/1/14 18:07:07
 * @createVersion 1.0.0
 * @createDescription 钉一下
 */
class Ding
{

    /**
     * @projectName ding_talk
     * @functionName createClient
     *
     * @createdBy 刘伟亮
     * @createDate 2024/1/14 18:08:35
     * @createVersion 1.0.0
     * @createDescription 初始化账号Client
     *
     * @updatedBy
     * @updateDate 2024/1/14 18:08:35
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
     * @apiurl https://open.dingtalk.com/document/orgapp/robot-sends-nail-message
     * @functionName main
     * @param array|null $args
     * @param string|null $token
     *
     * @createdBy 刘伟亮
     * @createDate 2024/1/14 18:54:56
     * @createVersion
     * @createDescription
     *
     * @updatedBy
     * @updateDate 2024/1/14 18:54:56
     * @updateVersion
     * @updateDescription
     *
     * @return array
     *
     */
    public static function main (?array $args = null, ?string $token = null):array
    {
        $client = self::createClient ();
        $robotSendDingHeaders = new RobotSendDingHeaders([]);
        $robotSendDingHeaders->xAcsDingtalkAccessToken = $token;
        $robotSendDingRequest = new RobotSendDingRequest($args);
        try {
            $result = $client->robotSendDingWithOptions ($robotSendDingRequest, $robotSendDingHeaders, new RuntimeOptions([]));
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
