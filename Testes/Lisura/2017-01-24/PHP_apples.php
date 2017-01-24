<?php
function oranges(&$oranges = 17){
  $oranges .= 1;
}
$apples = 5;
oranges($apples);
echo $apples++;
echo PHP_EOL;
echo $apples++;
echo PHP_EOL;
 /*
a ) 16
b ) 51
c ) 15
d ) 6
e ) 5
*/
