<?php

/**
 * 原型模式
 * 用一个已经创建的实例作为原型，通过复制该原型对象来创建一个和原型相同或相似的新对象。
 * __construct()方法只会进行一次
 * 目的 : 高效创建对象
 */
abstract class Prototype
{
    public $v = 'clone' . PHP_EOL;

    public function __construct()
    {
        echo 'create' . PHP_EOL;
    }

    /**
     * 自带魔术方法 可以不写
     * @return mixed
     */
    abstract public function __clone();
}

class ConcretePrototype1 extends Prototype
{
    public function __clone()
    {
    }
}

class Client
{
    public function operation()
    {
        $p1 = new ConcretePrototype1();
        $p2 = clone $p1;

        echo $p1->v;
        echo $p2->v;
    }
}

$c = new Client();
$c->operation();