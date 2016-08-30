<?php
$a = array('<Asterix>',"'Obelix'",'"Ideiafix"','&Chatotorix&', "\xc3\xa9");

echo "Normal: ",  json_encode($a), "<br/>";
echo "Tags: ",    json_encode($a, JSON_HEX_TAG), "<br/>";
echo "Apos: ",    json_encode($a, JSON_HEX_APOS), "<br/>";
echo "Quot: ",    json_encode($a, JSON_HEX_QUOT), "<br/>";
echo "Amp: ",     json_encode($a, JSON_HEX_AMP), "<br/>";
echo "Unicode: ", json_encode($a, JSON_UNESCAPED_UNICODE), "<br/>";
echo "All: ",     json_encode($a, JSON_HEX_TAG | JSON_HEX_APOS | JSON_HEX_QUOT | JSON_HEX_AMP | JSON_UNESCAPED_UNICODE), "<br/><br/>";

$b = array();

echo "Saída de um array vazio como array: ", json_encode($b), "<br/>";
echo "Saída de um array vazio como objeto: ", json_encode($b, JSON_FORCE_OBJECT), "<br/><br/>";

$c = array(array(1,2,3));

echo "Saída de um array não-associativo como array: ", json_encode($c), "<br/>";
echo "Saída de um array não-associativo como objeto: ", json_encode($c, JSON_FORCE_OBJECT), "<br/><br/>";

$d = array('Julio' => 'Cesar', 'Caius' => 'Bonus');

echo "Array associativo sempre tem saída como objeto: ", json_encode($d), "<br/>";
echo "Array associativo sempre tem saída como objeto: ", json_encode($d, JSON_FORCE_OBJECT), "<br/><br/>";