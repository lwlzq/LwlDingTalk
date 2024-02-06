<?php

namespace Liuweiliang\LwlDingTalk\HttpClient;

use GuzzleHttp\Client;
use AllowDynamicProperties;
use Liuweiliang\LwlDingTalk\Snowflake\Snowflake;
use GuzzleHttp\Exception\RequestException as GuzzleRequestException;

#[AllowDynamicProperties]
class LwlClientApi
{
    private Client $client;
    private array $options = [];
    private ?string $url = null;
    private ?string $method = null;
    private ?object $response = null;
    private LwlClientLog $log;
    private string $snowflakeId;

    public function __construct()
    {
        $this->log = new LwlClientLog();
        $this->options['headers'] = [];
        $this->snowflakeId = $this->snowflakeId();
        $this->options['headers']['snowflakeId'] = $this->snowflakeId;
        $this->client = new Client($this->options);
    }

    public function snowflakeId(): string
    {
        return Snowflake::getInstance(1, 1)->nextId();
    }

    public function log(): LwlClientLog
    {
        return $this->log;
    }

    public function getUrl(): string
    {
        return $this->url;
    }

    public function appendUrlParams(array $params = []): LwlClientApi
    {
        $this->url .= (strpos($this->url, '?') !== false) ? '&' : '?';
        $this->url .= http_build_query($params);
        return $this;
    }

    function validateOptions ()
    {
        $this->options = ['headers' => $this->options['headers'] ?? []];
    }

    public function query($query): LwlClientApi
    {
        $this->validateOptions();
        $this->options['query'] = $query;
        return $this;
    }

    public function json($data): LwlClientApi
    {
        $this->validateOptions();
        $this->options['json'] = $data;
        return $this;
    }

    public function formParams($data): LwlClientApi
    {
        $this->validateOptions();
        $this->options['form_params'] = $data;
        return $this;
    }

    public function multipart($data): LwlClientApi
    {
        $this->options['multipart'] = $data;
        return $this;
    }

    public function appendHeaders(?array $extendHeader = []): self
    {
        $this->options['headers'] = array_merge($extendHeader, $this->options['headers']);
        return $this;
    }

    public function run()
    {
        try {
            $this->logStart($this->url, $this->method, $this->options);
            $response = $this->client->request($this->method, $this->url, $this->options);
            $this->response = new LwlClientApiResponse($response);
            $this->logEnd($this->url, $this->method, $this->options);
        } catch (GuzzleRequestException $exception) {
            throw new LwlClientApiRequestException($exception, $this);
        }
        return $this->response;
    }

    public function get(string $uri): LwlClientApi
    {
        $this->method = 'GET';
        $this->url = $uri;
        return $this;
    }

    public function post(string $uri): LwlClientApi
    {
        $this->method = 'POST';
        $this->url = $uri;
        return $this;
    }

    public function put(string $uri): LwlClientApi
    {
        $this->method = 'PUT';
        $this->url = $uri;
        return $this;
    }

    public function patch(string $uri): LwlClientApi
    {
        $this->method = 'PATCH';
        $this->url = $uri;
        return $this;
    }

    public function delete(string $uri): LwlClientApi
    {
        $this->method = 'DELETE';
        $this->url = $uri;
        return $this;
    }

    protected function logStart(string $url, string $method, array $options)
    {
        $this->startTime = microtime(true);
        $this->log()->debug('---------------new request-------------------');
        $this->log()->debug("url: {$this->url}");
        $this->log()->debug("Method: {$this->method},  请求地址 {$this->url}");
        $this->log()->debug('数据 ', $this->options);
    }

    protected function logEnd(?string $url = null, string $method = '', ?array $options = null)
    {
        $this->log()->debug('---------------new response-------------------');
        $this->log()->debug('数据 ', $this->options);
        $this->log()->debug('数据 ', [$this->response->getHeadersData()]);
        $this->log()->debug('数据 ', [$this->response->getJson()]);
        $endTime = microtime(true);
        $runTime = ceil(($endTime - $this->startTime) * 1000);
        $this->log()->debug("--{$this->url}---------------------");
        $this->log()->debug("Method: {$this->method},  请求地址 {$this->url}");
        $this->log()->debug("--执行时间:{$runTime} ms---------------");
        $this->log()->debug("----------------请求结束--------------------");
        $this->log()->debug('');
        $this->log()->debug('');
    }
}