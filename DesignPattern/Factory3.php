<?php
/***********抽象工厂模式***********/
// 商品A抽象接口
interface AbstractProductA
{
    public function show(): void;
}

// 商品A1实现
class ProductA1 implements AbstractProductA
{
    public function show(): void
    {
        echo 'ProductA1 is 苹果手机!' . PHP_EOL;
    }
}
// 商品A2实现
class ProductA2 implements AbstractProductA
{
    public function show(): void
    {
        echo 'ProductA2 is 安卓手机!' . PHP_EOL;
    }
}

// 商品B抽象接口
interface AbstractProductB
{
    public function show(): void;
}
// 商品B1实现
class ProductB1 implements AbstractProductB
{
    public function show(): void
    {
        echo 'ProductB1 is 苹果耳机!' . PHP_EOL;
    }
}
// 商品B2实现
class ProductB2 implements AbstractProductB
{
    public function show(): void
    {
        echo 'ProductB2 is 安卓耳机!' . PHP_EOL;
    }
}

// 抽象工厂接口
interface AbstractFactory
{
    // 创建商品A
    public function CreateProductA(): AbstractProductA;
    // 创建商品B
    public function CreateProductB(): AbstractProductB;
}

// 工厂1，实现商品A1和商品B1
class ConcreteFactory1 implements AbstractFactory
{
    public function CreateProductA(): AbstractProductA
    {
        return new ProductA1();
    }
    public function CreateProductB(): AbstractProductB
    {
        return new ProductB1();
    }
}

// 工厂2，实现商品A2和商品B2
class ConcreteFactory2 implements AbstractFactory
{
    public function CreateProductA(): AbstractProductA
    {
        return new ProductA2();
    }
    public function CreateProductB(): AbstractProductB
    {
        return new ProductB2();
    }
}

$a = new ConcreteFactory1();
$p1 = $a->CreateProductA();
$p2 = $a->CreateProductB();
echo '苹果工厂生产'.PHP_EOL;
$p1->show();
$p2->show();

$b = new ConcreteFactory2();
$p1 = $b->CreateProductA();
$p2 = $b->CreateProductB();
echo '安卓工厂生产'.PHP_EOL;
$p1->show();
$p2->show();
