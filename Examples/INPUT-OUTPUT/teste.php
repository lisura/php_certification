<?php
$file = fopen("exemplo.txt","rb");
fgets($file);
echo readfile('exemplo.txt');
fclose($file);
