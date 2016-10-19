# Syntax

## Tags

As Tags PHP são usada para identificar os pontos onde o interpretador do código deve atuar.
Em um script php puro, é fortemente recomendado o não fechamento da TAG ao final do arquivo evitando assim o acululo de caracteres na saida do **BUFFER** de impressão.

Exemplos de tags:

**Tags padrão**
```php
<?php echo 'Olá mundo'; ?>
```

**Shot Tags**
```php
<?= 'Olá mundo'; ?>
```
> A Short Tag vem ativa por padrão em PHP >= 5.4 independendo de configurações no php.ini

**ASP Tags**
```php
<%= 'Olá mundo'; %>
```

**Script Tags**
```php
<script language="php"> echo 'Olá mundo'; </script>
```

> **ATENÇÂO**:
> **ASP tags** e **Script Tags** Estão discontinuadas no PHP > 7.0

Exercício : [LINK](https://github.com/lisura/php_certification/tree/master/Questoes/PHP_BASICO/Syntax#teste-de-syntax)

Para Referência e mais detalhes vide [Link](http://php.net/manual/pt_BR/language.basic-syntax.phpmode.php)

# Operadores

Um operador é algo que recebe um ou mais valores (ou expressões, no jargão de programação) e que devolve outro valor (e por isso os próprios construtores se tornam expressões).

Referência: [LINK](http://php.net/manual/en/language.operators.php)

## Precedência de Operadores

* A precedência de um operador especifica quem tem mais prioridade quando há duas delas juntas. Por exemplo, na expressão **1 + 5 * 3**, a resposta é **16** e não **18** porque o operador de multiplicação ("*") tem prioridade de precedência que o operador de adição ("+"). Parênteses podem ser utilizados para forçar a precedência, se necessário. Assim, (1 + 5) * 3 é avaliado como 18.

* Quando operadores tem precedência igual a associatividade decide como os operadores são agrupados. Por exemplo "-" é associado à esquerda, de forma que 1 - 2 - 3 é agrupado como (1 - 2) - 3 e resulta em -4. "=" por outro lado associa para a direita, de forma que $a = $b = $c é agrupado como $a = ($b = $c).

* Operadores de igual precedência sem associatividade não podem ser utilizados uns próximos aos outros. Por exemplo 1 < 2 > 1 é ilegal no PHP. A expressão 1 <= 1 == 1 por outro lado é válida, porque o operador == tem menor precedência que o operador <=.

* O uso de parenteses, embora não estritamente necessário, pode melhorar a leitura do código ao deixar o agrupamento explícito em vez de depender da associatividade e precedências implícitos.

**Precedência dos operadores**

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

> **ATENCÂO**: A tabela mostra a precedência dos operadores, com a maior precedência no começo.
> Operadores com a mesma precedência estão na mesma linha, nesses casos a associatividade deles decidirá qual ordem  > eles serão avaliados.

> ATENÇÂO:  No Exemplo provamos que a precedência de operadores aritméticos é da
> ordem dada de acordo com a expressão.

Exemplo: [LINK](https://github.com/lisura/php_certification/blob/master/Questoes/PHP_BASICO/Operadores/operadores_precedencia.php)
