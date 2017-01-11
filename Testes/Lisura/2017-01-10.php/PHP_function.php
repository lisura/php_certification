<?php
function a($number){
  return (b($number) * $number);
}
function b(&$number){
  ++$number;
  // not retorned nothing
}
echo a(5);
echo null * 5;
echo PHP_EOL;
/*
wikivan 30
Fefe 25
Cobra 30
Lisura 36
*/
 ?>
