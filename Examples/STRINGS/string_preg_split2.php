<?php
$str = 'não pode recusar';
$chars = preg_split('//', $str, -1, PREG_SPLIT_NO_EMPTY);
print_r($chars);
$search_expression = "Deixe que seus \"amigos subestimem\" suas qualidades e que seus 'inimigos superestimem' seus defeitos.";
$words = preg_split("/[\s,]*\\\"([^\\\"]+)\\\"[\s,]*|" . "[\s,]*'([^']+)'[\s,]*|" . "[\s,]+/", $search_expression, 0, PREG_SPLIT_NO_EMPTY | PREG_SPLIT_DELIM_CAPTURE);
print_r($words);
$str = 'Eu vou fazer-lhe uma oferta que você não pode recusar.';
$chars = preg_split('/ /', $str, -1, PREG_SPLIT_OFFSET_CAPTURE);
print_r($chars);
