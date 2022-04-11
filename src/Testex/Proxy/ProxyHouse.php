<?php

namespace Csw\Codetest\Testex\Proxy;
class ProxyHouse implements house
{

    protected $real;
    protected $proxy = '代理人A';

    public function __construct()
    {
        $this->real = new RealHouse();
    }

    public function setProxy($name)
    {
        $this->proxy = $name;
    }

    public function sell()
    {
        echo $this->proxy . '正在' . $this->real->sell();
    }

    public function introduce()
    {
        echo $this->proxy . '正在' . $this->real->introduce();
    }
}