<?php
declare(strict_types = 1);

namespace Liuweiliang\LwlDingTalk\CompanyInner\User;

/**
 * @projectName ding_talk
 * @interfaceName DingTalkSceneGroupInterface
 *
 * @createdBy 刘伟亮
 * @createDate 2024/1/13 07:41:50
 * @createVersion 1.0.0
 * @createDescription 场景群
 */
interface DingTalkUserInterface
{

    /**
     * @projectName ding_talk
     * @functionName create
     * @param array|null $params
     * @param string|null $token
     *
     * @createdBy 刘伟亮
     * @createDate 2024/1/14 17:59:31
     * @createVersion
     * @createDescription
     *
     * @updatedBy
     * @updateDate 2024/1/14 17:59:31
     * @updateVersion
     * @updateDescription
     *
     * @return array|null
     *
     */
    public function create (?array $params = null, ?string $token = null): ?array;

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
    public function delete (?array $params = null, ?string $token = null): ?array;

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
    public function show (?array $params = null, ?string $token = null): ?array;

    /**
     * @projectName ding_talk
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
    public function list (?array $params = null, ?string $token = null):array;
}
