<?php

$a = 1;

function inc(){
    global $a;
    $a++;
}

echo <<<'END'
The current value is: $a
END;
echo PHP_EOL;
