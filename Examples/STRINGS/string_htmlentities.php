<?php
$str = "A 'quote' is <b>bold</b>";
echo htmlentities($str) . PHP_EOL;
echo htmlentities($str, ENT_QUOTES) . PHP_EOL;
