## Matching

Existem algumas maneiras de comparação de strings.

Metodo | Observação
--- | ---
== | Comparação com conversão de tipo
=== | Comparação com verificação de tipo
strcasecmp() | Comparação de strings sem diferenciar maiúsculas e minúsculas segura para binário
strncasecmp | Comparação de string caso-sensitivo de Binário seguro dos primeiros n caracteres
strcmp() | Comparação de string segura para binário
similar_text() | Calcula a similaridade entre duas strings
levenshtein() | Calcula a distância Levenshtein entre duas strings

### Detalhando os metodos.

**strcasecmp** : Comparação de strings sem diferenciar maiúsculas e minúsculas segura para binário
> int strcasecmp ( string $str1 , string $str2 )

Retorna < 0 se str1 é menor do que str2; > 0 se str1 é maior do que str2, e 0 se forem iguais.


**strncasecmp** : Comparação de string caso-sensitivo de Binário seguro dos primeiros n caracteres

>int strncasecmp ( string $str1 , string $str2 , int $len )

Devolve < 0 se str1 é menor do que str2; > 0 se str1 é maior do que str2, e 0 se elas são iguais.


**strcmp** : Comparação de string segura para binário

> int strcmp ( string $str1 , string $str2 )

Retorna < 0 se str1 é menor do que str2; > 0 se str1 é maior do que str2, e 0 se forem iguais.

```php
// => php string_funcoes_comparacao.php
$str1 = 'Do The Harlem Shake';
$str2 = 'do the harlem shake';
var_dump ( $str1 == $str2 ).PHP_EOL;
var_dump ( $str1 === $str2 ).PHP_EOL;
echo strcasecmp ( $str1 , $str2 ).PHP_EOL;
echo strncasecmp ( $str1 , $str2 , 100).PHP_EOL;
echo strcmp ( $str1 , $str2 ).PHP_EOL;
echo PHP_EOL;
$str1 = 'Do The Harlem Shake';
$str2 = 'Do The Harlem Shake';
var_dump ( $str1 == $str2 ).PHP_EOL;
var_dump ( $str1 === $str2 ).PHP_EOL;
echo strcasecmp ( $str1 , $str2 ).PHP_EOL;
echo strncasecmp ( $str1 , $str2 , 100).PHP_EOL;
echo strcmp ( $str1 , $str2 ).PHP_EOL;
echo PHP_EOL;
$str1 = 'Do The Harlem Shake';
$str2 = 'No Im Not';
var_dump ( $str1 == $str2 ).PHP_EOL;
var_dump ( $str1 === $str2 ).PHP_EOL;
echo strcasecmp ( $str1 , $str2 ).PHP_EOL;
echo strncasecmp ( $str1 , $str2 , 100).PHP_EOL;
echo strcmp ( $str1 , $str2 ).PHP_EOL;
echo PHP_EOL;
```

**similar_text** : Calcula a similaridade entre duas strings

> int similar_text ( string $first , string $second [, float &$percent ] )

Calcula a similaridade entre duas strings como descrito em Programming Classics: Implementing the World's Best Algorithms by Oliver (ISBN 0-131-00413-1).

```php
// $ php string_similar_text.php
echo PHP_EOL;
$var_1 = strtoupper('doggy');
$var_2 = strtoupper('Dog');
similar_text($var_1, $var_2, $percent);
echo $percent.PHP_EOL;
$var_1 = 'shake';
$var_2 = 'Sha';
similar_text($var_1, $var_2, $percent);
echo $percent.PHP_EOL;
$var_1 = 'DO THE';
$var_2 = 'HARLEM SHAKE';
similar_text($var_1, $var_2, $percent);
echo $percent.' %'.PHP_EOL;
similar_text($var_2, $var_1, $percent);
echo $percent.' %'.PHP_EOL.PHP_EOL;
```

**levenshtein** : Calcula a distância Levenshtein entre duas strings

>int levenshtein ( string $str1 , string $str2 )

>int levenshtein ( string $str1 , string $str2 , int $cost_ins , int $cost_rep , int $cost_del )

>int levenshtein ( string $str1 , string $str2 , function $cost )

Retorna a Levenshtein-Distance entre duas strings ou -1, se nenhuma das strings é mais longa que o o limite de 255 caracteres (255 seria mais do que o bastante para o nome ou comparação de dicionário, e ninguém sério estaria fazendo análises genéticas com PHP).

Na sua forma mais simples a função pegará apenas as duas strings como parâmetros e calculará apenas o número de operações de inserção, substituição e deletação necessárias para transformar str1 em str2.

Uma segunda variante pegará três parâmetros adicionais que definem o custo das operações de inserção, substituição e deletação. Esta é a mais geral e adapatável do que a variante um, mas não tão eficiente.

A terceira variante (que ainda não é implementada) será a mais geral e adaptável, mas também a alternativa mais lenta. Ela chamará uma função de usuário fornecida que determinará o custo para cada possível operação.

```php
// $ php string_levenshtein.php
$var_1 = 'DO THE HARLEM SHAKE';
$var_2 = 'IS THE HARLEM SHAKE';
echo levenshtein($var_1, $var_2).PHP_EOL;
$var_1 = 'DO THE HARLEM SHAKE';
$var_2 = 'IS THE HARLEM SHAKÊ';
echo levenshtein($var_1, $var_2).PHP_EOL;
$var_1 = 'DO THE HARLEM SHAKE';
$var_2 = 'IS THE HARLEM SHAK';
echo levenshtein($var_1, $var_2,5,6,7).PHP_EOL;
```
