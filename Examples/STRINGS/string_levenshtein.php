<?php
$var_1 = 'DO THE HARLEM SHAKE';
$var_2 = 'IS THE HARLEM SHAKE';
echo levenshtein($var_1, $var_2).PHP_EOL;
$var_1 = 'DO THE HARLEM SHAKE';
$var_2 = 'IS THE HARLEM SHAKÊ';
echo levenshtein($var_1, $var_2).PHP_EOL;
$var_1 = 'DO THE HARLEM SHAKE';
$var_2 = 'IS THE HARLEM SHAK';
echo levenshtein($var_1, $var_2,5,6,7).PHP_EOL;
