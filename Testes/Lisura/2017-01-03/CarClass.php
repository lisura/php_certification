<?php
class Car{
  public function __toString(){
    echo 'My content ';
    return '';
  }
}

$oCar = new Car();
echo $oCar . PHP_EOL;
