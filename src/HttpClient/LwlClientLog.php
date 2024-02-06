<?php

namespace Liuweiliang\LwlDingTalk\HttpClient;

use Monolog\Handler\StreamHandler;
use Monolog\Logger;

/**
 * Class LwlClientLog
 *
 * 专属钉请求服务日志处理类
 * @projectName
 * @className LwlClientLog
 * @createdBy 刘伟亮
 * @createDate 2024/1/11
 * @createVersion 1.0.0
 * @createDescription
 */
class LwlClientLog extends Logger
{
    /**
     * @var null
     */
    public $log;

    /**
     * LwlClientLog constructor.
     */
    public function __construct()
    {
        parent::__construct("ding_talk_client");
        $this->pushHandler(new StreamHandler(storage_path('logs/ding_talk_client.log')));
    }
}
