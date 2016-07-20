## Replacing

Substituindo informações dentro de uma string

função | descrição
--- | ---
str_replace | Substitui todas as ocorrências da string de procura com a string de substituição
str_ireplace | Versão que não diferencia maiúsculas e minúsculas de str_replace.
substr_replace | Substitui o texto dentro de uma parte de uma string
preg_replace | Realiza uma pesquisa por uma expressão regular e a substitui.
ereg_replace | Substituição com expressões regulares
strtr | Traduz certos caracteres
quotemeta | Adiciona uma barra invertida antes dos meta caracteres

A tabela de funcões abaixo são relacionadas com ARRAY x STRINGS. Como elas atuam alterando a string de entrada, foram adicionadas dentro deste topico.

função | descrição
--- | ---
explode | Divide uma string em array de strings
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

**ereg_replace** : Substituição com expressões regulares

> string ereg_replace ( string $pattern , string $replacement , string $string )

A string modificada é retornada. Se nenhuma substituição é feita na string, então retornará a string inalterada.

Aviso: Esta função está OBSOLETA no PHP 5.3.0 e foi REMOVIDA no PHP 7.0.0. Alternativas a esta função incluem: preg_replace()

Aviso 2: Preste atenção se usar uma variável integer no parâmetro replacement, pois o resultado pode não ser exatamente o esperado. Isso acontece porque a função ereg_replace() interpreta o valor ordinal do número. Por exemplo:

```php
/* Esse exemplo não funcionará. */
$num = 5;
$string = "I ve had it with these mother Fucking Five snakes";
$string_exit = ereg_replace('Five', $num, $string);
echo $string_exit;
/* Esse exemplo funcionará. */
$num = '5';
$string_exit = ereg_replace('Five', $num, $string);
echo $string_exit;
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

**explode** : Divide uma string em strings

> array explode ( string $delimiter , string $string [, int $limit ] )

Se delimiter é uma string vazia (""), explode() irá retornar FALSE. Se delimiter contém um valor que não contém em string, então explode() irá retornar um array contendo string.

```php
// $ php string_explode.php
$string = 'I ve had it with these mother fucking snakes on this mother fucking plane, every body strap in, I am about  to open some fucking windows';
$delimiter = 'fucking';
$saida = explode ( $delimiter , $string  );
print_r($saida);
$saida = explode ( $delimiter , $string, 2  );
print_r($saida);
$saida = explode ( $delimiter , $string, -1  );
print_r($saida);
```


**preg_split** : Divide a string por uma expressão regular

> array preg_split ( string $pattern , string $subject [, int $limit [, int $flags ]] )

Retorna um array contendo pedaços de strings de subject divididos pelo que for combinado pelo pattern.

flags | descrição
--- | ---
PREG_SPLIT_NO_EMPTY | Se esta flag é usada, somente pedaços não vazios serão retornados pela preg_split().
PREG_SPLIT_DELIM_CAPTURE | Se esta flag é usada, expressão entre parênteses no padrão serão capturados e retornados também.
PREG_SPLIT_OFFSET_CAPTURE | Se esta flag é usada, para cada combinação o offset da string será também retornado. Note que isto modifica o valor de retorno em um array onde cada elemento é um array contendo a string combinada no índice 0 e o offset da mesma em subject no índice 1.


```php
// $ php string_preg_split.php
$str = 'snakes';
$chars = preg_split('//', $str, -1, PREG_SPLIT_NO_EMPTY);
print_r($chars);
$search_expression = "mother \"fucking snakes\" on this mother 'fucking plane'.";
$words = preg_split("/[\s,]*\\\"([^\\\"]+)\\\"[\s,]*|" . "[\s,]*'([^']+)'[\s,]*|" . "[\s,]+/", $search_expression, 0, PREG_SPLIT_NO_EMPTY | PREG_SPLIT_DELIM_CAPTURE);
print_r($words);
$str = 'this mother fucking plane';
$chars = preg_split('/ /', $str, -1, PREG_SPLIT_OFFSET_CAPTURE);
print_r($chars);
```

**str_split** :Converte uma string para um array

> array str_split ( string $string [, int $split_length ] )

Se o parâmetro opcional split_length for especificado, o array retornado será quebrado em pedaços com cada um estando com split_length de comprimento, caso contrário cada pedaço terá um caractere de comprimento.

```php
$str = "enuf is enuf";
$arr1 = str_split($str);
$arr2 = str_split($str, 3);
print_r($arr1);
print_r($arr2);
```

**str_word_count** : Retorna informação sobre as palavras usadas em uma string

>mixed str_word_count ( string $string [, int $format [, string $charlist ]] )

Retorna um array ou um inteiro, dependendo do format escolhido.

opção | descricao
--- | ---
0 | retorna o número de palavras encontradas
1 | retorna um array contendo todas as palavras encontradas dentro de string
2 | retorna um array associativo, onde a chave é a posição numérica da palavra dentro da string e o valor é a própria palavra.

```php
$str = "I ve had it with these m0ther fucking snakes on this mother fucking plane";
print_r(str_word_count($str, 1));
print_r(str_word_count($str, 2));
print_r(str_word_count($str, 1, '0'));
echo str_word_count($str);
```

**strtok** : Tokeniza uma string

> string strtok ( string $str , string $token )

strtok() divide uma string (str) em strings menores (tokens), com cada token sendo delimitado por qualquer caractere de token. Quer dizer que, se você tem uma string como "Esta é uma string de exemplo" você poderia "tokenizá-la" em suas palavras individuais usando o caractere de espaço como delimitador do token. Retorna uma string de token.

```php
$str = "I ve had it with these m0ther fucking snakes on this mother fucking plane";
echo strtok($str , ' '). ' | ';
echo strtok(' ');
```

**implode** : Junta elementos de uma matriz em uma string

> string implode ( string $glue , array $pieces )

Retorna uma string contendo os elementos da matriz na mesma ordem com uma ligação entre cada elemento.

```php
$someArray = array('this', 'mother', 'fucking', 'plane');
$result =  implode ( ' ', $someArray );
```

**chunk_split** : Divide uma string em pequenos pedaços

> string chunk_split ( string $body [, int $chunklen [, string $end ]] )

Retorna a string dividida.

```php
$str = 'mother fucking plane';
echo chunk_split($str, 3) ."\n";
echo chunk_split($str, 3, "\t") ."\n";
```
