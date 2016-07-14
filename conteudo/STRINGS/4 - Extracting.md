## Extracting

Extraindo strings ou informações de uma string.

função | descrição
--- | ---
substr | Retorna uma parte de uma string
strrchr | Encontra a ultima ocorrência de um caractere em uma string
substr_replace | Substitui o texto dentro de uma parte de uma string
preg_match | Perform a regular expression match
trim | Retira espaço no ínicio e final de uma string
mb_substr | Obtem parte da string
wordwrap | Quebra uma string em um dado número de caracteres

### Detalhando os metodos.

**substr** :  Retorna uma parte de uma string

> string substr ( string $string , int $start [, int $length ] )

Retorna a parte de string especificada pelo parâmetro start e length.

```php
<?php
echo substr('abcdef', 1);     // bcdef
echo substr('abcdef', 1, 3);  // bcd
echo substr('abcdef', 0, 4);  // abcd
echo substr('abcdef', 0, 8);  // abcdef
echo substr('abcdef', -1, 1); // f
echo substr('abcdef', -1);
echo substr('abcdef', -1, -1);
echo substr('abcdef', 0, 0);
```

**strrchr** :  Encontra a ultima ocorrência de um caractere em uma string

> string strrchr ( string $haystack , char $needle )

Retorna a parte de haystack que inicia na última ocorrência de needle e vai até o fim de haystack.

```php
$path = '/www/public_html/index.html';
$filename = substr(strrchr($path, "/"), 1);
echo $filename; // "index.html"
```

**substr_replace** : Substitui o texto dentro de uma parte de uma string

> mixed substr_replace ( mixed $string , string $replacement , int $start [, int $length ] )

substr_replace() substitui uma cópia de string delimitada pelos parâmetros start e (opcionalmente) length com a string dada em replacement.

```php
// $ php string_substr_replace.php
$var = 'ABCDEFGH:/MNRPQR/';
echo "Original: $var<hr />\n";
/* Estes dois exemplos substituem tudo de $var com 'bob'. */
echo substr_replace($var, 'bob', 0) . "<br />\n";
echo substr_replace($var, 'bob', 0, strlen($var)) . "<br />\n";
/* Insere 'bob' direto no começo de $var. */
echo substr_replace($var, 'bob', 0, 0) . "<br />\n";
/* Estes dois exemplos substituem 'MNRPQR' em $var com 'bob'. */
echo substr_replace($var, 'bob', 10, -1) . "<br />\n";
echo substr_replace($var, 'bob', -7, -1) . "<br />\n";
/* Deleta 'MNRPQR' de $var. */
echo substr_replace($var, '', 10, -1) . "<br />\n";
```

**preg_match** : Perform a regular expression match

>int preg_match ( string $pattern , string $subject [, array &$matches [, int $flags = 0 [, int $offset = 0 ]]] )


preg_match() retorna 1 se o padrão "subject" é encontrado , 0 se não encontrar, ou false se encontrar um erro.

```php
echo preg_match('/(Harlem) [A-Za-z ]* /', 'Do The Harlem Shake Harlem', $match);
echo ' - ';
print_r($match);
```

**trim** : Retira espaço no ínicio e final de uma string

> string trim ( string $str [, string $charlist ] )

retorna uma string com os espaçoes retirados do ínicio e do final de str. Sem o segundo parâmetro, trim() irá retirar estes caracteres

codigo | caracteres
--- | ---
" " (ASCII 32 (0x20)) | um espaço normal.
"\t" (ASCII 9 (0x09)) | uma tabulação.
"\n" (ASCII 10 (0x0A)) | uma linha nova (line feed).
"\r" (ASCII 13 (0x0D)) | um retono de carro.
"\0" (ASCII 0 (0x00)) | o byte NULL.
"\x0B" (ASCII 11 (0x0B)) | uma tabulação vertical.

```php
$string = 'Do the Harlem Shake  ';
echo trim ($string) . ' - ';
echo trim ($string, 'Harlem') . ' - ';
echo trim ($string, 'Do') . ' - ';
```

**mb_substr** : Obtem parte da string

> string mb_substr ( string $str , int $start [, int $length = NULL [, string $encoding = mb_internal_encoding() ]] )

Retorna a porção da string espeficicado por start e length.
Executa uma operação de multi-byte segura substr( ) com base no número de caracteres.

```php
$var = 'Do The Harlem Shake';
$foo = mb_substr($var,0,5, "utf-8");
echo $foo; // Do The Har
```

**wordwrap** : Quebra uma string em um dado número de caracteres

> string wordwrap ( string $str [, int $width = 75 [, string $break = "\n" [, bool $cut = false ]]] )

Retorna a string dada quebrada na largura especificada.

```php
// $ php string_wordwrap.php
$text = "Just Do The Fucking Harlem Shake";
$newtext = wordwrap($text, 10, "<br />\n");
echo $newtext . PHP_EOL;
```
