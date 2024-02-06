<?php

// This file is auto-generated, don't edit it. Thanks.
namespace App\Support\GuPoDingTalk\DingTalk\Notice\Sdk;

use AlibabaCloud\SDK\Dingtalk\Vconference_1_0\Dingtalk;
use \Exception;
use AlibabaCloud\Tea\Exception\TeaError;
use AlibabaCloud\Tea\Utils\Utils;

use Darabonba\OpenApi\Models\Config;
use AlibabaCloud\SDK\Dingtalk\Vconference_1_0\Models\CreateVideoConferenceHeaders;
use AlibabaCloud\SDK\Dingtalk\Vconference_1_0\Models\CreateVideoConferenceRequest;
use AlibabaCloud\Tea\Utils\Utils\RuntimeOptions;

class DingTalkVideoConferencing
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
     * @functionName main
     * @param array|null $args
     * @param string|null $token
     *
     * @createdBy 刘伟亮
     * @createDate 2024/1/15 10:13:03
     * @createVersion
     * @createDescription
     *
     * @updatedBy
     * @updateDate 2024/1/15 10:13:03
     * @updateVersion
     * @updateDescription
     *
     * @return void
     *
     */
    public static function main (?array $args = null, ?string $token = null)
    {
        $client = self::createClient ();
        $createVideoConferenceHeaders = new CreateVideoConferenceHeaders([]);
        $createVideoConferenceHeaders->xAcsDingtalkAccessToken = $token;

        /**
         * [
         * "userId" => "27SaQ3iiHLN0uwqcPisedfreNwiEiE",
         * "confTitle" => "XXX的视频会议",
         * "inviteUserIds" => [
         * "iSKzJxxxxx"
         * ],
         * "inviteCaller" => false
         * ]
         */
        $createVideoConferenceRequest = new CreateVideoConferenceRequest($args);
        try {
            $result = $client->createVideoConferenceWithOptions ($createVideoConferenceRequest, $createVideoConferenceHeaders, new RuntimeOptions([]));
        } catch (Exception $err) {
            if (!($err instanceof TeaError)) {
                $err = new TeaError([], $err->getMessage (), $err->getCode (), $err);
            }
            if (!Utils::empty_ ($err->code) && !Utils::empty_ ($err->message)) {
                // err 中含有 code 和 message 属性，可帮助开发定位问题
            }
            return [null, null, $err->getMessage ()];

        }
        return [$result->body->toMap(), '',''];
    }
}

