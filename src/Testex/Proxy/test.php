<?php
require __DIR__."/../../../vendor/autoload.php";

use Csw\Codetest\Testex\Proxy\ProxyHouse;


$house = new ProxyHouse();
$house->sell();


$house->setProxy('代理人B');
$house->introduce();