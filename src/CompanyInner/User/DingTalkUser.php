<?php
declare(strict_types = 1);

namespace Liuweiliang\LwlDingTalk\CompanyInner\User;

use Liuweiliang\LwlDingTalk\Basic\AbstractBasic;

#[AllowDynamicProperties]
class DingTalkUser extends AbstractBasic implements DingTalkUserInterface
{
    protected string $currentUrl = '';
    public function __construct ()
    {
        parent::__construct ();
        $this->currentUrl = $this->baseUrl.'topapi/v2/user/';
    }


    /**
     * @projectName ding_talk
     * @apiurl:https://open.dingtalk.com/document/orgapp/user-information-creation#h2-ygj-edd-8xo
     * @functionName create
     * @param array|null $params 参数
     * $params =  [
         * 'name' => '古珀码农',
         * 'mobile' => '17131435657',
         * "dept_id_list"=>"819026132"
     * ]
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
        $result = \LwlClientApi::post ($this->currentUrl.'create?access_token='.$token)
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
     * @functionName delete
     * @param array|null $params 参数
     * @param string|null $token 令牌
     *
     * @createdBy 刘伟亮
     * @createDate 2024/1/13 21:42:32
     * @createVersion 1.0.0
     * @createDescription 删除用户
     *
     * @updatedBy
     * @updateDate 2024/1/13 21:42:32
     * @updateVersion
     * @updateDescription
     *
     * @return array|null
     *
     */
    public function delete (?array $params = null, ?string $token = null): ?array
    {
        $result = \LwlClientApi::post ($this->currentUrl.'delete?access_token='.$token)
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
     * @functionName show
     * @param array|null $params
     * @param string|null $token
     *
     * @createdBy 刘伟亮
     * @createDate 2024/1/13 21:43:54
     * @createVersion 1.0.0
     * @createDescription 获取用户详情
     *
     * @updatedBy
     * @updateDate 2024/1/13 21:43:54
     * @updateVersion
     * @updateDescription
     *
     * @return array|null
     */
    public function show (?array $params = null, ?string $token = null): ?array
    {
        $result = \LwlClientApi::post ($this->currentUrl.'get?access_token='.$token)
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
     * @apiurl :https://open.dingtalk.com/document/isvapp/queries-the-complete-information-of-a-department-user#h2-40z-7de-raw
     * @functionName list
     * @param array|null $params
     * @param string|null $token
     *
     * @createdBy 刘伟亮
     * @createDate 2024/1/14 17:57:19
     * @createVersion 1.0.0
     * @createDescription 列表
     *
     * @updatedBy
     * @updateDate 2024/1/14 17:57:19
     * @updateVersion
     * @updateDescription
     *
     * @return array
     *
     */
    public function list (?array $params = null, ?string $token = null):array
    {
        $result = \LwlClientApi::post ($this->currentUrl.'list?access_token='.$token)
            ->json ($params)
            ->run ()
            ->getData ();
        return match ($result['errcode']) {
            0 => [$result, '', ''],
            default => [null, null, $result['errmsg']],
        };
    }
}
