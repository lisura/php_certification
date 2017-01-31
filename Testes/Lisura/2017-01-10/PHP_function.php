<?php
function a($number){
  return (b($number) * $number);
}
function b(&$number){
  ++$number;
  // not retorned nothing
}
echo a(5);
echo null * 6;
echo PHP_EOL;
// => 0
 ?>
