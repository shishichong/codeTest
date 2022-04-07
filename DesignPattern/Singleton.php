<?php

/**
 * 单例模式
 * 静态类 公共方法调用
 * 目的 : 保证独一无二
 */
class Singleton
{
    private static $uniqueInstance;
    private $singletonData = '单例类内部数据';

    private function __construct()
    {
        // 构造方法私有化，外部不能直接实例化这个类
    }

    public static function GetInstance()
    {
        if (self::$uniqueInstance == null) {
            self::$uniqueInstance = new Singleton();
        }
        return self::$uniqueInstance;
    }

    public function SingletonOperation(){
        $this->singletonData = '修改单例类内部数据';
    }

    public function GetSigletonData()
    {
        return $this->singletonData;
    }

}

$singletonA = Singleton::GetInstance();
echo $singletonA->GetSigletonData(), PHP_EOL;

$singletonB = Singleton::GetInstance();

if ($singletonA === $singletonB) {
    echo '相同的对象', PHP_EOL;
}
$singletonA->SingletonOperation(); // 这里修改的是A
echo $singletonB->GetSigletonData(), PHP_EOL;

