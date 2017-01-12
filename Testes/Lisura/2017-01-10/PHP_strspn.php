<?php

$string = '123445 1213213abcdef 21313123';
$mask = '12345';
echo strspn($string, $mask) . PHP_EOL;

 ?>
a - 6
b - 12345
c - 123445
d - abcdef
e - Fatal Error
