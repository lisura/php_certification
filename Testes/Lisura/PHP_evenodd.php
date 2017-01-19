<?php

function magic ($p, $q){
    return ($q == 0) ? $p : magic($q, $p % $q);
}

echo magic(10, 5);

echo PHP_EOL;


/*
=> Determines if thet are both even or odd
=> Determines the gratest commom divisor between them  
*/
