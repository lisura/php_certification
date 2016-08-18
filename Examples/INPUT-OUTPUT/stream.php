<?php
$h = fopen('exemplo.txt', 'r');
    stream_filter_append($h, 'string.toupper');
    fpassthru($h);
    fclose($h);
