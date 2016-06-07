<?php

// Isto funciona para qualquer expressão, não apenas para funções:
$value = @$cache[$key];

echo $php_errormsg . PHP_EOL;

/* Erro de arquivo intencional */
$my_file = @file ('arquivo_nao_existente') or die ("Falha abrindo arquivo: '$php_errormsg'" . PHP_EOL);


echo  PHP_EOL;