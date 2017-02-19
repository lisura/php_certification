<?php

function operacao(&$x){
    return $x + 1;
}
$a = 1;

echo operacao($a);
echo operacao($a);
echo PHP_EOL;
