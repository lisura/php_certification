## PCRE

São divididas em duas:
- Expressão Regular (POSIX Extended)
- PCRE - Expressões Regulares (Compatíveis com Perl)

> POSIX não é coberto pela prova de certificação

### PCRE(Perl Compatible Regular Expressions)

- Compativeis com mutibyte

NOTA: "Multibyte character encoding schemes and their related issues are fairly complicated, and are beyond the scope of this documentation"

- Delimitadores – usados no inicio e no final do pattern; podem ser manualmente adicionados, normalmente “/”, “#”, “~”, “!” ou uso de chaves: {pattern}
- greediness – Por padrão o maximo de MATCH é retornado para cada simbolo


#### Meta-characters

char | descrição
--- | ---
\ | general escape character
[] | a class
&#124; | or
() | a sub-pattern
[^] | negate the class, must be put in the first character
[-] | range
 | Character Classes
\d | Digits 0-9 [:digit:]
\D | Anything not a digit
\w | Any alphanumeric character or an underscore ( _ ) [:word:]
\W | Anything not an alphanumeric character or an underscore
\s | Any whitespace (spaces, tabs, newlines) [:space:]
\S | Any non-whitespace character
. | Any character except for a newline
alnum | letter and digits
alpha | letters
lower | lower case letters
upper | upper case letters


#### Anchors

char | descrição
--- | ---
^ | Start of a line
$ | End of a line (if multiline mode is on, /n evaluates to end of line)

##### Positioners

char | descrição
--- | ---
\b | word boundary
\B | not a word boundary
\A | Start of a string
\Z | End of a string or newline at end
\z | End of a string
\G | first matching position in subject

##### Quantifiers

char | descrição
--- | ---
? | Occurs 0 or 1 time
* | Occurs 0 or more times
+ | Occurs 1 or more times
{n} | Occurs exactly n times
{,n} | Occurs at most n times
{m,} | Occurs m or more times
{m,n} | Occurs between m and n times
| Combination of ? with * or + makes the pattern non-greedy, i.e. *? or +?

##### Unicode Character Properties (for UTF-8)

char | descrição
--- | ---
\p{xx} | a character with the xx property
\P{xx] | a character without the xx property
\X | an extended Unicode sequence

#### Pattern Modifiers

pattern | descrição
--- | ---
i | Case insensitive search
m | Multiline, $ and ^ will match at newlines
s | Makes the dot metacharacter match newlines
x | Allows for commenting
U | Makes the engine un-greedy
u | Turns on UTF8 support
e | Matched with preg_replace() allows you to call

**Example**
$pattern = ‘/^\s+/i’;

#### Functions

funções | descrição
--- | ---
preg_filter | Perform a regular expression search and replace
preg_grep | Retorna as entradas do array que combinaram com o padrão
preg_last_error | Retorna o código de erro da última regex PCRE executada
preg_match_all | Perform a global regular expression match
preg_match | Perform a regular expression match
preg_quote | Adiciona escape em caracteres da expressão regular
preg_replace_callback_array | Perform a regular expression search and replace using callbacks
preg_replace_callback | Executa uma busca usando expressão regular e modifica usando um callback
preg_replace | Realiza uma pesquisa por uma expressão regular e a substitui.
preg_split | Divide a string por uma expressão regular


**Detalhando as funções**

**preg_filter** : Perform a regular expression search and replace

>mixed preg_filter ( mixed $pattern , mixed $replacement , mixed $subject [, int $limit = -1 [, int &$count ]] )


preg_filter () é idêntica à preg_replace (), exceto que retorna os que foram encontrados. Para obter detalhes sobre como essa função funciona, leia a documentação preg_replace ().

```php
// $ php string_preg_filter.php
$subject = array('1', 'a', '2', 'b', '3', 'A', 'B', '4');
$pattern = array('/\d/', '/[a-z]/', '/[1a]/');
$replace = array('A:$0', 'B:$0', 'C:$0');
echo "preg_filter returns\n";
print_r(preg_filter($pattern, $replace, $subject));
echo "preg_replace returns\n";
print_r(preg_replace($pattern, $replace, $subject));
```

**preg_grep** : Retorna as entradas do array que combinaram com o padrão

>array preg_grep ( string $pattern , array $input [, int $flags ] )

Retorna o array consistindo dos elementos do array de input que combinaram com o dado pattern.
Se PREG_GREP_INVERT for usado esta função retorna os elementos do array de entrada que não casam com o dado pattern.

```php
// $ php string_preg_grep.php
$array = array('1212.1212', 'Nunca diga o que sente para alguém de fora da família. ', '987.987', 'Mulheres e crianças podem ser descuidadas, homens não.');
$fl_array = preg_grep("/^(\d+)?\.\d+$/", $array);
print_r($fl_array);
```

**preg_last_error** : Retorna o código de erro da última regex PCRE executada

>int preg_last_error ( void )

Retorna o código de erro da última regex PCRE executada.

```php
preg_match('/(?:\D+|<\d+>)*[!?]/', 'foobar foobar foobar');
if (preg_last_error() == PREG_BACKTRACK_LIMIT_ERROR) {
    print 'Eu vou fazer-lhe uma oferta que você não pode recusar';
}
```

constante	| descrição
--- | ---
PREG_PATTERN_ORDER |	Ordena os resultados de modo que $matches[0] seja um array de todas as combinações do padrão. $matches[1] é um array de strings combinadas pelo primeiro subpadrão, e assim por diante. Esta flag é somente usada com preg_match_all().
PREG_SET_ORDER	| Ordena os resultados de modo que $matches[0] seja um array do primeiro conjunto de combinações, $matches[1] é um array do segundo conjunto de combinações, e assim por diante. Esta flag é somente usada com preg_match_all().
PREG_OFFSET_CAPTURE	| Veja a descrição da PREG_SPLIT_OFFSET_CAPTURE. Esta flag está disponível desde o PHP 4.3.0.
PREG_SPLIT_NO_EMPTY	| Esta flag diz a preg_split() não retornar pedaços em branco.
PREG_SPLIT_DELIM_CAPTURE | Esta flag diz a preg_split() capturar expressões entre parênteses no delimitador do padrão também. Está flag está disponível desde o PHP 4.0.5.
PREG_SPLIT_OFFSET_CAPTURE	| Se esta flag é usada, para cada combinação será retornada também a posição da string. Note que esta modificação retorna valores em um array onde cada elemento é um array consistindo da string combinada no índice 0 e a posição na string alvo na índice 1. Esta flag está disponível desde o PHP 4.3.0 e é somente usada por preg_split().
PREG_NO_ERROR	| Retornado pela preg_last_error() se não haver erros. Disponível desde o PHP 5.2.0.
PREG_INTERNAL_ERROR	| Retornado pela preg_last_error() se houve um erro interno na PCRE. Disponível desde o PHP 5.2.0.
PREG_BACKTRACK_LIMIT_ERROR |	Retornado pela preg_last_error() se backtrack limit foi esgotado. Disponível desde o PHP 5.2.0.
PREG_RECURSION_LIMIT_ERROR |	Retornado pela preg_last_error() se recursion limit foi esgotado. Disponível desde o PHP 5.2.0.
PREG_BAD_UTF8_ERROR | Retornado pela preg_last_error() se o último erro foi causado por informação deformada em UTF-8 (somente quando usado a regex em modo UTF-8). Disponível desde o PHP 5.2.0.
PREG_BAD_UTF8_OFFSET_ERROR |	Retornado pela preg_last_error() se o offset não correspondeu ao início de um válido code point UTF-8 (somente quando executando uma regex em modo UTF-8). Disponível desde o PHP 5.3.0.
PCRE_VERSION |	Versão da PCRE e data de liberação (e.g. "7.0 18-Dec-2006"). Disponível desde o PHP 5.2.4.

**preg_match_all** : Perform a global regular expression match

>int preg_match_all ( string $pattern , string $subject [, array &$matches [, int $flags = PREG_PATTERN_ORDER [, int $offset = 0 ]]] )

Procura subject para todos os casos da expressão regular. Coloca o resultado no  matches

```php
// $ php string_pregs.php
preg_match_all("|<[^>]+>(.*)</[^>]+>|U",
    "<b>Um homem que não se dedica à família: </b><div align=left>jamais será um homem de verdade</div>",
    $out, PREG_PATTERN_ORDER);
print_r($out);
```

**preg_match** : Perform a regular expression match

>int preg_match ( string $pattern , string $subject [, array &$matches [, int $flags = 0 [, int $offset = 0 ]]] )

```php
$subject = "Eu vou fazer-lhe uma oferta que você não pode recusar. ";
$pattern = '/^Eu/';
preg_match($pattern, $subject, $matches, PREG_OFFSET_CAPTURE);
print_r($matches);
```

**preg_quote** : Adiciona escape em caracteres da expressão regular

>string preg_quote ( string $str [, string $delimiter ] )

preg_quote() pega str e coloca uma barra invertida antes de cada caractere que é parte da sintaxe da expressão regular. Isto é útil se você tem uma string em run-time que você precisa combinar em algum texto e a string pode conter caracteres especiais de regex.

Os caracteres especiais da expressão regular são . \ + * ? [ ^ ] $ ( ) { } = ! < > | :

```php
$keywords = 'Os homens mais rico$ são aqueles que possuem *amigos* mais poderosos';
$keywords = preg_quote($keywords, '/');
echo $keywords;
```

**reg_replace_callback_array** : Perform a regular expression search and replace using callbacks

>mixed preg_replace_callback_array ( array $patterns_and_callbacks , mixed $subject [, int $limit = -1 [, int &$count ]] )

Retorna um array se o subject é um array, senão retorna uma string. Em caso de erro retorna NULL

```php
// Problemas para rodar
$subject = 'Aaaaaa Bbb';
preg_replace_callback_array(
    [
        '~[a]+~i' => function ($match) {
            echo strlen($match[0]), ' matches for "a" found', PHP_EOL;
        },
        '~[b]+~i' => function ($match) {
            echo strlen($match[0]), ' matches for "b" found', PHP_EOL;
        }
    ],
    $subject
);
```

**preg_replace_callback** : Executa uma busca usando expressão regular e modifica usando um callback

>mixed preg_replace_callback ( mixed $pattern , callback $callback , mixed $subject [, int $limit [, int &$count ]] )

O comportamento desta função é quase idêntico ao da preg_replace(), exceto pelo fato que ao invés do parâmetro replacement, você deve especificar um callback.

```php
$text = "April fools day is 01/04/2002\n";
$text.= "Last christmas was 15/12/2001\n";
// the callback function
function next_year($matches)
{
  // as usual: $matches[0] is the complete match
  // $matches[1] the match for the first subpattern
  // enclosed in '(...)' and so on
  return $matches[1].($matches[2]+1);
}
echo preg_replace_callback(
            "|(\d{2}/\d{2}/)(\d{4})|",
            "next_year",
            $text);
```

**preg_replace** : Realiza uma pesquisa por uma expressão regular e a substitui.

>mixed preg_replace ( mixed $pattern , mixed $replacement , mixed $subject [, int $limit = -1 [, int &$count ]] )

preg_replace() retorna um array se o parâmetro subject é um array, caso contrário retorna uma string

Se a correspondência for encontrada, o novo subject será devolvido, caso contrário subject será devolvido inalterado ou NULL se um erro ocorreu.


```php
$string = 'Se tem uma coisa que a história nos ensina, é que se pode matar qualquer um.';
$patterns = array();
$patterns[0] = '/tem/';
$patterns[1] = '/uma/';
$patterns[2] = '/coisa/';
$replacements = array();
$replacements[2] = 'história';
$replacements[1] = 'nos';
$replacements[0] = 'ensina';
echo preg_replace($patterns, $replacements, $string);
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

Dica: se você não precisa do poder das expressões regulares, pode optar por alternativa mais rápidas como explode() ou str_split().
