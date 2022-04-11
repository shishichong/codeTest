<?php
/**
 * 策略
 * 该模式定义了一系列算法，并将每个算法封装起来，使它们可以相互替换，且算法的变化不会影响使用算法的客户。
 * 策略模式属于对象行为模式，它通过对算法进行封装，把使用算法的责任和算法的实现分割开来，并委派给不同的对象对这些算法进行管理。
 * 目的 ：把选择权交给用户
 * 与工厂模式区别：工厂模式 根据对象创建，策略模式 行为的选择
 */
interface Message
{
    public function send();
}

class BaiduYunMessage implements Message
{
    function send()
    {
        echo '百度云发送信息！';
    }
}

class AliYunMessage implements Message
{
    public function send()
    {
        echo '阿里云发送信息！';
    }
}

class JiguangMessage implements Message
{
    public function send()
    {
        echo '极光发送信息！';
    }
}

class MessageContext
{
    private $message;
    public function __construct(Message $msg)
    {
        $this->message = $msg;
    }
    public function SendMessage()
    {
        $this->message->send();
    }
}

$bdMsg = new BaiduYunMessage();
$msgCtx = new MessageContext($bdMsg);
$msgCtx->SendMessage();

$alMsg = new AliYunMessage();
$msgCtx = new MessageContext($alMsg);
$msgCtx->SendMessage();

$jgMsg = new JiguangMessage();
$msgCtx = new MessageContext($jgMsg);
$msgCtx->SendMessage();