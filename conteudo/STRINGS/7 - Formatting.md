## Formatting

Formatação de strinfg no PHP.

FORMATTING	- Saidas e entradas

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

#### Detalhamento

**printf** : Mostra uma string formatada

>void printf ( string $format [, mixed $args ] )

Produz uma saída de acordo com format, o qual é descrito na documentação para sprintf().

```php
$string = 'I ve had it with these mother fucking snakes on this mother fucking plane';
printf('%s', $string );
```

**sprintf** : Retorna a string formatadac

>string sprintf ( string $format [, mixed $args [, mixed $... ]] )

Retorna uma string produzida de acordo com a string de formatação format. Especificado no proximo topico.

**vprintf** : Mostra uma string formatada

>int vprintf ( string $formato , array $args )

Mostra uma string formatada de acordo com o formato (o qual é descrito na documentação para a função sprintf()).

```php
$object = new stdClass();
$object->Property1 = 'fucking plane';
$object->Property2 = 'fucking windows';
vprintf('%s %s', $object);
```

**vsprintf** :  Retorna uma string formatada

>string vsprintf ( string $formato , array $args )

Funciona como sprintf() mas aceita um array de argumentos, ao invés de um número variável de argumentos.

```php
// $ php string_vsprintf.php
$string = <<<THESTRING
enuf is enuf, I ve had it with these mother %1\$s <br />
snakes on this mother %3\$s <br />
plane, every body strap in, I am about  to open some %2\$s <br />
windows
THESTRING;
$returnText = vprintf(  $string, array('fucking','LOVING','fucking')  );
echo $returnText;
```

  **fprintf** : Escreve uma string formatada para um stream

>int fprintf ( resource $handle , string $format [, mixed $args [, mixed $... ]] )

Escreve uma string produzida de acordo com a string de formato format para o recurso de stream especificado por handle (Um ponteiro de arquivo tipo resource tipicamente criado por fopen()).

```php
// $ php string_fprintf.php
if (!($fp = fopen('string_sample.txt', 'w'))) {
    return;
}
$texto = 'enuf is enuf, I ve had it with these mother fucking snakes on this mother fucking plane, every body strap in, I am about  to open some fucking windows';
fprintf($fp, "%s", $texto);
```

**number_format** : Formata um número com os milhares agrupados

>string number_format ( float $number [, int $decimals ] )

>string number_format ( float $number , int $decimals , string $dec_point , string $thousands_sep )

number_format() retorna uma versão formatada de number. Esta função aceita um, dois ou quatro parâmetros (não três)

```php
$number = 1234.56;
$format_number = number_format($number);
echo $format_number . ' | ';
$format_number = number_format($number, 2);
echo $format_number . ' | ';
$format_number = number_format($number, 2, ',', ' ');
echo $format_number . ' | ';
$number = 1234.5678;
$format_number = number_format($number, 2, '.', '');
echo $format_number . ' | ';
```

**flush** : Descarrega o buffer de saída

>void flush ( void )

Descarrega os buffers de saída do PHP e qualquer backend que o PHP esteja usando (CGI, um servidor web, etc). Isto efetivamente tenta empurrar toda a saída até aqui para o browser do usuário.

```php
if (ob_get_level() == 0) ob_start();
for ($i = 0; $i<10; $i++){
        echo "<br>$i Line to show.";
        echo str_pad('',4096)."\n";    
        ob_flush();
        flush();
        sleep(1);
}
echo "Done.";
ob_end_flush();
```

**sscanf** : Interpreta a entrada de uma string de acordo com um formato

>mixed sscanf ( string $str , string $format [, mixed &$... ] )

A função sscanf() é análoga a printf(). sscanf() lê da string str e interpreta ela de acordo com o formato especificado. Como é descrito na documentação para sprintf().

```php
list($serial) = sscanf("SN/2350001","SN/%d");
echo $serial;
echo ' | ';
list($serial) = sscanf("SN/2350001","SN/%d", $saida);
var_dump($saida);
```

**fscanf** : Interpreta a leitura de um arquivo de acordo com um formato

>mixed fscanf ( resource $handle , string $formato [, mixed &$... ] )

A função fscanf() é semelhante à sscanf(), mas usa como entrada um arquivo associado com o handle e interpreta a entrada de acordo com o formato especificado, o qual é descrito na documentação da sprintf().

PS: Sem exemplos, quando for manipulação de arquivos deve entrar neste detalhe.


### FORMATTING - Caracteres

A string e formatação é composta de zero ou mais diretivas: caracteres normais (excluindo %) que são copiados diretamente para o resultado, e especificações de conversão, cada um dos quais resulta em obter o seu próprio parâmetro. Isto se aplica para sprintf() e printf().

Tabela de especificadoção de tipo

caractere | descrição
--- | ---
% | Um caractere porcento. Não é requerido neenhum argumento.
b | O argumento é tratado com um inteiro, e mostrado como um binário.
c | O argumento é tratado como um inteiro, e mostrado como o caractere ASCII correspondente.
d | O argumento é tratado como um inteiro, e mostrado como um número decimal com sinal.
e | o argumento é tratado como notação científica (e.g. 1.2e+2). O especificador de precisão indica o número de dígitos depois do ponto decimal desde o PHP 5.2.1. Em versões anteriores, ele pegava o número de dígitos significantes (ou menos).
u | O argumento é tratado com um inteiro, e mostrado como um número decimal sem sinal.
f | O argumento é tratado como um float, e mostrado como um número de ponto flutuante (do locale).
F | o argumento é tratado como um float, e mostrado como um número de ponto flutuante (não usado o locale). Disponível desde o PHP 4.3.10 e PHP 5.0.3.
o | O argumento é tratado com um inteiro, e mostrado como un número octal.
s | O argumento é tratado e mostrado como uma string.
x | O argumento é tratado como um inteiro, e mostrado como um número hexadecimal (com as letras minúsculas).
X | O argumento é tratado como um inteiro, e mostrado como um número hexadecimal (com as letras maiúsculas).


```php
// $ php string_formatting_chars.php
$n =  43951789;
$u = -43951789;
$c = 65; // ASCII 65 is 'A'
// notice the double %%, this prints a literal '%' character
printf("%%b = '%b'\n", $n); // binary representation
printf("%%c = '%c'\n", $c); // print the ascii character, same as chr() function
printf("%%d = '%d'\n", $n); // standard integer representation
printf("%%e = '%e'\n", $n); // scientific notation
printf("%%u = '%u'\n", $n); // unsigned integer representation of a positive integer
printf("%%u = '%u'\n", $u); // unsigned integer representation of a negative integer
printf("%%f = '%f'\n", $n); // floating point representation
printf("%%o = '%o'\n", $n); // octal representation
printf("%%s = '%s'\n", $n); // string representation
printf("%%x = '%x'\n", $n); // hexadecimal representation (lower-case)
printf("%%X = '%X'\n", $n); // hexadecimal representation (upper-case)
printf("%%+d = '%+d'\n", $n); // sign specifier on a positive integer
printf("%%+d = '%+d'\n", $u); // sign specifier on a negative integer
$s = 'monkey';
$t = 'many monkeys';
printf("[%s]\n",      $s); // standard string output
printf("[%10s]\n",    $s); // right-justification with spaces
printf("[%-10s]\n",   $s); // left-justification with spaces
printf("[%010s]\n",   $s); // zero-padding works on strings too
printf("[%'#10s]\n",  $s); // use the custom padding character '#'
printf("[%10.10s]\n", $t); // left-justification but with a cutoff of 10 characters
```

FORMATTING - functions

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


**quotemeta** : Adiciona uma barra invertida antes dos meta caracteres

> string quotemeta ( string $str )

Retorna uma versão de str com uma barra invertida (\) antes de cada um destes caracteres:
> . \ + * ? [ ^ ] ( $ )

```php
$str = "I am about  to open some fucking windows (ok?)";
echo quotemeta($str);
```

**addslashes** | Adiciona barras invertidas a uma string

>string addslashes ( string $str )

Retorna uma string com barras invertidas antes de caracteres que precisam ser escapados para serem escapados em query a banco de dados, etc. Estes caracteres são aspas simples ('), aspas duplas ("), barra invertida (\) e NUL (o byte NULL).

```php
$str = "I'am about to open some fucking's windows ";
echo addslashes($str);
```

**addcslashes** | String entre aspas com barras no estilo C

>string addcslashes ( string $str , string $charlist )

Retorna uma string com barras invertidas antes dos caracteres que estão listados no parâmetro charlist.

```php
$str = "I'am about to open some fucking's windows ";
echo addcslashes($str, "A..z'");
```

**htmlentities** | Converte todos os caracteres aplicáveis em entidades html.

>string htmlentities ( string $string [, int $quote_style [, string $charset [, bool $double_encode ]]] )

Esta função é idêntica a htmlspecialchars() em toda forma, exceto que com htmlentities(), todos caracteres que tem entidade HTML equivalente são convertidos para estas entidades.

Constantes quote_style disponíveis

constante | descrição
--- | ---
ENT_COMPAT |	Irá converter aspas duplas e deixar somente aspas simples.
ENT_QUOTES |	Irá converter ambas as aspas.
ENT_NOQUOTES |	Irá deixar ambas as aspas não convertidas.

```php
// $ php string_htmlentities.php
$str = "A 'quote' is <b>bold</b>";
echo htmlentities($str) . PHP_EOL;
echo htmlentities($str, ENT_QUOTES) . PHP_EOL;
```

**htmlspecialchars** | Converte caracteres especiais para a realidade HTML

>string htmlspecialchars ( string $string [, int $quote_style [, string $charset ]] )


Esta função é útil na prevenção de textos fornecidos pelo usuário contendo marcação HTML, tal como um quadro de mensgens ou guest book. O segundo argumento opcional, quote_style, conta à função o que fazer com os caracteres aspas simples e dupla.

As traduções executadas são

entradas | saídas
--- | ---
'&' | (ampersand) torna-se '&amp;'
'"' | (aspas dupla) torna-se '&quot;' quando ENT_NOQUOTES não está definida.
''' | (aspas simples) torna-se '&#039;' apenas quando ENT_QUOTES está definida.
'<' | (menor que) torna-se '&lt;'
'>' | (maior que) torna-se '&gt;'

Conjuntos de caracteres suportados

Conjunto de caracteres | Apelidos | Descrição
--- | --- | ---
ISO-8859-1 |	ISO8859-1 |	Western European, Latin-1
ISO-8859-15 | ISO8859-15 |	Western European, Latin-9. Adiciona o símbolo do Euro, letras Francesas e Filandesas faltando no Latin-1(ISO-8859-1).
UTF-8	| | 	Código de multi-byte 8-bit Unicode compatível com ASCII.
cp866	| ibm866, 866	| Conjunto de caracteres do DOS específico para o Russo. Este conjunto de caracteres é suportado no 4.3.2.
cp1251 |	Windows-1251, win-1251, 1251 |	Conjunto de caracteres do Windows específico para o Russo. Este conjunto de caracteres é suportado no 4.3.2.
cp1252 |	Windows-1252, 1252 |	Conjunto de caracteres do Windows específico para a Europa Ocidental.
KOI8-R |	koi8-ru, koi8r |	Russo. Este conjunto de caracteres é suportado no 4.3.2.
BIG5 |	950	 | Chinês Tradicional, usado principalmente em Taiwan.
GB2312	| 936	| Chinês Simplificado, conjunto de caracteres padrão nacional.
BIG5-HKSCS |	| 	Big5 com extenções de Hong Kong, Chinês Tradicional.
Shift_JIS |	SJIS, 932	| Japonês
EUC-JP |	EUCJP	| Japonês

Nota: Qualquer outro conjunto de caracteres não é reconhecido e será usado o ISO-8859-1.

```php
// $ php string_htmlspecialchars.php
$new = htmlspecialchars("<a href='motherFuckingPlane'>mother fucking snakes</a>", ENT_QUOTES);
echo $new . PHP_EOL;
```

**nl2br** | Insere quebras de linha HTML antes de todas newlines em uma string

>string nl2br ( string $string )

Retorna string com '<br />' inserido antes de todas as newlines.

```php
echo nl2br("snakes\non\na plane");
```

**stripslashes** | Desfaz o efeito de addslashes

>string stripslashes ( string $str )

Remove barras invertidas de uma string.

```php
$string = "I\'am about to open some fucking\'s windows";
echo stripslashes($string);
```

**stripcslashes** | Desfaz o efeito de addcslashes

>string stripcslashes ( string $str )

Retorna uma string com as barras invertidas retiradas. Reconhece estilo C \n, \r ..., representação octal e hexadecimal.

```php
$string = "\I\'\a\m \a\b\o\u\t \t\o \o\p\e\n \s\o\m\e \f\u\c\k\i\n\g\'\s \w\i\n\d\o\w\s";
echo stripcslashes($string); \\ We have a problem
```

**ereg** | Casando expressões regulares

>int ereg ( string $pattern , string $string [, array &$regs ] )

Verifica se a variavel casa com a expressão regular definida em expressao em um modo sensível a distinção de caracteres (case sensitive).

```php
$string = 'I ve had it with these mother fucking snakes on this mother fucking plane';
var_dump(ereg('(fucking)', $string, $saidas));
print_r($saidas);
```
