<?php

namespace  Liuweiliang\LwlDingTalk\CompanyInner\JsApi;

use Liuweiliang\LwlDingTalk\Basic\JsApi;

/**
 * @projectName ding_talk
 * @className DingTalkJsApi
 *
 * @createdBy 刘伟亮
 * @createDate 2024/1/15 13:45:14
 * @createVersion 1.0.0
 * @createDescription JsApi
 */
class DingTalkJsApi
{

    /**
     * @projectName ding_talk
     * @functionName main
     * @param string $url
     *
     * @createdBy 刘伟亮
     * @createDate 2024/1/15 14:23:22
     * @createVersion 1.0.0
     * @createDescription
     *
     * @updatedBy
     * @updateDate 2024/1/15 14:23:22
     * @updateVersion
     * @updateDescription
     *
     * @return array
     *
     */
    public static function main(string $url): array
    {
        $data = array();
        $data['nonce_str'] = md5(intval(microtime(true) * 10000));
        $data['timestamp'] = time();
        $data['url'] = urldecode($url);
        $data['signature'] = self::getJsSignature($data);
        $data['agent_id'] = config('dint_talk.agent_id');
        $data['corp_id'] = config('dint_talk.corp_id');
        $data['js_api_list'] = config('dint_talk.js_api_list');
        return $data;
    }

    /**
     * @projectName ding_talk
     * @functionName getJsSignature
     * @param array $data
     *
     * @createdBy 刘伟亮
     * @createDate 2024/1/15 14:22:41
     * @createVersion 1.0
     * @createDescription  获取 Js 签名
     *
     * @updatedBy
     * @updateDate 2024/1/15 14:22:41
     * @updateVersion
     * @updateDescription
     *
     * @return string
     *
     */
    private static function getJsSignature(array $data): string
    {
        $data['jsapi_ticket'] = JsApi::instance()->ticket ();
        ksort($data);
        return sha1(urldecode(http_build_query($data, null, '&')));
    }
}
