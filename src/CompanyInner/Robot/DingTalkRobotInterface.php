<?php
declare(strict_types = 1);

namespace Liuweiliang\LwlDingTalk\CompanyInner\InteractiveCard\Robot;

/**
 * @projectName ding_talk
 * @interfaceName DingTalkRobotInterface
 *
 * @createdBy 刘伟亮
 * @createDate 2024/1/13 07:41:50
 * @createVersion 1.0.0
 * @createDescription 机器人
 */
interface DingTalkRobotInterface
{
    /**
     * @projectName ding_talk
     * @functionName send
     * @param array|null $params
     * @param string|null $token
     *
     * @createdBy 刘伟亮
     * @createDate 2024/1/15 09:31:36
     * @createVersion
     * @createDescription
     *
     * @updatedBy
     * @updateDate 2024/1/15 09:31:36
     * @updateVersion
     * @updateDescription
     *
     * @return array|null
     *
     */
    public function send (?array $params = null,?string $token = null): ?array;



}
