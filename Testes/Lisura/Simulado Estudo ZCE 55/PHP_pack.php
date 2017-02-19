<?php

$data1 = pack('cccc', 0x01, 0x02, 0x03, 0x04);
$data2 = pack('cccc', 0x01, 0x02, 0x03, 0x04);

$cmp = strstr($data1, $data2);
echo utf8_encode($cmp);  
echo PHP_EOL;

echo strlen($cmp);
echo PHP_EOL;
