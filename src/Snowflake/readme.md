```php
类 Snowflake
单例实例 $instance = null

    数据中心ID $datacenterId
    工作机器ID $workerId
    序列号 $sequence = 0
    上次生成ID的时间戳 $lastTimestamp = -1

    起始时间戳 EPOCH = 1577836800000
    数据中心ID位数 DATACENTER_ID_BITS = 5
    工作机器ID位数 WORKER_ID_BITS = 5
    序列号位数 SEQUENCE_BITS = 12

    最大数据中心ID MAX_DATACENTER_ID = -1 ^ (-1 << DATACENTER_ID_BITS)
    最大工作机器ID MAX_WORKER_ID = -1 ^ (-1 << WORKER_ID_BITS)

    工作机器ID位移 WORKER_ID_SHIFT = SEQUENCE_BITS
    数据中心ID位移 DATACENTER_ID_SHIFT = SEQUENCE_BITS + WORKER_ID_BITS
    时间戳左位移 TIMESTAMP_LEFT_SHIFT = DATACENTER_ID_SHIFT + DATACENTER_ID_BITS

    构造函数(datacenterId, workerId)
        检查 datacenterId 和 workerId 是否合法
        赋值给 $datacenterId 和 $workerId

    获取单例实例 getInstance(datacenterId, workerId)
        如果 $instance 为空
            创建新实例
        返回 $instance

    生成下一个ID nextId()
        获取当前时间戳

        如果当前时间戳小于上次时间戳
            抛出时钟回拨异常

        如果当前时间戳等于上次时间戳
            增加序列号
            如果序列号溢出
                等待下一个毫秒
        否则
            重置序列号

        更新上次时间戳

        组合并返回ID
            时间戳部分左位移后与数据中心ID、工作机器ID和序列号进行位运算

    等待下一个毫秒 tilNextMillis(lastTimestamp)
        循环直到获取大于 lastTimestamp 的时间戳
        返回新时间戳

    生成时间戳 timeGen()
        返回当前时间的毫秒数

```

```php
使用案例：
    // 实例化 Snowflake 类
    $datacenterId = 1; // 例如：数据中心ID为1
    $workerId = 1; // 例如：工作机器ID为1
    $snowflake = Snowflake::getInstance($datacenterId, $workerId);
    
    // 生成唯一ID
    $uniqueId = $snowflake->nextId();
```
