<?php
declare(strict_types = 1);

namespace Liuweiliang\LwlDingTalk\CompanyInner\InteractiveCard\Notice;


use Liuweiliang\LwlDingTalk\Basic\AbstractBasic;

/**
 * @projectName ding_talk
 * @className DingTalkWorkNotice
 *
 * @createdBy 刘伟亮
 * @createDate 2024/1/13 08:01:18
 * @createVersion 1.0.0
 * @createDescription 工作通知
 */
#[AllowDynamicProperties]
class DingTalkWorkNotice extends AbstractBasic implements DingTalkWorkNoticeInterface
{

    protected string $currentUrl = '';
    public function __construct ()
    {
        parent::__construct ();
        $this->currentUrl = $this->baseUrl.'topapi/message/corpconversation/';
    }


    /**
     * @projectName ding_talk
     * @apiurl:https://open.dingtalk.com/document/orgapp/asynchronous-sending-of-enterprise-session-messages#h2-kms-9i7-ynw
     * @functionName send
     * @param array|null $params 参数
     * @param string|null $token 令牌
     *
     * @createdBy 刘伟亮
     * @createDate 2024/1/13 13:34:42
     * @createVersion
     * @createDescription
     *
     * @updatedBy
     * @updateDate 2024/1/13 13:34:42
     * @updateVersion
     * @updateDescription
     *
     * @return array|null
     *
     */
    public function send (?array $params = null, ?string $token = null): ?array
    {
        $result = \LwlClientApi::post ($this->currentUrl.'asyncsend_v2?access_token='.$token)
            ->json ($params)
            ->run ()
            ->getData ();
        return match ($result['errcode']) {
            0 => [$result, '', ''],
            default => [null, null, $result['errmsg']],
        };
    }

    /**
     * @projectName ding_talk
     * @apiurl:https://open.dingtalk.com/document/orgapp/notification-of-work-withdrawal#h2-4av-rvn-icn
     * @functionName recall
     * @param array|null $params
     * @param string|null $token
     *
     * @createdBy 刘伟亮
     * @createDate 2024/1/15 10:06:51
     * @createVersion
     * @createDescription
     *
     * @updatedBy
     * @updateDate 2024/1/15 10:06:51
     * @updateVersion
     * @updateDescription
     *
     * @return array|null
     *
     */

    public function recall (?array $params = null, ?string $token = null): ?array
    {
        $result = \LwlClientApi::post ($this->currentUrl.'recall?access_token='.$token)
            ->json ($params)
            ->run ()
            ->getData ();
        return match ($result['errcode']) {
            0 => [$result, '', ''],
            default => [null, null, $result['errmsg'] ?: null],
        };
    }
}
