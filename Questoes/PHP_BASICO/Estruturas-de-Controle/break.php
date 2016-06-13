<?php

$numbers = array(1,2,3);
$letters = array("A","B","C");
foreach ($numbers as $num){
  foreach ($letters as $char){
    if ($char == "C") {
      break 2; // if this was break, o/p will be AB1AB2AB3
    }
    echo $char;
  }
  echo $num;
}
