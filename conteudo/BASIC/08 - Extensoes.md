# Constantes  
Uma constante é um identificador para um valor único. Como o nome sugere, esse valor não pode mudar durante a execução do script (exceto as constantes mágicas, que não são constantes de verdade). As constantes são case-sensitive por padrão. Por convenção, identificadores de constantes são sempre em maiúsculas.

Exemplos:

````php
// Nomes de constantes válidos
define("FOO",     "alguma coisa");
define("FOO2",    "alguma outra coisa");
define("FOO_BAR", "alguma coisa mais");

// Nomes de constantes inválidas
define("2FOO",    "alguma coisa");

// Isto é válido, mas deve ser evitado:
// O PHP pode vir a fornercer uma constante mágica
// que danificará seu script
define("__FOO__", "alguma coisa");
````

Como as superglobals, o escopo de uma constante é global. Você pode acessar constantes de qualquer lugar em seu script sem se preocupar com o escopo.

No PHP é possível definir as constantes de duas maneiras distintas:  
````php
const FOO = 'BAR';
define('FOO', 'BAR');
````

A diferença fundamental entre essas duas formas é que const define constantes em tempo de compilação, enquanto que define() os define em tempo de execução. Isso faz com que a const tenha algumas desvantagens.  
````php
if (...) {
    const FOO = 'BAR';    // invalid
}
// but
if (...) {
    define('FOO', 'BAR'); // valid
}
````

Usando define(), é possível gerá-las e validá-las em execução. Exemplo:  
````php
if (!defined('FOO')) {
    define('FOO', 'BAR');
}
````

const aceita apenas valores como numeros, string ou outra constante como true, false, null, \__FILE__ ; enquanto que define() aceitam valores e expressões. Arrays não são suportados por nenhuma das duas. Exemplos:  
````php
const BIT_5 = 1 << 5;    // valid since PHP 5.6, invalid previously
define('BIT_5', 1 << 5); // always valid
````

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

Exemplo:  
````php
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
````  

* **Definindo Namespaces**  
Embora qualquer código PHP válido pode ser contido dentro de um namespace, apenas os seguintes tipos de código são afetados por namespaces: classes (incluindo underlines e traços), interfaces, funções e constantes.  

Namespaces são declaradas usando a palavra-chave namespace. Um arquivo que contém um namespace deve declarar o namespace na parte superior do arquivo antes de qualquer outro código.
Exemplo:  
````php
namespace MyProject;
namespace MyProject\Sub\Level; //sub namespace

const CONNECT_OK = 1;
class Connection { /* ... */ }
function connect() { /* ... */ }
````  

````php
<html>
<?php
namespace MyProject; // fatal error - namespace must be the first statement in the script
````

Para declarar mais de um namespace em um arquivo, é recomendado:  
````php
<?php
namespace MyProject {

const CONNECT_OK = 1;
class Connection { /* ... */ }
function connect() { /* ... */  }
}

namespace AnotherProject {

const CONNECT_OK = 1;
class Connection { /* ... */ }
function connect() { /* ... */  }
}
````  

* **Importando\Criando Alias**

A capacidade de se referir a um nome totalmente qualificado externo com um alias, ou importação, é uma característica importante de namespaces. Isto é semelhante à capacidade dos sistemas de arquivos baseados em UNIX para criar links simbólicos para um arquivo ou para um diretório.  

Para criar um alias, utiliza-se use. Exemplo:  
````php
namespace foo;
use My\Full\Classname as Another;

// this is the same as use My\Full\NSname as NSname
use My\Full\NSname;

// importing a global class
use ArrayObject;

$obj = new namespace\Another; // instantiates object of class foo\Another
$obj = new Another; // instantiates object of class My\Full\Classname
NSname\subns\func(); // calls function My\Full\NSname\subns\func
$a = new ArrayObject(array(1)); // instantiates object of class ArrayObject
// without the "use ArrayObject" we would instantiate an object of class foo\ArrayObject
func(); // calls function My\Full\functionName
echo CONSTANT; // echoes the value of My\Full\CONSTANT
````  

A importação é realizada em tempo de compilação, e assim não afeta classe dinâmica, função ou nomes de constantes.  
````php  
use My\Full\Classname as Another, My\Full\NSname;

$obj = new Another; // instantiates object of class My\Full\Classname
$a = 'Another';
$obj = new $a;      // instantiates object of class Another
````  

````php
$obj = new Another; // instantiates object of class My\Full\Classname
$obj = new \Another; // instantiates object of class Another
$obj = new Another\thing; // instantiates object of class My\Full\Classname\thing
$obj = new \Another\thing; // instantiates object of class Another\thing
````  

* **Espaço Global**  
Sem definição de namespace, todas as definições de classe e função são colocados no espaço global.  
Exemplo:  
````php
namespace A\B\C;

/* This function is A\B\C\fopen */
function fopen() {
     /* ... */
     $f = \fopen(...); // call global fopen
     return $f;
}
````  

Dentro de um namespace, quando o PHP encontra um nome não qualificado em um nome de classe, função ou contexto constante, ele os resolve com prioridades diferentes. Os nomes de classe são sempre resolvidos para o nome do namespace atual.  
Exemplo:  
````php
namespace A\B\C;
class Exception extends \Exception {}

$a = new Exception('hi'); // $a is an object of class A\B\C\Exception
$b = new \Exception('hi'); // $b is an object of class Exception

$c = new ArrayObject; // fatal error, class A\B\C\ArrayObject not found
````  

Para as funções e constantes, o PHP irá buscar funções e constantes globais, se o namespace não existir.  
Exemplo:
````php
namespace A\B\C;

const E_ERROR = 45;
function strlen($str)
{
    return \strlen($str) - 1;
}

echo E_ERROR, "\n"; // prints "45"
echo INI_ALL, "\n"; // prints "7" - falls back to global INI_ALL

echo strlen('hi'), "\n"; // prints "1"
if (is_array('hi')) { // prints "is not array"
    echo "is array\n";
} else {
    echo "is not array\n";
}
````

Exercícios: [LINK](https://github.com/lisura/php_certification/blob/master/Questoes/PHP_BASICO/constantes/constantes_magicas.php)
