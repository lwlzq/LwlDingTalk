<?php

namespace Liuweiliang\LwlDingTalk\HttpClient;

use GuzzleHttp\Exception\ClientException;
use GuzzleHttp\Exception\RequestException;
use GuzzleHttp\Exception\ServerException;
use GuzzleHttp\Exception\TransferException;
use GuzzleHttp\Psr7\Response;
use Illuminate\Auth\Access\AuthorizationException;
use Symfony\Component\HttpKernel\Exception\HttpException;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

class LwlClientApiResponse extends Response
{
    private Response $response;
    private string $contents;

    public function __construct(Response $response)
    {
        $this->response = $response;
        $this->contents = $response->getBody()?->getContents();
        parent::__construct($response->getStatusCode(), $response->getHeaders(), $response->getBody());
    }

    public function getContents(): string
    {
        return $this->contents;
    }

    public function getResponse(): Response
    {
        return $this->response;
    }

    public function getHeadersData(): array
    {
        return $this->response->getHeaders();
    }

    public function getJson(): mixed
    {
        return json_decode($this->contents, true);
    }

    public function getData(): mixed
    {
        try {
            $data = $this->getJson();
        } catch (ClientException $exception) {
            error_log($exception->getMessage());
            $code = $exception instanceof HttpException ? $exception->getCode() : 500;
            throw match($code) {
                403 => new AuthorizationException($exception->getMessage()),
                404 => new NotFoundHttpException($exception->getMessage(), $exception),
                default => new HttpException($code, $exception->getMessage(), $exception),
            };
        } catch (ServerException $exception) {
            // 5xx
            throw new HttpException(502, '内部服务错误');
        } catch (RequestException $exception) {
            // 发送网络错误(连接超时、DNS错误等)
            throw new HttpException(504, '内部网络错误');
        } catch (TransferException $exception) {
            // 其余异常
            throw new HttpException(500, '内部未知错误');
        }
        return $data;
    }
}