<?php
/**
 * 工厂模式
 * 不同情况下创建不同的实例
 * 目的 : 封装创建细节
 */

/***********简单工厂***********/
class Factory
{
    public static function createProduct(string $type) : Product
    {
        $product = null;
        switch ($type) {
            case 'A':
                $product = new ProductA();
                break;
            case 'B':
                $product = new ProductB();
                break;
        }
        return $product;
    }
}
interface Product
{
    public function show();
}

class ProductA implements Product
{
    public function show()
    {
        echo 'Show ProductA'.PHP_EOL;
    }
}

class ProductB implements Product
{
    public function show()
    {
        echo 'Show ProductB'.PHP_EOL;
    }
}
$productA = Factory::createProduct('A');
$productB = Factory::createProduct('B');
$productA->show();
$productB->show();
