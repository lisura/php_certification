<?php
$pattern = "#\w*(?![0-9]{1})(\w+)#";
$string = "PHP5 released PHP6 not released";

preg_match_all($pattern, $string, $matches);
print_r($matches);


// An array containing PHP5
