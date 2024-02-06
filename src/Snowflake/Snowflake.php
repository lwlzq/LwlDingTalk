<?php
declare(strict_types = 1);

namespace Liuweiliang\LwlDingTalk\Snowflake;

/**
 * @projectName LwlDingTalk
 * @className Snowflake
 *
 * @createdBy 刘伟亮
 * @createDate 2024/2/5 17:00:40
 * @createVersion 1.0.0
 * @createDescription 雪花Id
 */
class Snowflake
{
    private static $instance = null; // 单例模式实例

    private int $datacenterId; // 数据中心ID
    private int $workerId; // 工作机器ID
    private int $sequence = 0; // 序列号
    private int $lastTimestamp = -1; // 上次生成ID的时间戳
    private const EPOCH = 1577836800000; // 起始时间戳
    private const DATACENTER_ID_BITS = 5; // 数据中心ID所占的位数
    private const WORKER_ID_BITS = 5; // 工作机器ID所占的位数
    private const SEQUENCE_BITS = 12; // 序列号所占的位数

    //----------------------------------------------------------------
    // 最大数据中心 ID
    private const MAX_DATACENTER_ID = -1 ^ (-1 << self::DATACENTER_ID_BITS);
    // 最大工作机器 ID
    private const MAX_WORKER_ID = -1 ^ (-1 << self::WORKER_ID_BITS);

    // 工作机器 ID偏移量
    private const WORKER_ID_SHIFT = self::SEQUENCE_BITS;

    // 数据中心 ID偏移量
    private const DATACENTER_ID_SHIFT = self::SEQUENCE_BITS + self::WORKER_ID_BITS;

    // 时间戳偏移量
    private const TIMESTAMP_LEFT_SHIFT = self::DATACENTER_ID_SHIFT + self::DATACENTER_ID_BITS;

    /**
     * @param int $datacenterId 数据中心ID
     * @param int $workerId 工作机器ID
     */
    private function __construct (int $datacenterId, int $workerId)
    {
        if ($datacenterId > self::MAX_DATACENTER_ID || $datacenterId < 0) {
            throw new \InvalidArgumentException('数据中心ID不能大于 MAX_DATACENTER_ID 或小于 0');
        }
        if ($workerId > self::MAX_WORKER_ID || $workerId < 0) {
            throw new \InvalidArgumentException('工作机器ID不能大于 MAX_WORKER_ID 或小于 0');
        }
        $this->datacenterId = $datacenterId;
        $this->workerId = $workerId;
    }

    /**
     * @projectName Idc-basic-pureness-api
     * @functionName getInstance
     * @param int $datacenterId
     * @param int $workerId
     *
     * @createdBy 刘伟亮
     * @createDate 2024/1/10 22:17:16
     * @createVersion 1.0.0
     * @createDescription 单例模式获取实例
     *
     * @updatedBy
     * @updateDate 2024/1/10 22:17:16
     * @updateVersion
     * @updateDescription
     *
     * @return self
     *
     */
    public static function getInstance (int $datacenterId, int $workerId): self
    {
        if (self::$instance === null) {
            self::$instance = new self($datacenterId, $workerId);
        }
        return self::$instance;
    }

    /**
     * @projectName Idc-basic-pureness-api
     * @functionName nextId
     *
     * @createdBy 刘伟亮
     * @createDate 2024/1/10 22:15:52
     * @createVersion 1.0.0
     * @createDescription 生成下一个ID的方法
     *
     * @updatedBy
     * @updateDate 2024/1/10 22:15:52
     * @updateVersion
     * @updateDescription
     *
     * @return int
     *
     * @throws \Exception
     */
    public function nextId (): int
    {
        $timestamp = $this->timeGen();

        if ($timestamp <= $this->lastTimestamp) {
            throw new \Exception("时钟回拨，无法生成ID ".($this->lastTimestamp - $timestamp)." 毫秒");
        }

        if ($this->lastTimestamp === $timestamp) {
            $this->sequence = ($this->sequence + 1) & ((1 << self::SEQUENCE_BITS) - 1);
            if ($this->sequence === 0) {
                $timestamp = $this->tilNextMillis($this->lastTimestamp);
            }
        } else {
            $this->sequence = 0;
        }

        $this->lastTimestamp = $timestamp;

        return (($timestamp - self::EPOCH) << self::TIMESTAMP_LEFT_SHIFT)
            | ($this->datacenterId << self::DATACENTER_ID_SHIFT)
            | ($this->workerId << self::WORKER_ID_SHIFT)
            | $this->sequence;
    }

    /**
     * @projectName Idc-basic-pureness-api
     * @functionName tilNextMillis
     * @param int $lastTimestamp
     *
     * @createdBy 刘伟亮
     * @createDate 2024/1/10 23:05:36
     * @createVersion 1.0.0
     * @createDescription 阻塞到下一个毫秒
     *
     * @updatedBy
     * @updateDate 2024/1/10 23:05:36
     * @updateVersion
     * @updateDescription
     *
     * @return int
     *
     * @throws \Random\RandomException
     */
    private function tilNextMillis (int $lastTimestamp): int
    {
        $timestamp = $this->timeGen();
        while ($timestamp <= $lastTimestamp) {
            $timestamp = $this->timeGen();
        }
        return $timestamp;
    }

    /**
     * @projectName Idc-basic-pureness-api
     * @functionName timeGen
     *
     * @createdBy 刘伟亮
     * @createDate 2024/1/10 23:03:56
     * @createVersion
     * @createDescription
     *
     * @updatedBy
     * @updateDate 2024/1/10 23:03:56
     * @updateVersion
     * @updateDescription
     *
     * @return int
     *
     * @throws \Random\RandomException
     */
    private function timeGen (): int
    {
        return (int)round(microtime(true) * 1000) + random_int(404, 10000);
    }
}
