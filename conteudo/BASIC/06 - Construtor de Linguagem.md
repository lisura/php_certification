# Construtor de Linguagem

## Construtores de saída

* die() e exit()  
Construtores de linguagem equivalentes, encerram a execução do script. Não há nenhum diferença entre os dois.
Pode-se passar um parâmetro para ser impresso antes de se encerrar a execução.

Exemplos:

````php
//exit program normally
exit;
exit();
exit(0);

//exit with an error code
exit(1);
exit(0376); //octal
````

* echo()  
Utilizado para exibir uma ou mais strings.

echo não é uma função e não se comporta como uma função, então não é obrigatório usar parênteses. echo não retorna nenhum valor, sendo recomendado o uso para aplicações web.

echo também tem um sintaxe curta, onde você pode imediatamente abrir a tag com o sinal de igual. Esta sintaxe curta funciona habilitando a definição da configuração short_open_tag.

`I have <?=$foo?> foo.`

Exemplos: [LINK](https://github.com/lisura/php_certification/blob/master/Questoes/PHP_BASICO/Construtor-de-Linguagem/echo.php)

* return  
A declaração return retorna o controle do programa para o módulo que o chamou. A execução continuará na expressão seguinte à invocação do módulo.

Se chamada dentro de uma função, a declaração return terminará imediatamente sua execução, e retornará seus argumentos como valor à chamada da função. A declaração return também terminar a execução de uma declaração eval() ou um arquivo de script.

Se chamada no escopo global, a execução do script corrente é finalizada. Se o arquivo de script corrente for incluído ou requerido com as funções include ou or require, o controle é passado de volta ao script que está chamando. Além disso, se o script corrente foi incluído com a função include, o valor informado ao return será retornado como o valor da chamada de include.

> **Nota**: Se nenhum parâmentro for informado, e os parênteses omitidos, NULL será retornado. Chamar return com parênteses, mas sem argumentos resultará em um erro de interpretação.  
 Se utilizar return ($a); não se estará retornando uma variável, mas sim o resultado da expressão ($a) .  

* print  
Construtor utilizado para imprimir uma string na tela.

Diferente do echo, só aceita um único parâmetro:

````php
//funciona
echo 1,23,4,5,'ola';

//não funciona
print 1,23,4,5,'ola';
````

print, diferente do echo, sempre retorna um valor, sendo possível utilizá-lo em expressões:

````php
//funciona
$x = (5 + print 5); // 5
var_dump( $x ); // 6

//não funciona
$x = (5 + echo 5); // 5
var_dump( $x ); // 6
````

## Construtores de avaliação

* empty()  
Determina se uma variável é considerada vazia. Uma variável é considerada vazia se não existir ou seu valor é igual FALSE. A função empty() não gera um aviso se a variável não existir.

O que é visto abaixo é considerado vazio:

"" (uma string vazia)  
0 (0 como um inteiro)  
0.0 (0 como um ponto flutuante)  
"0" (0 como uma string)  
NULL  
FALSE  
array() (um array vazio)  
$var; (uma variável declarada, mas sem valor)

Exemplo:

```````php
$var = 0;

// Evaluates to true because $var is empty
if (empty($var)) {
    echo '$var is either 0, empty, or not set at all';
}

// Evaluates as true because $var is set
if (isset($var)) {
    echo '$var is set even though it is empty';
}
```````

* eval()  
A função eval() executa a string dada no parâmetro como código PHP. eval() executa o código como se inclui-se um novo arquivo PHP.

`````php
$string = 'taça';
$name = 'café';
$str = 'Esta é uma $string com o meu $name nela.';
echo $str. "\n";
eval("\$str = \"$str\";");
echo $str . "\n";
`````

* include e include_once  
A declaração include inclui e avalia o arquivo informado.

Os arquivos são incluídos baseando-se no caminho do arquivo informado ou, se não informado, o include_path especificado. Se o arquivo não for encontrado no include_path, a declaração include checará no diretório do script que o executa e no diretório de trabalho corrente, antes de falhar. O construtor include emitirá um aviso se não localizar o arquivo.

Quando um arquivo é incluído, o código herda o escopo de variáveis da da linha que a inclusão ocorrer. Qualquer variável disponível no arquivo que incluiu estará disponível no arquivo incluído, daquela linha em diante. Entretanto, todas as funções e classes definidas no arquivo incluído estarão no escopo global.

Exemplos:
````php
vars.php
<?php

$color = 'green';
$fruit = 'apple';

?>

test.php
<?php

echo "A $color $fruit"; // A

include 'vars.php';

echo "A $color $fruit"; // A green apple

?>
````

Manipulando Retornos: o include retorna FALSE ao falhar e emite um aviso. Inclusões bem sucedidas, ao menos que seja sobrescritas pelo arquivo incluído, retornam 1. É possível utilizar a declaração return dentro do arquivo incluído para finalizar o processamento e retornar para o arquivo que o incluiu. Além disso, é possível retornar valor a partir do arquivo incluído. Pode-se usar o valor do arquivo incluído como em uma função normal.

Pelo fato do include ser um construtor especial da linguagem, parênteses não são necessários ao redor do argumento. Tome cuidado ao comparar valores de retorno.

````php
// won't work, evaluated as include(('vars.php') == TRUE), i.e. include('')
if (include('vars.php') == TRUE) {
    echo 'OK';
}

// works
if ((include 'vars.php') == TRUE) {
    echo 'OK';
}
````

A declaração include_once inclui e avalia o arquivo informado durante a execução do script. Este é um comportamento similar a declaração include, com a única diferença que, se o código do arquivo já foi incluído, não o fará novamente, e o include_once retornará TRUE. Como o nome sugere, o arquivo será incluído somente uma vez.

* require e require_once

A declaração require é idêntica a include exceto que em caso de falha também produzirá um erro fatal de nível E_COMPILE_ERROR.

````php
// o código abaixo imprime o FATAL_ERROR na tela caso o arquivo vars.php não seja localizado
if (require('vars.php') == TRUE) {
    echo 'OK';
}

// o código abaixo suprime o erro, no entanto encerra a execução do script devido ao FATAL_ERROR
if ((@require 'vars.php') == TRUE) {
    echo 'OK';
}
````

## Outros Construtores

* isset()
isset verifica se a variável é definida. isset() retornará FALSE se for usada em uma variável com o valor NULL. Lembrando que no PHP um byte NULL ("\0") é diferente da constante NULL.

Se múltiplos parâmetros são fornecidos, então isset() retornará TRUE somente se todos os parâmetros são definidos. A avaliação vai da esquerda para direita e pára logo que encontra uma variável não definida.

Exemplo:

````php
$var = '';

// Será interpretado como TRUE imprimindo o texto.
if (isset($var)) {
    echo "Essa variável existe.";
}

// No próximo exemplo será usado var_dump para mostrar
// o valor de retorno de isset().

$a = "teste";
$b = "outrotest";

var_dump( isset($a) );      // TRUE
var_dump( isset ($a, $b) ); // TRUE

unset ($a);

var_dump( isset ($a) );     // FALSE
var_dump( isset ($a, $b) ); // FALSE

$foo = NULL;
var_dump( isset ($foo) );   // FALSE
````

Também serve para chaves associativas de matrizes:

````php
$a = array ('test' => 1, 'hello' => NULL);

var_dump( isset ($a['test']) );            // TRUE
var_dump( isset ($a['foo']) );             // FALSE
var_dump( isset ($a['hello']) );           // FALSE

// A chave 'hello' é igual a NULL sendo considerada como inexistente
// Se quiser verificar o valor NULL da chave tente:
var_dump( array_key_exists('hello', $a) ); // TRUE
````

> **Aviso** isset() somente funciona com variáveis, passando qualquer outra coisa resultará em um erro do analisador. Para verificar se constantes estão definidas, use a função defined().

* **unset()**  
unset() destrói a variável especificada. unset() aceita apenas variáveis, mas não é necessário verificá-las antes.

Exemplos:

````php
// destroy a single variable
unset($foo);

// destroy a single element of an array
unset($bar['quux']);

// destroy more than one variable
unset($foo1, $foo2, $foo3);
````

O comportamento de unset() pode variar dentro de uma função dependendo do tipo de variável que você está tentando destruir.

Se utilizar unset() em uma variável global dentro de uma função, somente a variável local será destruída. A variável no ambiente que foi chamada terá o mesmo valor como antes da execução de unset().

Exemplo:

````php
function destroy_foo()
{
    global $foo;
    unset($foo);
}

$foo = 'bar';
destroy_foo();
echo $foo;
````

Se você quer usar unset() na variável global dentro de uma função, você pode usar o array $GLOBALS

````php
function foo()
{
    unset($GLOBALS['bar']);
}

$bar = "something";
foo();
````

Se a variável for passada por referencia e a função unset() estiver dentro de uma função, apenas a variável local será destruída. A variável no ambiente que chamou a função onde esta unset() irá manter o mesmo valor de antes da utilização de unset().

````php
function foo(&$bar)
{
    unset($bar);
    $bar = "blah";
}

$bar = 'something';
echo "$bar\n";

foo($bar);
echo "$bar\n";
````

Se for utilizado unset() com uma variável estática dentro de uma função, unset() destrói a variável somente no contexto do resto da função. Chamada seguintes irão restaurar o valor anterior da variável. todas as suas referências.

````php
function foo()
{
    static $bar;
    $bar++;
    echo "Before unset: $bar, ";
    unset($bar);
    $bar = 23;
    echo "after unset: $bar\n";
}

foo();
foo();
foo();
````

> **Notas:** É possível usar unset em propriedades de objetos visíveis no contexto atual.
Não é possível usar unset em $this dentro de um método de objeto desde o PHP 5.

* **list()**  
list() cira uma lista de variáveis similar a um array.

Exemplos:
````php
$info = array('Café', 'marrom', 'cafeína');

// Listando todas as variáveis
list($bebida, $cor, $substancia) = $info;
echo "$bebida é $cor e $substancia o faz especial.\n";

// Listando apenas alguns deles
list($bebida, , $substancia) = $info;
echo "$bebida tem $substancia.\n";

// Ou ignoramos os primeiros valores para conseguir apenas o último
list( , , $substancia) = $info;
echo "I need $substancia!\n";

// list() não funciona com strings
list($bar) = "abcde";
var_dump($bar); // NULL
````

É possível usar list para com índices de arrays, mas ele não mantém a ordem dos elementos.

Exemplo:
````php
$info = array('café', 'marrom', 'cafeína');

list($a[0], $a[1], $a[2]) = $info;

var_dump($a);
````

> **Atenção** A função list() assinala os valores começando pelos parâmetros da direita. Se você está usando variáveis normais, então não precisa se preocupar com esse detalhe. Mas se você está usando arrays com índices você normalmente iria esperar que a ordem dos índices no array fosse da esquerda para a direita, mas não é isso que acontece. O índice é criado na ordem reversa.  

> **Nota** list() funciona somente com arrays numéricos e espera que esses índices comecem de 0 (zero).
