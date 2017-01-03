<?php

class A{

  static $propriedade = "Sou uma propriedade" . PHP_EOL;

  public static function test(){
    echo 'ok' . PHP_EOL;
  }

  public function test2(){
    echo 'Joia' . PHP_EOL;
  }


}
(new A())->test();
$ab = new A();
$ab->test();
echo $ab->propriedade;

A::test2();
echo A::$propriedade;
