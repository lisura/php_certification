<?php
/*
 * Aqui estão os exemplos.
 */

echo "\n--- MOVENDO BITS A DIREITA EM INTEIROS POSITIVOS ---\n";

$val = 4;
$places = 1;
$res = $val >> $places;
p($res, $val, '>>', $places, 'cópia do bit de sinal trocada para a esquerda');

$val = 4;
$places = 2;
$res = $val >> $places;
p($res, $val, '>>', $places);

$val = 4;
$places = 3;
$res = $val >> $places;
p($res, $val, '>>', $places, 'move os bits para fora da direita');

$val = 4;
$places = 4;
$res = $val >> $places;
p($res, $val, '>>', $places, 'mesmo resultado que acima; não se pode mover além do 0');


echo "\n--- MOVENDO BITS A DIREITA EM INTEIROS NEGATIVOS ---\n";

$val = -4;
$places = 1;
$res = $val >> $places;
p($res, $val, '>>', $places, 'cópia do bit de sinal trocada para a esquerda');

$val = -4;
$places = 2;
$res = $val >> $places;
p($res, $val, '>>', $places, 'move os bits para fora da direita');

$val = -4;
$places = 3;
$res = $val >> $places;
p($res, $val, '>>', $places, 'mesmo resultado que acima; não se pode mover além do -1');


echo "\n--- MOVENDO BITS A ESQUERDA EM INTEIROS POSITIVOS ---\n";

$val = 4;
$places = 1;
$res = $val << $places;
p($res, $val, '<<', $places, 'preenche com zeros o lado direito');

$val = 4;
$places = (PHP_INT_SIZE * 8) - 4;
$res = $val << $places;
p($res, $val, '<<', $places);

$val = 4;
$places = (PHP_INT_SIZE * 8) - 3;
$res = $val << $places;
p($res, $val, '<<', $places, 'bit de sinal movido para fora');

$val = 4;
$places = (PHP_INT_SIZE * 8) - 2;
$res = $val << $places;
p($res, $val, '<<', $places, 'bits movidos para fora da esquerda');


echo "\n--- MOVENDO BITS A ESQUERDA EM INTEIROS NEGATIVOS ---\n";

$val = -4;
$places = 1;
$res = $val << $places;
p($res, $val, '<<', $places, 'preenche com zeros o lado direito');

$val = -4;
$places = (PHP_INT_SIZE * 8) - 3;
$res = $val << $places;
p($res, $val, '<<', $places);

$val = -4;
$places = (PHP_INT_SIZE * 8) - 2;
$res = $val << $places;
p($res, $val, '<<', $places, 'bits movidos para fora pela esquerda, incluindo o bit de sinal');


/*
 * Ignore essa seção abaixo,
 * é apenas para formatar a saída e deixar mais clara a apresentação.
 */

function p($res, $val, $op, $places, $note = '') {
    $format = '%0' . (PHP_INT_SIZE * 8) . "b\n";

    printf("Expressão: %d = %d %s %d\n", $res, $val, $op, $places);

    echo " Decimal:\n";
    printf("  val=%d\n", $val);
    printf("  res=%d\n", $res);

    echo " Binário:\n";
    printf('  val=' . $format, $val);
    printf('  res=' . $format, $res);

    if ($note) {
        echo " NOTA: $note\n";
    }

    echo "\n";
}