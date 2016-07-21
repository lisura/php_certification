<?php
$array = array('1212.1212', 'Nunca diga o que sente para alguém de fora da família. ', '987.987', 'Mulheres e crianças podem ser descuidadas, homens não.');
$fl_array = preg_grep("/^(\d+)?\.\d+$/", $array);
print_r($fl_array);
