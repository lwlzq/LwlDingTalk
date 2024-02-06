<?php
declare(strict_types = 1);

namespace Liuweiliang\LwlDingTalk\CompanyInner\InteractiveCard\Notice;

/**
 * @projectName ding_talk
 * @interfaceName DingTalkWorkNoticeInterface
 *
 * @createdBy 刘伟亮
 * @createDate 2024/1/13 07:41:50
 * @createVersion 1.0.0
 * @createDescription 工作通知抽象类
 */
interface DingTalkWorkNoticeInterface
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
