<?php
/* Exercício 3 */
echo '<pre>';

$hoje = new DateTime();
echo $hoje->setDate(1990,12,25)->format('d/m/Y').'<br/>';
echo 'Hoje: '.$hoje->format('d/m/Y') . '<br/>'; //25/12/1990

$hoje2 = new DateTimeImmutable();
echo $hoje2->setDate(1990,12,25)->format('d/m/Y').'<br/>';
echo 'Hoje2: '.$hoje2->format('d/m/Y') . '<br/><br/>'; //07/07/2016

$hoje = new DateTime();
// $hoje = new DateTime("now");
$hoje = new DateTimeImmutable("now");
echo 'Hoje: '.$hoje->format('d/m/Y') . '<br/>';

$ontem = $hoje->sub(new DateInterval('PT24H'));
echo 'Ontem: '.$ontem->format('d/m/Y') . '<br/>';

$ano_passado = $hoje->sub(new DateInterval('P1Y'));
echo 'Ano passado: '.$ano_passado->format('d/m/Y') . '<br/>';

$semana_passada = $hoje->modify('-7 days');
echo 'Semana passada: '.$semana_passada->format('d/m/Y') . '<br/>';

$semana_passada2 = $hoje->modify('-1 week');
echo 'Semana passada 2: '.$semana_passada2->format('d/m/Y') . '<br/>';

$semana_que_vem = $hoje->modify('+7 days');
echo 'Semana que vem: '.$semana_que_vem->format('d/m/Y') . '<br/>';

echo 'Hoje: '.$hoje->format('d/m/Y') . '<br/>';