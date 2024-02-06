<?php
declare(strict_types = 1);

namespace Liuweiliang\LwlDingTalk\Basic;
/**
 * @projectName LwlDingTalk
 * @className AbstractBasic
 *
 * @createdBy 刘伟亮
 * @createDate 2024/2/5 15:43:09
 * @createVersion 1.0.0
 * @createDescription 抽象基础类
 */
abstract class AbstractBasic
{
    /**
     * @var string
     */
    public string $baseUrl = '';
    public function __construct (){}

    /**
     * @projectName LwlDingTalk
     * @functionName getBaseUrl
     *
     * @createdBy 刘伟亮
     * @createDate 2024/2/5 15:44:59
     * @createVersion 1.0.0
     * @createDescription
     *
     * @updatedBy
     * @updateDate 2024/2/5 15:44:59
     * @updateVersion
     * @updateDescription
     *
     * @return void
     *
     */
    public function getBaseUrl():void
    {
        $this->baseUrl = 'https://oapi.dingtalk.com/';
    }
}
