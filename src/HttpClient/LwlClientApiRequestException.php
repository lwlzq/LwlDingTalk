<?php

namespace Liuweiliang\LwlDingTalk\HttpClient;

use GuzzleHttp\Exception\ConnectException;
use GuzzleHttp\Exception\RequestException as GuzzleRequestException;

/**
 * @projectName co-jz-api-feat
 * @className LwlClientApiRequestException
 *
 * @createdBy 刘伟亮
 * @createDate 2024/1/11 18:53:33
 * @createVersion
 * @createDescription
 */
class LwlClientApiRequestException extends GuzzleRequestException
{

    public mixed $body = null;

    public function __construct(GuzzleRequestException|null $exception, LwlClientApi $clientApi)
    {
        $url = $clientApi->getUrl();

        $disuse = match(true) {
            $exception === null => "未定义 LwlApiClientApi 协议" . $url,
            $exception instanceof ConnectException => "LwlApiClientApi 无法连接: " . $url,
            $exception instanceof GuzzleRequestException && $exception->getCode() == 0 => "LwlApiClientApi cURL 错误 url 格式不正确: " . $url,
            default => $exception->getMessage(),
        };
        parent::__construct($exception->getMessage(), $exception->getRequest(), $exception->getResponse(), $exception);
    }

    /**
     * @projectName LwlDingTalk
     * @functionName getData
     *
     * @createdBy 刘伟亮
     * @createDate 2024/2/5 16:31:57
     * @createVersion
     * @createDescription
     *
     * @updatedBy
     * @updateDate 2024/2/5 16:31:57
     * @updateVersion
     * @updateDescription
     *
     * @return mixed
     *
     * @throws \JsonException
     */
    public function getData(): mixed
    {
        if (!$this->hasResponse()) {
            return null;
        }
        $content = $this->getResponse()?->getBody()->__toString();
        return json_decode($content, true, 512, JSON_THROW_ON_ERROR);
    }
}
