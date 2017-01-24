<?php
function magic ($p, $q){
    return ($q == 0) ? $p : magic($q, $p % $q);
}
echo magic(10, 4);
echo PHP_EOL;
/*
=> a) Determines if thet are both even or odd
=> b) Determines the gratest commom divisor between them
*/
