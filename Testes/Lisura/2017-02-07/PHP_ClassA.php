<?php
class A{
    final function a(){
        echo 1;
    }
}
class B extends A{
    public function a(){
        echo 2;
    }
}
$a = new B();
echo $a->a();
echo PHP_EOL;
// Cannot override final method A::a() 
