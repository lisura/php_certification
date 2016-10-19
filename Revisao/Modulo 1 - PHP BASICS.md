# Revisão sobre PHP Basics

* PHP - PHP: Hypertext Preprocessor. Criado inicialment por Rasmus Lerdof em 1994
* Linguagem de script open source de uso geral, muito utilizada, e especialmente adequada para o desenvolvimento web e que pode ser embutida dentro do HTML.
* O PHP 5 foi lançado em Julho de 2004 após um longo desenvolvimento e vários pré-lançamentos. Principalmente impulsionado pelo seu core o Zend Engine 2.0

## Sintaxe
* Tags padrão
```php
<?php echo 'Hello, world!'; ?>
```

* Shot Tags
```php
<?= 'Hello, world!'; ?>
```

* ASP Tags
```php
<%= 'Hello, world!'; %>
```

* Script Tags
```php
<script language="php"> echo 'Hello, world!'; </script>
```

## Operadores - Geral
* Um operador é algo que recebe um ou mais valores (ou expressões) e que devolve outro valor. Os próprios construtores se tornam expressões.
* Quando operadores tem precedência igual a associatividade decide como os operadores são agrupados. Ex: **1 - 2 - 3** equivale a **(1 - 2) - 3** (- associado à esquerda), já **$a = $b = $c** equivale a **$a = ($b = $c)** (= associado à direita).
* Operadores de igual precedência sem associatividade não podem ser utilizados uns próximos aos outros. Ex: **1 < 2 > 1** é ilegal no PHP, já **1 <= 1 == 1** é válido pois os operadores tem níveis distintos de precedência.
* Tabela de precedência dos operadores, do maior ao menor, precedência igual na mesma linha é decidida pela associatividade

|Associação            |Operadores                    |Informação Adicional      |
|----------------------|------------------------------|--------------------------|
|não associativo       |clone new                     |clone e new               |
|esquerda              |[                             |array()                   |
|direita               |**                            |aritmética                |
|direita               |++ -- ~ (int) (float) (string) (array) (object) (bool) @|types e incremento/decremento|
|não associativo       |instanceof                    |tipos                     |
|direita               |!                             |lógicos                   |
|esquerda              |* / %                         |aritmética                |
|esquerda              |+ - .                         |aritmética e string       |
|esquerda              |<< >>                         |bits                      |
|não associativo       |< <= > >=                     |comparação                |
|não associativo       |== != === !== <> <=>          |comparação                |
|esquerda              |&                             |bits e referências        |
|esquerda              |^                             |bits                      |
|esquerda              |\|                            |bits                      |
|esquerda              |&&                            |lógicos                   |
|esquerda              |\|\|                          |lógicos                   |
|direita               |??                            |comparação                |
|esquerda              |? :                           |ternário                  |
|direita               |= += -= *= **= /= .= %= &= |= ^= <<= >>=|atribuição      |
|esquerda              |and                           |lógicos                   |
|esquerda              |xor                           |lógicos                   |
|esquerda              |or                            |lógicos                   |

## Operadores Aritméticos
* O operador de divisão sempre retorna um valor com ponto flutuante, a não ser que os dois operandos sejam inteiros (ou strings que são convertidas para inteiros) e números inteiramente divisíveis, nesse caso um inteiro é retornado.
* Operandos de módulo são convertidos para inteiros (removendo a parte decimal) antes do processamento.
* O resultado do operador de módulo tem o mesmo sinal do dividendo (o resultado de $a % $b terá o mesmo sinal de $a).

|Exemplo        |Nome              |Resultado               |
|---------------|------------------|------------------------|
|-$a            |Negação           |Oposto de $a.           |
|$a + $b        |Adição            |Soma de $a e $b.        |
|$a - $b        |Subtração         |Diferença entre $a e $b.|
|$a * $b        |Multiplicação     |Produto de $a e $b.     |
|$a / $b        |Divisão           |Quociente de $a e $b.   |
|$a % $b        |Módulo            |Resto de $a dividido por $b.|

## Operadores de Atribuição
* O operador de atribuição é representado pelo '=' (Igual). 
* Não devemos encara-lo como um igualador de valores e sim como um atribuidor do valor da esquerda com o valor da direira.

## Operadores bit a bit (bitwise)
* Operadores bit-a-bit permitem a avaliação e modificação de bits específicos em um tipo inteiro.

|Exemplo        |Nome                    |Resultado                                                               |
|---------------|------------------------|------------------------------------------------------------------------|
|$a & $b        |E (AND)                 |Os bits que estão ativos tanto em $a quanto em $b são ativados.         |
|$a \| $b        |OU (OR inclusivo)       |Os bits que estão ativos em $a ou em $b são ativados.                   |
|$a ^ $b        |XOR (OR exclusivo)      |Os bits que estão ativos em $a ou em $b, mas não em ambos, são ativados.|
|~ $a           |NÃO (NOT)               |Os bits que estão ativos em $a não são ativados, e vice-versa.          |
|$a << $b       |Deslocamento à esquerda |Desloca os bits de $a $b passos para a esquerda (cada passo significa   multiplica por dois")|
|$a >> $b       |Deslocamento à direita  |Desloca os bits de $a $b passos para a direita (cada passo significa "divide por dois")|

## Operadores de Comparação

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

## Operador Ternário
```php
$valor = (empty($variavel)) ? 'default' : $variavel;
```

## Operadores de controle de erro
* Quando o operador *arroba* (@) precede uma expressão, qualquer mensagem de erro que possa ser gerada por aquela expressão será ignorada.
* Se track_errors estiver habilitado, qualquer mensagem de erro erá gravada em $php_errormsg. Esta variável será sobrescrita em cada erro.

## Operadores de Execução
* Acentos graves (``). 
* O PHP tentará executar o conteúdo dentro dos acentos graves como um comando do shell; a saída será retornada
* Análogo a função shell_exec()

```php
$output = `ls -al`;
```

## Operadores de Incremento/Decremento

|Exemplo         |Nome             |Efeito                                                   |
|----------------|-----------------|---------------------------------------------------------|
|++$a            |Pré-incremento   |Incrementa $a em um, e então retorna $a.                 |
|$a++            |Pós-incremento   |Retorna $a, e então incrementa $a em um.                 |
|--$a            |Pré-decremento   |Decrementa $a em um, e então retorna $a.                 |
|$a--            |Pós-decremento   |Retorna $a, e então decrementa $a em um.                 |

## Operadores Lógicos
* A razão para as duas variantes dos operandos "and" e "or" é que eles operam com precedências diferentes.

|Exemplo        |Nome    |Resultado                                                   |
|---------------|--------|------------------------------------------------------------|
|$a and $b      |E       |Verdadeiro (TRUE) se tanto $a quanto $b são verdadeiros.    |
|$a or $b       |OU      |Verdadeiro se $a ou $b são verdadeiros.                     |
|$a xor $b      |XOR     |Verdadeiro se $a ou $b são verdadeiros, mas não ambos.      |
|! $a           |NÃO 	 |Verdadeiro se $a não é verdadeiro.                          |
|$a && $b       |E       |Verdadeiro se tanto $a quanto $b são verdadeiros.           |
|$a \|\| $b     |OU 	 |Verdadeiro se $a ou $b são verdadeiros.                     |

## Operadores de String
* Concatenação ('.') e Atribuição de concatenação ('.=')

## Operadores de Arrays

|Exemplo        |Nome            |Resultado                                                                      |
|---------------|----------------|-------------------------------------------------------------------------------|
|$a + $b        |União           |União de $a e $b.                                                              |
|$a == $b       |Igualdade       |TRUE se $a e $b tem os mesmos pares de chave/valor.                            |
|$a === $b      |Identidade      |TRUE se $a e $b tem os mesmos pares de chave/valor na mesma ordem e do mesmo tipo.|
|$a != $b       |Desigualdade    |TRUE se $a não é igual a $b.                                                   |
|$a <> $b       |Desigualdade    |TRUE se $a não é igual a $b.                                                   |
|$a !== $b      |Não identidade  |TRUE se $a não é identico a $b.                                                |

##  Operadores de Tipo
* o operador **instanceof** é usado para determinar se uma variável é um objeto instânciado de uma certa classe
* Pode também ser usado para determinar se uma variável é um objeto instânciado de uma classe comparando com a classe pai
* Pode também ser usado para determinar se uma variável é um objeto instânciado de uma classe que implementa uma interface
```php
var_dump($a instanceof MyClass);
var_dump($a instanceof stdClass);
var_dump($a instanceof MyInterface);
```
