<?php
$a = 'myVar';

var_dump('myVar' == 0);

switch ($a) {
  case 0:
    echo 'case 0';
  case 'myVar':
    echo 'case myVar';
  case 'nothing':
    echo 'case nothing';
}

 ?>
