## Introdução

### O que é o STRING?

Uma string é uma série de caracteres, onde um caractere é o mesmo que um byte. Isso significa que o PHP possui suporte a um conjunto de apenas 256 caracteres, e, portanto, não possui suporte nativo a Unicode (UTF-16).

A string no PHP é implementada como um array de bytes e um inteiro indicando seu tamanho no buffer.

```php
//=> $ php string_as_array.php
$a = "String array test";
var_dump($a);
// Return string(17) "String array test"
var_dump($a[0]);
// Return string(1) "S"
var_dump((array) $a);
// Return array(1) { [0]=> string(17) "String array test"}
var_dump((array) $a[0]);
// Return string(17) "S"
```

Não existem limitações sobre a composição dos valores da string; em particular, bytes com valor 0 (“NULL bytes”) são permitidos em qualquer lugar da string.

Esta natureza do tipo string explica o motivo de não haver o tipo "byte" disponível no PHP – as strings assumem este papel. Funções que não retornam nenhuma informação textual – por exemplo, dados arbitrários lidos de um socket de rede – continuarão retornando strings.

>algumas funções, mencionadas neste tutorial como não “binary safe”, podem repassar as strings para bibliotecas que ignorem os dados após o byte nulo

```php
// => http://phptester.net/
$str = "abc\x00abc";
echo strlen($str); // => 7
echo ' -- '; // separador
$str = 'abc\x00abc';
echo strlen($str); // => 10
```

**Codificação:** a string poderá ser codificada em qualquer forma que o arquivo de script estiver codificado. Se o script estiver em ISO-8859-1, então a string vai ser codificada em ISO-8859-1.

> Não ocorre caso o Zend Multibyte estiver ativado. Neste caso, o script pode ser escrito em uma codificação arbitrária (que é declarada explicitamente ou é detectada) e então convertida em um codificação interna, a qual será a codificação utilizada nas strings literais.

> Zend Multibyte é necessário para codificações ASCII -incompatíveis , como algumas codificações asiáticos de pré-unicode/pré-utf-8 e é usado principalmente no Japão

Funções que operam em textos podem ter que fazer certas suposições sobre como as strings foram codificadas.

EX:

1 - **substr()**, **strpos()**, **strlen()** ou **strcmp()**: assumem que a string foi codificada em alguma (qualquer) codificação de byte único. Elas trabalham com o byte e não se importam com o tipo de codificação;

2 -  **htmlentities()** e maioria das funções da extensão **mbstring**: possivelmente elas assumem um padrão se nenhuma informação lhes for passada

3 - **strcasecmp()**, **strtoupper()** e **ucfirst()**: utilizam o idioma atual setado no "setlocale()", mas elas operam byte-a-byte. Então o que tem que ser garantido é que a codificação de entrada tem que ser igual ao de saída.

4 - Na maioria das funções das extensões **intl** e **PCRE**: assume que a string esteja utilizando uma codificação específica, geralmente UTF-8

> **intl** : Internationalization Functions

> **PCRE** : Expressões Regulares

5 - **utf8_decode()** assume a codificação UTF-8 e **utf8_encode()** assume a codificação ISO-8859-1

Referência: [LINK](http://php.net/manual/pt_BR/language.types.string.php#language.types.string.details)
