<?php

$b = 'Olá Mundo';

function obter (){

	global $b;

	$a = '!!!!';
	
	return include 'variaveis_escopo_include.php';

}

$c = obter();
echo $c . PHP_EOL;