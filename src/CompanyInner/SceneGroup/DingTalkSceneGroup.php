<?php
declare(strict_types = 1);

namespace Liuweiliang\LwlDingTalk\CompanyInner\SceneGroup;


use Liuweiliang\LwlDingTalk\Basic\AbstractBasic;

#[AllowDynamicProperties]
class DingTalkSceneGroup extends AbstractBasic implements DingTalkSceneGroupInterface
{
    /**
     * @var string
     */
    protected string $currentUrl = '';

    /**
     *
     */
    public function __construct ()
    {
        parent::__construct ();
        $this->currentUrl = $this->baseUrl.'topapi/im/chat/';
    }


    /**
     * @projectName ding_talk
     * @apiurl:https://open.dingtalk.com/document/orgapp/create-a-scene-group-v2#h2-n0q-zp6-rx2
     * @functionName create
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
    public function create (?array $params = null, ?string $token = null): ?array
    {
        $result = \LwlClientApi::post ($this->currentUrl.'scenegroup/create?access_token='.$token)
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
     * @apiurl:https://open.dingtalk.com/document/orgapp/scene-group-update#h2-hp4-kdw-nea
     * @functionName update
     * @param array|null $params 参数
     * @param string|null $token 令牌
     *
     * @createdBy 刘伟亮
     * @createDate 2024/1/13 13:42:23
     * @createVersion
     * @createDescription
     *
     * @updatedBy
     * @updateDate 2024/1/13 13:42:23
     * @updateVersion
     * @updateDescription
     *
     * @return array|null
     *
     */
    public function update (?array $params = null, ?string $token = null): ?array
    {
        $result = \LwlClientApi::post ($this->currentUrl.'scenegroup/update?access_token='.$token)
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
     * @apiurl:https://open.dingtalk.com/document/orgapp/add-people-to-scene-group#h2-kjz-voa-q5z
     * @functionName membersAdd
     * @param string|null $openConversationId
     * @param string|array $userIds 钉id
     * @param string|null $token 令牌
     *
     * @createdBy 刘伟亮
     * @createDate 2024/1/13 14:12:53
     * @createVersion 1.0.0
     * @createDescription 添加成员
     *
     * @updatedBy
     * @updateDate 2024/1/13 14:12:53
     * @updateVersion
     * @updateDescription
     *
     * @return array|string[]
     *
     */
    public function membersAdd (?string $openConversationId = null, string|array $userIds = '', ?string $token = null): array
    {
        if (is_null ($openConversationId)) {
            return [null, null, '场景群票据为空'];
        }

        $userIds = is_array ($userIds) ? implode (',', $userIds) : $userIds;

        if (empty($userIds)) {
            return [null, null, 'ding_id 空'];
        }

        $result = \LwlClientApi::post ($this->currentUrl.'scenegroup/member/add?access_token='.$token)
            ->json (['open_conversation_id' => $openConversationId, 'user_ids' => $userIds])
            ->run ()
            ->getData ();

        return match ($result['errcode']) {
            0 => [$result, '', ''],
            default => [null, null, $result['errmsg']],
        };
    }

    /**
     * @projectName ding_talk
     * @apiurl:https://open.dingtalk.com/document/orgapp/scene-group-delete#h2-6kr-ghh-par
     * @functionName membersDelete
     * @param string|null $openConversationId
     * @param string|array $userIds 钉id
     * @param string|null $token 令牌
     *
     * @createdBy 刘伟亮
     * @createDate 2024/1/13 14:15:32
     * @createVersion 1.0.0
     * @createDescription 删除成员
     *
     * @updatedBy
     * @updateDate 2024/1/13 14:15:32
     * @updateVersion
     * @updateDescription
     *
     * @return array|string[]
     *
     */
    public function membersDelete (?string $openConversationId = null, string|array $userIds = '', ?string $token = null): array
    {
        if (null === $openConversationId) {
            return [null, null, '场景群票据为空'];
        }

        $userIds = is_array ($userIds) ? implode (',', $userIds) : $userIds;

        if (empty($userIds)) {
            return [null, null, 'ding_id 空'];
        }

        $result = \LwlClientApi::post ($this->currentUrl.'scenegroup/member/delete?access_token='.$token)
            ->json (['open_conversation_id' => $openConversationId, 'user_ids' => $userIds])
            ->run ()
            ->getData ();

        return match ($result['errcode']) {
            0 => [$result, '', ''],
            default => [null, null, $result['errmsg']],
        };
    }

    /**
     * @projectName ding_talk
     * @apiurl:https://open.dingtalk.com/document/orgapp/send-group-helper-message#h2-xlb-v30-pcz
     * @functionName sendAssistantMessage
     * @param array|null $params
     * @param string|null $token
     *
     * @createdBy 刘伟亮
     * @createDate 2024/1/13 14:24:50
     * @createVersion 1.0.0
     * @createDescription 群主手发消息
     *
     * @updatedBy
     * @updateDate 2024/1/13 14:24:50
     * @updateVersion
     * @updateDescription
     *
     * @return array|string[]
     *
     */
    public function sendAssistantMessage (?array $params = null, ?string $token = null)
    {
        $result = \LwlClientApi::post ($this->sceneGroupUrl.'scencegroup/message/send_v2?access_token='.$token)
            ->json ($params)
            ->run ()
            ->getData ();

        return match ($result['errcode']) {
            0 => [$result, '', ''],
            default => [null, null, $result['errmsg']],
        };
    }
}
