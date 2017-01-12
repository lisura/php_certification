<?php
class Test{
  protected $count = 0;

  function construct (){
    echo '|';
    echo $this->count;
  }
  function test(){
    echo '-';
    echo $this->count++;
  }
  function show(){
    echo '_';
    echo $this->count;
  }
}
$testObj = new Test();
$testObj->test();
$testObj->show();
echo PHP_EOL;
 ?>
