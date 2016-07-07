<?php
//=> $ php string_as_array.php
$a = "String array test";
var_dump($a);
// Return string(17) "String array test"
var_dump($a[0]);
// Return string(1) "S"
var_dump((array) $a);
// Return array(1) { [0]=> string(17) "String array test"}
var_dump((array) $a[0]);
// Return string(17) "S"
