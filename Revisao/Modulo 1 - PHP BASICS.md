# Revisão sobre PHP Basics

* PHP - PHP: Hypertext Preprocessor. Criado inicialment por Rasmus Lerdof em 1994
* Linguagem de script open source de uso geral, muito utilizada, e especialmente adequada para o desenvolvimento web e que pode ser embutida dentro do HTML.
* O PHP 5 foi lançado em Julho de 2004 após um longo desenvolvimento e vários pré-lançamentos. Principalmente impulsionado pelo seu core o Zend Engine 2.0

## Sintaxe
* Tags padrão
```php
<?php echo 'Hello, world!'; ?>
```

* Shot Tags
```php
<?= 'Hello, world!'; ?>
```

* ASP Tags
```php
<%= 'Hello, world!'; %>
```

* Script Tags
```php
<script language="php"> echo 'Hello, world!'; </script>
```

## Operadores - Geral
* Um operador é algo que recebe um ou mais valores (ou expressões) e que devolve outro valor. Os próprios construtores se tornam expressões.
* Quando operadores tem precedência igual a associatividade decide como os operadores são agrupados. Ex: **1 - 2 - 3** equivale a **(1 - 2) - 3** (- associado à esquerda), já **$a = $b = $c** equivale a **$a = ($b = $c)** (= associado à direita).
* Operadores de igual precedência sem associatividade não podem ser utilizados uns próximos aos outros. Ex: **1 < 2 > 1** é ilegal no PHP, já **1 <= 1 == 1** é válido pois os operadores tem níveis distintos de precedência.
* Tabela de precedência dos operadores, do maior ao menor, precedência igual na mesma linha é decidida pela associatividade

|Associação            |Operadores                    |Informação Adicional      |
|----------------------|------------------------------|--------------------------|
|não associativo       |clone new                     |clone e new               |
|esquerda              |[                             |array()                   |
|direita               |**                            |aritmética                |
|direita               |++ -- ~ (int) (float) (string) (array) (object) (bool) @|types e incremento/decremento|
|não associativo       |instanceof                    |tipos                     |
|direita               |!                             |lógicos                   |
|esquerda              |* / %                         |aritmética                |
|esquerda              |+ - .                         |aritmética e string       |
|esquerda              |<< >>                         |bits                      |
|não associativo       |< <= > >=                     |comparação                |
|não associativo       |== != === !== <> <=>          |comparação                |
|esquerda              |&                             |bits e referências        |
|esquerda              |^                             |bits                      |
|esquerda              |\|                            |bits                      |
|esquerda              |&&                            |lógicos                   |
|esquerda              |\|\|                          |lógicos                   |
|direita               |??                            |comparação                |
|esquerda              |? :                           |ternário                  |
|direita               |= += -= *= **= /= .= %= &= |= ^= <<= >>=|atribuição      |
|esquerda              |and                           |lógicos                   |
|esquerda              |xor                           |lógicos                   |
|esquerda              |or                            |lógicos                   |

## Operadores Aritméticos
* O operador de divisão sempre retorna um valor com ponto flutuante, a não ser que os dois operandos sejam inteiros (ou strings que são convertidas para inteiros) e números inteiramente divisíveis, nesse caso um inteiro é retornado.
* Operandos de módulo são convertidos para inteiros (removendo a parte decimal) antes do processamento.
* O resultado do operador de módulo tem o mesmo sinal do dividendo (o resultado de $a % $b terá o mesmo sinal de $a).

|Exemplo        |Nome              |Resultado               |
|---------------|------------------|------------------------|
|-$a            |Negação           |Oposto de $a.           |
|$a + $b        |Adição            |Soma de $a e $b.        |
|$a - $b        |Subtração         |Diferença entre $a e $b.|
|$a * $b        |Multiplicação     |Produto de $a e $b.     |
|$a / $b        |Divisão           |Quociente de $a e $b.   |
|$a % $b        |Módulo            |Resto de $a dividido por $b.|

## Operadores de Atribuição
* O operador de atribuição é representado pelo '=' (Igual).
* Não devemos encara-lo como um igualador de valores e sim como um atribuidor do valor da esquerda com o valor da direira.

## Operadores bit a bit (bitwise)
* Operadores bit-a-bit permitem a avaliação e modificação de bits específicos em um tipo inteiro.

|Exemplo        |Nome                    |Resultado                                                               |
|---------------|------------------------|------------------------------------------------------------------------|
|$a & $b        |E (AND)                 |Os bits que estão ativos tanto em $a quanto em $b são ativados.         |
|$a \| $b        |OU (OR inclusivo)       |Os bits que estão ativos em $a ou em $b são ativados.                   |
|$a ^ $b        |XOR (OR exclusivo)      |Os bits que estão ativos em $a ou em $b, mas não em ambos, são ativados.|
|~ $a           |NÃO (NOT)               |Os bits que estão ativos em $a não são ativados, e vice-versa.          |
|$a << $b       |Deslocamento à esquerda |Desloca os bits de $a $b passos para a esquerda (cada passo significa   multiplica por dois")|
|$a >> $b       |Deslocamento à direita  |Desloca os bits de $a $b passos para a direita (cada passo significa "divide por dois")|

## Operadores de Comparação

|Exemplo         |Nome               |Resultado                                                              |
|----------------|-------------------|-----------------------------------------------------------------------|
|$a == $b        |Igual              |Verdadeiro (TRUE) se $a é igual a $b.                                  |
|$a === $b       |Idêntico           |Verdadeiro (TRUE) se $a é igual a $b, e eles são do mesmo tipo.        |
|$a != $b        |Diferente          |Verdadeiro se $a não é igual a $b.                                     |
|$a <> $b        |Diferente          |Verdadeiro se $a não é igual a $b.                                     |
|$a !== $b       |Não idêntico       |Verdadeiro de $a não é igual a $b, ou eles não são do mesmo tipo (introduzido no PHP4).|
|$a < $b         |Menor que          |Verdadeiro se $a é estritamente menor que $b.                          |
|$a > $b         |Maior que          |Verdadeiro se $a é estritamente maior que $b.                          |
|$a <= $b        |Menor ou igual     |Verdadeiro se $a é menor ou igual a $b.                                |
|$a >= $b        |Maior ou igual     |Verdadeiro se $a é maior ou igual a $b.                                |

## Operador Ternário
```php
$valor = (empty($variavel)) ? 'default' : $variavel;
```

## Operadores de controle de erro
* Quando o operador *arroba* (@) precede uma expressão, qualquer mensagem de erro que possa ser gerada por aquela expressão será ignorada.
* Se track_errors estiver habilitado, qualquer mensagem de erro erá gravada em $php_errormsg. Esta variável será sobrescrita em cada erro.

## Operadores de Execução
* Acentos graves (``).
* O PHP tentará executar o conteúdo dentro dos acentos graves como um comando do shell; a saída será retornada
* Análogo a função shell_exec()

```php
$output = `ls -al`;
```

## Operadores de Incremento/Decremento

|Exemplo         |Nome             |Efeito                                                   |
|----------------|-----------------|---------------------------------------------------------|
|++$a            |Pré-incremento   |Incrementa $a em um, e então retorna $a.                 |
|$a++            |Pós-incremento   |Retorna $a, e então incrementa $a em um.                 |
|--$a            |Pré-decremento   |Decrementa $a em um, e então retorna $a.                 |
|$a--            |Pós-decremento   |Retorna $a, e então decrementa $a em um.                 |

## Operadores Lógicos
* A razão para as duas variantes dos operandos "and" e "or" é que eles operam com precedências diferentes.

|Exemplo        |Nome    |Resultado                                                   |
|---------------|--------|------------------------------------------------------------|
|$a and $b      |E       |Verdadeiro (TRUE) se tanto $a quanto $b são verdadeiros.    |
|$a or $b       |OU      |Verdadeiro se $a ou $b são verdadeiros.                     |
|$a xor $b      |XOR     |Verdadeiro se $a ou $b são verdadeiros, mas não ambos.      |
|! $a           |NÃO 	 |Verdadeiro se $a não é verdadeiro.                          |
|$a && $b       |E       |Verdadeiro se tanto $a quanto $b são verdadeiros.           |
|$a \|\| $b     |OU 	 |Verdadeiro se $a ou $b são verdadeiros.                     |

## Operadores de String
* Concatenação ('.') e Atribuição de concatenação ('.=')

## Operadores de Arrays

|Exemplo        |Nome            |Resultado                                                                      |
|---------------|----------------|-------------------------------------------------------------------------------|
|$a + $b        |União           |União de $a e $b.                                                              |
|$a == $b       |Igualdade       |TRUE se $a e $b tem os mesmos pares de chave/valor.                            |
|$a === $b      |Identidade      |TRUE se $a e $b tem os mesmos pares de chave/valor na mesma ordem e do mesmo tipo.|
|$a != $b       |Desigualdade    |TRUE se $a não é igual a $b.                                                   |
|$a <> $b       |Desigualdade    |TRUE se $a não é igual a $b.                                                   |
|$a !== $b      |Não identidade  |TRUE se $a não é identico a $b.                                                |

##  Operadores de Tipo
* o operador **instanceof** é usado para determinar se uma variável é um objeto instânciado de uma certa classe
* Pode também ser usado para determinar se uma variável é um objeto instânciado de uma classe comparando com a classe pai
* Pode também ser usado para determinar se uma variável é um objeto instânciado de uma classe que implementa uma interface
```php
var_dump($a instanceof MyClass);
var_dump($a instanceof stdClass);
var_dump($a instanceof MyInterface);
```

## Variáveis
* Representadas por um cifrão ($) seguido pelo nome da variável. Os nomes de variável são case-sensitive
* Um nome de variável válido inicia-se com uma letra ou sublinhado, seguido de qualquer número de letras, números ou sublinhados.
* Atribuição por referência, simplesmente adicione um e-comercial (&) na frente do nome da variável
* Variáveis não inicializadas tem um valor padrão de tipo dependendo do contexto no qual são usadas - padrão de booleanos é FALSE, de inteiros e ponto-flutuantes é zero, strings são definidas como vazia e arrays são vazios.

## Variáveis Predefinidas
* Superglobais — Superglobais são variáveis nativas que estão sempre disponíveis em todos escopos
* $GLOBALS — Referencia todas variáveis disponíveis no escopo global
* $\_SERVER — Informação do servidor e ambiente de execução
* $\_GET — HTTP GET variáveis
* $\_POST — HTTP POST variables
* $\_FILES — HTTP File Upload variáveis
* $\_REQUEST — Variáveis de requisição HTTP
* $\_SESSION — Variáveis de sessão
* $\_ENV — Environment variables
* $\_COOKIE — HTTP Cookies
* $php_errormsg — A mensagem de erro anterior
* $HTTP_RAW_POST_DATA — Informação não-tratada do POST
* $http_response_header — Cabeçalhos de resposta HTTP
* $argc — O número de argumentos passados para o script
* $argv — Array de argumentos passados para o script

## Escopo de variáveis
* Variáveis geralmente tem escopo local.
* Ao usar o array especial $GLOBALS ou a palavra chave **global**, a variável passa a ter escopo global
* Uma variável estática (palavra-chave **static**) existe somente no escopo local da função, mas não perde seu valor quando o nível de execução do programa deixa o escopo

## Variáveis variáveis
* Serve tanto para variáveis como para propriedades de objetos
```php
$a = 'hello';
$$a = 'world';
echo "$a ${$a}" . PHP_EOL; // Saida :"hello world"
```

## Variáveis de fontes externas
* $\_POST, $\_GET, $\_REQUEST

## Estruturas de Controle
* **IF**  
* **ELSE**  
* **ELSEIF (ELSE IF)**  
* **IFELSE Ternário**  ([expressao] ? [verdadeiro] : [falso])
* **SWITCH**  (Comparação frouxa por ==)(default é executado depois que nenhum case foi correspondido)
* **WHILE**  (verifica a condição no início da iteração)
* **DO-WHILE**  (verifica a condição no final da iteração)
* **FOR**  (for (expr1; expr2; expr3))
* **FOREACH**  (funciona somente em arrays e objetos)

## Interrupção de laços
* **CONTINUE**: é utilizado em estruturas de laço para pular o resto da iteração atual, e continuar a execução na validação da condição e, então, iniciar a próxima iteração.
* **BREAK**: finaliza a execução da estrutura for, foreach, while, do-while ou switch atual. Aceita um argumento numérico opcional que diz quantas estruturas aninhadas deverá interromper.

---

## Construtor de Linguagem

### Construtores de saída

#### die() e exit()  

Construtores de linguagem equivalentes, encerram a execução do script. Não há nenhum diferença entre os dois.
Pode-se passar um parâmetro para ser impresso antes de se encerrar a execução.

Exemplos:

````php
<?php
//Saida Normal do Programa("Script")
exit;
exit();
exit(0);

//Saida do Programa("Script") com um Código de erro.
exit(1);
exit(0376); //octal
````

#### echo

Utilizado para exibir uma ou mais strings.

**echo** não é uma função e não se comporta como uma função, então não é obrigatório usar parênteses. echo não retorna nenhum valor, sendo recomendado o uso para aplicações web.

#### return  

A declaração return retorna o controle do programa para o módulo que o chamou. A execução continuará na expressão seguinte à invocação do módulo.

Se chamada dentro de uma função, a declaração return terminará imediatamente sua execução, e retornará seus argumentos como valor à chamada da função. A declaração return também terminar a execução de uma declaração eval() ou um arquivo de script.


#### print  
Construtor utilizado para imprimir uma string na tela.

Diferente do echo, só aceita um único parâmetro. **print**; diferente do echo, sempre retorna um valor, sendo possível utilizá-lo em expressões.

````php
<?php
//funciona
$x = (5 + print 5); // 5
var_dump( $x ); // 6

//não funciona
$x = (5 + echo 5); // 5
var_dump( $x ); // 6
````

### Construtores de avaliação

#### empty()

Determina se uma variável é considerada vazia. Uma variável é considerada vazia se não existir ou seu valor é igual FALSE. A função empty() não gera um aviso se a variável não existir.

```php
<?php
$var = 0;

// Evaluates to true because $var is empty
if (empty($var)) {
    echo '$var is either 0, empty, or not set at all';
}
```

#### eval()  

A função eval() executa a string dada no parâmetro como código PHP. eval() executa o código como se inclui-se um novo arquivo PHP.

```php
<?php
$string = 'taça';
$name = 'café';
$str = 'Esta é uma $string com o meu $name nela.';
echo $str. "\n";
eval("\$str = \"$str\";");
echo $str . "\n";

```

#### include e include_once  

A declaração include inclui e avalia o arquivo informado.

Os arquivos são incluídos baseando-se no caminho do arquivo informado ou, se não informado, o include_path especificado. Se o arquivo não for encontrado no include_path, a declaração include checará no diretório do script que o executa e no diretório de trabalho corrente, antes de falhar. O construtor include emitirá um aviso se não localizar o arquivo.

#### require e require_once

A declaração require é idêntica a include exceto que em caso de falha também produzirá um erro fatal de nível E_COMPILE_ERROR.


### Outros Construtores

#### isset()

isset verifica se a variável é definida. isset() retornará FALSE se for usada em uma variável com o valor NULL. Lembrando que no PHP um byte NULL ("\0") é diferente da constante NULL.

Se múltiplos parâmetros são fornecidos, então isset() retornará TRUE somente se todos os parâmetros são definidos.

```php
$var = '';

// Será interpretado como TRUE imprimindo o texto.
if (isset($var)) {
    echo "Essa variável existe.";
}
```

> **Aviso** isset() somente funciona com variáveis, passando qualquer outra coisa resultará em um erro do analisador.


#### unset()
unset() destrói a variável especificada. unset() aceita apenas variáveis, mas não é necessário verificá-las antes.

Exemplos:

```php
<?php
// destroy a single variable
unset($foo);
```

> **Notas:** É possível usar unset em propriedades de objetos visíveis no contexto atual.
Não é possível usar unset em $this dentro de um método de objeto desde o PHP 5.

#### list()
list() cira uma lista de variáveis similar a um array.

Exemplos:
```php
<?php
$info = array('Café', 'marrom', 'cafeína');

// Listando todas as variáveis
list($bebida, $cor, $substancia) = $info;
echo "$bebida é $cor e $substancia o faz especial.\n";
```
> **Atenção** A função list() assinala os valores começando pelos parâmetros da direita. Se você está usando variáveis normais, então não precisa se preocupar com esse detalhe. Mas se você está usando arrays com índices você normalmente iria esperar que a ordem dos índices no array fosse da esquerda para a direita, mas não é isso que acontece. O índice é criado na ordem reversa.  

> **Nota** list() funciona somente com arrays numéricos e espera que esses índices comecem de 0 (zero).

---

## Constantes
Uma constante é um identificador para um valor único. Como o nome sugere, esse valor não pode mudar durante a execução do script (exceto as constantes mágicas, que não são constantes de verdade). As constantes são case-sensitive por padrão. Por convenção, identificadores de constantes são sempre em maiúsculas.

Exemplos:

```php
<?php
define("FOO",  "alguma coisa");
```

## Constantes Mágicas  

O PHP fornece um grande número de constantes predefinidas para qualquer script que execute. A maioria dessas constantes, entretanto, são criadas por várias extensões, e estarão presentes somente quando essas extensões estiverem disponíveis, tanto por carregamento dinâmico quanto por compilação direta.

|Nome             |Descrição                                                                                            |
|-----------------|-----------------------------------------------------------------------------------------------------|
| \__LINE__	  | O número da linha corrente do arquivo.                                                              |
| \__FILE__	  | O caminho completo e nome do arquivo com links simbólicos resolvidos. Se utilizado dentro de um include, o nome do arquivo incluído será retornado. |
| \__DIR__	  | O diretório do arquivo. Se usado dentro de um include, o diretório do arquivo incluído é retornado. É equivalente a dirname(\__FILE__). O nome do diretório não possui barra no final, a não ser que seja o diretório raiz. |
| \__FUNCTION__   | O nome da função.                                                                                 |
| \__CLASS__	  | O nome da classe. O nome da classe inclui o namespace em que foi declarado (por exemplo, Foo\Bar). Note que a partir do PHP 5.4, \__CLASS__ também funcionará em traits. Quando utilizada em um método trait, \__CLASS__ é o nome da classe que está utilizando a trait. |
| \__TRAIT__	| O nome do trait. O nome do trait inclui o namespace em que foi declarado (por exemplo, Foo\Bar). |
| \__METHOD__	| O nome do método da classe. |
| \__NAMESPACE__	| O nome do namespace corrente. |


## Namespace  
Namespaces são uma forma de encapsular itens.

No mundo do PHP, namespaces são projetados para resolver dois problemas que os autores de bibliotecas e aplicações encontrar ao criar elementos de código reutilizáveis, como classes ou funções:  
1. Conflito de nomes entre código que você criar, e PHP classes / funções / constantes internas ou de terceiros classes / funções / constantes.  
2. Capacidade de criar alias (ou encurtar) Nomes_Extra_Longos, de atenuar o primeiro problema, melhorando a legibilidade do código-fonte.  

Embora qualquer código PHP válido pode ser contido dentro de um namespace, apenas os seguintes tipos de código são afetados por namespaces: classes (incluindo underlines e traços), interfaces, funções e constantes.

Exemplo:  
```php
<?php
namespace my\name;

class MyClass {}
function myfunction() {}
const MYCONST = 1;

$a = new MyClass;
$c = new \my\name\MyClass;

$a = strlen('hi');

$d = namespace\MYCONST;

$d = __NAMESPACE__ . '\MYCONST';
echo constant($d);
```

### Importando Criando Alias

A capacidade de se referir a um nome totalmente qualificado externo com um alias, ou importação, é uma característica importante de namespaces. Isto é semelhante à capacidade dos sistemas de arquivos baseados em UNIX para criar links simbólicos para um arquivo ou para um diretório.  

Para criar um alias, utiliza-se use. Exemplo:  
```php
<?php
namespace foo;
use My\Full\Classname as Another;
```

---

## Extensões  

Existem diversas extensões disponíveis para tarefas de programação especificas.  
AS extensões são adicionadas e habilitadas no arquivo de configuração do Php, php.ini .  

```
extension=php_curl.dll
```  

---

## Configurações  

Os arquivos de configuração do PHP estabelecem as configurações iniciais para as aplicações, servidores e sistemas operacionais.  

### php.ini  
O php.ini é lido quando o PHP é iniciado. Para as versões de módulo de servidor, isso acontece apenas quando o servidor web for iniciado. Para as versões CGI e CLI, isso acontece a cada invocação.  

O php.ini é carregado pelo PHP em diversos locais, nesta ordem:
* Local específico do módulo SAPI
* A variável de ambiente PHPRC.
* A Localização do arquivo php.ini pode ser definida para versões diferentes do PHP. As seguintes chaves do registro são examinadas na ordem: [HKEY_LOCAL_MACHINE\SOFTWARE\PHP\x.y.z], [HKEY_LOCAL_MACHINE\SOFTWARE\PHP\x.y] e [HKEY_LOCAL_MACHINE\SOFTWARE\PHP\x], onde x, y e z significam a versão maior, menor e release do PHP. Se houver um valor para IniFilePath nestas chaves, então o primeiro encontrado será utilizado para a localização do php.ini (apenas Windows).
[HKEY_LOCAL_MACHINE\SOFTWARE\PHP], valor de IniFilePath (Somente Windows).
* Diretório de trabalho atual (exceto CLI)
* O diretório do servidor web (para módulo SAPI), ou diretório do PHP (caso contrário, no Windows).
* Diretório do Windows (C:\windows ou C:\winnt) (para Windows), ou a opção de tempo de compilação --with-config-file-path .

O uso de variáveis de ambiente podem ser usadas no php.ini . Exemplo:  
```
; PHP_MEMORY_LIMIT is taken from environment
memory_limit = ${PHP_MEMORY_LIMIT}
```

### user.ini  
o PHP tem suporte para arquivos de configuração INI por cada diretório. Esses arquivos são processados apenas pelo CGI/FastCGI SAPI. Se está usando Apache, use arquivos .htaccess para o mesmo efeito.  

Somente configurações INI com os modos PHP_INI_PERDIR e PHP_INI_USER serão reconhecidos nos arquivos INI estilo .user.ini.  

### Onde uma configuração pode ser definida?

Existem modos que determinam quando e onde uma diretiva do PHP pode ou não pode ser definida. Por exemplo, algumas definições podem ser feitas em um script PHP usando ini_set(), enquanto outras só podem ser feitas no php.ini ou httpd.conf.  

Quando usar o PHP como módulo do Apache, pode mudar as configurações usando diretivas nos arquivos de configuração do Apache (ex.: httpd.conf e .htaccess). É necessário os privilégios "AllowOverride Options" ou "AllowOverride All" para fazer isso.

Definição dos modos PHP_INI_*  

| Modo	          | Significado                                                                                         |
|-----------------|-----------------------------------------------------------------------------------------------------|
|PHP_INI_USER     | A entrada pode ser definida nos scripts do usuário (com ini_set()) ou no registro do Windows. Desde o PHP 5.3 a entrada pode ser definida no .user.ini |
| PHP_INI_PERDIR  | A entrada pode ser definida no php.ini, .htaccess, httpd.conf ou .user.ini                          |
| PHP_INI_SYSTEM  | A entrada pode ser definida no php.ini ou httpd.conf                                                |
| PHP_INI_ALL     | A entrada pode ser definida em qualquer lugar                                                       |

[Lista de diretivas do php.ini](https://secure.php.net/manual/pt_BR/ini.list.php)  

---

## Performance  

Existem duas áreas principais que afetam a performance: uso de memória e delay de tempo de execução.  

### Garbage Collection  
Todas as variáveis do PHP são armazenadas em um recipiente chamado zval. O zval possui um contador interno que marca o uso das referências as variáveis armazenadas. Um garbage cycle verifica se pode diminuir o contador e, quando chega a zero, o recurso é liberado.  
Para melhorar a performance, os zval são colocados em um "root buffer", onde o algorítimo garante que eles sejam colocados apenas uma única vez. Apenas quando o buffer fica lotado, o ciclo é disparado.  

É possível forçar a execução de um ciclo, mesmo se o buffer não estiver lotado utilizando a função gc_collect_cycles() .  

O garbage collection tenta resolver o problema de memória, mas pode causar problemas de performance.  

### OPcache  
OPcache melhora o desempenho do PHP, armazenando scripts pré-compilados na memória compartilhada, eliminando assim a necessidade de PHP para carregar e analisar scripts a cada solicitação.

O OPcache já vem com o PHP5.5, mas precisa ser habilitado para funcionar no php.ini.

```
zend_extension	=	opcache.so

```
