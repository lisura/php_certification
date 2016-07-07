<?php
/* Exercício 4 */
echo '<pre>';

$datetime1 = new DateTime('2016-07-07');
$datetime2 = new DateTime('2015-11-12');
$interval = $datetime1->diff($datetime2);

var_dump($interval);

echo '<br><br>===TIMEZONE SET===<br>';
$timezone_date = new DateTime('now',new DateTimeZone('America/Sao_Paulo'));
echo $timezone_date->format('d/m/Y H:m:s').'<br/>';
echo $timezone_date->getTimeZone()->getName().'<br/>';
echo $timezone_date->getTimestamp().'<br/>';

echo '<br><br>===TIMEZONE PADRAO===<br>';
$timezone_padrao = new DateTime('now');
echo $timezone_padrao->format('d/m/Y H:m:s').'<br/>';
echo $timezone_padrao->getTimeZone()->getName().'<br/>';
echo $timezone_padrao->getTimestamp().'<br/>';

/*
America/New_York
America/Argentina/Buenos_Aires
Asia/Shanghai
Asia/Tokyo
Europe/Athens
Europe/Monaco
Africa/Porto-Novo
Africa/Cairo
Australia/Sydney
Australia/Melbourne
*/

echo '<br><br>===CREATE FROM FORMAT===<br>';
$date = DateTime::createFromFormat('d/m/Y', '07/07/2016');
echo $date->format('Y-m-d').'<br/>';
echo $date->getTimestamp().'<br/>';
