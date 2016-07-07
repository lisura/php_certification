<?php
/* Exercício 3 */
echo '<pre>';

$date = new DateTime();
//$date->setDate(1990,12,25);
$date->sub(new DateInterval('P4D'));
echo 'Fui informado que consegui emprego na Finnet em '.$date->format('d/m/Y') . '<br/><br/>';

$hoje = new DateTime();
// $hoje = new DateTime("now");
// $hoje = new DateTimeImmutable("now");
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