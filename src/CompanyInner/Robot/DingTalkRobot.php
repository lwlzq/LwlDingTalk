<?php
declare(strict_types = 1);

namespace Liuweiliang\LwlDingTalk\CompanyInner\InteractiveCard\Robot;


use Liuweiliang\LwlDingTalk\Basic\AbstractBasic;

/**
 * @projectName ding_talk
 * @className DingTalkRobot
 *
 * @createdBy 刘伟亮
 * @createDate 2024/1/13 08:01:18
 * @createVersion 1.0.0
 * @createDescription 机器人通知
 */
#[AllowDynamicProperties]
class DingTalkRobot extends AbstractBasic implements DingTalkRobotInterface
{
    protected string $currentUrl = '';
    public function __construct ()
    {
        parent::__construct ();
        $this->currentUrl = $this->baseUrl.'robot/';
    }


    /**
     * @projectName ding_talk
     * @apiurl:https://open.dingtalk.com/document/orgapp/custom-robots-send-group-messages#h2-ygj-edd-8xo
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
        $result = \LwlClientApi::post ($this->currentUrl.'send?access_token='.$token)
            ->json ($params)
            ->run ()
            ->getData ();
        return match ($result['errcode']) {
            0 => [$result, '', ''],
            default => [null, null, $result['errmsg']],
        };
    }
}
