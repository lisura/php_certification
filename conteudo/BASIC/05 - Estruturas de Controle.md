# Estruturas de Controle

##Condições
* **IF**  
Permite a execução condicional de fragmentos de código. Se uma expressão for avaliada como TRUE, o PHP executará a declaração, e se avaliá-la como FALSE - ignorá-la.
Exemplo:

```php
if ($a > $b)
  echo "a is bigger than b";
```

* **ELSE**  
O else estende a instrução if para executar outras caso a expressão no if retornar FALSE.
Exemplo:

```php
if ($a > $b) {
  echo "a is greater than b";
} else {
  echo "a is NOT greater than b";
}
```

* **ELSEIF (ELSE IF)**  
Como o else, estende um if para executar instruções diferentes no caso da expressão if original ser avaliada como FALSE. Entretanto, diferentemente do else, executará uma expressão alternativa somente se a expressão condicional do elseif for avaliada como TRUE.
Exemplo:

```php
if ($a > $b) {
    echo "a is bigger than b";
} elseif ($a == $b) {
    echo "a is equal to b";
} else {
    echo "a is smaller than b";
}
```

* **IFELSE Ternário (versão reduzida)**  
É possível utilizar o operador ternário para criar um IFELSE
Exemplo:

```php
// Atribuição de um valor padrão a uma variável
// Versão "padrão"
if (!isset($variavel)) {
$variavel = 'valor padrão';
} else {
$variavel = $variavel;
}
// Versão usando operador ternário
$variavel = (!isset($variavel)) ? 'valor padrão' : $variavel;
```

Exercício: [LINK](https://github.com/lisura/php_certification/blob/master/Questoes/PHP_BASICO/Estruturas-de-Controle/ifelse.php)

* **SWITCH**  
A declaração switch é similar a uma série de declarações IF na mesma expressão. Em muitos casos, se deseja comparar as mesmas variáveis (ou expressões), com diferentes valores, e executar pedaços diferentes de código dependendo de qual valor ela é igual. Esta é exatamente a serventia da declaração switch.
Exemplo:

```````php
if ($i == 0) {
    echo "i equals 0";
} elseif ($i == 1) {
    echo "i equals 1";
} elseif ($i == 2) {
    echo "i equals 2";
}

switch ($i) {
    case 0:
        echo "i equals 0";
        break;
    case 1:
        echo "i equals 1";
        break;
    case 2:
        echo "i equals 2";
        break;
}
```````

> Nota: Note que o switch/case faz comparação frouxa, ou seja é como se utiliza-se do operador == .
A estrutura do switch permite o uso de strings.

```````php
switch ($i) {
    case "apple":
        echo "i is apple";
        break;
    case "bar":
        echo "i is bar";
        break;
    case "cake":
        echo "i is cake";
        break;
}
```````

 A declação switch executa linha por linha (na verdade, declaração por declaração). No início nenhum código é executado. Somente quando uma declaração case é encontrada com um valores correspondente ao valor da expressão do switch, o PHP começará a executar a declaração. O PHP continuará a executar a declaração até o fim do bloco switch, ou até a primeira declaração break encontrada. Se não for escrita uma declaração break ao final da lista de declarações do case, o PHP continuará executando as declarações dos próximos cases. Por exemplo:
```````php
switch ($i) {
    case 0:
        echo "i equals 0";
    case 1:
        echo "i equals 1";
    case 2:
        echo "i equals 2";
}
```````

A lista de declarações de um case também podem estar vazia, passando o controle da lista de declarações para o próximo case.
```````php
switch ($i) {
case 0:
case 1:
case 2:
    echo "i is less than 3 but not negative";
    break;
case 3:
    echo "i is 3";
}
```````

Um case especial é o default. Este case corresponde a tudo que não foi correspondido pelos outros cases. Por exemplo:
```php
switch ($i) {
    case 0:
        echo "i equals 0";
        break;
    case 1:
        echo "i equals 1";
        break;
    case 2:
        echo "i equals 2";
        break;
    default:
       echo "i is not equal to 0, 1 or 2";
}
```

Exemplo: [LINK](https://github.com/lisura/php_certification/blob/master/Questoes/PHP_BASICO/Estruturas-de-Controle/switch.php)

## Loops

* **WHILE**  
Laços while são os mais simples tipos de laços do PHP.
A declaração while dirá ao PHP para executar as declarações aninhadas repetidamente, enquanto a expressão do while forem avaliadas como TRUE. O valor da expressão é checado a cada vez que o laço é iniciado.
Exemplos:

```php

$i = 1;
while ($i <= 10) {
    echo $i++;  /* the printed value would be
                   $i before the increment
                   (post-increment) */
}
```
```php
$i = 1;
while ($i <= 10):
    echo $i;
    $i++;
endwhile;
```

* **DO-WHILE**  
Os laços do-while é muito similar aos laços while, com exceção que a expressão de avaliação é verificada ao final de cada iteração em vez de no começo.
A primeira iteração do laço do-while sempre é executada.
Só há uma sintaxe para o laço do-while:
```php
$i = 0;
do {
    echo $i;
} while ($i > 0);
```

* **FOR**  
Os laços for são os mais complexo no PHP. Possui comportamento semelhante ao C. A sintaxe do laço for é:
```php
for (expr1; expr2; expr3)
    statement
```
No começo de cada iteração a expr2 é avaliada. Se a avaliada como TRUE, o laço continuará e as instruções aninhada serão executadas. Se avaliada como FALSE, a execução do laço terminará.
No final de cada iteração, a expr3 é avaliada (executada).

Exemplos:
```````php
/* exemplo 1 */

for ($i = 1; $i <= 10; $i++) {
    echo $i;
}

/* exemplo 2 2 */

for ($i = 1; ; $i++) {
    if ($i > 10) {
        break;
    }
    echo $i;
}

/* exemplo 3 */

$i = 1;
for (; ; ) {
    if ($i > 10) {
        break;
    }
    echo $i;
    $i++;
}

/* exemplo 4 */

for ($i = 1, $j = 0; $i <= 10; $j += $i, print $i, $i++);

/*exemplo 5*/
for($col = 'R'; $col != 'AD'; $col++) {
    echo $col.' ';
}
```````

> **Nota** for não funciona para array e objetos. Para isso, use foreach.

Exercício: [LINK](https://github.com/lisura/php_certification/blob/master/Questoes/PHP_BASICO/Estruturas-de-Controle/for.php)

* **FOREACH**  
O construtor foreach fornece uma maneira fácil de iterar sobre arrays. O foreach funciona somente em arrays e objetos, e emitirá um erro ao tentar usá-lo em uma variável com um tipo de dado diferente ou em uma variável não inicializada.

```php
foreach (array_expression as $value)
    statement

foreach (array_expression as $key => $value)
    statement
```
> **Nota**: No PHP 5, quando o foreach inicia sua primeira execução, o ponteiro interno do array é automaticamente redefinido para o primeiro elemento. Isso indica que não é necessário chamar a função reset() antes de um laço foreach.
Como o foreach depende do ponteiro interno do array no PHP 5, modificá-lo dentro de um laço pode levar a comportamentos inesperados.

O código a seguir não é recomendável:

````php
foreach (array(1, 2, 3, 4) as &$value) {
    $value = $value * 2;
}
```

> **Aviso** A referência a um $value e o último elemento do array irão permanecer mesmo após o laço foreach finalizar. É recomendável destruí-la com a função unset().  


> **Nota**: O foreach não possui suporte a habilidade de suprimir mensagens de erro utilizando o '@'.

Exemplos:
```````php
$arr = array("one", "two", "three");
reset($arr);
while (list($key, $value) = each($arr)) {
    echo "Key: $key; Value: $value<br />\n";
}

foreach ($arr as $key => $value) {
    echo "Key: $key; Value: $value<br />\n";
}
```````

* **CONTINUE**  
continue é utilizado em estruturas de laço para pular o resto da iteração atual, e continuar a execução na validação da condição e, então, iniciar a próxima iteração.

> Nota : No PHP a instrução switch é considerado uma estrutura de laço para os propósitos do continue. O continue se comporta como o break (quando nenhum argumento é passado). Se um switch está dentro de um laço, continue 2 irá continuar a próxima interação do laço externo.

O continue aceita um argumento numérico opcional que diz quantos níveis de laços aninhados deve pular. O valor padrão é 1, saltando para o final do laço atual.

```````php
while (list($key, $value) = each($arr)) {
    if (!($key % 2)) { // pula membros pares
        continue;
    }
    do_something_odd($value);
}
```````

Abaixo está um exemplo do que não se deve fazer.
```````php
for ($i = 0; $i < 5; ++$i) {
    if ($i == 2)
        continue
    print "$i\n";
}
```````
A partir do PHP 5.4.0, o exemplo acima irá causar um erro do tipo E_COMPILE_ERROR.

> Nota: continue 0; não é válido. Não é possível passar variáveis como argumento (ex., $num = 2; continue $num;).

* **BREAK**  
break finaliza a execução da estrutura for, foreach, while, do-while ou switch atual.
break aceita um argumento numérico opcional que diz quantas estruturas aninhadas deverá interromper. O valor padrão é 1, somente a estrutura imediata é interrompida.  

```````php
$arr = array('one', 'two', 'three', 'four', 'stop', 'five');
while (list(, $val) = each($arr)) {
    if ($val == 'stop') {
        break;    /* You could also write 'break 1;' here. */
    }
    echo "$val<br />\n";
}

/* Using the optional argument. */

$i = 0;
while (++$i) {
    switch ($i) {
    case 5:
        echo "At 5<br />\n";
        break 1;  /* Exit only the switch. */
    case 10:
        echo "At 10; quitting<br />\n";
        break 2;  /* Exit the switch and the while. */
    default:
        break;
    }
}
```````

> Nota: as mesmas regras do continue valem para o break.


Exercícios: [LINK](https://github.com/lisura/php_certification/blob/master/Questoes/PHP_BASICO/Estruturas-de-Controle/break.php)
