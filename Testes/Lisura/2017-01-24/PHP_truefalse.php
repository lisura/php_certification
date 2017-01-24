<?php

echo true ? 'a' : true ? 'b' : 'c';
echo PHP_EOL;

echo ((true ? 'a' : true) ? 'b' : 'c');
echo PHP_EOL;

echo ('a' ? 'b' : 'c');
echo PHP_EOL;
