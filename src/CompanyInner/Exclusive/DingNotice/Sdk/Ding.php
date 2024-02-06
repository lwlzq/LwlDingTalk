<?php

// This file is auto-generated, don't edit it. Thanks.
namespace Liuweiliang\LwlDingTalk\CompanyInner\Exclusive\DingNotice\Sdk;


use AlibabaCloud\SDK\Dingtalk\Vexclusive_1_0\Dingtalk;
use \Exception;
use AlibabaCloud\Tea\Exception\TeaError;
use AlibabaCloud\Tea\Utils\Utils;

use Darabonba\OpenApi\Models\Config;
use AlibabaCloud\SDK\Dingtalk\Vexclusive_1_0\Models\SendAppDingHeaders;
use AlibabaCloud\SDK\Dingtalk\Vexclusive_1_0\Models\SendAppDingRequest;
use AlibabaCloud\Tea\Utils\Utils\RuntimeOptions;

class Ding
{

    /**
     * @projectName ding_talk
     * @functionName createClient
     *
     * @createdBy 刘伟亮
     * @createDate 2024/1/14 18:59:30
     * @createVersion
     * @createDescription
     *
     * @updatedBy
     * @updateDate 2024/1/14 18:59:30
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
     * @apiurl https://open.dingtalk.com/document/orgapp/outgoing-phone-ding
     * @functionName main
     * @param array|null $args
     * @param string|null $token
     *
     * @createdBy 刘伟亮
     * @createDate 2024/1/14 18:59:33
     * @createVersion
     * @createDescription
     *
     * @updatedBy
     * @updateDate 2024/1/14 18:59:33
     * @updateVersion
     * @updateDescription
     *
     * @return array
     *
     */
    public static function main (?array $args = null, ?string $token = null): array
    {
        $client = self::createClient ();
        $sendAppDingHeaders = new SendAppDingHeaders([]);
        $sendAppDingHeaders->xAcsDingtalkAccessToken = $token;
        /**
         * [
         *            "userids" => [
         *                 "123"
         *           ],
         *            "content" => "开会"
         * ]
         */
        $sendAppDingRequest = new SendAppDingRequest($args);
        try {
            $result =   $client->sendAppDingWithOptions ($sendAppDingRequest, $sendAppDingHeaders, new RuntimeOptions([]));
        } catch (Exception $err) {
            if (!($err instanceof TeaError)) {
                $err = new TeaError([], $err->getMessage (), $err->getCode (), $err);
            }
            if (!Utils::empty_ ($err->code) && !Utils::empty_ ($err->message)) {
                // err 中含有 code 和 message 属性，可帮助开发定位问题
            }
            return [null, null, $err->getMessage ()];
        }
        return [$result, '', ''];
    }
}
