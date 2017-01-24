<?php
// Quais abaixo são TRUE
var_dump('' == false);
var_dump("00" == false);
var_dump("0" == false);
var_dump(" " == false);
var_dump(-1 == false);
var_dump("false" == true);

echo '---' . PHP_EOL;

var_dump('' === false);
var_dump("00" === false);
var_dump("0" === false);
var_dump(" " === false);
var_dump("false" === true);
