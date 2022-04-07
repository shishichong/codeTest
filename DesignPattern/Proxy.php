<?php
/**
 * 代理模式
 * 客户端与目标对象之间起到一个中介作用和保护目标对象的作用
 * 目的 ：增强职责
 */
interface SendMessage
{
    public function Send();
}

class RealSendMessage implements SendMessage
{
    public function Send()
    {
        echo '短信发送中...', PHP_EOL;
    }
}

class ProxySendMessage implements SendMessage
{
    private $realSendMessage;

    public function __construct($realSendMessage)
    {
        $this->realSendMessage = $realSendMessage;
    }

    public function Send()
    {
        echo '短信开始发送', PHP_EOL;
        $this->realSendMessage->Send();
        echo '短信结束发送', PHP_EOL;
    }
}

$sendMessage = new ProxySendMessage(new RealSendMessage());
$sendMessage->Send();