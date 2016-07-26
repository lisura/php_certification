<?php

$array = array(0 , 'A', 'B', 'C');
reset($array);

while ($a = next($array)) {
    echo $a . "|" .PHP_EOL;
}