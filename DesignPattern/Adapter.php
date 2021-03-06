<?php
/**
 * 适配器模式
 * 将一个类的接口转换成客户希望的另外一个接口
 * 例如 电源适配
 * 目的 : 兼容转换
 */
class Message1{
    public function send(){
        echo "阿里云发送短信！" . PHP_EOL;
    }
    public function push(){
        echo "阿里云发送推送！" . PHP_EOL;
    }
}

class JiguangSDKAdapter extends Message1{
    private $message;

    public function __construct($message){
        $this->message = $message;
    }

    public function send(){
        $this->message->send_out_msg();
    }
    public function push(){
        $this->message->push_msg();
    }
}

class JiguangMessage{
    public function send_out_msg(){
        echo "极光发送短信！" . PHP_EOL;
    }
    public function push_msg(){
        echo "极光发送推送！" . PHP_EOL;
    }
}
class BaiduYunSDKAdapter extends Message1{
    private $message;

    public function __construct($message){
        $this->message = $message;
    }

    public function send(){
        $this->message->transmission_msg();
    }
    public function push(){
        $this->message->transmission_push();
    }
}
class BaiduYunMessage{
    public function transmission_msg(){
        echo "百度云发送短信！" . PHP_EOL;
    }
    public function transmission_push(){
        echo "百度云发送推送！" . PHP_EOL;
    }
}

$jiguangMessage = new JiguangMessage();
$baiduYunMessage = new BaiduYunMessage();
$message = new Message1();

// 原来的老系统发短信，使用阿里云
$message->send();
$message->push();


// 部分模块用极光发吧
$jgAdatper = new JiguangSDKAdapter($jiguangMessage);
$jgAdatper->send();
$jgAdatper->push();

// 部分模块用百度云发吧
$bdAatper = new BaiduYunSDKAdapter($baiduYunMessage);
$bdAatper->send();
$bdAatper->push();