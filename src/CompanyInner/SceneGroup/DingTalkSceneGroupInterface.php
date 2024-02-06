<?php
declare(strict_types = 1);

namespace Liuweiliang\LwlDingTalk\CompanyInner\SceneGroup;

/**
 * @projectName ding_talk
 * @interfaceName DingTalkSceneGroupInterface
 *
 * @createdBy 刘伟亮
 * @createDate 2024/1/13 07:41:50
 * @createVersion 1.0.0
 * @createDescription 场景群
 */
interface DingTalkSceneGroupInterface
{
    /**
     * @projectName ding_talk
     * @functionName create
     * @param array|null $params
     *
     * @createdBy 刘伟亮
     * @createDate 2024/1/13 13:42:57
     * @createVersion
     * @createDescription
     *
     * @updatedBy
     * @updateDate 2024/1/13 13:42:57
     * @updateVersion
     * @updateDescription
     *
     * @return array|null
     *
     */
    public function create (?array $params = null,?string $token = null): ?array;


    /**
     * @projectName ding_talk
     * @functionName update
     * @param array|null $params
     * @param string|null $token
     *
     * @createdBy 刘伟亮
     * @createDate 2024/1/13 13:43:45
     * @createVersion
     * @createDescription
     *
     * @updatedBy
     * @updateDate 2024/1/13 13:43:45
     * @updateVersion
     * @updateDescription
     *
     * @return array|null
     *
     */
    public function update (?array $params = null,?string $token = null): ?array;

}
