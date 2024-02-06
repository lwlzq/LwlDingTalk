<?php

// This file is auto-generated, don't edit it. Thanks.
namespace Liuweiliang\LwlDingTalk\CompanyInner\Exclusive\DingNotice\Sdk;

use AlibabaCloud\SDK\Dingtalk\Vexclusive_1_0\Dingtalk;
use \Exception;
use AlibabaCloud\Tea\Exception\TeaError;
use AlibabaCloud\Tea\Utils\Utils;

use Darabonba\OpenApi\Models\Config;
use AlibabaCloud\SDK\Dingtalk\Vexclusive_1_0\Models\SendPhoneDingHeaders;
use AlibabaCloud\SDK\Dingtalk\Vexclusive_1_0\Models\SendPhoneDingRequest;
use AlibabaCloud\Tea\Utils\Utils\RuntimeOptions;

class DingPhone
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
    public static function main (?array $args = null, ?string $token = null):array
    {
        $client = self::createClient ();
        $sendPhoneDingHeaders = new SendPhoneDingHeaders([]);
        $sendPhoneDingHeaders->xAcsDingtalkAccessToken = $token;
        /**
         * [
         *            "userids" => [
         *                 "123"
         *           ],
         *            "content" => "开会"
         * ]
         */
        $sendPhoneDingRequest = new SendPhoneDingRequest($args);
        try {
            $result = $client->sendPhoneDingWithOptions ($sendPhoneDingRequest, $sendPhoneDingHeaders, new RuntimeOptions([]));
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
