<?php
echo PHP_EOL;
$var_1 = strtoupper('doggy');
$var_2 = strtoupper('Dog');
similar_text($var_1, $var_2, $percent);
echo $percent.PHP_EOL;
$var_1 = 'shake';
$var_2 = 'Sha';
similar_text($var_1, $var_2, $percent);
echo $percent.PHP_EOL;
$var_1 = 'DO THE';
$var_2 = 'HARLEM SHAKE';
similar_text($var_1, $var_2, $percent);
echo $percent.' %'.PHP_EOL;
similar_text($var_2, $var_1, $percent);
echo $percent.' %'.PHP_EOL.PHP_EOL;
