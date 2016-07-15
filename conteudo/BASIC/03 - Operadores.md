# Operadores

## Operadores Aritméticos

Lembra-se da aritmética básica da escola? Estes operadores funcionam exatamente como aqueles.

**Operadores Aritméticos**

|Exemplo        |Nome              |Resultado               |
|---------------|------------------|------------------------|
|-$a            |Negação           |Oposto de $a.           |
|$a + $b        |Adição            |Soma de $a e $b.        |
|$a - $b        |Subtração         |Diferença entre $a e $b.|
|$a * $b        |Multiplicação     |Produto de $a e $b.     |
|$a / $b        |Divisão           |Quociente de $a e $b.   |
|$a % $b        |Módulo            |Resto de $a dividido por $b.|
|$a ** $b       |Exponencial       |Resultado de $a elevado a $b. Introduzido no PHP 5.6.|

O operador de divisão ("/") sempre retorna um valor com ponto flutuante, a não ser que os dois operandos sejam inteiros (ou strings que são convertidas para inteiros) e números inteiramente divisíveis, nesse caso um inteiro é retornado.

Operandos de módulo são convertidos para inteiros (removendo a parte decimal) antes do processamento.

O resultado do operador de módulo % tem o mesmo sinal do dividendo — ou seja, o resultado de $a % $b terá o mesmo sinal de $a.

Exemplos: [LINK](https://github.com/lisura/php_certification/blob/master/Questoes/PHP_BASICO/Operadores/operadores_aritimeticos.php)

```php
$a = 5
$b = 3
echo (-$a). PHP_EOL;
echo ($a + $b). PHP_EOL;
echo ($a - $b). PHP_EOL;
echo ($a * $b). PHP_EOL;
echo ($a / $b). PHP_EOL;
echo ($a % 2). PHP_EOL;
echo ($a ** $b). PHP_EOL;
```

## Operadores de Atribuição

O operador de atribuição é representado pelo '='(Igual). Não devemos encara-lo como um igualador de valores e sim como um atribuidor do valor da esquerda com o valor da direira.

```php
$a = ($b = 4) + 5; // $a é igual a 9 agora e $b foi definido como 4.
```

Exemplo: [LINK](https://github.com/lisura/php_certification/blob/master/Questoes/PHP_BASICO/Operadores/operadores_atribuicao.php)

## Operadores bit a bit (bitwise)

Operadores bit-a-bit permitem a avaliação e modificação de bits específicos em um tipo inteiro.

**Operadores Bit-a-bit**

|Exemplo        |Nome                    |Resultado                                                               |
|---------------|------------------------|------------------------------------------------------------------------|
|$a & $b        |E (AND)                 |Os bits que estão ativos tanto em $a quanto em $b são ativados.         |
|$a \| $b        |OU (OR inclusivo)       |Os bits que estão ativos em $a ou em $b são ativados.                   |
|$a ^ $b        |XOR (OR exclusivo)      |Os bits que estão ativos em $a ou em $b, mas não em ambos, são ativados.|
|~ $a           |NÃO (NOT)               |Os bits que estão ativos em $a não são ativados, e vice-versa.          |
|$a << $b       |Deslocamento à esquerda |Desloca os bits de $a $b passos para a esquerda (cada passo significa   multiplica por dois")|
|$a >> $b       |Deslocamento à direita  |Desloca os bits de $a $b passos para a direita (cada passo significa "divide por dois")|

> Utilize parenteses para garantir a precedência desejada. Por exemplo $a & $b == true avalia primeiro a equivalência > e depois a operação de bits, enquanto que ($a & $b) == true avalia primeiro a operação de bits e só depois a equivalência.

Exemplo 1: [LINK](https://github.com/lisura/php_certification/blob/master/Questoes/PHP_BASICO/Operadores/operadores_bit_a_bit_1.php)
Exemplo 2: [LINK](https://github.com/lisura/php_certification/blob/master/Questoes/PHP_BASICO/Operadores/operadores_bit_a_bit_2.php)

## Operadores de Comparação

Operadores de comparação, como os seus nomes implicam, permitem que você compare dois valores.

**Operadores de comparação**

|Exemplo         |Nome               |Resultado                                                              |
|----------------|-------------------|-----------------------------------------------------------------------|
|$a == $b        |Igual              |Verdadeiro (TRUE) se $a é igual a $b.                                  |
|$a === $b       |Idêntico           |Verdadeiro (TRUE) se $a é igual a $b, e eles são do mesmo tipo.        |
|$a != $b        |Diferente          |Verdadeiro se $a não é igual a $b.                                     |
|$a <> $b        |Diferente          |Verdadeiro se $a não é igual a $b.                                     |
|$a !== $b       |Não idêntico       |Verdadeiro de $a não é igual a $b, ou eles não são do mesmo tipo (introduzido no PHP4).|
|$a < $b         |Menor que          |Verdadeiro se $a é estritamente menor que $b.                          |
|$a > $b         |Maior que          |Verdadeiro se $a é estritamente maior que $b.                          |
|$a <= $b        |Menor ou igual     |Verdadeiro se $a é menor ou igual a $b.                                |
|$a >= $b        |Maior ou igual     |Verdadeiro se $a é maior ou igual a $b.                                |
|$a <=> $b       |Spaceship (nave espacial)|**_Um integer menor que, igual a ou maior que zero quando $a é, respectivamente, menor que, igual a ou maior que $b. Disponível a partir do PHP 7._**|
|$a ?? $b ?? $c  |Null coalescing    |**_O primeiro operando da esquerda para direita que exista e não for NULL. Retorna NULL se nenhum valor estiver definifo ou se todos nulos NULL. Disponível desde o PHP 7._**|

**Operador Ternário**
Outro operador condicional é o operador "?:" (ou ternário).

**Exemplo:**
```php
$action = (empty($_POST['action'])) ? 'default' : $_POST['action'];

// Em oposição ao IF abaixo

if (empty($_POST['action'])) {
    $action = 'default';
} else {
    $action = $_POST['action'];
}
```

## Operadores de controle de erro

 O PHP suporta um operador de controle de erro: o sinal 'arroba' (@). Quando ele precede uma expressão em PHP, qualquer mensagem de erro que possa ser gerada por aquela expressão será ignorada.

Se você configurar uma função personalizada de manipulação de erros com set_error_handler() ela será chamada, mas esta função personalizada pode (e deve) chamar error_reporting() que irá retornar 0 quando o erro disparado tiver sido precedido por uma @.

Se o recurso track_errors estiver habilitado, qualquer mensagem de erro gerada pela expressão será gravada na variável $php_errormsg. Esta variável será sobrescrita em cada erro, assim verifique-a constantemente se você quiser usá-la.

Exemplo: [LINK](https://github.com/lisura/php_certification/blob/master/Questoes/PHP_BASICO/Operadores/operadores_de_controle_de_erro.php)

## Operadores de Execução

O PHP suporta um operador de execução: acentos graves (``). Note que não são aspas simples! O PHP tentará executar o conteúdo dentro dos acentos graves como um comando do shell; a saída será retornada (isto é, ela não será simplesmente mostrada na tela; ela pode ser atribuída a uma variável). A utilização do operador acento grave é idêntica a da função shell_exec().

```php
$output = `ls -al`;
echo "<pre>$output</pre>";
```

> **ATENCAO**:
> O operador de execução fica desabilitado quando "safe mode está ativo ou shell_exec() está desabilitado.
> **OBS**: safe_mode está descontinuado no PHP > 5.4

## Operadores de Incremento/Decremento

O PHP suporta operadores de pré e pós-incremento e decremento no estilo C.

> **ATENÇÂO**: Os operadores incremento/decremento afetam apenas números e strings. Arrays, objetos e recursos não são afetados. Decrementar NULL não gera efeitos, mas incrementar resulta em 1.

**Operadores de Incremento/Decremento**

|Exemplo         |Nome             |Efeito                                                   |
|----------------|-----------------|---------------------------------------------------------|
|++$a            |Pré-incremento   |Incrementa $a em um, e então retorna $a.                 |
|$a++            |Pós-incremento   |Retorna $a, e então incrementa $a em um.                 |
|--$a            |Pré-decremento   |Decrementa $a em um, e então retorna $a.                 |
|$a--            |Pós-decremento   |Retorna $a, e então decrementa $a em um.                 |

Exemplo : [LINK](https://github.com/lisura/php_certification/blob/master/Questoes/PHP_BASICO/Operadores/operadores_de_incremento_decremento.php)

## Operadores Lógicos

|Exemplo        |Nome    |Resultado                                                   |
|---------------|--------|------------------------------------------------------------|
|$a and $b      |E       |Verdadeiro (TRUE) se tanto $a quanto $b são verdadeiros.    |
|$a or $b       |OU      |Verdadeiro se $a ou $b são verdadeiros.                     |
|$a xor $b      |XOR     |Verdadeiro se $a ou $b são verdadeiros, mas não ambos.      |
|! $a           |NÃO 	 |Verdadeiro se $a não é verdadeiro.                          |
|$a && $b       |E       |Verdadeiro se tanto $a quanto $b são verdadeiros.           |
|$a \|\| $b     |OU 	 |Verdadeiro se $a ou $b são verdadeiros.                     |

> ATENÇÂO: A razão para as duas variantes dos operandos "and" e "or" é que eles operam com precedências diferentes.

## Operadores de String

Há dois operadores de string. O primeiro é o operador de concatenação ('.'), que retorna a concatenação dos seus argumentos direito e esquerdo. O segundo é o operador de atribuição de concatenação ('.='), que acrescenta o argumento do lado direito no argumento do lado esquerdo.

```php
$a = 'Olá ';
$b = $a . 'mundo!'; // agora $b contém 'Olá mundo!'

$a = 'Olá ';
$a .= 'mundo!';     // agora $a contém 'Olá mundo!'
```

## Operadores de Arrays

|Exemplo        |Nome            |Resultado                                                                      |
|---------------|----------------|-------------------------------------------------------------------------------|
|$a + $b        |União           |União de $a e $b.                                                              |
|$a == $b       |Igualdade       |TRUE se $a e $b tem os mesmos pares de chave/valor.                            |
|$a === $b      |Identidade      |TRUE se $a e $b tem os mesmos pares de chave/valor na mesma ordem e do mesmo tipo.|
|$a != $b       |Desigualdade    |TRUE se $a não é igual a $b.                                                   |
|$a <> $b       |Desigualdade    |TRUE se $a não é igual a $b.                                                   |
|$a !== $b      |Não identidade  |TRUE se $a não é identico a $b.                                                |

Exemplo: [LINK](https://github.com/lisura/php_certification/blob/master/Questoes/PHP_BASICO/Operadores/operadores_de_arrays.php)

##  Operadores de Tipo

**instanceof** é usado para determinar se um variável do PHP é uma objeto instânciado de uma certa classe:


```php
class MyClass
{
}

class NotMyClass
{
}
$a = new MyClass;

var_dump($a instanceof MyClass);   // true
var_dump($a instanceof NotMyClass);// false
```

**instanceof** pode também ser usado para determinar se uma variável é um objeto instânciado de uma classe que herda de uma classe pai:

```php
class MyClass
{
}

$a = new MyClass;
var_dump(!($a instanceof stdClass)); // TRUE
```

Por fim, **instanceof** pode também ser usado para determinar se uma variável é um objeto instânciado de uma classe que implementa uma interface:

```php
interface MyInterface
{
}

class MyClass implements MyInterface
{
}

$a = new MyClass;

var_dump($a instanceof MyClass);     // true
var_dump($a instanceof MyInterface); // true
```
