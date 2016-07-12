## Quoting, HEREDOC & NOWDOC
Uma string literal pode ser especificada de quatro formas diferentes.

+ aspas simples
+ aspas duplas
+ sintaxe heredoc
+ sintaxe nowdoc (desde o PHP 5.3.0)

### Aspas simples

A maneira mais simples de se especificar uma string é delimitá-la entre aspas simples (').

Para especificar um apóstrofo, escape-o com uma contrabarra (\). Para especificar uma contrabarra literal, dobre-a (\\). Todas as outras ocorrências da contrabarra serão tratadas como uma contrabarra literal: isso significa que outras sequências de escape que se esteja acostumado a utilizar, como \r ou \n, serão literalmente impressas em vez de ter qualquer significado especial

```php
// => $ php string_aspas_simples.php
$string = 'Uso livre de \'  \r ou \n ou \ ou \\ ';
echo $string.PHP_EOL;
$justDo = ' shake';
$string = 'Do the Harlem $justDo';
echo $string.PHP_EOL;
$string = 'Do the Harlem \$justDo';
echo $string.PHP_EOL;
```

### Aspas duplas

Se a string for delimitada entre aspas duplas ("), o PHP irá interpretar mais sequências de escape como caracteres especiais conforme a tabela:

Sequências | Significado
--- | ---
\n | fim de linha (LF ou 0x0A (10) em ASCII)
\r | retorno de carro (CR ou 0x0D (13) em ASCII)
\t | TAB horizontal (HT ou 0x09 (9) em ASCII)
\v | TAB vertical (VT ou 0x0B (11) em ASCII) (desde o PHP 5.2.5)
\e | escape (ESC or 0x1B (27) em ASCII) (desde o PHP 5.4.4)
\f | form feed (FF ou 0x0C (12) em ASCII) (desde o PHP 5.2.5)
\\ | contrabarra ou barra invertida
\$ | sinal de cifrão
\" | aspas duplas
\[0-7]{1,3} | a sequência de caracteres correspondente a expressão regular é um caractere em notação octal, que silenciosamente é extravasada para caber em um byte (e.g. "\400" === "\000")
\x[0-9A-Fa-f]{1,2} | a sequência de caracteres correspondente a expressão regular é um caractere em notação hexadecimal
\u{[0-9A-Fa-f]+} | a sequência de caracteres correspondente a expressão regular é um código Unicode, que será impresso como uma string que representa um código UTF-8 (adicionado no PHP 7.0.0)

Como com as strings entre aspas simples, escapar qualquer outro caractere resultará em uma contrabarra sendo impressa.

O recurso mais importante de strings delimitadas por aspas duplas é o fato de que nomes de variáveis serão expandidos.

```php
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
```

### Sintaxe heredoc

Heredoc é mais antigo, e sua utilização é mais adequada para criar grandes blocos de texto dentro de código PHP sem a necessidade de se preocupar em escapar aspas duplas ou simples. Ele é semelhante à notação com aspas duplas, já que aceita variáveis e caracteres de controle em seu interior. [REF](http://rubsphp.blogspot.com.br/2010/11/heredoc-e-nowdoc.html)

> É muito importante notar que a linha que contêm o identificador de fechamento não deve conter nenhum outro caractere, com exceção do ponto-e-vírgula (;). Isso significa que o identificador não deve ser indentado e não deve ter nenhum espaço ou tabulações antes ou depois do ponto-e-vírgula. Também é importante perceber que o primeiro caractere antes do identificador de fechamento deve ser uma nova linha como definido pelo sistema operacional local.

```php
$str = <<<EOD
   Exemplo de uma string
			distribuída em várias linhas
utilizando a sintaxe heredoc.
EOD;
echo $str;
```
**Algumas coisas legais para fazer com Heredoc**

É possível também utilizar a sintaxe Heredoc para passar dados para argumentos de funções:

```php
var_dump(array(<<<EOD
foobar!
EOD
));
```

É possível inicializar variáveis estáticas e propriedades/constantes de classe:

```php
function foo() {
    static $bar = <<<LABEL
Nothing in here...
LABEL;
}
class foo {
    const BAR = <<<FOOBAR
Constant example
FOOBAR;
    public $baz = <<<FOOBAR
Property example
FOOBAR;
}
```

O identificador de abertura do Heredoc pode ser opcionalmente delimitado por aspas duplas:

```php
echo <<<"FOOBAR"
Hello World!
FOOBAR;
```

Podemos usar para identificar o tipo de texto que queremos declarar
```php
$query = <<<SQL
   SELECT * FROM qualquer_tabela WHERE 1=1
SQL;

$html = <<<HTML
  <div id="ajuda">
    <p>Olá $nome.</p>
    <p>O produto abaixo custa {$preco}.</p>
  </div>
HTML;
```

> Exemplo mais completo em: $ php string_heredoc.php

### Sintaxe nowdoc

A notação Nowdoc é semelhante à Heredoc, exceto que ela não aceita variáveis nem caracteres de controle em seu interior. Por não existir necessidade de escapar nada (inclusive os cifrões), ela é útil para um código PHP, por exemplo, guardar outro código PHP em uma string

Um nowdoc é identificado com a mesma seqüência <<< usada para heredocs, mas o identificador precisa ficar entre aspas simples, e.g. <<<'EOT'. Todas as regras para identificadores heredoc também se aplicam para identificadores nowdoc, especialmente aquelas referentes a aparência do identificador de fechamento.

```php
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
```

> Exemplo mais completo em: $ php string_nowdoc.php

> **Observação** A linha que indica término de um bloco Heredoc ou Nowdoc não pode ser indentada. Ou seja, se você está em um nível de indentação, pode usar Heredoc ou Nowdoc, mas precisa colocar o identificador de término sem indentação:

### Um pouco mais sobre STRINGS - Interpretação de variáveis

Quando uma string é especificada dentro de aspas duplas ou heredoc, as variáveis são interpretadas dentro delas.

Há dois tipos de sintaxe: uma simples e um complexa. A sintaxe simples é a mais comum e conveniente. A sintaxe complexa pode ser reconhecida pelas chaves envolvendo a expressão.

#### Sintaxe Simples

Se um sinal de cifrão ($) for encontrado, o interpretador tentará obter tantos identificadores quantos forem possíveis para formar um nome de variável válido. Envolva o nome da variável com chaves para especificar explicitamente o fim do nome.

Similarmente, um índice de array ou uma propriedade de um objeto podem ser interpretados. Com índices de arrays, o fechamento de colchetes (]) marca o final do índice. A mesma regra aplica-se a propriedade de objetos, assim como para variáveis simples.

```php
// => $ php string_sintaxe_simples.php
$what = "Harlem";
echo "1- Just Do The $what Shake.".PHP_EOL;
echo "2- Just Do The $whatis Shake.".PHP_EOL;
echo "3- Just Do The ${what} Shake.".PHP_EOL;
echo PHP_EOL.PHP_EOL.PHP_EOL;
//outro exemplo
$styles = array("Harlem", "Shake", "Dance" => "Crazy");
echo "1- He Just Do $styles[0] Dance.".PHP_EOL;
echo "2- He Just Do $styles[1] Dance.".PHP_EOL;
echo "3- He Just Do $styles[Dance] Dance.".PHP_EOL;
class People {
    public $john = "John Smith";
    public $jane = "Jane Smith";
    public $robert = "Robert Paulsen";
    public $smith = "Smith";
}
$people = new People();
echo "4- $people->john just do $styles[0] Dance.".PHP_EOL;
echo "5- $people->john then said hello to $people->jane.".PHP_EOL;
echo "6- $people->john's wife greeted $people->robert.".PHP_EOL;
echo "7- $people->robert greeted the two $people->smiths."; // Won't work
```

#### Sintaxe complexa (chaves)

Isto não é chamado sintaxe complexa porque a sintaxe é complexa, mas sim para utilização de expressões complexas.

Qualquer variável escalar, elemento de um array ou propriedade de um objeto com uma representação de uma string pode ser incluída com essa sintaxe. Simplesmente escreva a expressão da mesma forma como apareceria fora da string e então coloque-o entre { e }. Já que que { não pode escapado, esta sintaxe será somente reconhecida quando o $ seguir, imediatamente, o {. Use {\$ para obter um literal {$.

```php
// => http://phptester.net/
$great = 'fantastic';
echo "This is { $great}"; // This is { fantastic}
echo "This is {$great}"; // This is fantastic
```

Também é possível acessar propriedades de classes usando variáveis que contêm strings utilizando esta sintaxe.

```php
// => $ php string_sintaxe_complexa.php
class Dance {
    var $justDo = 'Do the Harlem Shake';
}
$crazy = new Dance();
$simple_string = 'justDo';
$simple_Array = array('just', 'justDo', 'dance', 'harlem');
echo "{$crazy->$simple_string}\n";
echo "{$crazy->{$simple_Array[1]}}\n";
```

> Funções, chamadas a métodos, variáveis estáticas de classe e constantes de classe dentro de {$} funcionam desde o PHP 5. Entretanto, o valor acessado deverá ser interpretado como o nome de uma variável no escopo em que a string está definida. Utilizar somente chaves ({}) não funcionará para acessar os valores de retorno de funções ou métodos nem os valores de constantes da classe ou variáveis estáticas da classe.

```php
// => $ php string_sintaxe_complexa.php
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
```

> Strings também podem ser acessadas usando colchetes, como em $str{42}, com o mesmo propósito.

```php
// => http://phptester.net/
$str ="abcdefghijk";
echo $str{3}; // d
```


###### CURIOSIDADES
O que é mais rápido?
Há um mito por aí que usar aspas simples em strings são interpretadas mais rápida do que usar aspas duplas. Isso não é fundamentalmente falso.

Se você estiver definindo uma string única e não concatenar valores ou qualquer coisa complicada, então aspas simples ou duplas serão idênticas. Não será mais rápido.

Se você está concatenando várias strings de qualquer tipo, ou interpolar valores em uma string entre aspas duplas, então os resultados podem variar. Se você estiver trabalhando com um pequeno número de valores, a concatenação é minuciosamente mais rápida. Com um monte de valores, interpolação é minuciosamente mais rápida.

Independentemente do que você está fazendo com strings, nenhum dos tipos vai ter qualquer impacto perceptível sobre a sua aplicação. Tentar reescrever código para usar um ou o outro é sempre um exercício de futilidade, de modo a evitar este micro-otimização, a menos que você realmente compreenda o significado e o impacto das diferenças.
