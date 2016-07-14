## Replacing

Substituindo informações dentro de uma string

função | descrição
--- | ---
str_replace | Substitui todas as ocorrências da string de procura com a string de substituição
str_ireplace | Versão que não diferencia maiúsculas e minúsculas de str_replace.
substr_replace | Substitui o texto dentro de uma parte de uma string
preg_replace | Realiza uma pesquisa por uma expressão regular e a substitui.
strtr | Traduz certos caracteres
ereg_replace | Substituição com expressões regulares
preg_replace | Realiza uma pesquisa por uma expressão regular e a substitui.
strtr | Traduz certos caracteres


A tabela de funcões abaixo são relacionadas com ARRAY x STRINGS. Como elas atuam alterando a string de entrada, foram adicionadas dentro deste topico.

função | descrição
--- | ---
explode | Divide uma string em strings
preg_split | Divide a string por uma expressão regular
str_split | Converte uma string para um array
str_word_count | Retorna informação sobre as palavras usadas em uma string
strtok | Tokeniza uma string
implode | Junta elementos de uma matriz em uma string
chunk_split | Divide uma string em pequenos pedaços

### Detalhando os metodos.

**str_replace** : Substitui todas as ocorrências da string de procura com a string de substituição

>mixed str_replace ( mixed $search , mixed $replace , mixed $subject [, int &$count ] )

Esta função retorna uma string ou um array com todas as ocorrências de search em subject substituídas com o valor dado para replace.

```php
$subject = 'enuf is enuf, I ve had it with these mother Fucking snakes on this mother fucking plane, every body strap in, I am about to open some fucking windows';
echo str_replace('fucking','LOVING', $subject, $count);
echo ' - ' . $count;
```

**str_ireplace** : Versão que não diferencia maiúsculas e minúsculas de str_replace().

>mixed str_ireplace ( mixed $search , mixed $replace , mixed $subject [, int $&count ] )

Esta função retorna uma string ou uma matriz com todas as ocorrencias de search em subject (não diferenciando maiúsculas e minúsculas) substituidas com o valor de replace.

```php
$subject = 'enuf is enuf, I ve had it with these mother Fucking snakes on this mother fucking plane, every body strap in, I am about to open some fucking windows';
echo str_ireplace('fucking','LOVING', $subject, $count);
echo ' - ' . $count;
```

**substr_replace** : Substitui o texto dentro de uma parte de uma string

>mixed substr_replace ( mixed $string , string $replacement , int $start [, int $length ] )

Substitui uma cópia de string delimitada pelos parâmetros start e (opcionalmente) length com a string dada em replacement.

```php
$string = 'enuf is enuf, I ve had it with these mother Fucking snakes on this mother fucking plane, every body strap in, I am about to open some fucking windows';
echo substr_replace($string, 'Do The Harlem Shake', 110 );
```

**preg_replace** : Realiza uma pesquisa por uma expressão regular e a substitui.

>mixed preg_replace ( mixed $pattern , mixed $replacement , mixed $subject [, int $limit = -1 [, int &$count ]] )

Pesquisa subject para o correspondente pattern substituindo pelo replacement.

Detalhe: Na versão 5.5.0; o modificador /e está obsoleto. Use preg_replace_callback() como alternativa. Veja a documentação PREG_REPLACE_EVAL para adicionais informações sobre riscos de segurança.

```php
$patterns = '/fucking/';
$replacements = 'LOVING';
$subject = 'enuf is enuf, I ve had it with these mother Fucking snakes on this mother fucking plane, every body strap in, I am about to open some fucking windows';
echo preg_replace($patterns , $replacements, $subject );
```

**strtr** : Traduz certos caracteres

>string strtr ( string $str , string $from , string $to )

> string strtr ( string $str , array $replace_pairs )

Esta função retorna uma cópia de str, traduzindo todas as ocorrências de cada caractere em from para o caractere correspondente em to. Se from e to são de comprimentos diferentes, os caracteres extras no mais longo dos dois são ignorados.

```php
$replace_pairs = array("strap" => "STRAP", "fucking" => "@#$%*");
$str = 'every body strap in, I am about to open some fucking windows';
echo strtr($str, $replace_pairs) . ' | ';
echo strtr($str, 'strap','stráp');
```

### funções para Strings <=> Arrays
