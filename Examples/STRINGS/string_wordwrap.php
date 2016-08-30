<?php
$text = "Just Do The Fucking Harlem Shake";
$newtext = wordwrap($text, 10, "<br />\n");
echo $newtext . PHP_EOL;
