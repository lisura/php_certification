<?php
$file = "exemplo.txt";

$finfo = finfo_open();

$fileinfo = finfo_file($finfo, $file, FILEINFO_MIME);

var_dump($fileinfo);

finfo_close($finfo);
