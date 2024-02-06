<?php

namespace Liuweiliang\LwlDingTalk\HttpClient;

use Illuminate\Support\Facades\Facade;

/**
 * @projectName LwlDingTalk
 * @className LwlClientApiFacade
 *
 * @createdBy 刘伟亮
 * @createDate 2024/2/5 16:09:09
 * @createVersion 1.0.0
 * @createDescription 门面
 */
class LwlClientApiFacade extends Facade
{
    /**
     * @projectName ding_talk
     * @functionName getFacadeAccessor
     *
     * @createdBy 刘伟亮
     * @createDate 2024/1/11 23:04:27
     * @createVersion
     * @createDescription 门面
     *
     * @updatedBy
     * @updateDate 2024/1/11 23:04:27
     * @updateVersion
     * @updateDescription
     *
     * @return string
     *
     */
    protected static function getFacadeAccessor()
    {
        return LwlClientApi::class;
    }
}
