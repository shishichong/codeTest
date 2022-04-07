<?php
/**
 * 外观模式
 * 主要是定义了一个高层接口。它包含了对各个子系统的引用，客户端可以通过它访问各个子系统的功能
 * 目的 ： 统一访问入口
 */
class Send
{
    private $aliYunService;
    private $jiGuangService;

    private $message;
    private $push;

    //有4个子系统
    public function __construct()
    {
        $this->aliYunService = new AliYunService();
        $this->jiGuangService = new JiGuangService();

        $this->message = new MessageInfo();
        $this->push = new PushInfo();
    }

    //阿里云权限
    public function PushAndSendAliYun()
    {
        $this->message->Send($this->aliYunService);
        $this->push->Push($this->aliYunService);
    }

    //极光权限
    public function PushAndSendJiGuang()
    {
        $this->message->Send($this->jiGuangService);
        $this->push->Push($this->jiGuangService);
    }
}

class MessageInfo
{
    public function Send($service)
    {
        $service->Send();
    }
}

class PushInfo
{
    public function Push($service)
    {
        $service->Push();
    }
}

class AliYunService
{
    public function Send()
    {
        echo '发送阿里云短信！', PHP_EOL;
    }
    public function Push()
    {
        echo '推送阿里云通知！', PHP_EOL;
    }
}

class JiGuangService
{
    public function Send()
    {
        echo '发送极光短信！', PHP_EOL;
    }
    public function Push()
    {
        echo '推送极光通知！', PHP_EOL;
    }
}

$send = new Send();
$send->PushAndSendAliYun();
$send->PushAndSendJiGuang();