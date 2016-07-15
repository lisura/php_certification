# Variáveis

As variáveis no PHP são representadas por um cifrão ($) seguido pelo nome da variável. Os nomes de variável são case-sensitive.

Nomes de variável seguem as mesmas regras como outros rótulos no PHP. Um nome de variável válido inicia-se com uma letra ou sublinhado, seguido de qualquer número de letras, números ou sublinhados.

Por padrão, as variáveis são sempre atribuídas por valor. Isto significa que ao atribuir uma expressão a uma variável, o valor da expressão original é copiado integralmente para a variável de destino. Isto significa também que, após atribuir o valor de uma variável a outra, a alteração de uma destas variáveis não afetará a outra. Para maiores informações sobre este tipo de atribuição, veja o capítulo em [Expressões](http://php.net/manual/pt_BR/language.expressions.php).

Exemplo:
```php
$a = 5;
$b = $a;
$a = 6;
echo "$a , $b ".PHP_EOL; // Saida: 6 , 5
```

O PHP também oferece um outro meio de atribuir valores a variáveis: atribuição por referência. Isto significa que a nova variável simplesmente referencia (em outras palavras, "torna-se um apelido para" ou "aponta para") a variável original. Alterações na nova variável afetam a original, e vice versa.

Para atribuir por referência, simplesmente adicione um e-comercial (&) na frente do nome da variável que estiver sendo atribuída (variável de origem) Por exemplo, o trecho de código abaixo imprime '6' duas vezes:

```php
$a = 5;
$b = &$a;
$a = 6
echo "$a , $b ".PHP_EOL; // Saida: 6 , 6
```

> **ATENÇÂO:** Uma observação importante a se fazer, é que somente variáveis nomeadas podem ser atribuídas por referência.

```php
$foo = 25;
$bar = &$foo;      // Esta atribuição é válida.
$bar = &(24 * 7);  // Inválido; referencia uma expressão sem nome.

function test()
{
   return 25;
}

$bar = &test();    // Inválido.
```

> **DICA:** Não é necessário inicializar variáveis no PHP, contudo é uma ótima prática.

Variáveis não inicializadas tem um valor padrão de tipo dependendo do contexto no qual são usadas - padrão de booleanos é FALSE, de inteiros e ponto-flutuantes é zero, strings (por exemplo, se utilizados em echo), são definidas como vazia e arrays tornam-se um array vazio.

Confiar no valor padrão de uma variável não inicializada é problemático no caso de incluir um arquivo em outro que usa uma variável de mesmo nome. E também um dos maiores riscos de segurança com register_globals habilitada. Erros de nível E_NOTICE serão emitidos no caso de ter variáveis não inicializadas, contudo não no caso de adicionar elementos a um array não inicializado. O construtor da linguagem isset() pode ser usado para detectar se uma variável não foi inicializada.

Referência: [LINK](http://php.net/manual/pt_BR/language.variables.php)

### Variáveis Pré-definidas

O PHP oferece um grande número de variáveis pré-definidas para qualquer script que execute. Muitas destas variáveis, entretanto, não podem ser completamente documentadas pois dependem do servidor que está sendo executado, a versão e configuração deste servidor e outros fatores. Algumas destas variáveis não estarão disponíveis quando o PHP for executado em linha de comando.


* Superglobais — Superglobais são variáveis nativas que estão sempre disponíveis em todos escopos
* $GLOBALS — Referencia todas variáveis disponíveis no escopo global
* $_SERVER — Informação do servidor e ambiente de execução
* $_GET — HTTP GET variáveis
* $_POST — HTTP POST variables
* $_FILES — HTTP File Upload variáveis
* $_REQUEST — Variáveis de requisição HTTP
* $_SESSION — Variáveis de sessão
* $_ENV — Environment variables
* $_COOKIE — HTTP Cookies
* $php_errormsg — A mensagem de erro anterior
* $HTTP_RAW_POST_DATA — Informação não-tratada do POST
* $http_response_header — Cabeçalhos de resposta HTTP
* $argc — O número de argumentos passados para o script
* $argv — Array de argumentos passados para o script

> **ATENÇÂO:** No PHP 4.2.0 e versões posteriores, o valor padrão da diretiva register_globals é off. Esta é a maior modificação no PHP. Ter register_globals off afeta o conjunto de variáveis pré-definidas disponíveis no escopo global. Por exemplo, para obter a variável DOCUMENT_ROOT você usará $_SERVER['DOCUMENT_ROOT'] em vez de $DOCUMENT_ROOT, ou $_GET['id'] da URL http://www.example.com/test.php?id=3 em vez de $id, ou $_ENV['HOME'] em vez de $HOME.

> **ATENÇÂO:** Mesmo que ambas variáveis, superglobais e HTTP_*_VARS existam ao mesmo tempo; não serão idênticas, então modificar uma não alterará a outra.

## Escopo de variáveis

O escopo de uma variável é o contexto onde foi definida. A maioria das variáveis do PHP tem somente escopo local. Este escopo local inclui os arquivos incluídos e requeridos

EXEMPLO: [LINK](https://github.com/lisura/php_certification/blob/master/Questoes/PHP_BASICO/Variaveis/variaveis_escopo.php)

### Global
Uma maneira de acessar variáveis do escopo global é utilizando o array especial $GLOBALS definido pelo PHP.
Outra maneira usando a palavra chave **global**.

EXEMPLO: [LINK](https://github.com/lisura/php_certification/blob/master/Questoes/PHP_BASICO/Variaveis/variaveis_escopo.php)

### STATIC

Outro recurso importante do escopo de variáveis é a variável static. Uma variável estática existe somente no escopo local da função, mas não perde seu valor quando o nível de execução do programa deixa o escopo.

Exemplo:

```php
function Teste()
{
    $a = 0;
    echo $a;
    $a++;
}
```

Essa função é inútil, já que cada vez que é chamada, define $a com o valor 0, e imprime 0. A instrução $a++ , que aumenta o valor da variável, não tem sentido já que assim que a função termina a variável $a desaparece.

```php
function Teste()
{
    static $a = 0;
    echo $a;
    $a++;
}
```

Agora, a variável $a é inicializada apenas na primeira chamada da função e cada vez que a função test() for chamada, imprimirá o valor de $a e depois o incrementará.

Variáveis estáticas fornecem uma solução para lidar com funções recursivas. Uma função recursiva é aquela chama a si mesma. Cuidados devem ser tomados quando escrever funções recursivas porque é possível que ela continue na recursão indefinidamente. Deve-se assegurar que há uma maneira adequada de terminar a recursão. A seguinte função recursiva conta até 10, utilizando a variável estática $count para saber quando parar:

```php
function Teste()
{
    static $count = 0;

    $count++;
    echo $count;
    if ($count < 10) {
        Teste();
    }
    $count--;
}
```

## Variáveis variáveis

As vezes, é conveniente possuir variáveis com nomes variáveis. Isto é, o nome de uma variável que pode ser definido e utilizado dinamicamente.

Exemplo:

```php
$a = 'hello';
$$a = 'world';
echo "$a ${$a}" . PHP_EOL; // Saida :"hello world"
```

Para poder utilizar variáveis variáveis com arrays, você precisa resolver um problema de ambiguidade. Isso é, se você escrever $$a[1] o interpretador precisa saber que se deseja utilizar $a[1] como uma variável ou que se deseja usar $$a como uma variável e [1] como o índice dessa variável. A sintaxe para resolver essa ambiguidade é **${$a[1]}** para o primeiro caso e **${$a}[1]**, para o segundo.

Propriedades de classes também podem ser acessadas utilizando-se nomes de propriedades variáveis.

Exemplo:

```php
echo $foo->$bar . "\n";
echo $foo->{$baz[1]} . "\n";
```

## Variáveis de fontes externas

### Formulários HTML (GET e POST)

Quando um formulário é submetido para um script PHP, a informação deste formulário estará automaticamente disponível ao script. Há algumas maneiras de acessar estas informações, por exemplo:

```php
echo $_POST['username'];
echo $_REQUEST['username'];
```

A solicitação de uma URL com variáveis pode ser acessada pelo $_GET
