<?php
// $ php string_sintaxe_nowdoc.php
$codigo_php = <<<'EOF'
/**
 * Somente imprime algo que eu mandei
 */
function print_something($something) {
    echo $something;
}
print_something('Do the Harlem Shake');
EOF;
eval($codigo_php);
echo PHP_EOL;
