# String

Uma string é uma série de caracteres, onde um caractere é o mesmo que um byte. o PHP possui suporte a um conjunto de apenas 256 caracteres, e não possui suporte nativo a Unicode (UTF-16).

A string no PHP é implementada como um array de bytes e um inteiro indicando seu tamanho no buffer.

Não existem limitações sobre a composição dos valores da string; em particular, bytes com valor 0 (“NULL bytes”) são permitidos em qualquer lugar da string.

Não existe o tipo "byte" no PHP – as strings assumem este papel.

**Codificação**: a string poderá ser codificada em qualquer forma que o arquivo de script estiver codificado. Se o script estiver em ISO-8859-1, então a string vai ser codificada em ISO-8859-1.

Funções que operam em textos podem ter que fazer certas suposições sobre como as strings foram codificadas.

>Nota: Uma string quando convertida para INT sempre retorna 0 (zero).  
Então quando fazemos *var_dump('myVar' == 0)* é retornado *bool(true)*



## Quoting, HEREDOC & NOWDOC

Uma string literal pode ser especificada de quatro formas diferentes.

* aspas simples
````php
<?php
// => $ php string_aspas_simples.php
$string = 'Uso livre de \'  \r ou \n ou \ ou \\ ';
echo $string.PHP_EOL;
$justDo = ' shake';
$string = 'Do the Harlem $justDo';
echo $string.PHP_EOL;
$string = 'Do the Harlem \$justDo';
echo $string.PHP_EOL;
````

* aspas duplas  
O recurso mais importante de strings delimitadas por aspas duplas é o fato de que nomes de variáveis serão expandidos.
````php
<?php
// => $ php string_aspas_duplas.php
$justDo = ' shake';
$string = "Do the Harlem $justDo";
echo $string.PHP_EOL.PHP_EOL;
$string = "Barra n - Do the \nHarlem $justDo";
echo $string.PHP_EOL.PHP_EOL;
$string = "Barra r - Do the \rHarlem $justDo";
echo $string.PHP_EOL.PHP_EOL;
$string = "Barra t - Do the \tHarlem $justDo";
echo $string.PHP_EOL.PHP_EOL;
$string = "Barra v - Do the \vHarlem $justDo";
echo $string.PHP_EOL.PHP_EOL;
$string = "Barra e - Do the \eHarlem $justDo";
echo $string.PHP_EOL.PHP_EOL;
$string = "Barra f - Do the \fHarlem $justDo";
echo $string.PHP_EOL.PHP_EOL;
$string = "Barra \ - Do the \\Harlem $justDo";
echo $string.PHP_EOL.PHP_EOL;
$string = "Barra $ - Do the \$Harlem $justDo";
echo $string.PHP_EOL.PHP_EOL;
$string = "Barra \" - Do the \"Harlem $justDo";
echo $string.PHP_EOL.PHP_EOL;
````

* sintaxe heredoc  
Heredoc é mais antigo, e sua utilização é mais adequada para criar grandes blocos de texto dentro de código PHP sem a necessidade de se preocupar em escapar aspas duplas ou simples. Ele é semelhante à notação com aspas duplas, já que aceita variáveis e caracteres de controle em seu interior.
````php
<?php
$str = <<<EOD
   Exemplo de uma string
            distribuída em várias linhas
utilizando a sintaxe heredoc.
EOD;
echo $str;
````

* sintaxe nowdoc  
A notação Nowdoc é semelhante à Heredoc, exceto que ela não aceita variáveis nem caracteres de controle em seu interior. Por não existir necessidade de escapar nada (inclusive os cifrões), ela é útil para um código PHP, por exemplo, guardar outro código PHP em uma string.
````php
<?php
// $ php string_sintaxe_nowdoc.php
$codigo_php = <<<'EOF'
/**
 * Somente imprime algo que eu mandei
 */
function print_something($something) {
    echo $something;
}
print_something('Do the Harlem Shake');
EOF;
eval($codigo_php);
echo PHP_EOL;
````

###  Interpretação de variáveis
Quando uma string é especificada dentro de aspas duplas ou heredoc, as variáveis são interpretadas dentro delas. Há dois tipos de sintaxe: uma simples e um complexa.

````php
<?php
// Sintaxe simples
$what = "Harlem";
echo "1- Just Do The $what Shake.".PHP_EOL;
echo "2- Just Do The $whatis Shake.".PHP_EOL;
echo "3- Just Do The ${what} Shake.".PHP_EOL;
echo PHP_EOL.PHP_EOL.PHP_EOL;

//Sintaxe complexa
$great = 'fantastic';
echo "This is { $great}"; // This is { fantastic}
echo "This is {$great}"; // This is fantastic

class beers {
    const softdrink = 'rootbeer';
    public static $ale = 'ipa';
}
$rootbeer = 'A & W';
$ipa = 'Alexander Keith\'s';
echo "I'd like an " . beers::softdrink . " \n";
echo "I'd like an {${beers::softdrink}} \n";
echo "I'd like an " . beers::$ale . " \n";
echo "I'd like an {${beers::$ale}} \n";
````

## Matching
Metodo | Observação
--- | ---
== | Comparação com conversão de tipo
=== | Comparação com verificação de tipo
strcasecmp | Comparação de strings sem diferenciar maiúsculas e minúsculas segura para binário
strncasecmp | Comparação de string caso-sensitivo de Binário seguro dos primeiros n caracteres
strcmp | Comparação de string segura para binário
similar_text | Calcula a similaridade entre duas strings
levenshtein | Calcula a distância Levenshtein entre duas strings

## Extracting
função | descrição
--- | ---
substr | Retorna uma parte de uma string
strrchr | Encontra a ultima ocorrência de um caractere em uma string
substr_replace | Substitui o texto dentro de uma parte de uma string
preg_match | Perform a regular expression match
trim | Retira espaço no ínicio e final de uma string
ltrim | Retira espaços em branco (ou outros caracteres) do início da string
rtrim | Retira espaço em branco (ou outros caracteres) do final da string
mb_substr | Obtem parte da string
wordwrap | Quebra uma string em um dado número de caracteres

## Searching
funcção | descrição
--- | ---
strpos |  Encontra a posição da primeira ocorrência de uma string
strrpos | Encontra a posição da última ocorrência de um caractere em uma string
strripos | Encontra a posição da última ocorrência de uma string case-insensitive em uma string
strstr | Encontra a primeira ocorrencia de uma string
stristr | strstr sem diferenciar maiúsculas e minúsculas

## Replacing
função | descrição
--- | ---
str_replace | Substitui todas as ocorrências da string de procura com a string de substituição
str_ireplace | Versão que não diferencia maiúsculas e minúsculas de str_replace.
substr_replace | Substitui o texto dentro de uma parte de uma string
preg_replace | Realiza uma pesquisa por uma expressão regular e a substitui.
ereg_replace | Substituição com expressões regulares
strtr | Traduz certos caracteres
quotemeta | Adiciona uma barra invertida antes dos meta caracteres

A tabela de funcões abaixo são relacionadas com ARRAY x STRINGS.  

função | descrição
--- | ---
explode | Divide uma string em array de strings
preg_split | Divide a string por uma expressão regular
str_split | Converte uma string para um array
str_word_count | Retorna informação sobre as palavras usadas em uma string
strtok | Tokeniza uma string
implode | Junta elementos de uma matriz em uma string
chunk_split | Divide uma string em pequenos pedaços

## Formatting
função | descrição
--- | ---
printf | Mostra uma string formatada
sprintf | Retorna a string formatada
vprintf | Mostra uma string formatada
vsprintf |  Retorna uma string formatada
fprintf | Escreve uma string formatada para um stream
number_format | Formata um número com os milhares agrupados
flush |  Descarrega o buffer de saída
sscanf |  Interpreta a entrada de uma string de acordo com um formato
fscanf | Interpreta a leitura de um arquivo de acordo com um formato

### Carateres de formatação
caractere | descrição
--- | ---
% | Um caractere porcento. Não é requerido neenhum argumento.
b | O argumento é tratado com um inteiro, e mostrado como um binário.
c | O argumento é tratado como um inteiro, e mostrado como o caractere ASCII correspondente.
d | O argumento é tratado como um inteiro, e mostrado como um número decimal com sinal.
e | o argumento é tratado como notação científica (e.g. 1.2e+2). O especificador de precisão indica o número de dígitos depois do ponto decimal desde o PHP 5.2.1. Em versões anteriores, ele pegava o número de dígitos significantes (ou menos).
u | O argumento é tratado com um inteiro, e mostrado como um número decimal sem sinal.
f | O argumento é tratado como um float, e mostrado como um número de ponto flutuante (do locale).
F | o argumento é tratado como um float, e mostrado como um número de ponto flutuante (não usado o locale).
o | O argumento é tratado com um inteiro, e mostrado como un número octal.
s | O argumento é tratado e mostrado como uma string.
x | O argumento é tratado como um inteiro, e mostrado como um número hexadecimal (com as letras minúsculas).
X | O argumento é tratado como um inteiro, e mostrado como um número hexadecimal (com as letras maiúsculas).

### Funções de formatação
funções | descrição
--- | ---
quotemeta | Adiciona uma barra invertida antes dos meta caracteres
addslashes | Adiciona barras invertidas a uma string
addcslashes | String entre aspas com barras no estilo C
htmlentities | Converte todos os caracteres aplicáveis em entidades html.
htmlspecialchars | Converte caracteres especiais para a realidade HTML
nl2br | Insere quebras de linha HTML antes de todas newlines em uma string
stripslashes | Desfaz o efeito de addslashes
stripcslashes | Desfaz o efeito de addcslashes
ereg | Casando expressões regulares

## PCRE
**PCRE** - Expressões Regulares (Compatíveis com Perl)

### Meta-characters

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


### Anchors

char | descrição
--- | ---
^ | Start of a line
$ | End of a line (if multiline mode is on, /n evaluates to end of line)

#### Positioners

char | descrição
--- | ---
\b | word boundary
\B | not a word boundary
\A | Start of a string
\Z | End of a string or newline at end
\z | End of a string
\G | first matching position in subject

#### Quantifiers

char | descrição
--- | ---
? | Occurs 0 or 1 time
\* | Occurs 0 or more times
\+ | Occurs 1 or more times
{n} | Occurs exactly n times
{,n} | Occurs at most n times
{m,} | Occurs m or more times
{m,n} | Occurs between m and n times
 n\a | Combination of ? with * or + makes the pattern non-greedy, i.e. *? or +?

#### Unicode Character Properties (para UTF-8)

char | descrição
--- | ---
\p{xx} | a character with the xx property
\P{xx] | a character without the xx property
\X | an extended Unicode sequence

### Pattern Modifiers

pattern | descrição
--- | ---
i | Case insensitive search
m | Multiline, $ and ^ will match at newlines
s | Makes the dot metacharacter match newlines
x | Allows for commenting
U | Makes the engine un-greedy
u | Turns on UTF8 support
e | Matched with preg_replace() allows you to call

**Exemplo**
$pattern = ‘/^\s+/i’;

### Functions

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

## Encoding
Algumas linguagems podem ser represetandas por codificações SINGLEBYTE (baseadas em 8-BIT) e outras requerem uma codificação MULTIBYTE por conta de sua complexidade (Ex.: Mandarim).
* Internamente o PHP sempre codifica com UTF-8.
* : Um byte é constituído por oito bits. Cada bit pode conter apenas dois valores distintos, um ou zero. por causa disso, um byte só pode representar 256 valores originais.

### mbstring
mbstring fornece funções específicas de multibyte que ajudam a lidar com a codificação multibyte no PHP. Ela é projetado para lidar com codificações baseados em Unicode, como UTF-8 e UCS-2.

**mb_check_encoding** : Verifica se a string é valida para um determinado encode. Exemplo:
````php
<?php
var_dump(mb_check_encoding   ("está",
 "ASCII"));
var_dump(mb_check_encoding   ("está",
 "UTF-8"));
 ````

 **mb_internal_encoding** : Set/Get internal character encoding
 ````php
 <?php
 mb_internal_encoding("UTF-8");
 echo mb_internal_encoding();
  ````

  #### Constantes pré-definidas
* MB_OVERLOAD_MAIL (integer)
* MB_OVERLOAD_STRING (integer)
* MB_OVERLOAD_REGEX (integer)
* MB_CASE_UPPER (integer)
* MB_CASE_LOWER (integer)
* MB_CASE_TITLE (integer)

### Function Overloading Feature
Function Overloading permite você adicionar multibyte em uma apliação sem modificar o codigo, apenas sobrepondo os metodos padrão de string. Por exemplo, mb_substr() vai ser chamada no lugar de substr() se a função overload estiver ativa.

Para usar function overloading, configure mbstring.func_overload no php.ini para um valor positivo que representa a combinação de funções que serão sobrepostas.

* 1 para função mail() .
* 2 para string functions,
* 4 para regular expression functions.
* 7 para mail, strings and regular expression functions
