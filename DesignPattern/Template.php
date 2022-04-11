<?php
/**
 * 模板方法模式
 * 定义一个操作中的算法骨架，而将算法的一些步骤延迟到子类中
 * 使得子类可以不改变一个算法的结构即可重定义该算法的某些特定步骤
 * 目的 ：逻辑复用
 */
abstract class Cache
{
    public $config;
    public $conn;

    public function __construct()
    {
        $this->init();
    }
    public function init()
    {
        $this->GetConfig();
        $this->OpenConnection();
        $this->CheckConnection();
    }

    abstract public function GetConfig();
    abstract public function OpenConnection();
    abstract public function CheckConnection();
}

class MemcachedCache extends Cache
{
    public function GetConfig()
    {
        echo '获取Memcached配置文件！', PHP_EOL;
        $this->config = 'memcached';
    }
    public function OpenConnection()
    {
        echo '链接memcached!', PHP_EOL;
        $this->conn = 1;
    }
    public function CheckConnection()
    {
        if ($this->conn) {
            echo 'Memcached连接成功！', PHP_EOL;
        } else {
            echo 'Memcached连接失败，请检查配置项！', PHP_EOL;
        }
    }
}

class RedisCache extends Cache
{
    public function GetConfig()
    {
        echo '获取Redis配置文件！', PHP_EOL;
        $this->config = 'redis';
    }
    public function OpenConnection()
    {
        echo '链接redis!', PHP_EOL;
        $this->conn = 0;
    }
    public function CheckConnection()
    {
        if ($this->conn) {
            echo 'Redis连接成功！', PHP_EOL;
        } else {
            echo 'Redis连接失败，请检查配置项！', PHP_EOL;
        }
    }
}

$m = new MemcachedCache();

$r = new RedisCache();