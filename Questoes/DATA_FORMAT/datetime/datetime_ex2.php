<?php
/* Exercício 2 */
echo '<pre>';

$intervalo = new DateInterval('P4M2DT5H4M');
var_dump($intervalo);

$date = new DateTime('2016-01-11');
$date->add(new DateInterval('P90D'));
echo 'Fugi da maldição da leva de janeiro em '.$date->format('d/m/Y') . '<br/>';

$hoje = new DateTime();
//$hoje = new DateTime("now");
//$hoje = new DateTimeImmutable("now");
echo 'Hoje: '.$hoje->format('d/m/Y') . '<br/>';

$amanha = $hoje->add(new DateInterval('P1D'));
echo 'Amanhã: '.$amanha->format('d/m/Y') . '<br/>';

$depois_de_amanha = $hoje->add(new DateInterval('PT48H'));
echo 'Depois de Amanhã: '.$depois_de_amanha->format('d/m/Y') . '<br/>';

$semana_que_vem = $hoje->add(new DateInterval('P1W'));
echo 'Semana que vem: '.$semana_que_vem->format('d/m/Y') . '<br/>';

$semana_que_vem2 = $hoje->add(new DateInterval('P7D'));
echo 'Semana que vem: '.$semana_que_vem2->format('d/m/Y') . '<br/>';

$deu_ruim = $hoje->add(new DateInterval('P1W4D'));
echo 'W com D: '.$deu_ruim->format('d/m/Y') . '<br/>';

echo 'Hoje: '.$hoje->format('d/m/Y') . '<br/>';