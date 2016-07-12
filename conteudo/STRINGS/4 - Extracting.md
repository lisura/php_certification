## Extracting

Extraindo strings ou informações de uma string.

função | descrição
--- | ---
substr | Retorna uma parte de uma string
strrchr | Encontra a ultima ocorrência de um caractere em uma string
substr_replace | Substitui o texto dentro de uma parte de uma string
preg_match | Perform a regular expression match
trim | Retira espaço no ínicio e final de uma string
mb_substr | Get part of string
wordwrap | Quebra uma string em um dado número de caracteres

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
// exemplos aqui
```
