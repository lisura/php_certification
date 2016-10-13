<?php
session_name('FHCSESSIONID');

session_start();

echo '<pre>';
var_dump(session_module_name());
echo PHP_EOL;

var_dump(session_name());
echo PHP_EOL;

session_destroy();
?>
