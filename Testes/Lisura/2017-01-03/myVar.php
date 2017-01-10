<?php
$a = 1;
$b = 2;

switch (true) {
  case ($a > $b):
    echo '$a > $b';
    break;
  case ($b > $a):
    echo '$b > $a';
    break;
  case ($b == $a):
      echo '$b == $a';
      break;
}

 ?>
