<?php
/***********工厂模式***********/
// 商品接口
interface Product{
    function show() : void;
}

// 商品实现类A
class ConcreteProductA implements Product{
    public function show() : void{
        echo "I'm A.\n";
    }
}
// 创建者抽象类
abstract class Creator{

    // 抽象工厂方法
    abstract protected function FactoryMethod() : Product;

    // 操作方法
    public function AnOperation() : Product{
        return $this->FactoryMethod();
    }
}

// 创建者实现类A
class ConcreteCreatorA extends Creator{
    // 实现操作方法
    protected function FactoryMethod() : Product{
        return new ConcreteProductA();
    }
}